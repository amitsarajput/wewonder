var mobilewidth = 769;
var autorefresh = ($(window).innerWidth() < mobilewidth) ? "mobile" : "desk";
$(document).ready(function () {
    $("body").addClass(autorefresh);

    // loader_we();
    // loader_line();
    loader_text();
    check_right_img();

    set_line_width();
    content_width();
    $(".logo").click(function () {
        // window.location.reload();
        // window.location.href = base_url;

        $("body").attr('data-page', 'home').attr('id', 'home');
        $(".loading_we").removeClass('loading-suc').fadeIn(200);
        loader_we();
        window.history.pushState({urlPath: base_url}, "", base_url);
        setTimeout(function () {
            change_content('', 3500);
        }, 200);
        return false;
    });
    $(".arrow_back").click(function () {
        window.history.back();
    });
    $(".menu button").click(function () {
        $(this).hide();
        show_menu();
        return false;
    });
    $("a.remove_menu").click(function () {
        hide_menu();
        return false;
    });
    $(".menubar ul li a").click(function () {
        var $this = $(this);
        window.history.pushState({urlPath: $this.attr('href')}, "", $this.attr('href'));
        if (!$this.attr('data-page')) {
            $this.attr('data-page', 'home');
        }
        $('body').addClass('menu_clicks');
        hide_menu($this.attr('data-page'));
        change_content($this.attr('data-page'));
        return false;
    });
});

$(window).bind('load', function () {
    setTimeout(function () {
        loader_we();
        // $(".loader").fadeOut();
    }, 100);
    setTimeout(function () {
        $(".has_img").each(function () {
            $(this).find('img').each(function () {
                var img_name = '';
                if ($(window).innerWidth() > mobilewidth) {
                    img_name = $(this).attr('data-src');
                } else {
                    img_name = $(this).attr('data-mobile');
                }
                if (img_name) {
                    $(this).attr('src', img_name);
                }
            });
        });
    }, 1000);
    var class_push = 'unknown';
    if (navigator.userAgent.indexOf("Safari") != -1) {
        class_push = 'safari';
    }
    if (navigator.userAgent.indexOf("Chrome") != -1) {
        class_push = 'chrome';
    }
    if (navigator.userAgent.indexOf("Firefox") != -1) {
        class_push = 'firefox';
    }
    $("body").addClass('browser_' + class_push);
});

$(window).resize(function () {
    loader_text();
    if (autorefresh == "mobile") {
        if ($(window).innerWidth() > mobilewidth) {
            window.location.reload();
        }
    } else {
        if ($(window).innerWidth() < mobilewidth) {
            window.location.reload();
        }
    }
    check_right_img();
    // setheight_line(1);
});

$(document).on('click', '.loader.loaded span', function () {
    $(".loader").addClass('load-complete');
    $(".load-text").fadeOut();
    setTimeout(function () {
        $(".loader").addClass('load-completed');
        // $(".lines").addClass('load-lines');
        if ($("body").attr('id') == "home") {
            setheight_line();
        }
    }, 800);
});


if ($(window).innerWidth() >= mobilewidth) {
    $(document).on("mouseover", ".hoverallow .line", function () {
        $(".lines").addClass('autoactive');
        $(".line").removeClass('actnow');
        $(this).addClass('actnow');
    });
    $(document).on("mouseout", ".line", function () {
        $(".lines").removeClass('autoactive');
    });
}

$(document).on('click', '.loading_we.loading-suc', function () {
    $(".loading_we").fadeOut(400);
    if ($("body").attr('id') == "home") {
        loader_line();
    } else {
        if (!$('body').hasClass('menu_clicks')) {
            run_animation($("body").attr('id'));
        }
        $(".showafter").fadeIn();
    }
});

$(document).on('click', '.workpage .anchor a', function () {
    var redirectpage = $(this).attr('data-page');
    if (redirectpage != "project-#.") {
        $(".loading_we").fadeIn(200);
        window.history.pushState({urlPath: $(this).attr('href')}, "", $(this).attr('href'));

        setTimeout(function () {
            run_animation(redirectpage);
        }, 1500);
    }
    return false;
});

$(document).on('click', '.b_mnu ul li a, .we_redirect', function () {
    var redirectpage = $(this).attr('data-page');
    $(".loading_we").fadeIn(200);
    window.history.pushState({urlPath: $(this).attr('href')}, "", $(this).attr('href'));
    setTimeout(function () {
        change_content(redirectpage, 1500);
    }, 500);
    return false;
});

