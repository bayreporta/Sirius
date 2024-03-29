<?php

/* #1: Include core theme files and directories
---------------------------------------------------------------------------*/
define('PARENT_PATH', get_template_directory_uri());
define('MODULE_PATH', PARENT_PATH . '/modules');
define('TEMPLATE_PATH', PARENT_PATH . '/templates');

foreach(glob(MODULE_PATH.'/*.php') as $filename) {require_once($filename);}


/* #2: Include core script files
---------------------------------------------------------------------------*/
add_action( 'wp_enqueue_scripts', 'sirius_load_scripts' );
function sirius_load_scripts()
{
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'tiny_mce' );
}

/* #3: Initialize the parent theme
---------------------------------------------------------------------------*/
add_action( 'after_setup_theme', 'sirius_setup' );
function sirius_setup(){
	sirius_theme_support();
	sirius_custom_header_setup();
	sirius_nav_menus();	
}

function sirius_theme_support(){
	add_theme_support( 'title-tag' );
	add_theme_support( 'html5' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
}

function sirius_custom_header_setup() {
    $header_info = array(
        'default-image'      => get_template_directory_uri() . '/images/oakland.png',
        'width'              => 660,
        'height'             => 388,
        'flex-width'         => true,
        'flex-height'        => true
    );
    add_theme_support( 'custom-header', $header_info );
	 
	$header_images = array(
	    'oakland' => array(
	            'url'           => get_template_directory_uri() . '/images/oakland.png',
	            'thumbnail_url' => get_template_directory_uri() . '/images/oakland.png',
	            'description'   => 'Oakland'
	    )	     
	);
	register_default_headers( $header_images );
}


function sirius_nav_menus(){
	register_nav_menus(
		array( 'main-menu' => __( 'Main Menu', 'sirius' ) )
	);
}

/* #4: Comment-related functions
---------------------------------------------------------------------------*/
add_action( 'comment_form_before', 'sirius_enqueue_comment_reply_script' );
function sirius_enqueue_comment_reply_script(){
	if ( get_option( 'thread_comments' ) && comments_open() ) { wp_enqueue_script( 'comment-reply' ); }
}

function sirius_custom_pings( $comment ){
	$GLOBALS['comment'] = $comment;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
	<?php 
}

add_filter( 'get_comments_number', 'sirius_comments_number' );
function sirius_comments_number( $count ){
	if ( !is_admin() ) {
		global $id;
		$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
		return count( $comments_by_type['comment'] );
	} 
	else {
		return $count;
	}
}

/* #5: Populate videos for the home page
---------------------------------------------------------------------------*/
function owc_populate_videos(&$data){
	$ret = '';

	$size = sizeof($data);
	for ($i = 0 ; $i < $size ; $i++){
		$ret .= '<div class="video-thumb-container">';
			$ret .= '<div class="video-thumb" title="'. $data[$i]['video_title'] .'" data-embed="'. $data[$i]['embed_code'] .'">';
				$ret .= '<div class="play-button"></div>';
			$ret .= '</div>';
		$ret .= '</div>';
	}
	unset($data);
	return $ret;
}
