<?php

class HomeController extends BaseController{
	public function Index(){
		echo "Index method in Home controller <br/>";
        echo "Pass: " . sha1( '123456' );
	}
	
	public function edit( $id = '' ){
		echo "Method edit in home controller";
		
		if( $id != '' ){
			echo "param  : " . $id ;
		}
        
        
		
	}
}