function loader_we() {
    $(".loading_we").removeClass('loading-suc');
    setTimeout(function () {
        $(".loading_we").addClass('weyes');
        setTimeout(function () {
            $(".loading_we").removeClass('weyes');
            setTimeout(function () {
                $(".loading_we").addClass('loading-suc');
                // $(".we-text").fadeIn();
                $(".loading_we").click();
            }, 1000);
        }, 2500);
    }, 100);
}

function check_right_img() {
    $(".team-top .rightdown").css({
        width: (window.innerWidth / 4),
        bottom: '-' + (window.innerWidth / 6) + 'px'
    });
    $(".leadership_content .team-top .rightdown").css({
        width: (window.innerWidth / 4),
        bottom: '-250px'
    });
    $(".work_topbar .rightdown").css({
        width: (window.innerWidth / 2.7),
        bottom: '-' + (window.innerWidth / 15.5) + 'px'
        // bottom: '-21vh'
    });
    $(".contact-top .rightdown").css({
        width: (window.innerWidth / 2.7),
        bottom: '-' + (window.innerWidth / 15.5) + 'px'
    });

    if ($('body').hasClass('mobile')) {
        $(".sub-clients .isclients span, .sub-clients .isclients p.nums").css({
            'font-size': (window.innerWidth / 6.5) + 'px'
        });
        $(".sub-clients .isyears span, .sub-clients .isyears p.nums").css({
            'font-size': (window.innerWidth / 4.5) + 'px'
        });
        $(".work_topbar .contents p, .teamdata p").css({
            'font-size': (window.innerWidth / 6.5) + 'px'
        });
        $(".services_content .teamdata p").css({
            'font-size': (window.innerWidth / 6.9) + 'px'
        });
        $(".leadership_content .teamdata p").css({
            'font-size': (window.innerWidth / 7.9) + 'px'
        });
        $(".services_content .country .rotate-text").css({
            'font-size': (window.innerWidth / 4) + 'px'
        });
        $(".leadership_content .mgcountry .rotate-text").css({
            'font-size': (window.innerWidth / 1.8) + 'px'
        });
        $(".leadership_content .mgcountry .rightsides .rotate-text").css({
            'font-size': (window.innerWidth / 3) + 'px'
        });
    }
}

var remover_act = '';

function loader_line() {
    // var linear = [10, 5, 10, 5, 10, 5, 10, 5, 40];
    var linear = [30];
    var ind = 0;
    var height = 0;
    clearInterval(remover_act);
    $('body').removeClass('project-close');
    var lineload = setInterval(function () {
        height = linear[ind];
        if (!height) {
            clearInterval(lineload);
            $(".loader").addClass('loaded');
            setTimeout(function () {
                $(".loader span img").removeClass('loaderact');
                setTimeout(function () {
                    $(".loader.loaded span").click();
                }, 3000);
            }, 500);
            $(".load-text").html('Explore now');
        } else {
            $(".load span").css('height', (window.innerHeight * height / 100));
        }
        if (ind == 1) {
            setTimeout(function () {
                $(".showafter").fadeIn();
                // $(".load span").addClass('isact');
                $(".loader").addClass('loaded_img');
                setTimeout(function () {
                    $(".loader").addClass('animtrue');
                }, 100);
                setTimeout(function () {
                    $(".load span").addClass('isact');
                }, 500);
                remover_act = setInterval(function () {
                    if ($(".load span").hasClass('isact')) {
                        $(".load span").removeClass('isact');
                    } else {
                        $(".load span").addClass('isact');
                    }
                }, 2000);
            }, 1000);
        }
        ind++;
    }, 800);
}

function loader_text() {
    $(".load-text").css('padding-bottom', window.innerHeight * 0.1);
    $(".we-text").css('bottom', window.innerHeight * 0.27);
    $(".load-text").stop().fadeIn();
}

