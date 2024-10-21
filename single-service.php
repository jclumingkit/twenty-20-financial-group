<?php get_header(); ?>
<?php 
$display_banner_section = get_field('display_banner_section');
$banner_section_text = get_field('banner_section_text');
$banner_section_title = get_field('banner_section_title');
$banner_section_description = get_field('banner_section_description');
$banner_section_button = get_field('banner_section_button');
$banner_section_color = get_field('banner_section_color');
if($display_banner_section && ($banner_section_title ||$banner_section_description)){
?>
<section class="banner__wrap main_banner <?php if($banner_section_color=='Green'){ echo 'banner_img_left green_bg';}elseif($banner_section_color=='Beige'){ echo 'tax_planning_preparation'; }else{ echo 'banner_img_left accounting_bookkeeping';}?>">
	<div class="banner___img single-service-banner-img">
		<div class="row g-0">
			<div class="col-md-5"></div>
			<div class="col-md-7">
				<?php if(has_post_thumbnail( )){  ?>
<!-- 					<div class="banner_img_design mm_none" data-aos="zoom-in" data-aos-duration="1000" data-aos-easing="ease-in-out"> -->
					<div class="banner_img_design mm_none" data-aos="<?php if($banner_section_color=='Beige'){ echo 'fade-left';}else{ echo 'fade-right'; }?>" data-aos-duration="1000" data-aos-easing="ease-in-out">
						<div class="cricle_design">
							<?php if(has_post_thumbnail( )){ the_post_thumbnail( ); } ?>
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
							<p><strong><?=@$banner_section_text?></strong></p>
						</div>
						<div class="banner_title">
							<h1><?=@$banner_section_title?></h1>
						</div>
						<?php if(has_post_thumbnail( )){  ?>
							<div class="banner_img_design dd_none">
								<div class="cricle_design">
									<?php if(has_post_thumbnail( )){ the_post_thumbnail( ); } ?>
								</div>
							</div>
						<?php } ?>
						<div class="banner_para">
							<?=@$banner_section_description?>
						</div>
						<div class="btn_banner">
							<?=getLinkUrl($banner_section_button, 'btn-ctn')?>
						</div>
					</div>
				</div>
				<div class="col-md-7"></div>
			</div>
		</div>
	</div>
</section>
<?php } ?>
<?php 
$display_content_section = get_field('display_content_section');
$title = get_field('title');
$description = get_field('description');
$content = get_field('content');
$button = get_field('button');
if($display_content_section){
?>
<section class="our_services <?php if($banner_section_color=='Green'){ echo 'cfo_service_wrap';}elseif($banner_section_color=='Beige'){ echo 'tax_planing_wrap'; }else{ echo 'accounting__wrap accounting_and_bookkeeping';}?>">
	<div class="container">
		<div class="global__font" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
			<h3><?=@$title?></h3>
			<?=@$description?>
		</div>

		<div class="global_service_wrap cfo_service_box" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
			<div class="row">
				 <?php if(get_field('content')){ $sizeData=count(get_field('content')); } ?>
				<?php while(have_rows('content')):the_row(); ?>
					<article class="<?=(@$sizeData==3)?'col-md-4':'col-md-6'?>">
						<div class="cfo_service_inner">
							<div class="d-flex">
								<div class="cfo_icon">
									<?=getimageSizeAlt(get_sub_field('icon'))?>
								</div>
								<div class="global__font">
									<h6><?=get_sub_field('title')?></h6>
								</div>
							</div>
							<div class="cfo_service_para">
								<?=get_sub_field('description')?>
							</div>
						</div>
					</article>
				<?php endwhile; ?>
			</div>
		</div>

		<div class="book_btn" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
			<?=getLinkUrl(get_field('button'), 'btn-ctn'); ?>
		</div>
	</div>
</section>
<?php } ?>
<?php 
$display_why_this_service_section = get_field('display_why_this_service_section');
$why_this_service_section_title = get_field('why_this_service_section_title');
$why_this_service_section_description = get_field('why_this_service_section_description');
$why_this_service_section_image = get_field('why_this_service_section_image');
if($display_why_this_service_section && ($why_this_service_section_description ||$why_this_service_section_image)){
?>
<section class="full_content_wrap <?=($banner_section_color=='Beige')?'planing__prepration':''?>">
	<div class="row g-0 half__img">
		<div class="col-md-6"></div>
		<div class="col-md-6">
<!-- 			<div class="outsource__banner mm_none" data-aos="zoom-in" data-aos-duration="1000" data-aos-easing="ease-in-out"> -->
			<div class="outsource__banner mm_none">
				<?=getImageSizeAlt($why_this_service_section_image);?>
			</div>
		</div>
	</div>
	<div class="outsource__content">
		<div class="container" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
			<div class="row g-0">
				<div class="col-md-6">
					<div class="outsource__inner">
						<div class="global__font">
							<h3><?=@$why_this_service_section_title?></h3>
						</div>
						<div class="description_para">
							<?=@$why_this_service_section_description?>
						</div>
						<div class="outsource__banner dd_none">
							<?=getImageSizeAlt($why_this_service_section_image);?>
						</div>
					</div>
				</div>
				<div class="col-md-6"></div>
			</div>
		</div>
	</div>
</section>
<?php } ?>
<?php 
$display_benefits_section = get_field('display_benefits_section');
$benefits_section_title = get_field('benefits_section_title');
$benefits_section_description = get_field('benefits_section_description');
$benefits_section_button = get_field('benefits_section_button');
$benefits_section_content = get_field('benefits_section_content');
if($display_benefits_section && ($benefits_section_description ||$benefits_section_content )){
?>
<section class="benefits__cfo <?php if($banner_section_color=='Green'){ echo '';}elseif($banner_section_color=='Beige'){ echo 'benefits__tax_reverse dark_green_bg'; }else{ echo 'green_bg bookkeeping_benefits';}?>">
	<div class="container" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
		<div class="global__font dd_none">
			<h3><?=@$benefits_section_title?></h3>
		</div>
		<div class="row">
			<div class="col-md-6">
				<?php while(have_rows('benefits_section_content')):the_row();?>
					<article class="benefits_box_content">
						<div class="global__font">
							<h4><?=get_sub_field('title')?></h4>
						</div>
						<?=get_sub_field('description')?>
					</article>
				<?php endwhile; ?>
			</div>
			<div class="col-md-6">
				<div class="global__font mm_none">
					<h3><?=@$benefits_section_title?></h3>
				</div>
				<div class="description_para">
					<?=@$benefits_section_description?>
				</div>
				<div class="consultation__btn">
					<?=getLinkUrl($benefits_section_button, 'btn-ctn')?>
				</div>
			</div>
		</div>
	</div>
</section>
<?php } ?>
<?php 
$service_page_management_display_educated_client_section = get_field('service_page_management_display_educated_client_section', 'option');
$service_page_management_educated_client_section_title = get_field('service_page_management_educated_client_section_title', 'option');
$service_page_management_educated_client_section_image = get_field('service_page_management_educated_client_section_image', 'option');
if($service_page_management_display_educated_client_section && $service_page_management_educated_client_section_image){
?>
    <section class="educated_client_wrap">
        <div class="educated_client_bg">
            <?=getImageSizeAlt($service_page_management_educated_client_section_image);?>
        </div>
        <div class="educated_client_content">
            <div class="container" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
                <div class="global__font">
                    <h2><?=@$service_page_management_educated_client_section_title?></h2>
                </div>
            </div>
        </div>
    </section>
<?php } ?>

<?php 
$service_page_management_display_testimonials_section = get_field('service_page_management_display_testimonials_section', 'option');
$service_page_management_testimonials_section_title = get_field('service_page_management_testimonials_section_title', 'option');
if($service_page_management_display_testimonials_section){
    $query=new WP_Query(['post_type'=>'testimonial', 'posts_per_page'=>-1]);
    if($query->have_posts(  )){
?>
    <section class="our_clients">
        <div class="container" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
            <div class="slider_wrap">
				<div class="slider_box_bg">
					<div class="global__font">
						<h3><?=@$service_page_management_testimonials_section_title?></h3>
					</div>
					<div id="testimonal_slider" class="owl-carousel">
						<?php while($query->have_posts(  )):$query->the_post(  ); ?>
							<article class="item">
								<div class="italic_text">
									<?=get_field('description')?>
								</div>
								<div class="client_sec">
									<p><strong><?=get_field('sub_title')?></strong></p>
									<p><?=get_field('title')?></p>
								</div>
							</article>
						<?php endwhile; wp_reset_postdata(  ); ?>
					</div>
				</div>
            </div>
        </div>
    </section>
<?php }} ?>
<?php 
$service_page_management_display_blog_section = get_field('service_page_management_display_blog_section', 'option');
$service_page_management_blog_section_title = get_field('service_page_management_blog_section_title', 'option');
$service_page_management_blog_section_button = get_field('service_page_management_blog_section_button', 'option');
if($service_page_management_display_blog_section){
    $query=new WP_Query(['post_type'=>'post', 'posts_per_page'=>10]);
    if($query->have_posts()){
?>
    <section class="our_blog_wrap">
        <div class="container" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
            <div class="d-flex">
                <div class="global__font">
                    <h3><?=$service_page_management_blog_section_title?></h3>
                </div>
                <div class="read_more">
                    <?=getLinkUrl($service_page_management_blog_section_button, '', get_template_directory_uri().'/assets/images/arrow_black.svg')?>
                </div>
            </div>
        </div>

        <div class="blog__slider_main" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
            <div id="blog_slider" class="owl-carousel">
                <?php while($query->have_posts()):$query->the_post(); ?>
                    <article class="item">
                        <div class="blog__content">
                            <div class="blog__content__img">
                                <a href="<?=get_the_permalink()?>">
                                    <?php if(has_post_thumbnail( )){ the_post_thumbnail( ); }else{ ?>
                                        <img src="<?php echo get_template_directory_uri();?>/assets/images/blog_img1.png" alt="img">
                                    <?php } ?>
                                </a>
								<div class="blog__date_title">
									<a href="<?php echo esc_url( get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')) ); ?>"><?php echo date('d M', strtotime(get_the_date())); ?></a>
								</div>
                            </div>
                            <div class="blog__content_inner">
                                <div class="global__font">
                                    <h4><a href="<?=get_the_permalink()?>"><?=truncateHtml(get_the_title(), 35)?></a></h4>
                                </div>
                                <div class="blog__para">
                                    <p><?=truncateHtml(get_the_content(), 160)?></p>
                                </div>
                                <div class="read_more">
                                    <a href="<?=get_the_permalink()?>">Read more <img src="<?php echo get_template_directory_uri();?>/assets/images/arrow_black.svg" alt="img"></a>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php endwhile; wp_reset_postdata(  ); ?>
            </div>
			<div class="read_more">
				<?=getLinkUrl($service_page_management_blog_section_button, '', get_template_directory_uri().'/assets/images/arrow_black.svg')?>
			</div>
        </div>
    </section>
<?php } } ?>

<?php get_footer(); ?>