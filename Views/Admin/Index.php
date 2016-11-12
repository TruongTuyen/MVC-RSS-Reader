<?php include MVC_BASE_URL . '/Views/Public/header.php'; ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>RSS Links List</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                              <button class="btn btn-default" type="button">Go!</button>
                          </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>

            <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>RSS Links</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li></li>
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>

                  <div class="x_content">

                    <div class="table-responsive">
                    
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th>#</th>
                            <th class="column-title">RSS Link</th>
                            <th class="column-title">Tên hiển thị</th>
                            <th class="column-title">Số bản ghi/ trang</th>
                            <th class="column-title">Các thẻ sử dụng </th>
                            <th class="column-title no-link last"><span class="nobr">Thao tác</span></th>
                            
                          </tr>
                        </thead>
                        <?php if( isset( $data ) && !empty( $data ) ) : ?>
                        <tbody>
                          <?php  $i = 1; ?>
                          <?php foreach( $data as $value ) : ?>
                          <tr class="even pointer">
                            <td><?php echo $i; ?></td>
                            <td class=" "><?php echo $value['rss_link']; ?></td>
                            <td class=" "><?php echo $value['menu_name']; ?></td>
                            <td class=" "><?php echo $value['posts_per_page']; ?></td>
                            <td class=" "><?php echo !empty( $value['used_tags_rss']) ? $value['used_tags_rss'] : ''; ?></td>
                            <td class=" "> 
                                <a href="<?php echo MVC_BASE_URI; ?>/Admin/EditLinkRss/<?php echo $value['ID']; ?>">Sửa</a> | 
                                <a onclick="return confirm( 'Bạn có chắc chắn muốn xóa' );" href="<?php echo MVC_BASE_URI; ?>/Admin/DeleteLinkRss/<?php echo $value['ID']; ?>">Xóa</a>
                            </td>
                          </tr>
                          <?php $i++; ?>
                          <?php endforeach; ?>
                        </tbody>
                        <?php else : ?>
                        <tbody>
                          <tr class="even pointer">
                            <td colspan="5">Không có dữ liệu</td>
                            
                          </tr>
                        </tbody>
                        <?php endif; ?>
                        
                      </table>
                      
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

<?php include MVC_BASE_URL . '/Views/Public/footer.php'; ?>       