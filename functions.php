<?php

add_image_size('home', 1920, 600, true);
add_image_size('full_img', 1440, 600, true);
add_image_size('full_portrait', 600, 1500, true);
add_image_size('xl', 700, 400, true);

add_theme_support('post-thumbnails');

function flexupdate_scripts()
{
	// Scripts
	wp_enqueue_script('jquery', get_template_directory_uri() . '/bootstrap/js/jquery.min.js', array(), '1.0.0', true);
	wp_enqueue_script('bootjs', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js', array(), '1.0.0', true);
	wp_enqueue_script('slickslider', get_template_directory_uri() . '/js/slick.min.js', array(), '1.0.0', true);
	wp_enqueue_script('share', get_template_directory_uri() . '/js/jquery.c-share.js', array(), '1.0.0', true);
	wp_enqueue_script('niceselect', get_template_directory_uri() . '/js/jquery.nice-select.min.js', array(), '1.0.0', false);

	// Scrollmagic
	wp_enqueue_script('TweenMax', get_template_directory_uri() . '/js/TweenMax.min.js', array(), '1.0.0', true);
	wp_enqueue_script('ScrollMagic', get_template_directory_uri() . '/js/ScrollMagic.min.js', array(), '1.0.0', true);
	wp_enqueue_script('AnimationGsap', get_template_directory_uri() . '/js/animation.gsap.min.js', array(), '1.0.0', true);
	// wp_enqueue_script('addIndicators', get_template_directory_uri() . '/js/debug.addIndicators.min.js', array(), '1.0.0', true);

	// Custom
	wp_enqueue_script('scripts', get_template_directory_uri() . '/js/custom.js', array(), '1.0.0', true);

	// CSS
	wp_enqueue_style('bootcss', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style('niceselectcss', get_template_directory_uri() . '/css/nice-select.css');
	wp_enqueue_style('style', get_template_directory_uri() . '/style.css');
	wp_enqueue_style('fa', 'https://use.fontawesome.com/releases/v5.7.2/css/all.css');
}
add_action('wp_enqueue_scripts', 'flexupdate_scripts');


add_filter('script_loader_tag', 'clean_script_tag');
function clean_script_tag($input)
{
	$input = str_replace("type='text/javascript' ", '', $input);
	return str_replace("'", '"', $input);
}
add_filter('sensei_start_course_form', 'MyCustomfilter', $priority = 10, $args = 1);

// Add option page

acf_add_options_page(array(

	'page_title' 	=> 'Website informatie',
	'menu_title' 	=> 'Logo & Opties',
	'menu_slug' 	=> 'website-informatie',
	'capability' 	=> 'edit_posts',
	'icon_url' => 'dashicons-universal-access-alt',
	'position' => 3

));



if (!function_exists('get_archive_link')) {
	function get_archive_link($post_type)
	{
		global $wp_post_types;
		$archive_link = false;
		if (isset($wp_post_types[$post_type])) {
			$wp_post_type = $wp_post_types[$post_type];
			if ($wp_post_type->publicly_queryable)
				if ($wp_post_type->has_archive && $wp_post_type->has_archive !== true)
					$slug = $wp_post_type->has_archive;
				else if (isset($wp_post_type->rewrite['slug']))
					$slug = $wp_post_type->rewrite['slug'];
				else
					$slug = $post_type;
			$archive_link = get_option('siteurl') . "/{$slug}/";
		}
		return apply_filters('archive_link', $archive_link, $post_type);
	}
}

function register_my_menus()
{
	register_nav_menus(
		array(
			'main_menu' => __('Hoofd Menu'),
			'mega_menu' => __('Mega Menu'),
			'mobile_menu' => __('Mobiele Menu'),
			'socket_menu' => __('Socket Menu')
		)
	);
}
add_action('init', 'register_my_menus');


function arphabet_widgets_init()
{

	register_sidebar(array(
		'name'          => 'Footer een',
		'id'            => 'footer_1',
		'before_widget' => '<div class="widget-block">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	));

	register_sidebar(array(
		'name'          => 'Footer twee',
		'id'            => 'footer_2',
		'before_widget' => '<div class="widget-block">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	));

	register_sidebar(array(
		'name'          => 'Footer drie',
		'id'            => 'footer_3',
		'before_widget' => '<div class="widget-block">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>'
	));
}

add_action('widgets_init', 'arphabet_widgets_init');

function new_excerpt_more($more)
{
	return ' ...';
}
add_filter('excerpt_more', 'new_excerpt_more');

function excerpt($limit)
{
	$excerpt = explode(' ', get_the_excerpt(), $limit);

	if (count($excerpt) >= $limit) {
		array_pop($excerpt);
		$excerpt = implode(" ", $excerpt) . '...';
	} else {
		$excerpt = implode(" ", $excerpt);
	}

	$excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

	return $excerpt;
}

function content($limit)
{
	$content = explode(' ', get_the_content(), $limit);

	if (count($content) >= $limit) {
		array_pop($content);
		$content = implode(" ", $content) . '...';
	} else {
		$content = implode(" ", $content);
	}

	$content = preg_replace('/\[.+\]/', '', $content);
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);

	return $content;
}



function my_acf_init()
{

	acf_update_setting('google_api_key', 'AIzaSyBwjs5yVQERqyM-MUa52sJa1a7jeBHiEes');
}

add_action('acf/init', 'my_acf_init');




// Option pages for archive + auto fields (titel, intro)
function option_page_posttypes()
{
	$args  = array('public'   => true, '_builtin' => false);
	$excluded_post_types = array('');
	$custom_post_types = get_post_types($args);
	foreach ($custom_post_types as $custom_post_type) {
		if (in_array($custom_post_type, $excluded_post_types)) { } else {
			if (function_exists('acf_add_options_page')) {

				$formated_string = str_replace('_', " ", $custom_post_type);

				acf_add_options_sub_page(array(
					'page_title'     => 'Archive options ' . $formated_string . '',
					'menu_title'    => 'Archive options ' . $formated_string . '',
					'parent_slug'    => 'edit.php?post_type=' . $custom_post_type . '',
				));

				$prefix = str_replace("_", "-", $custom_post_type);
				$acf_pre = 'acf-options-archive-options-';
				$compiled_acf = $acf_pre .= $prefix;

				acf_add_local_field_group(array(
					'key' => 'archive_options_' . $custom_post_type . '',
					'title' => 'Archive options ' . $formated_string . '',
					'fields' => array(
						array(
							'key' => '' . $custom_post_type . '_archive_title',
							'label' => 'Archief titel',
							'name' => '' . $custom_post_type . '_archive_title',
							'type' => 'wysiwyg',
							'prefix' => '',
							'instructions' => 'Voor de programmeur, dit veld is te plaatsen met the_field("' . $custom_post_type . '_archive_title", "option")',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '50',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
							'readonly' => 0,
							'disabled' => 0,
						),
						array(
							'key' => '' . $custom_post_type . '_archive_intro',
							'label' => 'Archief intro',
							'name' => '' . $custom_post_type . '_archive_intro',
							'type' => 'wysiwyg',
							'prefix' => '',
							'instructions' => 'Voor de programmeur, dit veld is te plaatsen met the_field("' . $custom_post_type . '_archive_intro", "option")',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '50',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
							'readonly' => 0,
							'disabled' => 0,
						),
						array(
							'key' => '' . $custom_post_type . '_archive_btn',
							'label' => 'Call to action header',
							'name' => '' . $custom_post_type . '_archive_btn',
							'type' => 'link',
							'prefix' => '',
							'instructions' => 'Voor de programmeur, dit veld is te plaatsen met the_field("' . $custom_post_type . '_archive_intro", "option")',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '50',
								'class' => '',
								'id' => '',
							),
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
							'readonly' => 0,
							'disabled' => 0,
						),
						array(
							'key' => '' . $custom_post_type . '_archive_kleur',
							'label' => 'Pagina kleur',
							'name' => '' . $custom_post_type . '_archive_kleur',
							'type' => 'select',
							'prefix' => '',
							'instructions' => 'Voor de programmeur, dit veld is te plaatsen met the_field("' . $custom_post_type . '_archive_kleur", "option")',
							'required' => 0,
							'conditional_logic' => 0,
							'wrapper' => array(
								'width' => '50',
								'class' => '',
								'id' => '',
							),
							'choices' => array(
								'rose'	=> 'Roze',
								'green'	=> 'Groen',
								'yellow'	=> 'Geel',
							),
							'allow_null' => 1,
							'default_value' => '',
							'placeholder' => '',
							'prepend' => '',
							'append' => '',
							'maxlength' => '',
							'readonly' => 0,
							'disabled' => 0,
						),
					),
					'location' => array(
						array(
							array(
								'param' => 'options_page',
								'operator' => '==',
								'value' => $compiled_acf,
							),
						),
					),
					'menu_order' => 0,
					'position' => 'normal',
					'style' => 'default',
					'label_placement' => 'top',
					'instruction_placement' => 'label',
					'hide_on_screen' => '',
				));
			}
		}
	}
}
add_action('init', 'option_page_posttypes');




if (!function_exists('pietergoosen_pagination')) :

	function pietergoosen_pagination($pages = '', $range = 2)
	{
		$showitems = ($range * 2) + 1;

		global $paged;
		if (empty($paged)) $paged = 1;

		if ($pages == '') {
			global $wp_query;
			$pages = $wp_query->max_num_pages;
			if (!$pages) {
				$pages = 1;
			}
		}

		if (1 != $pages) {
			$string = _x('Page %1$s of %2$s', '%1$s = current page, %2$s = all pages', 'pietergoosen');
			echo "<div class='pagination'><span>" . sprintf($string, $paged, $pages) . "</span>";
			if ($paged > 2 && $paged > $range + 1 && $showitems < $pages) echo "<a href='" . get_pagenum_link(1) . "'>" . __('&laquo; First', 'pietergoosen') . "</a>";
			if ($paged > 1 && $showitems < $pages) echo "<a href='" . get_pagenum_link($paged - 1) . "'>" . __('&lsaquo; Previous', 'pietergoosen') . "</a>";

			for ($i = 1; $i <= $pages; $i++) {
				if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems)) {
					echo ($paged == $i) ? "<span class=\"current\">" . $i . "</span>" : "<a href='" . get_pagenum_link($i) . "' class=\"inactive\">" . $i . "</a>";
				}
			}

			if ($paged < $pages && $showitems < $pages) echo "<a href='" . get_pagenum_link($paged + 1) . "'>" . __('Next &rsaquo;', 'pietergoosen') . "</a>";
			if ($paged < $pages - 1 &&  $paged + $range - 1 < $pages && $showitems < $pages) echo "<a href='" . get_pagenum_link($pages) . "'>" . __('Last &raquo;', 'pietergoosen') . "</a>";
			echo "</div>\n";
		}
	} //  pietergoosen_pagination

endif;




function sitemap()
{
	$sitemap = '';
	$sitemap .= '<h4>Articles </h4>';
	$sitemap .= '<ul class="sitemapul">';
	$posts_array = get_posts();
	foreach ($posts_array as $spost) :
		$sitemap .= '<div class="blockArticle">
            <h3><a href="' . $spost->guid . '" rel="bookmark" class="linktag">' . $spost->post_title . '</a> </h3>
        </div>';
	endforeach;
	$sitemap .= '</ul>';
	$sitemap .= '<h4>Category</h4>';
	$sitemap .= '<ul class="sitemapul">';
	$args = array(
		'offset' => 0,
		'category' => '',
		'category_name' => '',
		'orderby' => 'date',
		'order' => 'DESC',
		'include' => '',
		'exclude' => '',
		'meta_key' => '',
		'meta_value' => '',
		'post_type' => 'post',
		'post_mime_type' => '',
		'post_parent' => '',
		'author' => '',
		'post_status' => 'publish',
		'suppress_filters' => true
	);
	$cats = get_categories($args);
	foreach ($cats as $cat) :
		$sitemap .= '<li class="pages-list"><a href="' . get_category_link($cat->term_id) . '">' . $cat->cat_name . '</a></li>';
	endforeach;
	$sitemap .= '</ul>';
	$pages_args = array(
		'exclude' => '', /* ID of pages to be excluded, separated by comma */
		'post_type' => 'page',
		'post_status' => 'publish'
	);
	$sitemap .= '<h3>Pages</h3>';
	$sitemap .= '<ul>';
	$pages = get_pages($pages_args);
	foreach ($pages as $page) :
		$sitemap .= '<li class="pages-list"><a href="' . get_page_link($page->ID) . '" rel="bookmark">' . $page->post_title . '</a></li>';
	endforeach;
	$sitemap .= '</ul>';
	$sitemap .= '<h4>Tags</h4>';
	$sitemap .= '<ul class="sitemapul">';
	$tags = get_tags();
	foreach ($tags as $tag) {
		$tag_link = get_tag_link($tag->term_id);
		$sitemap .= "<li class='pages-list'><a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
		$sitemap .= $tag->name . '</a></li>';
	}
	return $sitemap;
}
add_shortcode('sitemap', 'sitemap');
/****************************************************
 * XML Sitemap in WordPress
 *****************************************************/
function xml_sitemap()
{
	$postsForSitemap = get_posts(array(
		'numberposts' => -1,
		'orderby' => 'modified',
		'post_type'  => array('post', 'page'),
		'order'    => 'DESC'
	));
	$sitemap = '<?xml version="1.0" encoding="UTF-8"?>';
	$sitemap .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
	foreach ($postsForSitemap as $post) {
		setup_postdata($post);
		$postdate = explode(" ", $post->post_modified);
		$sitemap .= '<url>' .
			'<loc>' . get_permalink($post->ID) . '</loc>' .
			'<lastmod>' . $postdate[0] . '</lastmod>' .
			'<changefreq>monthly</changefreq>' .
			'</url>';
	}
	$sitemap .= '</urlset>';
	$fp = fopen(ABSPATH . "sitemap.xml", 'w');
	fwrite($fp, $sitemap);
	fclose($fp);
}
add_action("publish_post", "xml_sitemap");
add_action("publish_page", "xml_sitemap");

// Disable emoji

/**
 * Disable the emoji's
 */
function disable_emojis()
{
	remove_action('wp_head', 'print_emoji_detection_script', 7);
	remove_action('admin_print_scripts', 'print_emoji_detection_script');
	remove_action('wp_print_styles', 'print_emoji_styles');
	remove_action('admin_print_styles', 'print_emoji_styles');
	remove_filter('the_content_feed', 'wp_staticize_emoji');
	remove_filter('comment_text_rss', 'wp_staticize_emoji');
	remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
	add_filter('tiny_mce_plugins', 'disable_emojis_tinymce');
	add_filter('wp_resource_hints', 'disable_emojis_remove_dns_prefetch', 10, 2);
}
add_action('init', 'disable_emojis');

/**
 * Filter function used to remove the tinymce emoji plugin.
 * 
 * @param array $plugins 
 * @return array Difference betwen the two arrays
 */
function disable_emojis_tinymce($plugins)
{
	if (is_array($plugins)) {
		return array_diff($plugins, array('wpemoji'));
	} else {
		return array();
	}
}

/**
 * Remove emoji CDN hostname from DNS prefetching hints.
 *
 * @param array $urls URLs to print for resource hints.
 * @param string $relation_type The relation type the URLs are printed for.
 * @return array Difference betwen the two arrays.
 */
function disable_emojis_remove_dns_prefetch($urls, $relation_type)
{
	if ('dns-prefetch' == $relation_type) {
		/** This filter is documented in wp-includes/formatting.php */
		$emoji_svg_url = apply_filters('emoji_svg_url', 'https://s.w.org/images/core/emoji/2/svg/');

		$urls = array_diff($urls, array($emoji_svg_url));
	}

	return $urls;
}


//  Remove slug post types

add_filter(
	'post_type_link',
	'custom_post_type_link',
	10,
	3
);

function custom_post_type_link($permalink, $post, $leavename)
{
	if (!gettype($post) == 'post') {
		return $permalink;
	}
	switch ($post->post_type) {
		case 'diensten':
			$permalink = get_home_url() . '/' . $post->post_name . '/';
			break;
	}

	switch ($post->post_type) {
		case 'tools':
			$permalink = get_home_url() . '/' . $post->post_name . '/';
			break;
	}

	return $permalink;
}


add_action(
	'pre_get_posts',
	'custom_pre_get_posts'
);

function custom_pre_get_posts($query)
{
	global $wpdb;

	if (!$query->is_main_query()) {
		return;
	}

	$post_name = $query->get('name');

	$post_type = $wpdb->get_var(
		$wpdb->prepare(
			'SELECT post_type FROM ' . $wpdb->posts . ' WHERE post_name = %s LIMIT 1',
			$post_name
		)
	);

	switch ($post_type) {
		case 'diensten':
			$query->set('diensten', $post_name);
			$query->set('post_type', $post_type);
			$query->is_single = true;
			$query->is_page = false;
			break;
	}

	switch ($post_type) {
		case 'tools':
			$query->set('tools', $post_name);
			$query->set('post_type', $post_type);
			$query->is_single = true;
			$query->is_page = false;
			break;
	}

	return $query;
}



add_filter('manage_regios_posts_columns', 'set_custom_edit_regios_columns');
function set_custom_edit_regios_columns($columns)
{
	$columns['regio'] = __('Regio', 'leerbouwen');
	return $columns;
}

add_action('manage_regios_posts_custom_column', 'custom_regios_column', 10, 2);
function custom_regios_column($column, $post_id)
{
	switch ($column) {
		case 'regio':
			$term_list = wp_get_post_terms($post_id, 'regio', array('fields' => 'all'));
			echo $term_list[0]->name;
	}
}