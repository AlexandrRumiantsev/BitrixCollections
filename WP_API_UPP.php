<?php
/*
Обновление Rest API Wordpress
*/

add_action( 'rest_api_init', 'bs_add_custom_rest_fields' );


function bs_get_post_views($post){
   return get_the_post_thumbnail_url( $post["id"], [260, 412]);
}

function bs_add_custom_rest_fields() {
    $bs_post_views_schema = array(
    'description'   => 'Post views count',
    'type'          => 'integer',
    'context'       =>   array( 'view', 'edit' )
);
 
// registering the bs_post_views field
register_rest_field(
    'post',
    'bs_post_views',
    array(
        'get_callback'      => 'bs_get_post_views',
        'update_callback'   => 'bs_update_post_views',
        'schema'            => $bs_post_views_schema
    )
);
}
