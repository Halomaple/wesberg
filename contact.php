<?php
/**
 **Template Name:contact
 */
get_header();

include(TEMPLATEPATH . '/includes/breadcrumb.php');
?>

<div class="contact-container">
    <?php echo do_shortcode('[contact-form-7 id="5" title="客户留言表单"]')
    ?>
</div>

<?php
get_footer();
?>