function set_line_width() {
    // var linewidth = [7, 10, 4, 17, 6, 3, 11, 7, 21, 5, 15, 5, 9];
    var linewidth = [7.61, 15, 3, 10, 10, 5, 25, 7.61, 40, 7.31, 30, 3, 7.61];
    var lineheight = [100, 50, 130, 180, 120, 140, 150, 145, 170, 10, 300, 180, 280];
    // var margindatas = (window.innerHeight / (lineheight.length)) - 22;
    var margindatas = (window.innerHeight / ($(".line:not(.hidden-force)").length)) + 8;
    $('body').removeClass('project-close');

    var view_mobiles_lines = 7;

    $(".line").each(function (i) {
        if ($(window).innerWidth() < mobilewidth) {
            linewidth = [5.61, 3, 10, 5, 12, 6, 2, 11, 40, 7.31, 30, 3, 7.61];
            lineheight = [70, 75, 90, 71, 80, 85, 60, 90];
            // $(".line9,.line10,.line11,.line12,.line13").remove();
            // $(".line9,.line10,.line11,.line12,.line13").addClass('hidden-force');
            if (i > view_mobiles_lines) {
                $(this).addClass('hidden-force');
            }

            $(this).css('height', linewidth[i]);
            $(this).css('width', ((lineheight[i]) - 70) + '%');
            // $(this).css('width', ((lineheight[i] * $(window).innerWidth()) / 100) / 3);
            // $(this).css('width', lineheight[i]);
            var margindatas = (window.innerHeight / (view_mobiles_lines + 1)) - 20;
            $(this).css('margin-bottom', margindatas);
            if (i == view_mobiles_lines) {
                $(this).css('margin-bottom', 0);
            }
        } else {
            $(this).css('width', linewidth[i]);
            $(this).css('height', lineheight[i]);
        }
    });

    var menuwidth = [];
    if ($(window).innerWidth() < mobilewidth) {
        menuwidth = [10, 4, 2, 1.5, 0.9, 0.5, 0.2];
    } else {
        menuwidth = [16, 9, 6, 4.5, 2.9, 1.5, 0.5];
    }
    $(".menu_line").each(function (i) {
        $(this).css('width', menuwidth[i] + '%');
    });

}

function setheight_line(type = '') {
    var height = window.innerHeight + 300;
    var width = window.innerWidth + 300;

    if ($(window).innerWidth() < mobilewidth) {
        $(".lines").addClass('remove_m_an');

        var line_max_wi = [70, 75, 90, 71, 80, 85, 60, 90];
        $(".line").each(function (i) {
            $(this).css('max-width', line_max_wi[i] + '%');
        });
    }

    $(".line").each(function (i) {
        if ($(window).innerWidth() < mobilewidth) {
            var newwidth = $(this).width();
            newwidth = -300;
            $(this).css('width', width + newwidth + '%');
            // $(this).css('width', '100%');
            // $(this).css('width', width + newwidth);
        } else {
            var newheight = $(this).height();
            $(this).css('height', height + newheight);
        }
    });
    if (!type) {
        $(".line").each(function (i) {
            if ($(window).innerWidth() < mobilewidth) {
                var l = $(this).offset();
                var r = window.innerHeight - (l.top + $(this).height());
                $(this).attr('data-top', l.top).attr('data-bottom', r);
            } else {
                var l = $(this).offset();
                var r = window.innerWidth - (l.left + $(this).width());
                $(this).attr('data-left', l.left).attr('data-right', r);
            }
        });
    }
    setTimeout(function () {
        $('body').removeClass('project-close');
        $(".lines").addClass('load-lines');
        if (!type) {
            $(".hidden").html('');
            $(".line").each(function () {
                if ($(window).innerWidth() < mobilewidth) {
                    $(this).css({'top': $(this).data('top')});
                    var xpxel = (50 - parseFloat($(this).outerHeight())) / 2;
                    $(".hidden").append('<style>.hoverallow .line' + $(this).data('class') + ':hover{margin-top: -' + xpxel + 'px;}</style>');
                } else {
                    $(this).css({'left': $(this).data('left')});
                    var xpxel = (50 - parseFloat($(this).outerWidth())) / 2;
                    $(".hidden").append('<style>.hoverallow .line' + $(this).data('class') + ':hover{margin-left: -' + xpxel + 'px;}</style>');
                }
            });
            if ($(window).innerWidth() < mobilewidth) {
                $(".line").css('width', '100%');
                // $(".line").css('width', window.innerWidth);
            } else {
                $(".line").css('height', window.innerHeight);
            }
            setTimeout(function () {
                setleft_right_anim();
            }, 500);
            setTimeout(function () {
                $(".lines").removeClass('remove_m_an');
            }, 1000);
        }
    }, 1500);
}

var img_anims = '';
var auto_line_view = '';

