<?php
define( 'DB_HOST', 'localhost' );
define( 'DB_USER', 'root' );
define( 'DB_PASS', '' );
define( 'DB_NAME', 'mvc_report_project' );

class MainModel{
    protected $conn;
    public function __construct(){
        if( !$this->conn ){
            $this->conn = mysqli_connect( 'localhost', 'root', '', 'mvc_report_project' ) or die( 'Could not connect to DB: '. mysqli_error()  );
        }
        
        mysqli_query($this->conn, "SET character_set_results = 'utf8', character_set_client = 'utf8', character_set_database = 'utf8', character_set_server = 'utf8'");
    }
    
    public function insert($table, $data){
        $field_list = '';
        $value_list = '';
        foreach ($data as $key => $value){
            $field_list .= ",$key";
            $value_list .= ",'".mysqli_escape_string( $this->conn, $value )."'";
        }
        $sql = 'INSERT INTO '.$table. '('.trim($field_list, ',').') VALUES ('.trim($value_list, ',').')';
        return mysqli_query( $this->conn, $sql );
    }
    
    public function update($table, $data, $where){
        foreach ($data as $key => $value){
            $sql .= "$key = '".mysqli_escape_string( $this->conn, $value )."',";
        }
        $sql = 'UPDATE '.$table. ' SET '.trim( $sql, ','  ).' WHERE '.$where;
        return mysqli_query( $this->conn, $sql );
    }
    
    public function remove($table, $where){
        $sql = "DELETE FROM $table WHERE $where";
        return mysqli_query($this->conn, $sql);
    }
    
    public function get_list($sql){
        $result = mysqli_query($this->conn, $sql);
        if (!$result){
            die ('Câu truy vấn bị sai');
        }
     
        $return = array();
        while ($row = mysqli_fetch_assoc($result)){
            $return[] = $row;
        }
        mysqli_free_result($result);
        return $return;
    }
    
    public function get_row($sql){
        $result = mysqli_query($this->conn, $sql);
        if (!$result){
            die ('Câu truy vấn bị sai');
        }
        $row = mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        if ($row){
            return $row;
        }
        return false;
    }
    
    
    public function escape_data( $input ){
        return mysqli_real_escape_string( $this->conn, trim( $input ) );
    }
    
    public function __destruct(){
        if( $this->conn ){
            mysqli_close( $this->conn );
        }
         
    }
    
    
    
}
