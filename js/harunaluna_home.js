var nav_active, // Currently active navbar element
    
    /* Canvas elements */
    canvas_bg,
    ctx_bg,
    canvas_top,
    ctx_top,
    
    /* Images to Draw */
    img_bg = new Image(),
    img_banner = new Image(),
    
    top_news = [], // Classes n<post #> for the front-page news
    top_posts = [], // Classes p<post #> for the front-page blog posts
    
    /* Used to configure sticky navbar */
    origOffsetY = 0,
    wpNavbarHeight = 0,
    
    mobile_menu_on = false; // Menu that appears when a button is clicked; mobile only
    
    bgonly = false; // Toggle to view background

/* Draw background, bg_fz.jpg */
var drawBG = function (bg, cbg) {
    
    'use strict';
    
    if (bg !== null && cbg !== null) {
        img_bg.onload = function () {
            bg.width = parseInt(img_bg.width, 10);
            bg.height = parseInt(img_bg.height, 10);
            cbg.rect(0, 0, bg.width, bg.height);
            if ($(window).width() < 750) {
                cbg.drawImage(img_bg, 0, 0, parseInt(img_bg.width / 2, 10), parseInt(img_bg.height / 2, 10)); // Half-size on smaller screens
            } else {
                cbg.drawImage(img_bg, 0, 0, parseInt(img_bg.width, 10), parseInt(img_bg.height, 10));
            }
        };
        img_bg.src = params.temp_url + '/img/bg_fz_desktop.png';
        
        cbg.fill();
    }
    
};

/* Draw banner */
/*var drawBanner = function (banner, cbanner) {
    
    'use strict';
    
    if (banner !== null && cbanner !== null) {
        img_banner.onload = function () {
            banner.width = parseInt(img_banner.width, 10);
            banner.height = parseInt(img_banner.height, 10);
            cbanner.rect(0, 0, banner.width, banner.height);
            if ($(window).width() < 750) {
                cbanner.drawImage(img_banner, 0, 0, parseInt(img_banner.width / 2, 10), parseInt(img_banner.height / 2, 10)); // Half-size on smaller screens
            } else {
                cbanner.drawImage(img_banner, 0, 0, parseInt(img_banner.width, 10), parseInt(img_banner.height, 10));
            }
        };
        img_banner.src = params.temp_url + '/img/bannertemp.png';
        
        cbanner.fill();
    }
    
};*/

/* Initialize canvases */
var init_canvas = function () {
    
    'use strict';
    
    canvas_bg = document.getElementById('background');
    ctx_bg = canvas_bg.getContext("2d");
    canvas_top = document.getElementById('banner');
    ctx_top = canvas_top.getContext("2d");
    
    drawBG(canvas_bg, ctx_bg);
    //drawBanner(canvas_top, ctx_top);
    
};


/* Find the active navbar element
 */
var find_active = function () {
    
    'use strict';
    
    var navbar_elems = document.getElementsByTagName('li'),
        i;
    if (navbar_elems !== null) {
        for (i in navbar_elems) {
            if ((' ' + navbar_elems[i].className + ' ').indexOf(' active ') > -1) {
                nav_active = navbar_elems[i];
            }
        }
    } else {
        return;
    }
    
};


/* Runs on document load
 */