function setleft_right_anim() {
    $(".line").removeClass('actnow');
    var addrandom = Math.floor(Math.random() * ($('.line:not(.hidden-force)').length - 1 + 1)) + 1;
    $(".line" + addrandom).addClass('actnow').find('.has_img img').css('opacity', 1);
    clearInterval(auto_line_view);
    clearInterval(img_anims);
    img_anims = setInterval(function () {
        $(".line").each(function () {
            if ($(window).innerWidth() < mobilewidth) {
                var min = -30;
                var max = 30;
                var width = Math.floor(Math.random() * (max - min + 1)) + min;
                $(this).find('.has_img img').animate({'marginTop': width, opacity: 1}, {
                    duration: 1000,
                    easing: "linear"
                });
            } else {
                var min = -80;
                var max = 0;
                var width = Math.floor(Math.random() * (max - min + 1)) + min;
                $(this).find('.has_img img').animate({'marginLeft': width, opacity: 1}, {
                    duration: 1000,
                    easing: "linear"
                });
            }
        });
    }, 500);


    $(".line").each(function () {
        if ($(window).innerWidth() < mobilewidth) {
            var l = $(this).position();
            var r = window.innerHeight - (l.top + $(this).height());
            $(this).find('.content').attr('data-top', l.top).attr('data-bottom', r);
            $(this).find('.content').css({
                'top': l.top,
                'bottom': r
            });
        } else {
            var l = $(this).position();
            var r = window.innerWidth - (l.left + $(this).width());
            $(this).find('.content').attr('data-left', l.left).attr('data-right', r);
            $(this).find('.content').css({
                'left': l.left,
                'right': r
            });
        }
    });

    $(".lines").addClass('load-lined hoverallow');
    auto_line_view = setInterval(function () {
        if ($(".lines").hasClass('hoverallow')) {
            if (!$(".lines").hasClass('autoactive')) {
                $(".line").removeClass('actnow');
                var addrandom = Math.floor(Math.random() * ($('.line').length - 1 + 1)) + 1;
                $(".line" + addrandom).addClass('actnow').find('.has_img img').css('opacity', 1);
            }
        }
    }, 3000);
}

function content_width() {
    $(".subdata").css('width', window.innerWidth);
    $(".small_msg div.pops a").css('margin-top', (window.innerHeight / 3) + 'px');
}


$(document).on("click", ".hoverallow .line", function () {
    $(".lines").removeClass('hoverallow');
    $this = $(this);
    if ($(window).innerWidth() < mobilewidth) {
        $this.find('.subdata').css('margin-top', '-' + $this.data('top') + 'px');
    } else {
        $this.find('.subdata').css('margin-left', '-' + $this.data('left') + 'px');
    }
    $('.lines').addClass('runsnow');
    $(".line").removeClass('actnow');
    $this.addClass('actnow active');
});

$(document).on('click', '.profile a.moreinfo', function () {
    $(this).hide();
    $(this).parent().find('.more_about').fadeIn();
    return false;
});

$(document).on('click', '.sortby', function () {
    $(".menu-popup").toggleClass('act_m')
});
$(document).on('click', '.gobackdata', function () {
    var removedata = $(".line.active");
    removedata.find('.content').addClass('isbounce_popup');
    $('body').removeClass('project-close');
    $(".lines").addClass('ishkti');
    window.history.pushState({urlPath: base_url}, "", base_url);
    setTimeout(function () {
        $(".line").removeClass('actnow active hidecnt readmore');
        $(".lines").removeClass('load-lines load-lined runsnow1 hoverallow').addClass('removeanimation');
        if ($(window).innerWidth() < mobilewidth) {
            $(".line").css({'top': 'auto', 'width': '0px'});
        } else {
            $(".line").css({'left': 'auto', 'height': 0});
        }
        set_line_width();
        $(".lines").removeClass('removeanimation');
        $('body').removeClass('project-view');
        // return false;
        setTimeout(function () {
            $(".lines").removeClass('runsnow ishkti');
        }, 100);
        setTimeout(function () {
            setheight_line();
            removedata.find('.content').removeClass('isbounce_popup');
        }, 1000);
    }, 800);

    /*
    removedata.find('.subdata').animate({'margin-left': '-' + removedata.data('left') + 'px'}, {
        duration: 500,
        easing: "linear"
    });
    removedata.find('.content').animate({
        'left': removedata.find(".content").data('left'),
        'right': removedata.find(".content").data('right'),
        'opacity': 0
    }, {
        duration: 500,
        easing: "linear"
    });
    $(".line").removeClass('readmore hidecnt'); */
    return false;
});

