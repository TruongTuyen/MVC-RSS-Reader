<?php

class Home extends Base{
	public function Index(){
		echo "Index method in Home controller";
	}
	
	public function edit( $id = '' ){
		echo "Method edit in home controller";
		
		if( $id != '' ){
			echo "param  : " . $id ;
		}
		
	}
}