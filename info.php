<?php

// WordPress Emoji Delete
remove_action( 'admin_print_scripts' , 'print_emoji_detection_script');
remove_action( 'admin_print_styles' , 'print_emoji_styles');
remove_action( 'wp_head' , 'print_emoji_detection_script', 7);
remove_action( 'wp_print_styles' , 'print_emoji_styles');
remove_filter( 'the_content_feed' , 'wp_staticize_emoji');
remove_filter( 'comment_text_rss' , 'wp_staticize_emoji');
remove_filter( 'wp_mail' , 'wp_staticize_emoji_for_email');
add_filter( 'emoji_svg_url', create_function( '', 'return false;' ) );//禁用emoji预解析

//移除顶部多余信息
remove_action( 'wp_head', 'wp_enqueue_scripts', 1 ); //Javascript的调用
remove_action( 'wp_head', 'feed_links', 2 ); //移除feed
remove_action( 'wp_head', 'feed_links_extra', 3 ); //移除feed
remove_action( 'wp_head', 'rsd_link' ); //移除离线编辑器开放接口
remove_action( 'wp_head', 'wlwmanifest_link' );  //移除离线编辑器开放接口
remove_action( 'wp_head', 'index_rel_link' );//去除本页唯一链接信息
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );//清除前后文信息
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );//清除前后文信息
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head');
remove_action( 'wp_head', 'locale_stylesheet' );
remove_action( 'wp_head', 'noindex', 1 );
remove_action( 'wp_head', 'wp_print_styles', 8 );//载入css
remove_action( 'wp_head', 'wp_print_head_scripts', 9 );
remove_action( 'wp_head', 'wp_generator' ); //移除WordPress版本
remove_action( 'wp_head', 'rel_canonical' );
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10, 0 );
remove_action( 'wp_footer', 'wp_print_footer_scripts' );
remove_action( 'publish_future_post','check_and_publish_future_post',10, 1 );
remove_action( 'template_redirect', 'wp_shortlink_header', 11, 0 );
//禁用REST API功能代码
add_filter('rest_enabled', '__return_false');
add_filter('rest_jsonp_enabled', '__return_false');
//移除wp-json链接的代码
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
add_action('widgets_init', 'my_remove_recent_comments_style');

remove_filter('the_content', 'wptexturize');//禁用半角符号自动转换为全角

add_action('get_header', 'remove_admin_login_header');
function remove_admin_login_header() {
    remove_action('wp_head', '_admin_bar_bump_cb');
}

function my_remove_recent_comments_style() {
global $wp_widget_factory;
remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'] ,'recent_comments_style'));
}

// 去除多余选择器
function uazoh_css_attributes_filter($var) {
return is_array($var) ? array() : '';
}
add_filter('nav_menu_menu_id', 'uazoh_css_attributes_filter', 100, 1);
add_filter('nav_menu_css_class', 'uazoh_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id', 'uazoh_css_attributes_filter', 100, 1);
add_filter('page_css_class', 'uazoh_css_attributes_filter', 100, 1);

//禁止加载WP自带的jquery.js
if ( !is_admin() ) { // 后台不禁止
function my_init_method() {
wp_deregister_script( 'jquery' ); // 取消原有的 jquery 定义
}
add_action('init', 'my_init_method');
}
wp_deregister_script( 'l10n' );

 ?>
