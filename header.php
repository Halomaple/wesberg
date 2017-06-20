<!DOCTYPE html>
<html>
<head>
    <title><?php if (is_home()) {
            bloginfo('name');
            echo " | 威诗堡钢琴";
        } elseif (is_category()) {
            single_cat_title();
            echo '&nbsp;|&nbsp;';
            bloginfo('name');
        } elseif (is_single()) {
            single_post_title();
            echo '&nbsp;|&nbsp;';
            bloginfo('name');
        } elseif (is_page()) {
            single_post_title();
            bloginfo('name');
            echo '';
        } elseif (is_404()) {
            echo '未找到&nbsp;|&nbsp;';
            bloginfo('name');
        } else {
            wp_title('', true);
        } ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php if (is_search()) { ?>
    <meta name='robots' content='nofollow'/>
    <?php } else { ?>
    <meta name='robots' content='all'/>
    <?php } ?>
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="keywords" content="威诗堡钢琴,钢琴代理,钢琴加盟,进口钢琴,原装进口钢琴,进口钢琴直销"/>
    <meta name="description" content="源自1973年德国顶级钢琴制作工艺"/>
    <meta name="author" content="Jeff Doyle"/>
    <meta name="Copyright" content="本站创作权权归Jeff.Doyle个人所有"/>

    <link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico"/>

    <!-- Bootstrap core CSS -->
    <link href="//cdn.bootcss.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">

    <!-- Flexslider CSS -->
    <link href="//cdn.bootcss.com/flexslider/2.1/flexslider-min.css" rel="stylesheet"/>

    <!--Customized css-->
    <link href="<?php bloginfo('template_directory'); ?>/css/style.min.css" rel="stylesheet"/>
</head>

<body>
<div class="top-navbar">
    <div class="container">
        <div class="row">
            <div class="masthead">
                <nav class="wide-topnav">
                    <?php wp_nav_menu(array(
                        'menu' => 'header_menu',
                        'theme_location' => 'header_menu',
                        'depth' => 0,
                        'container' => false,
                        'menu_class' => 'nav nav-justified',
                        'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                        'walker' => new wp_bootstrap_navwalker()));
                    ?>
                </nav>

                <nav class="navbar navbar-default navbar-fixed-top narrow-topnav">
                    <div class="container">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="<?php echo home_url(); ?>">W E S B E R G</a>
                        </div>
                        <div id="navbar" class="collapse navbar-collapse">
                            <?php wp_nav_menu(array(
                                'menu' => 'header_menu',
                                'theme_location' => 'header_menu',
                                'depth' => 0,
                                'container' => false,
                                'menu_class' => 'navbar-ul',
                                'fallback_cb' => 'wp_bootstrap_navwalker::fallback',
                                'walker' => new wp_bootstrap_navwalker()));
                            ?>

                            <form method="get" id="searchform" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                <div class="input-group">
                                    <input name="s" id="s" type="text" class="form-control" placeholder="搜索钢琴产品或新闻">
                                    <span class="input-group-btn"><button class="btn btn-default" type="submit">搜索
                                        </button></span>
                                </div>
                            </form>
                        </div><!--/.nav-collapse -->
                    </div>
                </nav>

            </div>
        </div>
    </div>
</div>

<div class="main-content">
    <?php if (is_home()): ?>
        <div class="container flex-container">
            <div class="row">
                <?php echo do_shortcode('[slider id=\'655\' name=\'首页图片轮播\' size=\'full\']'); ?>
            </div>
        </div>
        <div class="company-slogan">
            <div class="chinese">源自1973年德国顶级钢琴制作工艺</div>

            <div class="english">PIANOMAKERS TO THE WORLD SINCE 1973</div>
        </div>
    <?php endif ?>

    <div class="container <?php echo is_home() ? '' : '' ?> ">
        <div class="row">