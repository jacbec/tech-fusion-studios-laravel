$(document).ready(function () {
    if (isMobileDevice()) {
        $('.content .box p').css({
            "color": "#663399"
        });
    }

    function isMobileDevice() {
        andriod = "Android";
        bb10 = "BB10";
        iphone = "iPhone";
        ipad = "iPad";
        windowsphone = "Windows Phone";
    
        if (navigator.userAgent.match(andriod) == andriod || 
            navigator.userAgent.match(bb10) == bb10 || 
            navigator.userAgent.match(iphone) == iphone || 
            navigator.userAgent.match(ipad) == ipad || 
            navigator.userAgent.match(windowsphone) == windowsphone) {
                return true;
        }
    }
});