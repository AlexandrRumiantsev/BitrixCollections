<?php
  /* Создание таблицы */
  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  $sql = "CREATE TABLE wp_portfolio_alexweber (
      id int(11) unsigned NOT NULL auto_increment,
      name varchar(255) NOT NULL default '',
      price int(11) unsigned NOT NULL default '0',
      PRIMARY KEY  (id),
      KEY price (price)
  ) {$charset_collate};";

  // Создать таблицу.
  dbDelta( $sql );
?>