$(document).click(function (e) {
    if ($(e.target).closest(".small_msg div.pops a").length > 0) {
        clearInterval(img_anims);
        $(".content").scrollTop(0);
        $this = $(e.target).closest('.line');
        $this.addClass('hidecnt');
        $('body').addClass('project-view');
        $this.find('.content').css('opacity', 0).show();


        window.history.pushState({urlPath: $this.find('div.pops a').attr('href')}, "", $this.find('div.pops a').attr('href'));

        $this.find('img').each(function () {
            if ($(this).attr('data-src')) {
                $(this).attr('src', $(this).attr('data-src'));
            }
        });

        if ($(window).innerWidth() < mobilewidth) {
            $this.find('.content').animate({'top': 0, 'bottom': 0, 'opacity': 1}, {
                duration: 500,
                easing: "linear"
            });
            $this.find('.subdata').animate({'margin-top': 0}, {
                duration: 500,
                easing: "linear"
            });
        } else {
            $this.find('.content').animate({'left': 0, 'right': 0, 'opacity': 1}, {
                duration: 500,
                easing: "linear"
            });
            $this.find('.subdata').animate({'margin-left': 0}, {
                duration: 500,
                easing: "linear"
            });
        }
        setTimeout(function () {
            // $('body').addClass('project-close');
            $this.addClass('readmore');
            var wow = new WOW({
                scrollContainer: '.line' + $this.data('class') + ' .content',
                offset: 100,
            });
            wow.init();
        }, 500);
        return false;
    }
    if ($(e.target).closest(".b_mnu").length > 0) {
        return true;
    }
    if ($(e.target).closest(".line.actnow").length > 0) {
        return false;
    }

    if ($('.lines').hasClass('runsnow')) {
        if (!$('body').hasClass('project-view')) {
            $(".lines").removeClass('runsnow').addClass('hoverallow');
            $(".line").each(function () {
                var $this = $(this);
                if ($this.hasClass('active')) {
                    $this.addClass('revertanim');
                    setTimeout(function () {
                        $(".line").removeClass('active readmore revertanim');
                    }, 300);
                }
            });
            return false;
        }
    }
    return true;
});

function show_menu() {
    $(".menubar").addClass('mega_view');
    $(".menubar li").removeClass('isshov');
    setTimeout(function () {
        $(".menubar").addClass('mline1');
    }, 300);
    setTimeout(function () {
        $(".menubar").removeClass('mline0');
    }, 700);
    setTimeout(function () {
        $(".menubar li").each(function (i) {
            var $this = $(this);
            setTimeout(function () {
                $this.addClass('isshov');
                // }, i * 200);
            }, 0);
        });
    }, 1500);
    setTimeout(function () {
        $(".menubar span.title").fadeIn();
    }, 2500);
}

function hide_menu(page = '') {
    $(".menubar").addClass('closed');
    $(".menubar span.title").fadeOut(300);
    $(".menubar ul").fadeOut(300);
    setTimeout(function () {
        $(".menubar").addClass('mline0');
        $(".menu button").show();
    }, 200);
    setTimeout(function () {
        $(".menubar").removeClass('mline1');
    }, 500);
    setTimeout(function () {
        $(".menubar").removeClass('mega_view');
        $(".menubar").removeClass('closed');
        if (page) {
            $("body").attr('id', page).attr('data-page', page);
            $(".loading_we").show();
        }
    }, 700);
    setTimeout(function () {
        $(".menubar ul").show();
        if (page) {
            loader_we();
        }
    }, 1000);
}


$(document).ready(function () {
    $(".content").bind('scroll', function () {
        if ($(this).scrollTop() > 50) {
            $('body').addClass('project-close');
        } else {
            $('body').removeClass('project-close');
        }
    });
    $(window).scroll(function () {
        if ($("body").attr('id') != "home") {
            if ($(this).scrollTop() > 50) {
                $('body').addClass('sub-header');
            } else {
                $('body').removeClass('sub-header');
            }
        }

        const scrollstop = $(this).scrollTop() / 3;
        // $(".flags .rotate-text").css('background-position', 'center -' + scrollstop + 'px');
        $(".rotate-text").css('background-position', 'center -' + scrollstop + 'px');
    });
});

