<?php get_header();

include(TEMPLATEPATH . '/includes/part-page-nav.php');
include(TEMPLATEPATH . '/includes/breadcrumb.php');

$the_query = new WP_Query($args);

if (have_posts()) :
    while (have_posts()) :the_post();
        update_post_caches($posts); ?>
        <div class="blog-post-header">
            <img src="<?php bloginfo('template_directory'); ?>/images/blog-post-header.jpg">
            <div class="blog-post-tag">
                <span class="tag-left pull-left"></span>
                <span class="tag-text"><?php if (in_category('未分类')) {
                the_title();
            } else {
                $category = get_the_category();
                if ($category[0]) {
                    echo '<a href="' . get_category_link($category[0]->term_id) . '">' . $category[0]->cat_name . '</a>';
                }
            } ?></span>
                <span class="tag-right pull-right"></span>
            </div>
            <div class="blank-header"></div>
        </div>

        <div class="blog-post">
            <h1 class="blog-post-title"><?php the_title(); ?></h1>
            <div class="blog-post-content"><?php the_content() ?></div>

            <?php $fields = get_fields($post_id);
            $has_field_name = false;
            if (!empty($fields)) {
                foreach ($fields as $field_name => $value) {
                    if (!empty($value)) {
                        $has_field_name = true;
                    }
                }

                if ($has_field_name) {
                    ?>
                    <div class="product-information">
                        <ul class="col-xs-12 col-sm-6 col-md-6 col-lg-6 info-left">
                            <li>建议零售价： <span><?php the_field('建议零售价', $post->ID) ?></span></li>
                            <li>品牌： <span><?php the_field('品牌', $post->ID) ?></span></li>
                            <li>型号： <span><?php the_field('型号', $post->ID) ?></span></li>
                            <li>重量： <span><?php the_field('重量', $post->ID) ?></span></li>
                            <li>体积： <span><?php the_field('体积', $post->ID) ?></span> (长 x 宽 x 高：单位cm)</li>
                            <li>介绍： <p><?php the_field('介绍', $post->ID) ?></p></li>
                        </ul>

                        <ul class="col-xs-12 col-sm-6 col-md-6 col-lg-6 info-right">
                            <li>颜色： <span><?php the_field('颜色', $post->ID) ?></span></li>
                            <li>产地： <span><?php the_field('产地', $post->ID) ?></span></li>
                        </ul>
                    </div>
                <?php }
            } ?>
        </div><!-- /the blog-post -->
        <?php
    endwhile;
endif;
wp_reset_query();     // Restore global post data stomped by the_post().
get_footer();
?>
