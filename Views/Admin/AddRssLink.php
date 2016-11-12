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
                    <h2>Add new RSS Link</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <form class="form-horizontal form-label-left" action="<?php echo MVC_BASE_URI; ?>/Admin/AddLinkRSS" method="post" novalidate>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                            RSS URL <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12"name="rss_url" placeholder="RSS URL" required="required" type="text" />
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                            Tiêu đề menu <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="name" class="form-control col-md-7 col-xs-12"name="menu_name" placeholder="" required="required" type="text" />
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                            Số phần tử trên 1 trang <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="only_number" class="form-control col-md-7 col-xs-12"name="posts_per_page" placeholder="" required="required" value="5" type="number" />
                        </div>
                      </div>
                      
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
                            Các thẻ hiển thị <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="name" multiple="multiple" class="form-control col-md-7 col-xs-12" name="tag_name_used[]" required="required" >
                            <?php if( isset( $data ) && !empty( $data ) ) : ?>
                                <?php foreach( $data as $value ) : ?>
                                    <option selected="selected" value="<?php echo $value['tag_name']; ?>"><?php echo $value['display_name']; ?></option>
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