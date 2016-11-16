<!DOCTYPE html>
<html lang="en">
<head>
	<title>Home - RSS Reader</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
	
	<link rel="stylesheet" type="text/css" href="<?php echo MVC_BASE_URI; ?>/Views/Public/css/reset.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo MVC_BASE_URI; ?>/Views/Public/css/responsive.css" />

	<script type="text/javascript" src="<?php echo MVC_BASE_URI; ?>/Views/Public/js/main.js"></script>
</head>
<body>

	<section class="hero">
		<header>
			<div class="wrapper">
				<a href="<?php echo MVC_BASE_URI; ?>/Home/Index"><img src="<?php echo MVC_BASE_URI;?>/Views/Public/images/rss_logo.png" class="logo" alt="" titl=""/></a>
				<a href="#" class="hamburger"></a>
                <?php if( isset( $data['menu_list'] ) && !empty( $data['menu_list'] ) ) : ?>
    				<nav class="main-menu">
    					<ul>
                            <?php foreach( $data['menu_list'] as $menu ) : ?>
    						  <li class="<?php if( isset( $data['current_id'] ) && !empty( $data['current_id'] ) && $data['current_id'] == $menu['ID'] ){ echo "active"; } ?>" ><a href="<?php echo MVC_BASE_URI; ?>/Home/Index/<?php echo $menu['ID'] ?>"><?php echo $menu['menu_name']; ?></a></li>
                            <?php endforeach; ?>
    					</ul>
    					
    				</nav>
                <?php endif; ?>
			</div>
		</header><!--  end header section  -->

	</section><!--  end hero section  -->
