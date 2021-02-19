<?php
// File Security Check
if ( ! defined( 'ABSPATH' ) ) { exit; }
require get_template_directory() . '/inc/theme-setup.php';
// 自定义代码加到此行下面

//移除不必要的信息，如WordPress版本
remove_action('wp_head', 'feed_links', 2);  //移除feed
remove_action('wp_head', 'feed_links_extra', 3);  //移除feed
remove_action('wp_head', 'rest_output_link_wp_head', 10); 
remove_action('wp_head', 'rsd_link');  //移除离线编辑器开放接口
remove_action('wp_head', 'wlwmanifest_link');  //移除离线编辑器开放接口
remove_action('wp_head', 'index_rel_link');  //去除本页唯一链接信息
remove_action('wp_head', 'parent_post_rel_link', 10, 0);  //清除前后文信息
remove_action('wp_head', 'start_post_rel_link', 10, 0);  //清除前后文信息
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'locale_stylesheet');
remove_action('publish_future_post','check_and_publish_future_post',10, 1);
remove_action('wp_head', 'noindex', 1);
remove_action('wp_head', 'wp_print_styles', 8);  //载入css
remove_action('wp_head', 'wp_print_head_scripts', 9);
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_head', 'wp_generator');  //移除WordPress版本
remove_action('wp_head', 'rel_canonical');
remove_action('wp_footer', 'wp_print_footer_scripts');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);
remove_action('template_redirect', 'wp_shortlink_header', 11, 0);
add_action('widgets_init', 'my_remove_recent_comments_style');
function my_remove_recent_comments_style() {
    global $wp_widget_factory;
    remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'] ,'recent_comments_style'));
}

//评论框禁止HTML
add_filter('pre_comment_content', 'wp_specialchars');


//停用链接猜测
add_filter('redirect_canonical', 'stop_guessing');
function stop_guessing($url) {
    if (is_404()) {
        return false;
    }
    return $url;
}

//禁止自动保存
remove_filter('the_content', 'wptexturize');
remove_action('pre_post_update', 'wp_save_post_revision');
add_action('wp_print_scripts', 'disable_autosave');
function disable_autosave() {
    wp_deregister_script('autosave');
}
