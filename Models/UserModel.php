<?php 
class UserModel extends MainModel{
    public function __construct(){
        parent::__construct();
        
        if( $this->conn ){
            echo "Co connect";
        }else{
            echo "khong co connect";
        }
    }
    
    public function allow_login( $user_name, $password ){
        $password = sha1( $password );
        $sql = "SELECT * FROM `user` WHERE `username` = '{$user_name}' AND `pword` = '{$password}'";
        
        $result = $this->get_row( $sql );
        
        if( is_array( $result ) && !empty( $result ) ){
            return $result;
        }else{
            return false;
        }
        
    }
}