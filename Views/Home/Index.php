<?php include( MVC_BASE_URL .'/Views/Public/header-2.php' ); ?>
	<section class="listings">
		<div class="wrapper">
			<ul class="properties_list">
                <?php if( !empty( $data['rss_news'] ) ) {
                    echo implode( '', $data['rss_news'] );
                } ?>
            
			</ul>
			
		</div>
	</section>	<!--  end listing section  -->
<?php include( MVC_BASE_URL .'/Views/Public/footer-2.php' ); ?>