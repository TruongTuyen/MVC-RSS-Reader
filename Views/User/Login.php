<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>RSS Reader | Đăng nhập</title>

    <!-- Bootstrap -->
    <link href="<?php echo MVC_BASE_URI; ?>/Views/Public/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" /> 
    <!-- Font Awesome -->
    <link href="<?php echo MVC_BASE_URI; ?>/Views/Public/font-awesome/css/font-awesome.min.css" rel="stylesheet"/>
    <!-- NProgress -->
    <link href="<?php echo MVC_BASE_URI; ?>/Views/Public/nprogress/nprogress.css" rel="stylesheet"/>
    <!-- Animate.css -->
    <link href="<?php echo MVC_BASE_URI; ?>/Views/Public/animate.css/animate.min.css" rel="stylesheet"/>

    <!-- Custom Theme Style -->
    <link href="<?php echo MVC_BASE_URI; ?>/Views/Public/css/custom.min.css" rel="stylesheet"/>
  </head>
  <?php 
     $data = view_get_data();
  ?>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <?php 
                if( $data != '' ){
                    echo '<p><b>'.$data.'</b></p>';
                }
            ?>  
            <form method="post" action="<?php echo MVC_BASE_URI; ?>/User/Process">
              
            
              <h1>Đăng Nhập</h1>
              
              <div>
                <input type="text" class="form-control" placeholder="Tên đăng nhập" name="login_username" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Mật khẩu" name="login_password" required="" />
              </div>
              <div>
                <button type="submit" class="btn btn-default submit" >Đăng nhập</button>
                <a class="reset_pass" href="#">Quên mật khẩu?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">
                  <a href="#signup" class="to_register"> Tạo tài khoản </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> RSS Reader!</h1>
                  <p>&copy; Thực hiển bỏi <b>TruongTuyen Team</b></p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form method="post" action="">
              <h1>Tạo tài khoản</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Đăng Ký</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Bạn đã có tài khoản ?
                  <a href="#signin" class="to_register"> Đăng nhập </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> RSS Reader!</h1>
                  <p>&copy; Thực hiển bỏi <b>TruongTuyen Team</b></p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
