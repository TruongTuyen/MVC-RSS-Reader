<?php 
class AdminController extends BaseController{
    protected $admin_model;
    public function __construct(){
       
    }
    
    public function Index(){
        return $this->view( 'Admin/Index' );
    }
   
}
