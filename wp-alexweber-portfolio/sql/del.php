<?
// формируем путь 
$url = (!empty($_SERVER['HTTPS'])) ? 
       "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] 
        : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];
$url = $_SERVER['REQUEST_URI'];
$my_url = explode('wp-content' , $url);
$path = $_SERVER['DOCUMENT_ROOT']."/".$my_url[0];
 
// подключаем
include_once $path . '/wp-config.php';
include_once $path . '/wp-includes/wp-db.php';
include_once $path . '/wp-includes/pluggable.php';
global $wpdb;



$result = $wpdb->delete(
    'wp_portfolio_alexweber', // table to delete from
    array(
        'id' => $_REQUEST['id'] // value in column to target for deletion
    )
);


if($result == 1)
	echo true;
else
	echo false;

?>