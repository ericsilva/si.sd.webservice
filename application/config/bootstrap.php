<?php
$path = dirname(__FILE__);
$paths = array_unique(explode(PATH_SEPARATOR, get_include_path()));

//Pastas da aplicacao, onde estao as classes
$applicationDirs = array(
	'library',
	'controllers',
	'models',
	'views');

foreach($applicationDirs as $dir) {
    $paths[] = $path . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . $dir;
}

// Redefinindo o include path para as pastas da aplicacao
set_include_path('.' . PATH_SEPARATOR . implode(PATH_SEPARATOR, $paths));

// Constantes da aplicacao
define('VIEW_PATH', $path . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);

//Config
include $path . DIRECTORY_SEPARATOR . 'config.php';

//Autoload para as classes
include $path . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'library' . DIRECTORY_SEPARATOR . 'AutoLoader.php';