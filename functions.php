<?php
//注册菜单
register_nav_menus(array(
        'header_menu' => __('顶部菜单'),
        'footer_menu' => __('底部菜单'),
    )
);

//bootstrap二级菜单
require_once('wp_bootstrap_navwalker.php');

//文章浏览统计
function getPostViews($postID)
{  //此函数用于输出文章浏览次数
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);// _post_meta()函数获取统一文章id，//用于返回同一数值
    if ($count == '') {
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return 0;//如果从setPostViews()函数中读取到$count为空，则文章未被浏览//过
    }
    return $count;
}

function setPostViews($postID)
{    //将文章id传到函数中，文章被采用一次，$count自加//1
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}


//分类文章数
function wt_get_category_count($input = '')
{
    global $wpdb;

    if ($input == '') {
        $category = get_the_category();
        return $category[0]->category_count;
    } elseif (is_numeric($input)) {
        $SQL = "SELECT $wpdb->term_taxonomy.count FROM $wpdb->terms, $wpdb->term_taxonomy WHERE $wpdb->terms.term_id=$wpdb->term_taxonomy.term_id AND $wpdb->term_taxonomy.term_id=$input";
        return $wpdb->get_var($SQL);
    } else {
        $SQL = "SELECT $wpdb->term_taxonomy.count FROM $wpdb->terms, $wpdb->term_taxonomy WHERE $wpdb->terms.term_id=$wpdb->term_taxonomy.term_id AND $wpdb->terms.slug='$input'";
        return $wpdb->get_var($SQL);
    }
}

//除去搜索结果出现页面
add_filter('pre_get_posts', 'SearchFilter');
function SearchFilter($query)
{
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}

//缓存头像
function my_avatar($avatar)
{
    $tmp = strpos($avatar, 'http');
    $g = substr($avatar, $tmp, strpos($avatar, "'", $tmp) - $tmp);
    $tmp = strpos($g, 'avatar/') + 7;
    $f = substr($g, $tmp, strpos($g, "?", $tmp) - $tmp);
    $w = get_bloginfo('wpurl');
    $e = ABSPATH . 'avatar/' . $f . '.png';
    $t = 31536000;
    if (!is_file($e) || (time() - filemtime($e)) > $t) {
        copy(htmlspecialchars_decode($g), $e);
    } else  $avatar = strtr($avatar, array($g => $w . '/avatar/' . $f . '.png'));
    if (filesize($e) < 500) copy($w . '/avatar/default.png', $e);
    return $avatar;
}

add_filter('get_avatar', 'my_avatar');

//后台样式
function admin_css()
{
    if (is_user_logged_in())
        $current_user = wp_get_current_user();

    if ($current_user->user_login !== "Jeff")
        wp_enqueue_style("admin-my", get_template_directory_uri() . "/admin.css");
}

add_action('admin_head', 'admin_css');

//后台js文件
function backend_enqueue_scripts()
{
    wp_register_script('themes_js', get_bloginfo('template_directory') . '/js/admin.js');
    wp_enqueue_script('themes_js');
}

add_action('admin_enqueue_scripts', 'backend_enqueue_scripts');


//开启文章缩略图功能
add_theme_support('post-thumbnails', array('post'));

if (function_exists('add_image_size')) {
    add_image_size('category-thumb', 200, 200);
    add_image_size('homepage-thumb', 220, 220);
}

//文章简要文字长度
function new_excerpt_length($length)
{
    return 20;
}

add_filter('excerpt_length', 'new_excerpt_length');


//去除正文P标签包裹
remove_filter('the_content', 'wpautop');
//去除摘要P标签包裹
remove_filter('the_excerpt', 'wpautop');


//上传文件大小限制
function max_up_size()
{
    return 51000 * 1024; // 50 Mb
}

add_filter('upload_size_limit', 'max_up_size');

//增强搜索功能，搜索结果按照内容相关性来显示
if (is_search()) {
    add_filter('posts_orderby_request', 'search_orderby_filter');
}

