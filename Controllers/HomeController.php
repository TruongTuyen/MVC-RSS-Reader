<?php

class HomeController extends BaseController{
    protected $home_model;
    
    public function __construct(){
        $this->home_model = new HomeModel();
    }
    
	public function Index( $id = null ){
	    $data = array();
        
	    $sql = 'SELECT * FROM `rss_links`';
        $list_link = $this->home_model->get_list( $sql );
        $data['menu_list'] = $list_link;
        
        if( $id && is_numeric( $id ) ){
            $id = abs( $id );
            $data['rss_news'] = $this->render_list_post( $id );
        }else{
            $id = $list_link[0]['ID'];
            $data['rss_news'] = $this->render_list_post( $id );
        }
        
        $data['current_id'] = $id;
        
		return $this->view( 'Home/Index', $data );
	}
    
    public function render_list_post( $id ){
        if( $id && is_numeric( $id ) ){
            $id = abs( $id );
            
            //Get data
            $sql = "SELECT * FROM `rss_links` WHERE ID = {$id}";
            $data = $this->home_model->get_row( $sql );
            
            if( is_array( $data ) && !empty( $data ) ){
                $rss = new DOMDocument();
                $rss->load( $data['rss_link'] );
                
                $feed = array();
                $used_tags = explode( '|', $data['used_tags_rss'] );
                
                if( empty( $used_tags ) ){
                    $used_tags[] = 'title';
                }
                $count = 1;
                $limit_item = (isset( $data['posts_per_page'] ) && !empty( $data['posts_per_page'] ) ) ? $data['posts_per_page'] : 5;
                foreach( $rss->getElementsByTagName('item') as $node ){
                    if( $count > $limit_item ){ break; }
                    $item = array();
                    foreach( $used_tags as $tag ){
                        $item[$tag] = $node->getElementsByTagName( $tag )->item(0)->nodeValue;
                    }
                    array_push( $feed, $item );
                    
                    $count++;
                }
                
            
                $html = array();
                
                $popular_tag = array(
                    'title',
                    'link',
                    'description',
                    'pubDate'
                );
                
                foreach( $feed as $rss ){
                    $format = '<li><div class="property_details">';
                    foreach( $rss as $key=>$value ){
                        if( in_array( $key, $popular_tag ) ){
                            if( $key == 'title' ){
                                $format .= '<h2 class="title">'.$value.'</h2>';
                            }elseif( $key == 'link' ){
                                $format .= '<p class="more-link"><a href="'.$value.'">Xem tiếp</a></p>';
                            }elseif( $key == 'description' ){
                                $format .= '<p class="description">'.$value.'</p>';
                            }elseif( $key == 'pubDate' ){
                                $format .= '<p class="publish_date">Ngày đăng: '.date( 'd/m/Y', strtotime( $value ) ).'</p>';
                            }
                        }else{
                            $format .= '<p class="rss_item">'.$value.'</p>';
                        }
                    }
                    $format .= '</div></li>';
                    $html[] = $format;
                }
                
                return $html;
            }else{
                return '';
            }
        }else{
            return '';
        }
    }
	
}