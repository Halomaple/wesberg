<?php
if (is_single()) {
    ?>
    <ol class="breadcrumb">
        当前位置&nbsp;>&nbsp;
        <li><a title="返回首页" href="<?php echo site_url(); ?>/">首页</a></li>
        <li><?php the_title() ?></li>
    </ol>
<?php }

if (is_archive()) {
    ?>
    <div class="breadcrumb">
        当前位置&nbsp;>&nbsp;
        <li><a title="返回首页" href="<?php echo site_url(); ?>/">首页</a></li>

        <li><?php if (is_category()) { ?><?php single_cat_title(); ?>
            <?php } elseif (is_tag()) { ?><?php single_tag_title(); ?>
            <?php } elseif (is_day()) { ?><?php the_time('Y年m月'); ?>发表的文章
            <?php } elseif (is_month()) { ?>所有<?php the_time('Y年m月'); ?>文章
            <?php } elseif (is_year()) { ?>Archive for <?php the_time('Y'); ?>
            <?php } elseif (is_author()) { ?><?php wp_title(''); ?>发表的所有文章
            <?php } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
                <h1>Blog Archives</h1>
            <?php } ?>
        </li>
    </div>
<?php }

if (is_search()) {
    ?>
    <div class="breadcrumb">
        当前位置&nbsp;>&nbsp;
        <li><a title="返回首页" href="<?php echo site_url() ?>/">首页</a></li>
        <li>搜索结果</li>

        <div class="search-page-input">
        <form method="get" id="searchform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="input-group">
                <input name="s" id="s" type="text" class="form-control" placeholder="重新搜索">
                <span class="input-group-btn"><button class="btn btn-default" type="submit">搜索</button></span>
            </div>
        </form>
        </div>
    </div>
<?php }

global $has_zoom;
$has_zoom = true;
if (is_page()) {
    ?>
    <ol class="breadcrumb">
        当前位置&nbsp;>&nbsp;
        <li><a title="返回首页" href="<?php echo site_url(); ?>/">首页</a></li>
        <li><?php the_title() ?></li>
    </ol>
<?php }
?>

