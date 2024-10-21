<!DOCTYPE html>
<html lang="en">

<head>
	<script>
		const home_page_url="<?=(get_field('header_section_header_home_page_link','option'))?get_field('header_section_header_home_page_link','option'):site_url();?>";
		const root_url="<?php echo get_template_directory_uri();?>";
	</script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"rel="stylesheet">
    <!-- bootstrap link -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/owl.theme.default.css">
	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- custom css -->
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/style.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/assets/css/responsive.css">
	<title><?php bloginfo('name'); if(wp_title('', false)) { echo ' | '; } else { echo bloginfo('description'); } wp_title(''); ?></title>
	<?=get_field('header_section_before_header_close_content','option'); ?>
    <?php wp_head(); ?>
</head>


<body <?php body_class();?>>
	<?=get_field('header_section_after_body_start_content','option'); ?>

    <main class="wrapper">
<?php 
$display_header_section 					= get_field('display_header_section', 'option'); 
$header_section_display_header_logo 		= get_field('header_section_display_header_logo', 'option'); 
$header_section_header_logo 				= get_field('header_section_header_logo', 'option'); 
$header_section_display_header_menu 		= get_field('header_section_display_header_menu', 'option'); 
$header_section_display_header_button 		= get_field('header_section_display_header_button', 'option'); 
$header_section_header_button 		= get_field('header_section_header_button', 'option'); 
if($display_header_section && ($header_section_display_header_logo ||$header_section_display_header_menu ||$header_section_display_header_button)){
?>
	<nav class="offcanvas offcanvas-end" tabindex="-1" id="Right_Funnel" aria-labelledby="offcanvasExampleLabel">
		<div class="offcanvas-header">
			<div class="container">
				<div class="header-wrap">
					<div class="logo">
						<?php if($header_section_display_header_logo && $header_section_header_logo){ ?>
							<a href="<?=(get_field('header_section_header_home_page_link','option'))?get_field('header_section_header_home_page_link','option'):site_url();?>"><?=@getImageSizeAlt($header_section_header_logo);?></a>
						<?php } ?>
					</div>
					<div class="right-div tilt-hover">
						<div class="burger" data-bs-dismiss="offcanvas" aria-label="Close">
							<span></span>
							<span></span>
							<span></span>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="offcanvas-body">
			<div class="menuLink">
				<?php if($header_section_display_header_menu){ ?>
					<?php dynamic_sidebar('header-menu') ?>
				<?php } ?>
			</div>
			<div class="contact_btn">
				<?=($header_section_display_header_button)?getLinkUrl($header_section_header_button, 'btn-ctn'):''?>
			</div>
		</div>
	</nav>

	<header>
		<div class="container">
			<div class="header-wrap">
				<div class="logo">
					<?php if($header_section_display_header_logo && $header_section_header_logo){ ?>
						<a href="<?=(get_field('header_section_header_home_page_link','option'))?get_field('header_section_header_home_page_link','option'):site_url();?>"><?=@getImageSizeAlt($header_section_header_logo);?></a>
					<?php } ?>
				</div>
				<div class="head__right">
					<div class="menuLink">
						<?php if($header_section_display_header_menu){ ?>
							<?php dynamic_sidebar('header-menu') ?>
						<?php } ?>
					</div>
					<div class="right-div">
						<div class="contact_btn">
							<?=($header_section_display_header_button)?getLinkUrl($header_section_header_button, 'btn-ctn'):''?>
						</div>
						<?php if($header_section_display_header_menu){ ?>
							<div class="burger" data-bs-toggle="offcanvas" data-bs-target="#Right_Funnel"
								aria-controls="Right_Funnel">
								<span></span>
								<span></span>
								<span></span>
							</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
	</header>
<?php } ?>