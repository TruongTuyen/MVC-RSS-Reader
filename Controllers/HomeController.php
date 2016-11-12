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
                    'pubDate',
                    'image'
                );
                
                foreach( $feed as $rss ){
                    
                }
                /**
            	for($x=0;$x<$limit;$x++) {
            		$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
            		$link = $feed[$x]['link'];
            		$description = $feed[$x]['desc'];
            		$date = date('l F d, Y', strtotime($feed[$x]['date']));
            		echo '<p><strong><a href="'.$link.'" title="'.$title.'">'.$title.'</a></strong><br />';
            		echo '<small><em>Posted on '.$date.'</em></small></p>';
            		echo '<p>'.$description.'</p>';
            	}**/
                return $feed;
            }else{
                return '';
            }
        }else{
            return '';
        }
    }
	
}