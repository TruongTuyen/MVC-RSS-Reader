<?php 
class AdminController extends BaseController{
    protected $admin_model;
    public function __construct(){
       $this->admin_model = new AdminModel();
    }
    
    public function Index(){
        $this->check_user_logged_in();
        
        $sql = 'SELECT * FROM `rss_links`';
        $data = $this->admin_model->get_list( $sql );
        
        return $this->view( 'Admin/Index', $data );
    }
    
    public function AddRssLink(){
        $this->check_user_logged_in();
        
        $sql = 'SELECT * FROM `tag_rss`';
        $data = $this->admin_model->get_list( $sql );
        
        return $this->view( 'Admin/AddRssLink', $data );
    }
    
    public function TagRSS(){
        $this->check_user_logged_in();
        return $this->view( 'Admin/TagRSS' );
    }
    
    public function AddLinkRSS(){
        $this->check_user_logged_in();
        if( isset( $_POST['rss_url'] ) && isset( $_POST['menu_name'] ) && isset( $_POST['posts_per_page'] ) && isset( $_POST['tag_name_used'] ) ){
            $rss_url    = $this->admin_model->escape_data( strip_tags( $_POST['rss_url'] ) );
            $menu_name  = $this->admin_model->escape_data( strip_tags( $_POST['menu_name'] ) );
            $posts_per_page = $this->admin_model->escape_data( strip_tags( $_POST['posts_per_page'] ) );
            
            $tag_name_used = implode( '|', $_POST['tag_name_used'] );
            $tag_name_used  = $this->admin_model->escape_data( $tag_name_used );
            if( $tag_name_used == '' ){
                $tag_name_used = 'title';
            }
            
            
            $table_name = 'rss_links';
            $data = array(
                'rss_link'  => $rss_url,
                'menu_name' => $menu_name,
                'posts_per_page' => $posts_per_page,
                'used_tags_rss'  => $tag_name_used
            );
        
            if( $this->admin_model->insert( $table_name, $data ) ){
                return $this->redirect( 'Admin', 'Index' );
            }else{
                return $this->redirect( 'Admin', 'Index', "Lỗi, vui lòng thử lại" );
            }
            
        
        }else{
            return $this->redirect( 'Admin', 'Index' );
        }
    }
    
    public function DeleteLinkRss( $id ){
        $this->check_user_logged_in();
        if( $id && is_numeric( $id ) ){
            $id = abs( $id );
            
            $table_name = 'rss_links';
            $where = 'ID=' . $id;
            
            if( $this->admin_model->remove( $table_name, $where ) ){
                return $this->redirect( 'Admin', 'Index' );
            }else{
                return $this->redirect( 'Admin', 'Index', "Không thể xóa dữ liệu, vui lòng thử lại." );
            }
            
            
        }else{
            $message = "Đường dẫn không hợp lệ";
            return $this->redirect( 'Admin', 'Index', $message );
        }
    }
    
    public function EditLinkRss( $id ){
        $this->check_user_logged_in();
        if( $id && is_numeric( $id ) ){
            $id = abs( $id );
            $sql = "SELECT * FROM `rss_links` WHERE ID = {$id}";
            $data_arr = array();
            $data_db = $this->admin_model->get_row( $sql );
            
            
            
            $sql2 = 'SELECT * FROM `tag_rss`';
            $data_list_tag = $this->admin_model->get_list( $sql2 );
            
            $data_arr['old_data'] = $data_db;
            $data_arr['list_tag'] = $data_list_tag;
            
            return $this->view( 'Admin/EditLinkRss', $data_arr );
            
        }else{
            $message = "Đường dẫn không hợp lệ";
            return $this->redirect( 'Admin', 'Index', $message );
        }
    }
    
    public function EditRSSLink(){
        $this->check_user_logged_in();
        if( isset( $_POST['rss_url'] ) && isset( $_POST['menu_name'] ) && isset( $_POST['posts_per_page'] ) && isset( $_POST['tag_name_used'] ) && isset( $_POST['edit_id'] )){
            $rss_url    = $this->admin_model->escape_data( strip_tags( $_POST['rss_url'] ) );
            $menu_name  = $this->admin_model->escape_data( strip_tags( $_POST['menu_name'] ) );
            $posts_per_page = $this->admin_model->escape_data( strip_tags( $_POST['posts_per_page'] ) );
            $edit_id = abs( strip_tags( trim( $_POST['edit_id']  ) ) );
            
            $where = 'ID=' . $edit_id;
            
            $tag_name_used = implode( '|', $_POST['tag_name_used'] );
            $tag_name_used  = $this->admin_model->escape_data( $tag_name_used );
            if( $tag_name_used == '' ){
                $tag_name_used = 'title';
            }
            
            
            $table_name = 'rss_links';
            $data = array(
                'rss_link'  => $rss_url,
                'menu_name' => $menu_name,
                'posts_per_page' => $posts_per_page,
                'used_tags_rss'  => $tag_name_used
            );
        
            if( $this->admin_model->update( $table_name, $data, $where ) ){
                return $this->redirect( 'Admin', 'Index' );
            }else{
                return $this->redirect( 'Admin', 'Index', "Lỗi, vui lòng thử lại" );
            }
            
        
        }else{
            return $this->redirect( 'Admin', 'Index' );
        }
    }
    
