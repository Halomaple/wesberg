<?php 
function ven_part_blog_in_cat_list($category,$num=10){

      query_posts( array(
          'showposts' =>$num,
          'cat' => $category,
          'offset' =>0,
          'post__not_in' => $do_not_duplicate
          )
        );
      ?>

      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">
            <a href="<?php echo get_category_link($category);?>
              " rel="bookmark" title="
              <?php single_cat_title();?>
              ">
              <?php single_cat_title();?></a>
          </h3>
         
        </div>  <!-- panel-heading -->

        <div class="panel-body">
          <?php while (have_posts()) : the_post(); ?>
         
           <div class="post-meta">
              <div class="pull-left post-title"> <a href="<?php the_permalink() ?>"
              title="<?php echo cut_str(the_title(),38); ?>">
              <?php echo cut_str(the_title(),38); ?></a>
              </div>
              <div class="pull-right"><?php the_time('m/d')?></div>
           </div>
           
          <?php endwhile; ?>

          <div class="post-meta">
            <div class="pull-left">
              分类:
              <?php the_category(', ') ?>
              共有
              <?php echo wt_get_category_count(); ?>篇文章
            </div>

            <div class="pull-right">
            
              <a href="<?php echo get_category_link($category);?>
                " class="btn-blank"  title="更多
              <?php single_cat_title(); ?>的文章">更  多</a>

            </div>
          </div>  <!-- post-meta -->

        </div>  <!-- panel-body -->
      </div>  <!-- panel -->
      <?php
}


?>
