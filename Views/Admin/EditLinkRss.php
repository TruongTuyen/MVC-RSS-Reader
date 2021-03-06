<?php
   
    $selected_tags = array();
    if( !empty( $data['old_data']['used_tags_rss'] ) ){
        $selected_tags = explode( '|', $data['old_data']['used_tags_rss'] );
    }
?>
<?php include MVC_BASE_URL . '/Views/Public/header.php'; ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>RSS Link Settings</h3>
              </div>

           
            </div>
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Form validation <small>sub title</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" action="<?php echo MVC_BASE_URI; ?>/Admin/EditRSSLink" method="post" novalidate>
                      <input type="hidden" name="edit_id" value="<?php if( !empty( $data['old_data']['ID'] ) ){ echo trim( $data['old_data']['ID'] ); } ?>" />
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                            RSS URL <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12" value="<?php if( !empty( $data['old_data']['rss_link'] ) ){ echo trim( $data['old_data']['rss_link'] ); } ?>" name="rss_url" placeholder="RSS URL" required="required" type="text" />
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                            Tiêu đề menu <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" value="<?php if( !empty( $data['old_data']['menu_name'] ) ){ echo trim( $data['old_data']['menu_name'] ); } ?>" class="form-control col-md-7 col-xs-12"name="menu_name" placeholder="" required="required" type="text" />
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                            Số phần tử trên 1 trang <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="only_number" value="<?php if( !empty( $data['old_data']['posts_per_page'] ) ){ echo trim( $data['old_data']['posts_per_page'] ); } ?>" class="form-control col-md-7 col-xs-12"name="posts_per_page" placeholder="" required="required" value="5" type="number" />
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                            Các thẻ hiển thị <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="name" multiple="multiple" class="form-control col-md-7 col-xs-12" name="tag_name_used[]" required="required" >
                            <?php if( isset( $data['list_tag'] ) && !empty( $data['list_tag'] ) ) : ?>
                                <?php foreach( $data['list_tag'] as $value ) : ?>
                                    <option <?php if( in_array( $value['tag_name'] , $selected_tags ) ){ echo 'selected="selected"'; } ?> value="<?php echo $value['tag_name']; ?>"><?php echo $value['display_name']; ?></option>
                                <?php endforeach; ?>
                            <?php else : ?>
                            <option value="">Không có dữ liệu</option>
                            <?php endif; ?>
                          </select>
                        </div>
                      </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="send" type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                      
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

<?php include MVC_BASE_URL . '/Views/Public/footer.php'; ?>       