<?php get_header(); ?>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <?php include(TEMPLATEPATH . '/includes/breadcrumb.php'); ?>
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <?php the_content('More &raquo;'); ?>
        <?php endwhile; ?>
    <?php endif; ?>
</div><!-- /col-xs-12 col-sm-12 col-md-12 col-lg-12 -->
<?php get_sidebar(); ?>

<?php get_footer(); ?>