function change_content(page = '', timeout = 5000) {
    if (timeout != 5000) {
        if (!page) {
            page = 'home';
        }
        $("body").attr('id', page).attr('data-page', page);
    }

    $(".loader").removeAttr('class').addClass('loader');
    $(".lines").removeAttr('class').addClass('lines');

    $(".top-lines span").removeClass('isbig');

    $(".load span").css('height', 0).removeAttr('style');
    $(".wow").css('visibility', 'hidden');
    $(".line").css('left', 'auto').css('top', 'auto');
    $(".line .content").hide();
    $(".line").removeClass('active hidecnt readmore actnow');
    $(".menu-popup").removeClass('act_m');

    $('body').removeClass('sub-header project-view project-close');
    $('body').addClass('is_ajax_load');
    check_right_img();

    clearInterval(auto_line_view);
    clearInterval(img_anims);
    clearInterval(remover_act);

    set_line_width();
    content_width();

    setTimeout(function () {
        console.log(page);
        run_animation(page);
    }, timeout);
}

function capitalize(str, force = 1) {
    str = str.replaceAll('project-', '');
    str = str.replaceAll('-', ' ');

    str = force ? str.toLowerCase() : str;
    return str.replace(/(\b)([a-zA-Z])/g,
        function (firstLetter) {
            return firstLetter.toUpperCase();
        });
    // return string.charAt(0).toUpperCase() + string.slice(1).toLowerCase();
}

function run_animation(page = '') {
    console.log('run page ' + page);
    $("body").removeClass('complete_page');
    if (page != "home") {
        $("body").addClass('complete_page');
    }
    window.scrollTo(0, 0);
    $(".blue-lecks").addClass('no-lines');
    $('.top-lines span').removeClass('isbig');
    $('.sub_page .wow').css('visibility', 'hidden');
    $(".mg-lines span").removeAttr('style');

    $("title").html(capitalize(page) + " - WE Wonder");

    setTimeout(function () {
        $(".loading_we, .loader").fadeOut(200);
        if (page == "home") {
            setheight_line();
        }
        if (page == "work") {
            $(".blue-lecks").removeClass('no-lines');
        }
        if (page == "blog") {
            $(".blue-lecks").removeClass('no-lines');
            console.log('inside blog');
            //vue app
            var app=new Vue({
                el:'#blogsApp',
                data:{
                    allBlogPosts:'',
                },
                methods:{
                    fetchAllBlogs: async function(){
                        await axios.post('blog-inc/blog-crud.php',{
                            action:'fetchallblogs'
                        }).then(response=>{
                            app.allBlogPosts=response.data;
                        });
                    }
                },
                created:function(){
                    this.fetchAllBlogs();
                    console.log(this.allBlogPosts);
                }
            });
        }
        if (page == "contact") {
            $('.contact_content .top-lines span').eq(Math.floor(Math.random() * $('.contact_content .top-lines span').length)).addClass('isbig');
        }
        if (page == "about") {
            $('.about_content .top-lines span').eq(Math.floor(Math.random() * $('.about_content .top-lines span').length)).addClass('isbig');
        }
        if (page == "services") {
            $(".mg-lines span").each(function (i) {
                const prediction = ["", "-"];

                const random_c = Math.floor(Math.random() * prediction.length);
                var top = Math.floor(Math.random() * window.innerHeight);
                if (i < 4) {
                    prediction[random_c] = '';
                }
                $(this).css('opacity', 1).css('margin-top', prediction[random_c] + top + 'px');
            });
        }

        if (page.includes("project")) {
            $(".loading_we, .loader").hide();
            $('body').attr('id', 'home');
            $("body").addClass('project-view');
            $(".lines").addClass('load-lines load-lined runsnow');
            $(".line." + page).addClass('actnow active hidecnt readmore');
            if ($(window).innerWidth() > mobilewidth) {
            } else {
                $(".line." + page).find('.content').css({
                    'transition': 'none',
                    'inset': '',
                });
            }
            $(".line." + page).find('.content').css({
                'transition': 'none',
                'left': 0,
                'right': 0,
            }).hide().slideDown().promise().always(function () {
                $(".line." + page).find('.content').css({
                    'height': '100%',
                    // 'inset': '',
                });
            });

            $(".line." + page).find('img').each(function () {
                if ($(this).attr('data-src')) {
                    $(this).attr('src', $(this).attr('data-src'));
                }
            });

            var wow = new WOW({
                scrollContainer: ".line." + page + ' .content',
                offset: 100,
            });
            wow.init();
        } else {
            var wow = new WOW({
                scrollContainer: '#' + $("body").attr('id') + '_content',
                offset: 100,
            });
            wow.init();
        }
    }, 1000);
}

$(window).on("popstate", function (e) {
    if (e.originalEvent.state) {
        var url = (e.originalEvent.state.urlPath);
        url = (url.replace(base_url, ''));
        $(".loading_we").show();
        loader_we();
        change_content(url, 4000);
    }
});