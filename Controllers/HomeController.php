<?php

class HomeController extends BaseController{
	public function Index(){
		return $this->view( 'Home/Index' );
	}
	
	public function edit( $id = '' ){
		echo "Method edit in home controller";
		
		if( $id != '' ){
			echo "param  : " . $id ;
		}
        
        
		
	}
}