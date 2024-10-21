<?php
get_header();
?>

<div class="about-us">
	<div class="section error-page active" id="section0">
		<div class="error-info-inner">
			<div class="container" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
				<div class="heading-slider">
					<h1><?= get_field('404_page_management_title','option'); ?></h1>
					<?= get_field('404_page_management_description','option'); ?>
					<p class="broken"><?php echo getLinkUrl(get_field('404_page_management_button', 'option'), 'btn-ctn'); ?></p>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
get_footer(); ?>
