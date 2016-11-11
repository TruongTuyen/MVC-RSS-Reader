<?php
class BaseController{
	public function view( $view_name ){
	    $view_folder = "Views/{$view_name}.php";
        
	    if( file_exists( $view_folder ) ){
	       include $view_folder;
	    }else{
	       echo "Không tồn tại view";
	    }
	}
    
    
    public function redirect( $controller = 'Home', $action = 'Index', $data = '' ){
        $location = MVC_BASE_URI . '/' . $controller . '/' .$action;
        if( $data != '' ){
            $location = MVC_BASE_URI . '/' . $controller . '/' .$action .'/?data=' . urlencode($data);
        }
        header( "location: {$location}" );
        exit;
    }
    
    public function data( $key, $input ){
        //ob_start();
        $_SESSSION["$key"] = $input;
        //ob_get_clean();
    }
    
    public function check_user_logged_in(){
        if( isset( $_SESSION['is_user_logged_in'] ) && $_SESSION['is_user_logged_in'] == true ){
            return true;
        }else{
            return false;
        }
    }
}