$(document).ready(function () {
    
    'use strict';
    
    var site_descr_width = $(window).width() - 32;
    
    // Initialize canvas
    init_canvas();
    
    // Find the active navbar element
    find_active();
    
    // Resize site description
    if ($(window).width() <= 480) {
        $('.site-branding').css({
            "width": site_descr_width + "px"
        });
    }
    
    
    /* Smooth scrolling to anchor
     */
    $('a[href*=#]').click(function () {
        
        var target, targetOffset;
        
        // Smooth scrolling
        if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
            
            target = $(this.hash);
            target = (target.length && target) || $('[name=' + this.hash.slice(1) + ']');
        
            if (target.length) {
                targetOffset = target.offset().top;
                $('html,body').animate({scrollTop: targetOffset}, 1200);
            }
            
        }
        
    });
    
    
    /* Hide featured image when not focused
     * Featured image flies in when focused
     */
    // Generate list of posts by custom class (see .php, p<post id #>)
    $('.entry-header').each(function (index, e) {
        top_posts.push(e.classList[1]);
    });
    // Add an event listener for each element in the list
    top_posts.forEach(function (e, index) {
        $('.thumb-content.' + e).hide();
        $('.entry-header.' + e).mouseenter(function () {
            $('.thumb-content.' + e).fadeIn(500);
        });
        $('.entry-header.' + e).mouseleave(function () {
            $('.thumb-content.' + e).fadeOut(500);
        });
    });
    
    
    /* Redraws the background canvas if the window size changes */
    window.addEventListener('resize', function () {
        
        canvas_bg.width = parseInt(img_bg.width, 10);
        canvas_bg.height = parseInt(img_bg.height, 10);
        ctx_bg.rect(0, 0, canvas_bg.width, canvas_bg.height);
        if ($(window).width() <= 750) {
            ctx_bg.drawImage(img_bg, 0, 0, parseInt(img_bg.width / 2, 10), parseInt(img_bg.height / 2, 10));
            
            // Resize site description
            $('.site-branding').css({
                "width": ""
            });
        } else {
            ctx_bg.drawImage(img_bg, 0, 0, parseInt(img_bg.width, 10), parseInt(img_bg.height, 10));
        }
        
    }, false);
    
    
    /* Navbar
     * Change active element on click
     * Update global variable
     */
    $(".jump-link").click(function () {
        
        // Restore elements if needed
        if (bgonly === true) {
            bgonly = false;
            
            // Elegantly bring back all page elements
            $('#sidebar').fadeTo(500, 1);
            $('#content').fadeTo(500, 1);
        }
        
        $(nav_active).removeClass('active');
        $(this).addClass('active');
        
        nav_active = this;
        
    });
    
    
    /* Welcome goes to top of page */
    $('.welcome-jump').click(function () {
        // Restore elements if needed
        if (bgonly === true) {
            bgonly = false;
            
            // Elegantly bring back all page elements
            $('#sidebar').fadeTo(500, 1);
            $('#content').fadeTo(500, 1);
        }
        
        $("html, body").animate({ scrollTop: 0 }, 1200);
        
        $(nav_active).removeClass('active');
        $(this).addClass('active');
        
        nav_active = this;
    });
    
    
    /* Cross-browser sticky navbar */
    origOffsetY = $('.navbtns').offset().top;
    
    document.addEventListener('scroll', function onScroll(e) {
        if (window.scrollY >= origOffsetY) {
            $('.navbtns').addClass('sticky');
            if ($('#wpadminbar').length > 0) {
                wpNavbarHeight = $('#wpadminbar').height();
                $('.sticky').css({"top": wpNavbarHeight + "px"});
            } else {
                $('.sticky').css({"top": "0px"});
            }
        } else {
            $('.navbtns').removeClass('sticky');
        }
    });
    
    
    /* Toggle to allow the user to see background art */
    $('.bg-viewer').click(function () {
        if (bgonly === false) {
            bgonly = true;
            
            // Elegantly hide all page elements
            $('#sidebar').fadeTo(500, 0);
            $('#content').fadeTo(500, 0);
            
        } else {
            bgonly = false;
            
            // Elegantly bring back all page elements
            $('#sidebar').fadeTo(500, 1);
            $('#content').fadeTo(500, 1);
        }
    });
    
    /* Toggle to pull up mobile menu */
    $('.mobile-menu-toggle').click(function () {
        if (mobile_menu_on === true && $(window).width() <= 750) {
            
            $('.left-nav').css({"display": "none"}); // Style to hide
            mobile_menu_on = false; // Indicate that menu is now hidden
            
        } else {
            
            $('.left-nav').removeAttr("display"); // Style to show
            mobile_menu_on = true; // Indicate that menu is now visible
            
        }
    });
    
});