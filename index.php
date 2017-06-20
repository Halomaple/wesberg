<?php get_header(); ?>

    <div class="content-container col-xs-9 col-sm-9 col-lg-9">
        <?php
        $cat_id1 =  get_cat_id('三角钢琴');
        $cat_id2 =  get_cat_id('立式钢琴');
        $cat_id3 =  get_cat_id('概念钢琴');
        $cat_id4 =  get_cat_id('右栏文章');

        $post_query = new WP_Query(array('category__not_in' => array($cat_id1, $cat_id2, $cat_id3, $cat_id4), 'showposts' => 6));
        while ($post_query->have_posts()) : $post_query->the_post(); ?>
            <div class="index-post-list col-xs-12 col-sm-6 col-md-6 col-lg-4"
                 onclick="window.location.href='<?php the_permalink(); ?>'">
                <div class="index-post-thumbnail">
                    <?php if (has_post_thumbnail()) { ?>
                        <a href="<?php the_permalink(); ?>" title="<?php the_title() ?>">
                            <?php the_post_thumbnail('homepage-thumb'); ?>
                        </a>
                        <?php
                    } else { ?>
                        <a href="<?php the_permalink(); ?>" title="更多信息">
                            <img src="<?php bloginfo('template_directory') ?>/images/default_thumb.jpg" alt="<?php the_title()?>"/></a>
                        <?php
                    } ?>
                </div>
                <div class="index-post-info">
                    <h5 class="index-post-title">
                        <a href="<?php the_permalink() ?>" title="更多信息"><?php the_title(); ?></a>
                    </h5>
                    <div class="index-post-excerpt"><?php the_excerpt(); ?></div>
                    <div class="index-post-link">
                        <a href="<?php the_permalink() ?>
                      " rel="bookmark">
                            更多信息>>
                        </a>
                    </div>
                </div>

            </div><!-- /index-post-list -->
        <?php endwhile; ?>
    </div>

    <div class="sidebar-container col-xs-3 col-sm-3 col-lg-3">
        <?php get_sidebar() ?>
    </div>

<?php get_footer(); ?>