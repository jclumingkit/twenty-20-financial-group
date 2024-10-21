<?php
/* default Template */
get_header(); 
?>

<section class="comman_banner_wrap">
	<div class="comman_banner_img">
		<?php if(has_post_thumbnail( )){ the_post_thumbnail( ); }else{ ?>
			<img src="<?=site_url()?>/wp-content/uploads/2024/05/our-blog-banner.jpg" alt="img">
		<?php } ?>
	</div>
	<div class="comman_banner_content" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
		<div class="container">
			<div class="global_font">
				<h1><?php the_title(); ?></h1>				
			</div>
		</div>
	</div>
</section>

<section class="single_blog_content">
	<div class="container" data-aos="fade-up" data-aos-duration="1000" data-aos-easing="ease-in-out">
		<div class="inner_content default_content">
			<?php the_content(); ?>
		</div>
	</div>
</section>





<?php get_footer(); ?>