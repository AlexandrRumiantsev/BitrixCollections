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






//Запись файла в медиатеку


	$file = $_FILES['img']; 
    if(!empty($file)) {
    	$imgId = handle_logo_upload($file);
    }
	$file2 = $_FILES['prev']; 
    if(!empty($file2)) {
    	$prevId = handle_logo_upload($file2);
    }

    function handle_logo_upload($file){
    if ( !function_exists( 'wp_handle_upload' ) ) {
      require_once( ABSPATH . 'wp-admin/includes/file.php' );
    }
    require_once ( ABSPATH . 'wp-admin/includes/image.php' );



    $uploadedfile = $file;
    $upload_overrides = array( 
      'test_form' => false,
      );
    if(!empty($uploadedfile['name'])) {
      $movefile = wp_handle_upload( $uploadedfile, $upload_overrides );
      if ( $movefile ) {
        $wp_filetype = $movefile['type'];
        $filename = $movefile['file'];
        $wp_upload_dir = wp_upload_dir();
        $attachment = array(
          'guid' => $wp_upload_dir['url'] . '/' . basename( $filename ),
          'post_mime_type' => $wp_filetype,
          'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
          'post_content' => '',
          'post_status' => 'inherit'
          );
        $attach_id = wp_insert_attachment( $attachment, $filename);
        $attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
        wp_update_attachment_metadata( $attach_id, $attach_data );
        echo '<br>';
        return $attach_id;
      }
    }
    return "pass";
    }




$pst_id = $wpdb->insert('wp_portfolio_alexweber', array(
    'name' => $_REQUEST['title'],
    'url' => $_REQUEST['url'],
    'discr' => $_REQUEST['discr'],
  	'fullimg' => $imgId,
  	'previmg' => $prevId,
));

echo $pst_id;

?>