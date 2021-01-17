<?php
/*
 * Plugin Name: Portfolio web-developer
 * Plugin URI: http://alexweber.ru/wp-alexweber-portfolio
 * Description: Портфолиа для веб разработчика
 * Version: 1.1.1
 * Author: Александр Румянцев
 * Author URI: http://alexweber.ru
 * License: GPLv2 or later
 */

register_activation_hook( __FILE__, 'myplugin_install' ); 
function myplugin_install(){
  	$PATH_PLUGIN = '/wp-content/plugins/wp-alexweber-portfolio/';
	require_once( ABSPATH . $PATH_PLUGIN.'/sql/create_table.php' );
}




function wpse_load_plugin_css() {
    $plugin_url = plugin_dir_url( __FILE__ );

    wp_enqueue_style( 'style', $plugin_url . 'css/style.css' );
}




/*
	Добавление в меню административной панели
*/
add_action('admin_menu', function(){
   

  
  add_menu_page('Список проектов', 'Портфолио', 'manage_options', 'my-top-level-handle', 'add_my_setting', '', 14);
  
  
  add_submenu_page( 
    'my-top-level-handle', 
    'Добавить', 
    'Добавить', 
    'manage_options', 
    'my_magic_function', 
    'my_magic_function', 
    '', 
    10
  );
    
}); 

function add_my_setting(){
	?>
	<div class="wrap">
		<h2><?php echo get_admin_page_title() ?></h2>
		<?php
      		global $wpdb;
      		$results = $wpdb->get_results( "SELECT * FROM wp_portfolio_alexweber" );
  			?><section class='projects-box'><?
      		foreach($results as $project){
      		  ?><article><?
      		  ?><button data-target=<?=$project->id?> id='del'>Удалить</button><?
      		  ?><button id='edit'>Редактировать</button><?
      		  ?> <div class="overlay"></div> <?
      		  ?><h2><?=$project->name?></h2><?
              $parsed = parse_url( wp_get_attachment_url( $project->fullimg ) );
			  $url    = dirname( $parsed['path'] ) . '/' . rawurlencode( basename( $parsed['path'] ) );  
              ?>
            	<img alt="<?=$project->name?>" src="<?=$url?>" />
              <?
			  ?></article><?
          	} 
      		?>
      		<?php
      			$plugin_url = plugin_dir_url( __FILE__ );
    			wp_enqueue_style( 'style', $plugin_url . 'css/style.css' );
                wp_enqueue_script('newscript', '/wp-content/plugins/wp-alexweber-portfolio/js/custom_script.js');
			?>
      		</section>
		
	</div>
	<?php

}

function my_magic_function(){
	?>
	<div class="wrap">
		<h2><?php echo get_admin_page_title() ?></h2>

		<?php
		// settings_errors() не срабатывает автоматом на страницах отличных от опций
		if( get_current_screen()->parent_base !== 'options-general' )
			settings_errors('название_опции');
		?>

		<form id='add_project' enctype="multipart/form-data" method="POST">
			<p>
          		Название проекта: <input type='text' name='title' placeholder='Название'/>
          	</p>
          	<p>
          		Полное изображение: <input type='file' name='img' placeholder='Изображение'/>
          	</p>
          	<p>
          		Url: <input type='text' name='url' placeholder='Url'/>
          	</p>
          	<p>
          		Превью: <input type='file' name='prev' placeholder='Превью'/>
          	</p>
          	<p>Описание:</p>
          	<textarea name='discr'></textarea>
          	
			<?php
				$plugin_url = plugin_dir_url( __FILE__ );
    			wp_enqueue_style( 'style', $plugin_url . 'css/style.css' );
				settings_fields("opt_group");     // скрытые защитные поля
				do_settings_sections("opt_page"); // секции с настройками (опциями).
				submit_button();
                wp_enqueue_script('newscript', '/wp-content/plugins/wp-alexweber-portfolio/js/custom_script.js');
			?>
		</form>
	</div>
	<?php

}







// регистрируем плагин в REST  

add_action( 'rest_api_init', 'portfolio_get_register_routes' ); 

function portfolio_find_all() {
    
    global $wpdb;
    $results = $wpdb->get_results( "SELECT * FROM wp_portfolio_alexweber" );
  	echo json_encode($results);
    
}

function portfolio_get_register_routes() {
    register_rest_route( 
        'wp/v2/',
        '/get_portfolio_all',
        array(
            'methods' => 'GET',
            'callback' => 'portfolio_find_all',
        )
    );
}



?>