    public function ParseRSS(){
        $this->check_user_logged_in();
        if( isset( $_POST ) ){
            /**
             * title
             * description
             * link
             * image
             * pubDate 
             */
            
            $rss = new DOMDocument();
            $rss->load( 'http://vietnamnet.vn/rss/kinh-doanh.rss' );
            
            $feed = array();
            
        	foreach ($rss->getElementsByTagName('item') as $node) {
        		$item = array ( 
        			'title' => $node->getElementsByTagName('title')->item(0)->nodeValue,
        			'desc' => $node->getElementsByTagName('description')->item(0)->nodeValue,
        			'link' => $node->getElementsByTagName('link')->item(0)->nodeValue,
        			'date' => $node->getElementsByTagName('pubDate')->item(0)->nodeValue,
        			);
        		array_push($feed, $item);
        	}
            
        	$limit = 5;
        	for($x=0;$x<$limit;$x++) {
        		$title = str_replace(' & ', ' &amp; ', $feed[$x]['title']);
        		$link = $feed[$x]['link'];
        		$description = $feed[$x]['desc'];
        		$date = date('l F d, Y', strtotime($feed[$x]['date']));
        		echo '<p><strong><a href="'.$link.'" title="'.$title.'">'.$title.'</a></strong><br />';
        		echo '<small><em>Posted on '.$date.'</em></small></p>';
        		echo '<p>'.$description.'</p>';
        	}
            
        }
    }
    
    /**
     * Xử lý RSS Tags 
     * 
     */
    public function TagsRSS(){
        $this->check_user_logged_in();
        if( isset( $_POST['rss_tag_name'] ) && isset( $_POST['tag_dislay_name'] ) ){
            $rss_tag_name = $this->admin_model->escape_data( strip_tags( $_POST['rss_tag_name'] ) );
            $display_name = $this->admin_model->escape_data( strip_tags( $_POST['tag_dislay_name'] ) );
            $form_action = $this->admin_model->escape_data( strip_tags( $_POST['form_action'] ) );
            
            
            if( $rss_tag_name && $display_name ){
                $table_name = 'tag_rss';
                $data = array(
                    'tag_name'     => $rss_tag_name,
                    'display_name' => $display_name
                );
                
                if( $form_action == 'edit' ){
                    $edit_id = abs( $this->admin_model->escape_data( strip_tags( $_POST['edit_id'] ) ) );
                    
                    
                    $where = 'ID = ' . $edit_id;
                    if( $this->admin_model->update( $table_name, $data, $where ) ){
                        return $this->redirect( 'Admin', 'ListTagRSS' );
                    }else{
                        $message = "Lỗi. Vui lòng thử lại";
                        return $this->redirect( 'Admin', 'ListTagRSS', $message );
                    }
                }else{
                    if( $this->admin_model->insert( $table_name, $data ) ){
                        return $this->redirect( 'Admin', 'ListTagRSS' );
                    }else{
                        $message = "Lỗi. Vui lòng thử lại";
                        return $this->redirect( 'Admin', 'TagRSS', $message );
                    }
                }
                
            }else{
                $message = "Vui lòng điền đủ thông tin";
                return $this->redirect( 'Admin', 'TagRSS', $message );
            }
        }else{
            $message = "Vui lòng điền đủ thông tin";
            return $this->redirect( 'Admin', 'TagRSS', $message );
        }
    }
    
    public function ListTagRSS(){
        $this->check_user_logged_in();
        $sql = "SELECT * FROM `tag_rss`";
        $data = $this->admin_model->get_list( $sql );
        
        $this->view( 'Admin/ListTagRSS', $data );
    }
    
    public function EditTagRss( $id ){
        $this->check_user_logged_in();
        if( $id && is_numeric( $id ) ){
            $id = abs( $id );
            $sql = "SELECT * FROM `tag_rss` WHERE ID = {$id}";
            $data = $this->admin_model->get_row( $sql );
            
            return $this->view( 'Admin/EditTagRss', $data );
            
        }else{
            $message = "Đường dẫn không hợp lệ";
            return $this->redirect( 'Admin', 'TagRSS', $message );
        }
    }
    
    public function DeleteTagRss( $id ){
        $this->check_user_logged_in();
        if( $id && is_numeric( $id ) ){
            $id = abs( $id );
            
            $table_name = 'tag_rss';
            $where = 'ID=' . $id;
            
            if( $this->admin_model->remove( $table_name, $where ) ){
                return $this->redirect( 'Admin', 'ListTagRSS' );
            }else{
                return $this->redirect( 'Admin', 'ListTagRSS', "Không thể xóa dữ liệu, vui lòng thử lại." );
            }
            
            
        }else{
            $message = "Đường dẫn không hợp lệ";
            return $this->redirect( 'Admin', 'TagRSS', $message );
        }
    }
    
   
}
