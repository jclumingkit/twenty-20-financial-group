<?php get_header(); ?>

<section class="banner__wrap single_blog">
	<div class="banner___img">
		<div class="row g-0">
			<div class="col-md-5">
			</div>
			<div class="col-md-7">
				<?php if(has_post_thumbnail()){ ?>
					<div class="banner_img_design mm_none" data-aos="fade-left" data-aos-duration="1000" data-aos-easing="ease-in-out">
						<div class="cricle_design">
							<?php if(has_post_thumbnail()){ the_post_thumbnail();} ?>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<div class="banner_content">
		<div class="container" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
			<div class="row">
				<div class="col-md-5">
					<div class="global_font">
						<div class="description_para">
							<p>
								<a href="<?php echo esc_url( get_day_link(get_the_time( 'Y' ), get_the_time( 'm' ),get_the_time( 'd' ) ) ); ?>"><?=get_the_date();?></a>
								<?php echo do_shortcode('[rt_reading_time]'); ?> <span>min read</span>
							</p>
						</div>
						<div class="banner_title">
							<h1><?php the_title()?></h1>
						</div>
						<?php if(has_post_thumbnail()){ ?>
							<div class="banner_img_design dd_none">
								<div class="cricle_design">
									<?php if(has_post_thumbnail()){ the_post_thumbnail();} ?>
								</div>
							</div>
						<?php } ?>
						<div class="banner_para">
							<?=get_field('banner_text'); ?>
						</div>
					</div>
				</div>
				<div class="col-md-7"></div>
			</div>
		</div>
	</div>
</section>

<section class="single_blog_content">
	<div class="container" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
		<div class="row">
			<div class="col-md-8">
				<div class="inner_content">
					<?php the_content();?>
				</div>
			</div>
			<div class="col-md-4">
				<?php if(get_field('blog_page_management_display_sidebar', 'option')){ ?>
					<div class="blog_right_strip">
						<?php dynamic_sidebar('blog-sidebar');?>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>
<?php 
$image = get_field('image');
$image_text = get_field('image_text');
$image_button = get_field('image_button');
if($image ||$image_text ||$image_button){
?>
<section class="educated_client_wrap comman_edu_client">
	<div class="educated_client_bg">
		<?=getImageSizeAlt($image)?>
	</div>
	<div class="educated_client_content">
		<div class="container" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
			<div class="global__font">
				<h2><?=@$image_text?></h2>
				<?=getLinkUrl($image_button, 'btn-ctn')?>
			</div>
		</div>
	</div>
</section>
<?php } ?>
<?php if(get_field('content')){ ?>
<section class="single_blog_content aline_repeat_content">
	<div class="container" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
		<div class="row">
			<div class="col-md-8">
				<div class="inner_content">
					<?= get_field('content');?>
				</div>
			</div>
			<div class="col-md-4">
			</div>
		</div>
	</div>
</section>
<?php } ?>
<?php 
$blog_page_management_display_stay_informed = get_field('blog_page_management_display_stay_informed', 'option');
$blog_page_management_stay_informed_title = get_field('blog_page_management_stay_informed_title', 'option');
$blog_page_management_stay_informed_description = get_field('blog_page_management_stay_informed_description', 'option');
$blog_page_management_stay_informed_button_type = get_field('blog_page_management_stay_informed_button_type', 'option');
$blog_page_management_stay_informed_button = get_field('blog_page_management_stay_informed_button', 'option');
$blog_page_management_stay_informed_button_text = get_field('blog_page_management_stay_informed_button_text', 'option');
if($blog_page_management_display_stay_informed && ($blog_page_management_stay_informed_title ||$blog_page_management_stay_informed_description)){
?>
<section class="stay_informed_wrap">
	<div class="container" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
		<div class="global__font">
			<h3><?=@$blog_page_management_stay_informed_title?></h3>
			<?=@$blog_page_management_stay_informed_description?>
			<?php if($blog_page_management_stay_informed_button_type=='Link'){ ?>
				<?=getLinkUrl($blog_page_management_stay_informed_button, 'btn-ctn')?>
			<?php }elseif($blog_page_management_stay_informed_button_type=='Popup'){ ?>
				<button type="button" class="btn-ctn" data-bs-toggle="modal" data-bs-target="#subscribe_modal"><?=@$blog_page_management_stay_informed_button_text?></button>
			<?php } ?>
		</div>
	</div>
</section>
<?php } ?>

<?php get_footer(); ?>
