<?php 
class UserController extends BaseController{
    protected $user_model;
    public function __construct(){
       $this->user_model = new UserModel();
    }
    public function Login(){
        return $this->view( "User/Login" );
    }
    
    public function Logout(){
        unset( $_SESSION['is_user_logged_in'] );
        unset( $_SESSION['user_name'] );
        unset( $_SESSION['level'] );
        
        return $this->redirect( 'User', 'Login' );
    }
    
    public function Process(){
        $errors = array();
        $message = array();
        
        if( isset( $_POST ) ){
            if( isset( $_POST['login_username'] ) ){
                $user_name = $this->user_model->escape_data( strip_tags( $_POST['login_username'] ) );
            }else{
                $errors[] = "Vui lòng nhập vào tên đăng nhập";
            }
            
            if( isset( $_POST['login_password'] ) ){
                $user_pass = $this->user_model->escape_data( strip_tags( $_POST['login_password'] ) );
            }else{
                $errors[] = "Vui lòng nhập vào mật khẩu đăng nhập";
            }
            
            //If no error
            if( empty( $errors ) ){
                $user_info = $this->user_model->allow_login( $user_name, $user_pass );
                if( $user_info != false ){
                    //Tao phien lam viec
                    $_SESSION['is_user_logged_in']  = true;
                    $_SESSION['user_name'] = $user_info[ 'username' ];
                    $_SESSION['level'] = $user_info['level'];
                    
                    
                    $this->redirect( 'Admin', 'Index' );
                }else{
                    $message = "Không tồn tại tên tài khoản. Vui lòng thử lại";
                    $this->redirect( 'User', 'Login', $message );
                }
            }else{
                //redirect to view();
                $message = "Sai tên đăng nhập hoặc mật khẩu. Vui lòng thử lại";
                $this->redirect( 'User', 'Login', $message );
            }
            
            
            
        }else{
            $message = "Vui lòng nhập đủ thông tin";
            $this->redirect( 'User', 'Login', $message );
        }
    }
    
    public function Register(){
        if( isset( $_POST['register_username'] ) && isset( $_POST['register_pass'] ) && isset( $_POST['register_re_pass'] ) ){
            $error = array();
            
            $user_name = $this->user_model->escape_data( strip_tags( $_POST['register_username'] ) );
            $password = $this->user_model->escape_data( strip_tags( $_POST['register_pass'] ) );
            $repassword = $this->user_model->escape_data( strip_tags( $_POST['register_re_pass'] ) );
            
            if( $user_name == '' || $password == '' || $repassword == '' ){
                $message = 'Vui lòng nhập đủ dữ liệu';
                return $this->redirect( 'User', 'Login', $message );
            }else{
                if( $password == $repassword ){
                    $table_name = 'user';
                    $data = array(
                        'username' => $user_name,
                        'pword'    => sha1( $password ),
                        'level'    => 1,
                        'infos'    => '' 
                    );
                    
                    if( $this->user_model->insert( $table_name, $data ) ){
                        $message = 'Thêm thành công. Vui lòng đăng nhập';
                        return $this->redirect( 'User', 'Login', $message );
                    }else{
                        $message = 'Không thể thêm dữ liệu';
                        return $this->redirect( 'User', 'Login', $message );
                    }
                    
                }else{
                    $message = 'Mật khẩu nhập lại không đúng';
                    return $this->redirect( 'User', 'Login', $message );
                }
            }
            
        }else{
            return $this->redirect( 'User', 'Login' );
        }
    }
}
