function backFn() {
    var eleId = '#acf-field-介绍';
    var element = jQuery(eleId).get(0);
    if (!element) return;
    var appendEle = document.createElement('textarea');
    appendEle.style = "width:100%";
    appendEle.rows = 15;

    appendEle.value = element.value.replace(/<br \/>/g, "\n");
    appendEle.id = eleId + 'later';

    element.hidden = true;
    element.parentNode.appendChild(appendEle);

    appendEle.onchange = function () {
        element.value = appendEle.value.replace(/\n|\r\n/g, "<br />");
    }
}

function hideAddThemeButton(){
    var element = jQuery("a[href='http://wesberg.com.cn/wp-admin/theme-install.php']");
    var eleParent = element.parent().get(0);
    jQuery(eleParent).hide();

    var addSliderbtn = jQuery("a[href='http://wesberg.com.cn/wp-admin/post-new.php?post_type=ssp_slider']");
    addSliderbtn.hide();
}

function runAdminFuntion(){
    backFn();
    hideAddThemeButton();
}

window.onload = runAdminFuntion;
