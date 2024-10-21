<?php
/* Template Name: Blog */
get_header(); 
?>
<?php 
$display_banner_section = get_field('display_banner_section');
$banner_section_title = get_field('banner_section_title');
$banner_section_description = get_field('banner_section_description');
if($display_banner_section){
?>
<section class="comman_banner_wrap">
	<div class="comman_banner_img">
		<?php if(has_post_thumbnail( )){ the_post_thumbnail( ); }else{ ?>
			<img src="<?=site_url()?>/wp-content/uploads/2024/05/our-blog-banner.jpg" alt="img">
		<?php } ?>
	</div>
	<div class="comman_banner_content">
		<div class="container">
			<div class="comman_banner_title">
				<h1><?=@$banner_section_title?></h1>
				<?=@$banner_section_description?>
			</div>
		</div>
	</div>
</section>
<?php } ?>
<?php 
$display_cfo_services = get_field('display_cfo_services');
$cfo_services_title = get_field('cfo_services_title'); 
$cfo_services_select_post_category = get_field('cfo_services_select_post_category');
if($display_cfo_services && $cfo_services_select_post_category){
	$query=new WP_Query(['post_type'=>'post', 'posts_per_page'=>-1, 'category__in'   => [$cfo_services_select_post_category]]);
	if($query->have_posts()){
?>
<section class="blog_cfo_service">
	<div class="container blog_service_grid">
		<div class="global__font">
			<h2><?=@$cfo_services_title?></h2>
		</div>
		<div class="row">
			<?php while($query->have_posts()):$query->the_post();?>
				<article class="col-md-4 cfo-article">
					<div class="blog__content">
						<div class="blog__content__img">
							<a href="<?=get_the_permalink()?>">
								<?php if(has_post_thumbnail( )){ the_post_thumbnail( ); }else{ ?>
									<img src="<?=site_url()?>/wp-content/uploads/2024/05/default-thumbnail.jpg" alt="img">
								<?php } ?>
							</a>
							<div class="blog__date_title">
								<a href="<?php echo esc_url( get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')) ); ?>"><?php echo date('d M', strtotime(get_the_date())); ?></a>
							</div>							
						</div>
						<div class="blog__content_inner">
							<div class="global__font">
								<h4><a href="<?=get_the_permalink()?>"><?=truncateHtml(get_the_title(), 30)?></a></h4>
							</div>
							<div class="blog__para">
								<p><?=truncateHtml(get_the_content(), 160)?></p>
							</div>
							<div class="read_more">
								<a href="<?=get_the_permalink()?>">Read more <img src="<?=site_url()?>/wp-content/themes/twenty-20-financial-group/assets/images/arrow_black.svg" alt="img"></a>
							</div>
						</div>
					</div>
				</article>
			<?php endwhile; wp_reset_postdata(); ?>
		</div>
		<div class="load_more">
			<a href="javascript:void(0);" class="btn-ctn" id="cfo-button">Load more</a>
		</div>
	</div>
</section>
<?php }} ?>
<?php 
$display_educated_client_section = get_field('display_educated_client_section');
$educated_client_section_image = get_field('educated_client_section_image');
$educated_client_section_title = get_field('educated_client_section_title');
$educated_client_section_button = get_field('educated_client_section_button');
if($display_educated_client_section && $educated_client_section_image){
?>
<section class="educated_client_wrap comman_edu_client">
	<div class="educated_client_bg">
		<?=getImageSizeAlt($educated_client_section_image); ?>
	</div>
	<div class="educated_client_content">
		<div class="container">
			<div class="global__font">
				<h2><?=@$educated_client_section_title?></h2>
				<?=getLinkUrl($educated_client_section_button, 'btn-ctn')?>
			</div>
		</div>
	</div>
</section>
<?php } ?>

