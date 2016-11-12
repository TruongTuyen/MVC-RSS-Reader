<?php include MVC_BASE_URL . '/Views/Public/header.php'; ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>RSS Tags List</h3>
              </div>

            </div>
            <div class="clearfix"></div>

            <div class="row">
             <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>RSS Tags</h2>
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
                            <th class="column-title">Tên thẻ </th>
                            <th class="column-title">Tên hiển thị</th>
                            <th class="column-title no-link last"><span class="nobr">Thao tác</span></th>
                            
                          </tr>
                        </thead>
                        <?php if( isset( $data ) && !empty( $data ) ) : ?>
                        <tbody>
                          <?php  $i = 1; ?>
                          <?php foreach( $data as $value ) : ?>
                          <tr class="even pointer">
                            <td><?php echo $i; ?></td>
                            <td class=" "><?php echo $value['tag_name']; ?></td>
                            <td class=" "><?php echo $value['display_name']; ?></td>
                            <td class=" "> 
                                <a href="<?php echo MVC_BASE_URI; ?>/Admin/EditTagRss/<?php echo $value['ID']; ?>">Sửa</a> | 
                                <a onclick="return confirm( 'Bạn có chắc chắn muốn xóa' );" href="<?php echo MVC_BASE_URI; ?>/Admin/DeleteTagRss/<?php echo $value['ID']; ?>">Xóa</a>
                            </td>
                          </tr>
                          <?php $i++; ?>
                          <?php endforeach; ?>
                        </tbody>
                        <?php else : ?>
                        <tbody>
                          <tr class="even pointer">
                            <td colspan="4"></td>
                            
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