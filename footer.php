<?php
/**
 * The Footer template for Wesberg
 *
 */
?>

</div><!--/row-->
</div><!--/container main-content-->
</div><!--main-content-->

<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-3 col-md-3 qr-code-container">
                <div class="qr-code pull-right">
                    <p class="pull-left">
                        关<br/>
                        注<br/>
                        我<br/>
                        们</p>
                    <img class="pull-right" src="<?php bloginfo('template_directory') ?>/images/wesberg_qr_code.jpg"/>
                </div>
                <div class="clearfix"></div>
            </div>

            <div class="col-xs-12 col-sm-9 col-md-9 address">
                <p>
                    版权归：广州威诗堡贸易有限公司（中国大陆地区总代理）&nbsp;|&nbsp;
                    地址：广州市海珠区艺州路31号
                <p>电话：<span class="phone">020-34219102</span>（传真）, <span class="phone">13902229524</span></p>
                <p>
                    网站：<a href="http://www.wesberg.com.cn/">www.wesberg.com.cn</a>&nbsp;|&nbsp;
                    邮箱：<a href="mailto:wesbergpiano@163.com?subject=威诗堡钢琴">wesbergpiano@163.com</a>
                </p>
                <p>维护：<a href="http://www.halomaple.com/">Halomaple</a>&nbsp;|&nbsp;网站地图：<a
                        href="<?php bloginfo('url') ?>/sitemap_baidu.xml">网站地图</a></p>
            </div>
        </div>
    </div>
</div>

<!--JavaScript-->
<script src="//cdn.bootcss.com/jquery/2.2.0/jquery.js"></script>
<script src="//cdn.bootcss.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="//cdn.bootcss.com/flexslider/2.1/jquery.flexslider-min.js"></script>

<script type="text/javascript">
    //flexslider
    function ssp_deentitize_str(str){var ret=this.replace(/&gt;/g,'>');ret=ret.replace(/&lt;/g,'<');ret=ret.replace(/&quot;/g,'"');ret=ret.replace(/&apos;/g,"'");ret=ret.replace(/&amp;/g,'&');return ret}jQuery(function($){$(window).load(function(){$('.ssp_slider_default').each(function(){id=$(this).attr('data-slider_id');options=$.parseJSON($(this).attr('data-slider_options'));selector=$(this);if(!options.chrome)selector.addClass('ssp_no_chrome_slider_default');height=options.height.replace(/[^\d.]/g,"");width=options.width.replace(/[^\d.]/g,"");if(options.h_responsive==false||options.h_responsive==''){$('.slides .slide',selector).each(function(){if(!Number(height)<=0)$(this).css('height',height+'px')})}if(options.w_responsive==false||options.w_responsive==''){if(!Number(width)<=0)$(selector).css('width',width+'px')}if(options.thumbnail_navigation)options.control_nav='thumbnails';$(selector).flexslider({smoothHeight:options.h_responsive,animation:options.animation,direction:options.direction,slideshow:options.slideshow,slideshowSpeed:Number(options.cycle_speed)*1000,animationSpeed:Number(options.animation_speed)*1000,pauseOnHover:options.pause_on_hover,controlNav:options.control_nav,directionNav:options.direction_nav,keyboard:options.keyboard_nav,touch:options.touch_nav,before:function(slider){slider.removeClass('loading')}})})})});

    //footer
    $(function(){function adjustFooter(){if(($('.main-content').height()+300)<window.screen.availHeight){$('.footer').css({'position':'absolute'})}else{$('.footer').css({'position':'static'})}$('.footer').css({'display':'block'})}adjustFooter();setInterval(adjustFooter,500);function replaceDownloadText(){$('.download-attachments .attachment-size .attachment-label').text("文件大小: ");$('.download-attachments .attachment-size .attachment-label').text("文件大小: ");$('.download-attachments .attachment-downloads .attachment-label').text("下次次数: ")}replaceDownloadText()});
</script>
</body>
</html>
