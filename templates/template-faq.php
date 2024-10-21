<?php
/* Template Name: Faq */
get_header(); 
?>
<?php 
$display_banner_section = get_field('display_banner_section');
$banner_section_title = get_field('banner_section_title');
$banner_section_description = get_field('banner_section_description');
$banner_section_content = get_field('banner_section_content');
if($display_banner_section && ($banner_section_description ||$banner_section_content)){
?>
<section class="faq_page_wrap">
	<div class="container">
		<div class="faq_page_title">
			<h1><?=@$banner_section_title?></h1>
			<?=@$banner_section_description?>
		</div>
		
		<div class="accordion" id="accordionFaq">
			<?php $i=1; while(have_rows('banner_section_content')):the_row();?>
				<article class="accordion-item">
					<button class="accordion_button <?=$i==1?'':'collapsed'?>" type="button" data-bs-toggle="collapse" data-bs-target="#Faq_tab<?=$i?>">
						<div class="global__font">
							<h2><?=get_sub_field('title')?></h2>
						</div>
					</button>
					<div id="Faq_tab<?=$i?>" class="accordion-collapse collapse  <?=$i==1?'show':''?>" data-bs-parent="#accordionFaq">
						<div class="accordion-body">
							<?=get_sub_field('description')?>
						</div>
					</div>
				</article>
			<?php $i++; endwhile; ?>
		</div>
	</div>
</section>
<?php } ?>
<?php 
$display_blog_section = get_field('display_blog_section');
$blog_section_title = get_field('blog_section_title');
$blog_section_button = get_field('blog_section_button');
if($display_blog_section){
    $query=new WP_Query(['post_type'=>'post', 'posts_per_page'=>10]);
    if($query->have_posts()){
?>
    <section class="our_blog_wrap faq_blog_wrap">
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
$display_stay_informed_section = get_field('display_stay_informed_section');
$stay_informed_section_title = get_field('stay_informed_section_title');
$stay_informed_section_description = get_field('stay_informed_section_description');
$stay_informed_section_button_type = get_field('stay_informed_section_button_type');
$stay_informed_section_button = get_field('stay_informed_section_button');
$stay_informed_section_button_text = get_field('stay_informed_section_button_text');
if($display_stay_informed_section && ($stay_informed_section_title ||$stay_informed_section_description)){
?>
<section class="stay_informed_wrap">
	<div class="container">
		<div class="global__font">
			<h3><?=@$stay_informed_section_title?></h3>
			<?=@$stay_informed_section_description?>
			<?php if($stay_informed_section_button_type=='Link'){ ?>
				<?=getLinkUrl($stay_informed_section_button, 'btn-ctn')?>
			<?php }elseif($stay_informed_section_button_type=='Popup'){ ?>
				<button type="button" class="btn-ctn" data-bs-toggle="modal" data-bs-target="#subscribe_modal"><?=@$stay_informed_section_button_text?></button>
			<?php } ?>
		</div>
	</div>
</section>
<?php } ?>
<?php get_footer(); ?>