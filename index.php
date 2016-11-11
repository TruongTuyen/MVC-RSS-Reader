<?php session_start();
$controller = $_GET['controller'];
$action = $_GET['action'];
$param = $_GET['param'];

$controller_folder = 'Controllers';
$model_folder      = 'Models';

$base_uri = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]" . dirname( $_SERVER['SCRIPT_NAME']);

define( 'MVC_BASE_URL', dirname( __FILE__) );
define( 'MVC_BASE_URI', $base_uri );


require_once( "Controllers/BaseController.php" );
require_once( "Models/MainModel.php" );

if( $controller == '' ){
	$controller = 'Home';
}
if( $action == '' ){
	$action = 'Index';
}
require_once( $controller_folder . '/' .$controller. 'Controller.php' );
require_once( 'Helpers/functions.php' );
$model_file = $model_folder . '/' . $controller . 'Model.php';
if( file_exists( $model_file ) ){
    require_once( $model_file );
}

$controller_class = $controller . 'Controller';
 
$controller_init = new $controller_class();
if( $param == '' ){
	$controller_init->$action();
}else{
	$controller_init->$action( $param );
}