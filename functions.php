<?php
/**
 * Project functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Project
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function Project_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on Project, use a find and replace
		* to change 'Project' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'Project', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
	// add_theme_support( 'title-tag' );

	/*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'Project' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'Project_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'Project_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function Project_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'Project_content_width', 640 );
}
add_action( 'after_setup_theme', 'Project_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function Project_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Header Menu', 'Project' ),
			'id'            => 'header-menu',
			'description'   => esc_html__( 'Add widgets here.', 'Project' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Menu 1', 'Project' ),
			'id'            => 'footer-menu-1',
			'description'   => esc_html__( 'Add widgets here.', 'Project' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Menu 2', 'Project' ),
			'id'            => 'footer-menu-2',
			'description'   => esc_html__( 'Add widgets here.', 'Project' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Blog Sidebar', 'Project' ),
			'id'            => 'blog-sidebar',
			'description'   => esc_html__( 'Add widgets here.', 'Project' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'Project_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function Project_scripts() {
	wp_enqueue_style( 'Project-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'Project-style', 'rtl', 'replace' );
}
add_action( 'wp_enqueue_scripts', 'Project_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';



if( function_exists('acf_add_options_page') ) {
	 acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> true
	));
}


function getImageSizeAlt($imagefield,$size='',$alt='',$clas='', $title=''){
	if($imagefield){
		$thumb = $imagefield['url'];
		$alt = $imagefield['alt']?$imagefield['alt']:$alt;
		$title = $imagefield['title']?$imagefield['title']:$title;
		// thumbnail
		if($size!='')
		{
			$size = $size;
			$thumb = $imagefield['sizes'][ $size ];
		}
		if($clas!='')
		{
			$clas =' class="'.$clas.'"';
		}
		return '<img src="'.$thumb.'" alt="'.$alt.'" title="'.$title.'" '.$clas.' />';
	}else{
		return '';
	}
}

function getImageUrl($imagefield,$size=''){
	if($imagefield){
		$thumburl = $imagefield['url'];
		// thumbnail
		if($size!='')
		{
			$size = $size;
			$thumburl = $imagefield['sizes'][ $size ];
		}
		return $thumburl ;
	}else{
		return '';
	}
}

function getLinkUrl($link,$clas='',$icon=''){
	if($link){
		if($clas!='')
		{
			$clas =' class="'.$clas.'"';
		}
		if($icon!='')
		{
			$icon ='<img src="'.$icon.'" alt="img"/>';
		}
		if( $link ):
			$link_url = $link['url'];
			$link_target = $link['target'] ? $link['target'] : '_self';
			$link_title = html_entity_decode($link['title'], ENT_QUOTES, 'UTF-8');
			$link = '<a href="'.esc_url( $link_url ).'" '.$clas.' target="'.esc_attr( $link_target ).'">'.esc_html( $link_title ).' '.$icon.'</a>';
		endif;
		return $link;
	}else{
		return '';
	}
}

function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
      $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);


/**
 * Disable responsive image support (test!)
 */

// Clean the up the image from wp_get_attachment_image()
add_filter( 'wp_get_attachment_image_attributes', function( $attr )
{
    if( isset( $attr['sizes'] ) )
        unset( $attr['sizes'] );

    if( isset( $attr['srcset'] ) )
        unset( $attr['srcset'] );

    return $attr;

 }, PHP_INT_MAX );

// Override the calculated image sizes
add_filter( 'wp_calculate_image_sizes', '__return_empty_array',  PHP_INT_MAX );

// Override the calculated image sources
add_filter( 'wp_calculate_image_srcset', '__return_empty_array', PHP_INT_MAX );

// Remove the reponsive stuff from the content
remove_filter( 'the_content', 'wp_make_content_images_responsive' );

add_filter( 'gform_confirmation_anchor', '__return_false' );


function my_excerpt_length($length){ 
	return 100; 
} 
add_filter('excerpt_length', 'my_excerpt_length');


function new_excerpt_more( $more ) {
    return '';
}
add_filter('excerpt_more', 'new_excerpt_more');

function search_numeric_posts_nav($max_num_pages) {
    global $wp_query;
	
    /** Stop execution if there's only 1 page */
    if( $max_num_pages <= 1 )
        return;
  
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	
    $max   = $max_num_pages; //intval( $wp_query->max_num_pages );
  
    /** Add current page to the array */
    if ( $paged >= 1 )
        $links[] = $paged;
  
    /** Add the pages around the current page to the array */
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
  
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }
  
    echo '<div><ul class="page_numbers">' . "\n";
  
    
    /** Link to first page, plus ellipses if necessary */
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : '';
  
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
  
        if ( ! in_array( 2, $links ) )
            echo '<li>…</li>';
    }
  
    /** Link to current page, plus 2 pages in either direction if necessary */
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
  
    /** Link to last page, plus ellipses if necessary */
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
            echo '<li>…</li>' . "\n";
  
        $class = $paged == $max ? ' class="active"' : '';
        printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
    }
  
    /** Previous Post Link */
	if($paged>1){
		echo '<div class="but prev"><a href="'.esc_url( get_pagenum_link( $paged-1 )).'"><img src="' . home_url('/wp-content/uploads/2024/02/right-arrow-blue.svg') . '"></a>  </div>';
	}
	
	/** Next Post Link */
	if($paged<$max){
		echo '<div class="but next"><a href="'.esc_url( get_pagenum_link( $paged+1 )).'"><img src="' . home_url('/wp-content/uploads/2024/02/right-arrow-blue.svg') . '"></a>  </div>';
	}

    echo '</ul></div>' . "\n";
  
}

//-------------------------------------------------------------------
function truncateHtml($text, $length) {
    // Remove any existing HTML tags to avoid incomplete tags after truncation
    $text = strip_tags($text);

    // Truncate to the desired length
    $shortenedText = mb_substr($text, 0, $length);

    // Check if the text was truncated
    if (mb_strlen($text) > $length) {
        // Add ellipsis at the end
        $shortenedText .= '...';
    }

    return $shortenedText;
}


//-------------------------------------------------------------------
function RecentPost5(){
	$postQuery=new WP_Query(['post_type'=>'post', 'posts_per_page'=>5]);
	while($postQuery->have_posts()):$postQuery->the_post() ?>
		<article class="global__font">
			<h4><a href="<?=get_the_permalink()?>"><?=truncateHtml(get_the_title(), 30)?></a></h4>
			<div class="description_para">
				<p>
					<a href="<?php echo esc_url( get_day_link(get_the_time( 'Y' ), get_the_time( 'm' ),get_the_time( 'd' ) ) ); ?>"><?=get_the_date();?></a>
					<?php echo do_shortcode('[rt_reading_time]'); ?> <span>min read</span>
				</p>
			</div>
			<p><?=truncateHtml(get_the_content(), 120)?></p>
			<div class="read_more">
				<a href="<?=get_the_permalink()?>">Read more <img src="<?=site_url()?>/wp-content/themes/twenty-20-financial-group/assets/images/arrow_black.svg" alt="img"></a>
			</div>
		</article>
	<?php endwhile; wp_reset_postdata(); 
}
add_shortcode('RecentPost', 'RecentPost5');