<?php
  //define('HTTP_SERVER', 'http://localhost');
  //define('HTTPS_SERVER', 'http://localhost');
  define('HTTP_SERVER', 'http://www.jimscheese.com');
  define('HTTPS_SERVER', 'http://www.jimscheese.com');
  define('ENABLE_SSL', false);
  define('HTTP_COOKIE_DOMAIN', '');
  define('HTTPS_COOKIE_DOMAIN', '');
  define('HTTP_COOKIE_PATH', '/products/');
  define('HTTPS_COOKIE_PATH', '/products/');
  define('DIR_WS_HTTP_CATALOG', '/products/');
  define('DIR_WS_HTTPS_CATALOG', '/products/');
  define('DIR_WS_IMAGES', 'images/');
  define('DIR_WS_ICONS', DIR_WS_IMAGES . 'icons/');
  define('DIR_WS_INCLUDES', 'includes/');
  define('DIR_WS_BOXES', DIR_WS_INCLUDES . 'boxes/');
  define('DIR_WS_FUNCTIONS', DIR_WS_INCLUDES . 'functions/');
  define('DIR_WS_CLASSES', DIR_WS_INCLUDES . 'classes/');
  define('DIR_WS_MODULES', DIR_WS_INCLUDES . 'modules/');
  define('DIR_WS_LANGUAGES', DIR_WS_INCLUDES . 'languages/');

  define('DIR_WS_DOWNLOAD_PUBLIC', 'pub/');
  //define('DIR_FS_CATALOG', 'C:/wamp/www/JimsCheese/products/');
  define('DIR_FS_CATALOG', '/home/remediho/public_html/jimscheese/products/');
  define('DIR_FS_DOWNLOAD', DIR_FS_CATALOG . 'download/');
  define('DIR_FS_DOWNLOAD_PUBLIC', DIR_FS_CATALOG . 'pub/');

  define('DB_SERVER', 'localhost');
  define('DB_SERVER_USERNAME', 'remediho_jimsadm');
  define('DB_SERVER_PASSWORD', 'Remedi1138');
  define('DB_DATABASE', 'remediho_jims');
  define('USE_PCONNECT', 'false');
  define('STORE_SESSIONS', 'mysql');
?>