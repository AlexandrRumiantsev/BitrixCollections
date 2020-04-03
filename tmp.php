<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
   /** @var array $arParams */
   /** @var array $arResult */
   /** @global CMain $APPLICATION */
   /** @global CUser $USER */
   /** @global CDatabase $DB */
   /** @var CBitrixComponentTemplate $this */
   /** @var string $templateName */
   /** @var string $templateFile */
   /** @var string $templateFolder */
   /** @var string $componentPath */
   /** @var CBitrixComponent $component */
   $this->setFrameMode(true);
   $allNewsUrl = $arParams["LIST_PAGE_URL"];
   
   function getData($code , $prop){
                      $url = "https://www.ranepa.ru";
                      $data;
                  $dbElement = CIBlockElement::GetList(Array(), Array("ID"=> $prop[$code]["VALUE"]));
                      if($obElement = $dbElement->GetNextElement()){
                                       $property = $obElement ->GetProperties();
                                      
                                       $res = CIBlockElement::GetByID($prop[$code]["VALUE"]);
                    if($ar_res = $res->GetNext()){
                        $data[$code]['DETAIL_PAGE_URL'] = $url .$ar_res["DETAIL_PAGE_URL"];
                        $data[$code]['NAME'] = $ar_res["NAME"];
                        $data[$code]['PREVIEW_PICTURE'] = $url .CFile::GetPath($ar_res["DETAIL_PICTURE"]);
                        $arParams["DATE_CREATE"]="j F Y";
                      $date = [
                        FormatDate("d", MakeTimeStamp($property["DATE"]['VALUE']?:$ar_res['ACTIVE_FROM'])),
                        FormatDate("F", MakeTimeStamp($property['DATE']['VALUE']?:$ar_res['ACTIVE_FROM']))
                      ];
                                           $data[$code]['DATE'] = $date;
                        return $data;
                    }
                       
                      } 
                    }

   ?>
<?foreach($arResult["ITEMS"] as $key => $arItem):?>
<?
   $dbEl = CIBlockElement::GetList(Array("ID"=>"ASD"), Array(/*"IBLOCK_ID"=>$arItem["IBLOCK_ID"] , "ACTIVE"=>"Y"*/"=ID"=>$arItem['ID'] ));
   
      if($obEl = $dbEl->GetNextElement())
      {   
          $props = $obEl->GetProperties();
          $id =  $props['NEWS_0']['ID'];
          $id_block = $props['NEWS_0']; 
          $news0 = getData('NEWS_0' , $props)['NEWS_0'];
          $news1 = getData('NEWS_1' , $props)['NEWS_1'];
          $news2 = getData('NEWS_2' , $props)['NEWS_2'];
          $news3 = getData('NEWS_3' , $props)['NEWS_3'];
          $news4 = getData('NEWS_4' , $props)['NEWS_4'];
          $news5 = getData('NEWS_5' , $props)['NEWS_5'];
          $news6 = getData('NEWS_6' , $props)['NEWS_6'];
          $news7 = getData('NEWS_7' , $props)['NEWS_7'];
      }
   
    break;
   ?>
<?endforeach;?>
<div class='white-phone main_news_block'>
   <div class="wrapper new-slider">
      <div class="new-slider__container-left">
         <h2 class="new-slider__title">
            Новости
         </h2>
         <div  id="bx_3218110189_271230">
            <div class="layout-default news_item_box alignment-center">
               <div class="picture_box">
                  <div class="data_news">
                     <span class="element element-itemcreated first last">
                     <span class="day_news"><?=$news0['DATE'][0]?></span>
                     <span class="month_news"><?=$news0['DATE'][1]?></span>
                     </span>
                  </div>
                  <div class="pict_news">
                     <a class="jbimage-link" title="<?=$news0['NAME']?>" href="<?=$news0['DETAIL_PAGE_URL']?>">
                     <img class="jbimage lazyImg" alt="<?=$news0['NAME']?>" title="<?=$news0['NAME']?>" src="<?=$news0['PREVIEW_PICTURE']?>" style="display: block;">
                     </a>
                  </div>
               </div>
               <div class="title_new">
                  <a title="<?=$news0['NAME']?>" href="<?=$news0['DETAIL_PAGE_URL']?>">
                  <?=$news0['NAME']?>
                  </a>
               </div>
            </div>
         </div>
      </div>
      <div class="new-slider__container-right">
         <div class="container-right__links">
            <a title="<?=$news1['NAME']?>" href="<?=$news1['DETAIL_PAGE_URL']?>">
            <span> <?=$news1['NAME']?></span> 
            </a>
            <a title="<?=$news2['NAME']?>" href="<?=$news2['DETAIL_PAGE_URL']?>">
            <span> <?=$news2['NAME']?></span> 
            </a>
            <a title="<?=$news3['NAME']?>" href="<?=$news3['DETAIL_PAGE_URL']?>">
            <span> <?=$news3['NAME']?></span> 
            </a>
            <a title="<?=$news4['NAME']?>" href="<?=$news4['DETAIL_PAGE_URL']?>">
            <span> <?=$news4['NAME']?></span> 
            </a>
            <a title="<?=$news5['NAME']?>" href="<?=$news5['DETAIL_PAGE_URL']?>">
            <span> <?=$news5['NAME']?></span> 
            </a>
            <a title="<?=$news6['NAME']?>" href="<?=$news6['DETAIL_PAGE_URL']?>">
            <span> <?=$news6['NAME']?></span> 
            </a>
            <a title="<?=$news7['NAME']?>" href="<?=$news7['DETAIL_PAGE_URL']?>">
            <span> <?=$news7['NAME']?></span> 
            </a>
         </div>
         <div  class="container-right__btn-footer">
            <a target="_blank" class='red' href='https://<?=$_SERVER['SERVER_NAME']?>/sobytiya/novosti/'>ВСЕ НОВОСТИ</a>
            <a target="_blank" class='red' href='https://<?=$_SERVER['SERVER_NAME']?>/services/'>ПОДПИСАТЬСЯ НА НОВОСТИ</a>
            <a target="_blank" class='red' href='https://<?=$_SERVER['SERVER_NAME']?>/sobytiya/aktsii-meropriyatiya/'>ВСЕ АНОНСЫ</a>
         </div>
      </div>
   </div>
</div>
