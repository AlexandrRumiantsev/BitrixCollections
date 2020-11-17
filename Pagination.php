

<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/*
 Самописная пагинация в шаблоне
*/
$pageCount = 11;
$i = 1;
$page = 1;
?>
<div class="content">
   <h2>Новости</h2>
   <div class='bxslider'>
   <?foreach($arResult as $index => $item  ):?>

          <? if($_REQUEST['page'] == $page): ?>
               <div class="news-block">  
                   <div class="news_f_text">   
                       <h3><span><?=$index+1?>.</span> <?=$item['Fields']['NAME']?></h3>
                       <p class="news_date"><?=$item['Fields']['DATE_CREATE']?></p>
                       <p><?=$item['Fields']['PREVIEW_TEXT']?></p>
                       <?
                           $resize = CFile::ResizeImageGet($item['Fields']['PREVIEW_PICTURE'] , array('width'=>307, 'height'=>300), BX_RESIZE_IMAGE_PROPORTIONAL, true)['src'];
                        ?>
                       <p class="news_more"><a href="./news_item.php?ID=<?=$item['Fields']['ID']?>" class="more">Подробнее »</a></p>
                   </div>
                   <div class="news_img"><img src="<?=$resize?>" alt="<?=$item['Fields']['NAME']?>"></div>
              </div>
          <?endif;?>

              <?
                if($i > $pageCount){
                  $page++;
                  $i = 0;
                }else $i++;
              ?>
   <?endforeach;?>
   </div>
   <div class="list_num">
    <a class="l_first" href="/about/news.php?page=1">«</a>
    <?if($_REQUEST['page'] > 1):?> <a href="/about/news.php?page=<?=$_REQUEST['page']-1?>"><?=$_REQUEST['page']-1?></a><?endif;?>
    <b><?=$_REQUEST['page']?></b>
    <?if($_REQUEST['page'] < $page-1):?><a href="/about/news.php?page=<?=$_REQUEST['page']+1?>"><?=$_REQUEST['page']+1?></a><?endif;?>
    <a class="l_last" href="/about/news.php?page=<?=$page-1?>">»</a>
  </div>
</div>