<?php 
$display_categories_section = get_field('display_categories_section');
$categories_section_categories = get_field('categories_section_categories');
if($display_categories_section && $categories_section_categories){
    $sectionCount=1;
    while(have_rows('categories_section_categories')):the_row();
    $title=get_sub_field('title');
    $select_category=get_sub_field('select_category');
    if($select_category){
        $query=new WP_Query(['post_type'=>'post', 'posts_per_page'=>-1, 'category__in'   => [$select_category]]);
	    if($query->have_posts()){
?>
    <!-- ----------------------------------------------------------------------------------------------------------- -->
    <section class="<?=($sectionCount%2==0)?'blog_cfo_service':'blog_tax_planing'?>">
        <div class="container blog_service_grid">
            <div class="global__font">
                <h3><?=@$title?></h3>
            </div>
            <div class="row">
                <?php while($query->have_posts()):$query->the_post();?>
                    <article class="col-md-4 tax-planning-<?=$sectionCount?>-article">
                        <div class="blog__content">
                            <div class="blog__content__img">
                                <a href="<?=get_the_permalink()?>">
                                    <?php if(has_post_thumbnail( )){ the_post_thumbnail( ); }else{ ?>
                                        <img src="<?=site_url()?>/wp-content/uploads/2024/05/default-thumbnail.jpg" alt="img">
                                    <?php } ?>
                                </a>
								<div class="blog__date_title">
									<a href="<?php echo esc_url( get_day_link(get_the_time('Y'), get_the_time('m'), get_the_time('d')) ); ?>"><?php echo date('d M', strtotime(get_the_date())); ?></a>
								</div>
                            </div>
                            <div class="blog__content_inner">
                                <div class="global__font">
                                    <h4><a href="<?=get_the_permalink()?>"><?=truncateHtml(get_the_title(), 30)?></a></h4>
                                </div>
                                <div class="blog__para">
                                    <?=truncateHtml(get_the_content(), 160)?>
                                </div>
                                <div class="read_more">
                                    <a href="<?=get_the_permalink()?>">Read more <img src="<?=site_url()?>/wp-content/themes/twenty-20-financial-group/assets/images/arrow_black.svg" alt="img"></a>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php endwhile; wp_reset_postdata(  ); ?>
            </div>
            <div class="load_more">
                <a href="javascript:void(0);" class="btn-ctn" id="tax-planning-<?=$sectionCount?>-button">Load more</a>
            </div>
        </div>
    </section>
    <!-- ----------------------------------------------------------------------------------------------------------- -->
<?php  $sectionCount++;}} endwhile; ?>
<?php } ?>
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
<script>

$(document).ready(function() {
	//cfo section
    var visibleCount = <?=get_option('posts_per_page');?>; // Number of initially visible divs
    var $rosterItems = $(".cfo-article");
    $rosterItems.hide();
    $rosterItems.slice(0, visibleCount).show();
	if (visibleCount >= $rosterItems.length) {
		$("#cfo-button").hide();
	}
    
    $("#cfo-button").on("click", function() {
        visibleCount += <?=get_option('posts_per_page');?>; // Increase the count by 2 on each click
        $rosterItems.slice(0, visibleCount).show();
        
        // Hide the "Show More" button if all items are visible
        if (visibleCount >= $rosterItems.length) {
            $("#cfo-button").hide();
        }
    });

<?php if(@$sectionCount){ for($i=1;$i<$sectionCount;$i++){ ?>
	//tax-planning section
    var visibleCount<?=$i?> = <?=get_option('posts_per_page');?>; // Number of initially visible divs
    var $rosterItems<?=$i?> = $(".tax-planning-<?=$i?>-article");
    $rosterItems<?=$i?>.hide();
    $rosterItems<?=$i?>.slice(0, visibleCount<?=$i?>).show();
	if (visibleCount<?=$i?> >= $rosterItems<?=$i?>.length) {
		$("#tax-planning-<?=$i?>-button").hide();
	}
    
    $("#tax-planning-<?=$i?>-button").on("click", function() {
        visibleCount<?=$i?> += <?=get_option('posts_per_page');?>; // Increase the count by 2 on each click
        $rosterItems<?=$i?>.slice(0, visibleCount<?=$i?>).show();
        
        // Hide the "Show More" button if all items are visible
        if (visibleCount<?=$i?> >= $rosterItems<?=$i?>.length) {
            $("#tax-planning-<?=$i?>-button").hide();
        }
    });
<?php }} ?>
});
</script>