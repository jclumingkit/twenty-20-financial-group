<?php
/* Template Name: Homepage */

get_header(); ?>
<?php 
$display_banner_section = get_field('display_banner_section');
$banner_section_title = get_field('banner_section_title');
$banner_section_description = get_field('banner_section_description');
$banner_section_button = get_field('banner_section_button');
if($display_banner_section){
?>
    <section class="banner__wrap main_banner">
        <div class="banner___img">
            <div class="row g-0">
                <div class="col-md-5"></div>
                <div class="col-md-7">
                    <?php if(has_post_thumbnail( )){ ?>
                        <div class="banner_img_design mm_none" data-aos="fade-left" data-aos-duration="1000" data-aos-easing="ease-in-out">
                            <div class="cricle_design">
                                <?php if(has_post_thumbnail( )){ the_post_thumbnail( ); } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <div class="banner_content" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="global_font">
                            <div class="banner_title">
                                <h1><?=@$banner_section_title?></h1>
                            </div>
                            <div class="banner_img_design dd_none">
                                <div class="cricle_design">
                                    <?php if(has_post_thumbnail( )){ the_post_thumbnail( ); } ?>
                                </div>
                            </div>
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
            <div class="container">
                <div class="global__font" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
                    <h2><?=@$educated_client_section_title?></h2>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<?php 
$display_tell_me_section = get_field('display_tell_me_section');
$tell_me_section_title = get_field('tell_me_section_title');
$tell_me_section_description_1 = get_field('tell_me_section_description_1');
$tell_me_section_description_2 = get_field('tell_me_section_description_2');
if($display_tell_me_section && ($tell_me_section_description_1 ||$tell_me_section_description_2)){
?>
    <section class="familiar__wrap">
        <div class="container" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
            <div class="global__font">
                <h3><?=@$tell_me_section_title?></h3>
                <?=@$tell_me_section_description_1?>
            </div>
            <?php if($tell_me_section_description_2){ ?>
                <div class="familiar__list">
                    <div class="list_description">
                        <?=@$tell_me_section_description_2?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </section>
<?php } ?>
<?php 
$display_founder_section = get_field('display_founder_section');
$founder_section_title = get_field('founder_section_title');
$founder_section_description_1 = get_field('founder_section_description_1');
$founder_section_description_2 = get_field('founder_section_description_2');
$founder_section_image = get_field('founder_section_image');
if($display_founder_section && ($founder_section_description_1 ||$founder_section_description_2 ||$founder_section_image)){
?>
    <section class="profile__wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <?php if($founder_section_image){ ?>
                        <div class="profile__cricle mm_none" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out"> 
                            <?=getImageSizeAlt($founder_section_image)?>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-md-6">
                    <div class="global__font" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
                        <h3><?=@$founder_section_title?> </h3>
                        <?php if($founder_section_image){ ?>
                            <div class="profile__cricle dd_none">
                                <?=getImageSizeAlt($founder_section_image)?>
                            </div>
                        <?php } ?>
                        <?=@$founder_section_description_1?>
                    </div>
                    <div class="description_para" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
                        <?=@$founder_section_description_2?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<?php 
$display_services_section = get_field('display_services_section');
$services_section_title = get_field('services_section_title');
$services_section_description = get_field('services_section_description');
$services_section_select_services = get_field('services_section_select_services');
if($display_services_section && ($services_section_description ||$services_section_select_services)){
?>
    <section class="our_services">
        <div class="container">
            <div class="global__font" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
                <h3><?=@$services_section_title?></h3>
                <?=@$services_section_description?>
            </div>
            <?php if($services_section_select_services){ ?>
                <div class="row">
                    <?php foreach($services_section_select_services as $post):setup_postdata( $post ); ?>
						<?php if(get_field('display_content_section')){ ?>
							<article class="col-md-4" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
								<div class="service_box">
									<div class="global__font">
										<h4><?=get_field('title')?></h4>
									</div>
									<div class="description_para">
										<?=get_field('description_home_page')?>
									</div>
									<div class="list__wrap">
										<div class="inner_list">
											<ul>
												<?php while(have_rows('content')):the_row(); ?>
													<li><?=get_sub_field('title')?></li>
												<?php endwhile; ?>
											</ul>
										</div>
									</div>
									<div class="book_btn">
										<?=getLinkUrl(get_field('button'), 'btn-ctn'); ?>
									</div>
								</div>
							</article>
						<?php } ?>
                    <?php endforeach; wp_reset_postdata(  ); ?>
                </div>
            <?php } ?> 
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
        <div class="container">
            <div class="slider_wrap"  data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
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
        <div class="container"  data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
            <div class="d-flex">
                <div class="global__font">
                    <h3><?=$blog_section_title?></h3>
                </div>
                <div class="read_more ">
                    <?=getLinkUrl($blog_section_button, '', get_template_directory_uri().'/assets/images/arrow_black.svg')?>
                </div>
            </div>
        </div>

        <div class="blog__slider_main"  data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
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
			
			<div class="read_more ">
				<?=getLinkUrl($blog_section_button, '', get_template_directory_uri().'/assets/images/arrow_black.svg')?>
			</div>
        </div>
    </section>
<?php } } ?>
<?php 
$display_how_we_work_section = get_field('display_how_we_work_section');
$how_we_work_section_title = get_field('how_we_work_section_title');
$how_we_work_section_description_1 = get_field('how_we_work_section_description_1');
$how_we_work_section_description_2 = get_field('how_we_work_section_description_2');
$how_we_work_section_button = get_field('how_we_work_section_button');
$how_we_work_section_image = get_field('how_we_work_section_image');
if($display_how_we_work_section && ($how_we_work_section_description_1 ||$how_we_work_section_description_2 ||$how_we_work_section_image)){
?>
    <section class="how_works_wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-7"  data-aos="fade-right" data-aos-duration="1000" data-aos-easing="ease-in-out">
                    <div class="global__font">
                        <h3><?=@$how_we_work_section_title?></h3>
                        <div class="how_works_img dd_none">
                            <?=getimageSizeAlt($how_we_work_section_image)?>
                        </div>
                        <?=@$how_we_work_section_description_1?>
                    </div>
                    <div class="description_para">
                        <?=@$how_we_work_section_description_2?>
                    </div>
                    <div class="book_consultation">
                        <?=getLinkUrl($how_we_work_section_button, 'btn-ctn')?>
                    </div>
                </div>
                <div class="col-md-5"  data-aos="fade-left" data-aos-duration="1000" data-aos-easing="ease-in-out">
                    <div class="how_works_img mm_none">
                        <?=getimageSizeAlt($how_we_work_section_image)?>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php } ?>
<?php get_footer(); ?>