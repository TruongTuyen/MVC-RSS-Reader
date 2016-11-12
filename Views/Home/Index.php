<?php include( MVC_BASE_URL .'/Views/Public/header-2.php' ); ?>

	<section class="listings">
		<div class="wrapper">
			<ul class="properties_list">
                <?php if( isset( $data['rss_news'] ) && !empty( $data['rss_news'] ) ) : ?>
                    <?php foreach( $data['rss_news'] as $rss ) : ?>
        				<li>
        					<div class="property_details">
        						<p><?php echo $rss['title']; ?></p>
                                <p><?php echo $rss['description']; ?></p>
                                <p><?php echo $rss['pubDate']; ?></p>
        					</div>
        				</li>
                    <?php endforeach; ?>
				<?php endif; ?>
			</ul>
			
		</div>
	</section>	<!--  end listing section  -->
<?php include( MVC_BASE_URL .'/Views/Public/footer-2.php' ); ?>