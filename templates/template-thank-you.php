<?php
/* Template Name: Thank You */
get_header(); 
if(!isset($_GET['accessmsg']) || $_GET['accessmsg']!='success'){
	wp_redirect(site_url());
	exit;
}
?>
<div id="fullpage">
	<div class="section error-page active" id="section0">
		<div class="error-info-inner">
			<div class="container" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
				<div class="heading-slider">
					<h1><?php echo get_field('title'); ?></h1>
					<?php echo get_field('description'); ?>
					<p class="broken"><?php echo getLinkUrl(get_field('button'), 'btn-ctn'); ?></p>
				</div>
			</div>
		</div>
	</div>
</div>
<?php get_footer(); ?>