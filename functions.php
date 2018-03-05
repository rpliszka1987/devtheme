<?php

function vendor_stylesheets() {
    wp_enqueue_style( 'bootstrap',  '//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css', array(), null, 'all' );
    
}
add_action( 'wp_enqueue_scripts', 'vendor_stylesheets' );


function mychildtheme_enqueue_styles() {
    $parent_style = 'twentyseventeen';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
}
add_action( 'wp_enqueue_scripts', 'mychildtheme_enqueue_styles' );

	wp_enqueue_script('threejs','https://cdnjs.cloudflare.com/ajax/libs/three.js/r71/three.min.js',false,'1.1',false);
	wp_enqueue_script('main', get_stylesheet_directory_uri() . '/main.js',false,'1.1',"all");

function team_meta_box( $meta_boxes ) {
	$prefix = 'team_';

	$meta_boxes[] = array(
		'id' => 'team-info',
		'title' => esc_html__( 'Team Member Data', 'team-member-info' ),
		'post_types' => array( 'team' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => false,
		'fields' => array(
			array(
				'id' => $prefix . 'email',
				'type' => 'text',
				'name' => esc_html__( 'Email Address', 'team-member-info' ),
				'desc' => esc_html__( '', 'team-member-info' ),
				'placeholder' => esc_html__( '', 'team-member-info' ),
				'size' => 15,
			),
			array(
				'id' => $prefix . 'phone',
				'type' => 'text',
				'name' => esc_html__( 'Phone Number', 'team-member-info' ),
				'desc' => esc_html__( ' ', 'team-member-info' ),
				'placeholder' => esc_html__( '', 'team-member-info' ),
				'size' => 15,
			),
			array(
				'id' => $prefix . 'twitter',
				'type' => 'text',
				'name' => esc_html__( 'Twitter', 'team-member-info' ),
				'desc' => esc_html__( 'Twitter Handle (sans @)', 'team-member-info' ),
				'placeholder' => esc_html__( '@twitterhandle', 'team-member-info' ),
				'size' => 15,
			),
			array(
				'id' => $prefix . 'facebook',
				'type' => 'text',
				'name' => esc_html__( 'Facebook Page name', 'team-member-info' ),
				'desc' => esc_html__( 'Facebook Slug (sans url) ', 'team-member-info' ),
				'placeholder' => esc_html__( 'name only after facebook.com/____', 'team-member-info' ),
				'size' => 15,
			),
			array(
				'id' => $prefix . 'instagram',
				'type' => 'text',
				'name' => esc_html__( 'Facebook Page', 'team-member-info' ),
				'desc' => esc_html__( 'http://facebook.com/ ', 'team-member-info' ),
				'placeholder' => esc_html__( 'Full I URL', 'team-member-info' ),
				'size' => 15,
			),
			array(
				'id' => $prefix . 'linkedin',
				'type' => 'text',
				'name' => esc_html__( 'Linked-In', 'team-member-info' ),
				'desc' => esc_html__( 'Linked In Slug (sans url)', 'team-member-info' ),
				'placeholder' => esc_html__( 'name only (after /in/', 'team-member-info' ),
				'size' => 15,
			),
			
			
			array(
				'id' => $prefix . 'youtube',
				'type' => 'text',
				'name' => esc_html__( 'YouTube', 'team-member-info' ),
				'desc' => esc_html__( 'YouTube Channel URL', 'team-member-info' ),
				'placeholder' => esc_html__( 'http://youtube/', 'team-member-info' ),
				'size' => 15,
			),
			array(
				'id' => $prefix . 'vimeo',
				'type' => 'text',
				'name' => esc_html__( 'Vimeo', 'team-member-info' ),
				'desc' => esc_html__( 'Vimeo URL', 'team-member-info' ),
				'placeholder' => esc_html__( '', 'team-member-info' ),
				'size' => 15,
			)
		),
	);

	return $meta_boxes;
}
add_filter( 'rwmb_meta_boxes', 'team_meta_box' );

function social_meta_box( $meta_boxes ) {
	$prefix = 'social_';

	$meta_boxes[] = array(
		'id' => 'social-info',
		'title' => esc_html__( 'Social Media', 'social-member-info' ),
		'post_types' => array( 'social' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => false,
		'fields' => array(
			array(
				'id' => $prefix . 'url',
				'type' => 'text',
				'name' => esc_html__( 'Social URL', 'social-member-info' ),
				'desc' => esc_html__( 'Enter Full URL', 'social-member-info' ),
				'placeholder' => esc_html__( 'Social Network URL', 'social-member-info' ),
				'size' => 30,
			),array(
				'id' => $prefix . 'greeting',
				'type' => 'text',
				'name' => esc_html__( 'Greeting Text', 'social-member-info' ),
				'desc' => esc_html__( 'Seen on Hover.', 'social-member-info' ),
				'placeholder' => esc_html__( 'like us, follow us...', 'social-member-info' ),
				'size' => 30,
			)
			
		),
	);

	return $meta_boxes;
}


add_filter( 'rwmb_meta_boxes', 'social_meta_box' );


function video_meta_box( $meta_boxes ) {
	$prefix = 'video_';

	$meta_boxes[] = array(
		'id' => 'video-info',
		'title' => esc_html__( 'Video', 'video-info' ),
		'post_types' => array( 'video' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => false,
		'fields' => array(
			
			array(
				'id' => $prefix . 'platform',
				'name' => esc_html__( 'Video Platform', 'metabox-online-generator' ),
				'type' => 'select_advanced',
				'placeholder' => esc_html__( 'Select Platform', 'metabox-online-generator' ),
				'options' => array(
					'vimeo' => 'Vimeo',
					'youtube' => 'YouTube',
				),
			),
			array(
				'id' => $prefix . 'id',
				'type' => 'text',
				'name' => esc_html__( 'Video ID', 'video-info' ),
				'desc' => esc_html__( '(code only, no url)', 'video-info' ),
				'placeholder' => esc_html__( '', 'video-info' ),
				'size' => 15,
			)



		),
	);

	return $meta_boxes;
}

add_filter( 'rwmb_meta_boxes', 'video_meta_box' );

function featured_video_meta_box( $meta_boxes ) {
	$prefix = 'video_';
		global $wpdb;
		$sql = "select ID, post_title from wp_posts where post_type = 'video' and post_status = 'publish' order by post_title";
		$video_list = $wpdb->get_results($sql);
		$video_array = array();
			foreach($video_list as $key => $value){
				$platform = get_post_meta($value->ID,"video_platform",true);
					$video_array[$value->ID] =  $value->post_title . " (" .ucfirst($platform) .")";
			}


	$meta_boxes[] = array(
		'id' => 'video-info',
		'title' => esc_html__( 'Video', 'video-info' ),
		'post_types' => array( 'post', 'page' ),
		'context' => 'advanced',
		'priority' => 'default',
		'autosave' => false,
		'fields' => array(
			
			array(
				'id' => $prefix . 'featured',
				'name' => esc_html__( 'Select Video', 'metabox-online-generator' ),
				'type' => 'select_advanced',
				'placeholder' => esc_html__( 'Video List', 'video-info' ),
				'options' => $video_array,
			),
			array(
				'id' => $prefix . 'display_title',
				'type' => 'text',
				'name' => esc_html__( 'Display Title', 'video-info' ),
				'desc' => esc_html__( '(optional override to title)', 'video-info' ),
				'placeholder' => esc_html__( '', 'video-info' ),
				'size' => 30,
			)



		),
	);

	return $meta_boxes;
}



add_filter( 'rwmb_meta_boxes', 'featured_video_meta_box' );





function getThumbnail($id, $size="thumbnail"){
		global $post;
		global $wpdb;
	
		$img = wp_get_attachment_image_src( get_post_thumbnail_id( $id ),$size);

		if($img[0] !=""){
		
			return $img[0];	
		}	
}

function displayVideo($id,$title=""){
	ob_start();

		$video_id = get_post_meta($id,"video_id",true);
		$video_platform = get_post_meta($id,"video_platform",true);

			if($video_platform == 'vimeo'){
				$video_url = 'https://player.vimeo.com/video/'.$video_id;
			} else if ($video_platform == 'youtube'){
				 $video_url = 'https://www.youtube.com/embed/'.$video_id."?rel=0";
			}


		?>
<div class="video-wrapper"><iframe src="<?=$video_url?>" allowfullscreen="allowfullscreen"></iframe></div>


		<?php



	return ob_get_clean();
}


function getSocialIcons(){
		
		global $wpdb;
		$sql = "select ID, post_title from wp_posts where post_type = 'social' and post_status = 'publish'";
		$social_data = $wpdb->get_results($sql);


		ob_start();
		?>
		<div class="social-icons" id="social-menu">
			<ul>
		<?php
		if(count($social_data)){

			foreach($social_data as $key => $value ){
				$icon = getThumbnail($value->ID);
				$social_url = get_post_meta($value->ID,"social_url",true);
				$greeting= get_post_meta($value->ID,"social_greeting",true);
				?>
					<li><a href="<?=$social_url?>" target="_blank"><img class="style-svg" src="<?=$icon?>" alt="<?=$value->post_title?> icon"></a></li>

				<?php


			}
		}
		print "</ul>
		</div>";

		return ob_get_clean();	
}


function countdown(){
	$today_start = strtotime('today');
	$year=date("Y",$today_start);
	$month=date("n",$today_start);
	$day=date("j",$today_start);
	$days = ceil((strtotime("4/15/".$year) - time())/(60*60*24));

	if($days<0){
		$year++;
		$days = ceil((strtotime("4/15/".$year) - time())/(60*60*24));
	}



	
    
// Hours (in the last hour will be zero)

	
	return $days;

}
?>