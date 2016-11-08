<?php
$controller = $_GET['controller'];
$action = $_GET['action'];
$param = $_GET['param'];

$controller_folder = 'Controllers';



require_once( "Controllers/Base.php" );

if( $controller == '' ){
	$controller = 'Home';
}
if( $action == '' ){
	$action = 'Index';
}
require_once( $controller_folder . '/' .$controller. '.php' );
$controller_init = new $controller();
if( $param == '' ){
	$controller_init->$action();
}else{
	$controller_init->$action( $param );
}