function search_orderby_filter($orderby = '')
{
    global $wpdb;
    $keyword = $wpdb->prepare($_REQUEST['s']);
    return "((CASE WHEN {$wpdb->posts}.post_title LIKE '%{$keyword}%' THEN 2 ELSE 0 END) + (CASE WHEN {$wpdb->posts}.post_content LIKE '%{$keyword}%' THEN 1 ELSE 0 END)) DESC,
{$wpdb->posts}.post_modified DESC, {$wpdb->posts}.ID ASC";
}

//限制上传文件的类型
add_filter('upload_mimes', 'custom_upload_mimes');
function custom_upload_mimes($existing_mimes = array())
{
    unset ($existing_mimes);//禁止上传任何文件
    $existing_mimes['jpg|jpeg|gif|png'] = 'image/image';
    $existing_mimes['pdf'] = 'application/pdf';
    return $existing_mimes;
}


//后台登陆样式
//Login Page
function custom_login()
{
    echo '<link rel="stylesheet" type="text/css" href="' . get_bloginfo('template_directory') . '/css/login.css" />' . "\n";
    echo '<script type="text/javascript" src="//cdn.bootcss.com/jquery/2.2.0/jquery.js"></script>' . "\n";
}

add_action('login_head', 'custom_login');

//Login Page Title
function custom_headertitle($title)
{
    return get_bloginfo('name');
}

add_filter('login_headertitle', 'custom_headertitle');

//Login Page Link
function custom_loginlogo_url($url)
{
    return esc_url(home_url('/'));
}

add_filter('login_headerurl', 'custom_loginlogo_url');

//Login Page Footer
function custom_html()
{
    echo '<div class="footer">' . "\n";
    echo '</div>' . "\n";
    echo '<script type="text/javascript" src="' . get_bloginfo('template_directory') . '/js/resizeBackground.js"></script>' . "\n";
    echo '<script type="text/javascript">' . "\n";
    echo 'jQuery("body").prepend("<div class=\"loading\"><img src=\"' . get_bloginfo('template_directory') . '/images/login_loading.gif\" width=\"58\" height=\"10\"></div><div id=\"bg\"><img /></div>");' . "\n";
    echo 'jQuery(\'#bg\').children(\'img\').attr(\'src\', \'' . get_bloginfo('template_directory') . '/images/login_bg.jpg\').load(function(){' . "\n";
    echo '	resizeImage(\'bg\');' . "\n";
    echo '	jQuery(window).bind("resize", function() { resizeImage(\'bg\'); });' . "\n";
    echo '	jQuery(\'.loading\').fadeOut();' . "\n";
    echo '});';
    echo '</script>' . "\n";
}

add_action('login_footer', 'custom_html');


//图片链接改为所在的文章地址
function auto_post_link($content)
{
    global $post;
    $content = preg_replace('/<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*>/i', "<a title=\"" . $post->post_title . "\"><img src=\"$2\" alt=\"" . $post->post_title . "\" /></a>", $content);
    return $content;
}

add_filter('the_content', 'auto_post_link', 0);

//获得文章的第一张图片
function catch_first_image()
{
    global $post;
    ob_start();
    ob_end_clean();
    preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    $first_img = $matches [1] [0];
    return $first_img;
}


//默认文章的第一张图片为特色图片
function autoset_featured_image()
{
    global $post;
    $already_has_thumb = has_post_thumbnail($post->ID);
    if (!$already_has_thumb) {
        $attached_image = get_children("post_parent=$post->ID&post_type=attachment&post_mime_type=image&numberposts=1");
        if ($attached_image) {
            foreach ($attached_image as $attachment_id => $attachment) {
                set_post_thumbnail($post->ID, $attachment_id);
            }
        }
    }
}

add_action('the_post', 'autoset_featured_image');
add_action('save_post', 'autoset_featured_image');
add_action('draft_to_publish', 'autoset_featured_image');
add_action('new_to_publish', 'autoset_featured_image');
add_action('pending_to_publish', 'autoset_featured_image');
add_action('future_to_publish', 'autoset_featured_image');

//增加中文字体
function custum_fontfamily($initArray)
{
    $initArray['font_formats'] = "微软雅黑='微软雅黑';宋体='宋体';黑体='黑体';仿宋='仿宋';楷体='楷体';隶书='隶书';幼圆='幼圆';";
    return $initArray;
}

add_filter('tiny_mce_before_init', 'custum_fontfamily');
?>