<?php
/* Template Name: Services */
get_header(); 
?>
<?php 
$display_banner_section = get_field('display_banner_section');
$banner_section_title = get_field('banner_section_title');
$banner_section_description = get_field('banner_section_description');
$banner_section_button = get_field('banner_section_button');
if($display_banner_section){
?>
    <section class="service_page service-p-banner">
        <div class="service_bg">
        <?php if(has_post_thumbnail( )){ the_post_thumbnail( ); }else{ ?>
            <img src="<?=site_url(  )?>/wp-content/uploads/2024/05/service-bg-1.jpg" alt="img">
        <?php } ?>
        </div>
        <div class="service_content">
            <div class="container">
                <div class="row">
                    <div class="col-md-6"></div>
                    <div class="col-md-6" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
                        <div class="global_font">
                            <div class="banner_title">
                                <h1><?=@$banner_section_title?></h1>
                            </div>
                            <div class="banner_para">
                                <?=$banner_section_description?>
                            </div>
                            <div class="btn_banner">
                                <?=getLinkUrl($banner_section_button, 'btn-ctn')?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<?php if(get_field('display_service_section')){ ?>
    <?php $i=1;
    $query=new WP_Query(['post_type'=>'service', 'posts_per_page'=>-1]);
    while($query->have_posts()):$query->the_post(); 
    if(get_field('display_content_section')){?>
        <?php if(get_field('content')){ $sizeData=count(get_field('content')); } ?>
        <section class="our_services <?php if($i%3==1){ echo 'cfo_service_wrap';}elseif($i%3==2){ echo 'tax_planing_wrap';}else{ echo 'accounting__wrap';} ?>">
            <div class="container" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
                <div class="global__font">
                    <h3><?=get_field('title')?></h3>
                    <?=get_field('description')?>  
                </div>
                <div class="<?=(@$sizeData==3)?'infograph__design':''?>">
                    <div class="global_service_wrap cfo_service_box">
                        <div class="row">
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
                </div>
                <div class="book_btn">
                    <?=getLinkUrl(get_field('button'), 'btn-ctn'); ?>
                </div>
            </div>
        </section>
    <?php $i++; } endwhile; wp_reset_postdata(  ); ?>
<?php } ?>
<?php 
$display_educated_client_section = get_field('display_educated_client_section');
$educated_client_section_image = get_field('educated_client_section_image');
$educated_client_section_title = get_field('educated_client_section_title');
if($display_educated_client_section && $educated_client_section_image){
?>
    <section class="educated_client_wrap">
        <div class="educated_client_bg">
            <?=getImageSizeAlt($educated_client_section_image);?>
        </div>
        <div class="educated_client_content">
            <div class="container" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
                <div class="global__font">
                    <h2><?=@$educated_client_section_title?></h2>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<?php 
$display_testimonials_section = get_field('display_testimonials_section');
$testimonials_section_title = get_field('testimonials_section_title');
if($display_testimonials_section){
    $query=new WP_Query(['post_type'=>'testimonial', 'posts_per_page'=>-1]);
    if($query->have_posts(  )){
?>
    <section class="our_clients">
        <div class="container" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
            <div class="slider_wrap">
				<div class="slider_box_bg">
					<div class="global__font">
						<h3><?=@$testimonials_section_title?></h3>
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
$display_blog_section = get_field('display_blog_section');
$blog_section_title = get_field('blog_section_title');
$blog_section_button = get_field('blog_section_button');
if($display_blog_section){
    $query=new WP_Query(['post_type'=>'post', 'posts_per_page'=>10]);
    if($query->have_posts()){
?>
    <section class="our_blog_wrap">
        <div class="container" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
            <div class="d-flex">
                <div class="global__font">
                    <h3><?=$blog_section_title?></h3>
                </div>
                <div class="read_more">
                    <?=getLinkUrl($blog_section_button, '', get_template_directory_uri().'/assets/images/arrow_black.svg')?>
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
				<?=getLinkUrl($blog_section_button, '', get_template_directory_uri().'/assets/images/arrow_black.svg')?>
			</div>
        </div>
    </section>
<?php } } ?>

<?php get_footer(); ?>