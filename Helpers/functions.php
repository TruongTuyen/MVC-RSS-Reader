<?php
function view_get_data(){
    $request = $_SERVER['REQUEST_URI'];
    $parse_url = parse_url( $request );
    
    if( isset( $parse_url['query'] ) && $parse_url['query'] != '' ){
        $data = substr(  $parse_url['query'], 5, strlen( $parse_url['query'] ) );
        return urldecode( $data );
    }else{
        return '';
    }
    
}