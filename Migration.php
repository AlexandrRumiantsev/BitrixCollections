<?php
/* Файл выборки данных из БД и запись в JSON файл */

header("Access-Control-Allow-Origin: *");

class db {
  
      private $login = 'campus';
      private $pass = '****'; 
      private $name_base = '****';
      
      function connect() {
        $link = new mysqli( 'localhost', $this->login, $this->pass, $this->name_base );
        return $link;
      }

      function getList($link){
   
         $result = mysqli_query(
            $link, 
            "SELECT * FROM `sb_news`"
        );
        
        $text .= '[';
                $counter = mysqli_num_rows($result);
                //echo $counter;
                $i = 1;
                // Заголовок новости n_title
                // КОнтент новости n_full
                // Дата новости  n_date
                while ($row = $result->fetch_assoc()) {
		
                        $text .= json_encode(htmlspecialchars($row)); 
                        if($i < $counter){
                          $text .= ',';
                        }; 
                        $i++;
                };
            $text .=  ']';
            //echo $text;
            file_put_contents('query.txt', $text/*, FILE_APPEND*/);
            
     }
    } 

            $db = new db();
            $db-> getList($db -> connect());
    
?>


<?

/* Файл на сервере, для загрузки данных из JSON файла в инфоблок битрикса */

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$file = file_get_contents('./query.txt', true);


foreach (json_decode($file) as $key => $value) {

	if($value->n_short_foto != '' && $value->n_short_foto != null){

    /* 2 версии новостей - рус. и англ. */
		if(mb_detect_encoding($value->n_title[0]) == 'UTF-8'){
			$code = 29307;
		}else $code = 29306;

		$nameImg = explode("/", $value->n_short_foto)[4];
		
		$fileContent = file_get_contents($value->n_short_foto);
		if ($fileContent) {
		    $tmpFile = "./{$nameImg}";
		    if ($fileContent && file_put_contents($tmpFile, $fileContent)) {
		        $fileArray = \CFile::MakeFileArray($tmpFile);
		        $arFields = array(
				   "ACTIVE" => "Y", 
				   "IBLOCK_ID" => 215,
				   "IBLOCK_SECTION_ID" => $code,
				   "NAME" => $value->n_title,
				   "PREVIEW_PICTURE" =>$fileArray,
				   "PREVIEW_TEXT" => $value->n_title,
				   "DETAIL_TEXT" => $value->n_full,
				   "DETAIL_TEXT_TYPE" => 'html'   
				);
				$oElement = new CIBlockElement();
				$idElement = $oElement->Add($arFields); 
				if($idElement){
					//echo 'ADD ELEM '.$idElement;
				}

		    }
		}
	}
}

?>
