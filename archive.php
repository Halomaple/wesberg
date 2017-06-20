<?php get_header();
include(TEMPLATEPATH . '/includes/breadcrumb.php');
?>
<?php while (have_posts()) : the_post(); ?>
    <div class="archive col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="archive-post-list" onclick="window.location.href='<?php the_permalink(); ?>'">
            <div class="archive-post-thumbnail">
                <?php
                $first_image = catch_first_image();
                if (has_post_thumbnail()) { ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title() ?>">
                        <?php the_post_thumbnail('homepage-thumb'); ?>
                    </a>
                    <?php
                } else if (!empty($first_image)) { ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title() ?>">
                        <?php catch_first_image(); ?>
                    </a>
                <?php } else { ?>
                    <a href="<?php the_permalink(); ?>" title="更多信息">
                        <img src="<?php bloginfo('template_directory') ?>/images/default_thumb.jpg" alt="<?php the_title();?>"/>
                    </a>
                    <?php
                } ?>
            </div>
            <div class="archive-post-info">
                <h5 class="archive-post-title">
                    <a href="<?php the_permalink() ?>" title="更多信息"><?php the_title(); ?></a>
                </h5>
                <div class="archive-post-excerpt"><?php the_excerpt(); ?></div>
                <div class="archive-post-link">
                    <span style="font-weight: normal"><?php //the_time('Y年m月d日') ?></span>
                    <a href="<?php the_permalink() ?>
                      " rel="bookmark">
                        更多信息>>
                    </a>
                </div>
            </div>
        </div><!-- /archive-post-list -->
    </div>
<?php endwhile;
get_footer(); ?>


