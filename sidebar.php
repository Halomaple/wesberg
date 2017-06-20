<div class="sidebar">
    <div class="convention">
        <a href="http://wesberg.com.cn/%e4%bc%9a%e5%b1%95%e5%9c%ba%e6%99%af/">会展场景</a>
    </div>

    <h4 class="news">最新要闻</h4>
    <ul class="news-list">
        <hr class="sidebar-item-divider"/>
        <?php query_posts(array('category_name' => '右栏文章', 'showposts' => 5)); ?>
        <?php while (have_posts()) :
            the_post(); ?>
            <li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
            <hr class="sidebar-item-divider"/>
        <?php endwhile;
        wp_reset_query();
        ?>
    </ul>

    <div class="more-posts">
        <a href="<?php site_url(); ?>/?s="> 更多新闻 >></a>
    </div>

    <form method="get" id="searchform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="input-group">
            <input name="s" id="s" type="text" class="form-control" placeholder="搜索钢琴产品或新闻">
            <span class="input-group-btn"><button class="btn btn-default" type="submit">搜索</button></span>
        </div>
    </form>
</div>