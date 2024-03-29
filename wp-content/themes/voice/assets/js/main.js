(function($) {
    "use strict";

    function vce_setInterval() {
        var lastScrollTop = $(window).scrollTop();
        var navbarHeight = $('#header').outerHeight();

        $(window).scroll(function(event) {
            var st = $(this).scrollTop();

            if (st > lastScrollTop) {
                $('#sticky_header').removeClass('header-is-sticky');
            } else {
                // Scroll Up
                if (st < navbarHeight) {
                    $('#sticky_header').removeClass('header-is-sticky');
                } else {
                    $('#sticky_header').addClass('header-is-sticky');
                }
            }
            lastScrollTop = st;
        });
    }


    function vce_mega_menu_slider($obj) {

        var num_posts = $obj.parent().attr('data-numposts');

        $obj.owlCarousel({
            loop: true,
            rtl: vce_js_settings.rtl_mode,
            nav: true,
            center: false,
            fluidSpeed: 100,
            items: num_posts,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            responsive: {
                0: {
                    items: 1,
                    nav: true,
                    autoWidth: true
                },
                600: {
                    items: 2,
                    autoWidth: true
                },
                768: {
                    items: 3,
                    autoWidth: false
                },
                1024: {
                    items: num_posts,
                    autoWidth: false
                }
            }
        });
    }

    $(document).ready(function() {


        /* FEATURED GRID SLIDER */

        if (parseInt(vce_js_settings.rtl_mode) == 1) {
            vce_js_settings.rtl_mode = true;
        } else {
            vce_js_settings.rtl_mode = false;
        }

        var responsive = {
                0: {
                    items: 1,
                    nav: true,
                    autoWidth: true
                },
                600: {
                    items: 2,
                    autoWidth: true
                },
                768: {
                    items: 3,
                    autoWidth: true
                },
                1024: {
                    items: 3,
                    autoWidth: true
                },

                1920: {
                    items: 5,
                    autoWidth: true
                }
            },
            autoplay = vce_js_settings.grid_slider_autoplay;

        if ($("#vce-featured-grid").hasClass('vce-featured-grid-big')) {
            responsive = {
                0: {
                    items: 1,
                    nav: true,
                    autoWidth: true
                },
                600: {
                    items: 1,
                    autoWidth: true
                },
                768: {
                    items: 1,
                    autoWidth: true
                },
                1024: {
                    items: 1,
                    autoWidth: true
                }
            };
            autoplay = vce_js_settings.grid_big_slider_autoplay;
        }


        $("#vce-featured-grid").owlCarousel({
            margin: 1,
            loop: true,
            rtl: vce_js_settings.rtl_mode,
            autoplay: autoplay,
            autoplaySpeed: 500,
            autoplayTimeout: autoplay,
            autoplayHoverPause: true,
            nav: true,
            center: true,
            fluidSpeed: 100,
            items: 1,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
            responsive: responsive
        });

        $(".vce-featured-full-slider").owlCarousel({
            loop: true,
            nav: true,
            rtl: vce_js_settings.rtl_mode,
            autoplay: vce_js_settings.full_slider_autoplay,
            autoplaySpeed: 500,
            autoplayTimeout: vce_js_settings.full_slider_autoplay,
            autoplayHoverPause: true,
            center: true,
            items: 1,
            navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>']
        });

        vce_post_widget_slider($('.site-content'));

        function vce_post_widget_slider(obj) {

            obj.find('.vce-post-slider').each(function() {

                var autoplay_time = parseInt($(this).attr('data-autoplay')) * 1000;
                var autoplay = autoplay_time ? true : false;

                $(this).owlCarousel({
                    loop: true,
                    nav: true,
                    rtl: vce_js_settings.rtl_mode,
                    autoplay: autoplay,
                    autoplayTimeout: autoplay_time,
                    autoplayHoverPause: true,
                    center: true,
                    fluidSpeed: 100,
                    items: 1,
                    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>']
                });

            });
        }

        /* MAGNIFIC POPUP */
        //.site-content
        vce_image_popup($('.site-content'));

        function vce_image_popup(obj) {
            var item = obj.find('.vce-image-format'),
                l = item.length;
            if (l) {
                item.magnificPopup({
                    type: 'image',
                    zoom: {
                        enabled: true,
                        duration: 300, // don't foget to change the duration also in CSS
                        opener: function(element) {
                            return element.find('img');
                        }
                    }
                });
            }
        }

        vce_gallery_popup($('.site-content'));

        function vce_gallery_popup(obj) {

            var item = obj.find('.vce-gallery-big, .wp-block-gallery'),
                l = item.length;
            if (l) {
                item.magnificPopup({
                    type: 'image',
                    delegate: 'a',
                    gallery: {
                        enabled: true
                    },
                    zoom: {
                        enabled: true,
                        duration: 300, // don't foget to change the duration also in CSS
                        opener: function(element) {
                            return element.find('img');
                        }
                    },
                    image: {
                        titleSrc: function(item) {
                            var $caption = item.el.closest('.big-gallery-item, .blocks-gallery-item').find('.gallery-caption, figcaption');
                            if ($caption != 'undefined') {
                                return $caption.text();
                            }
                            return '';
                        }
                    }
                });
            }
        }

        $('body').on('click', '.vce-gallery-slider a', function(e) {
            e.preventDefault();
            var item_id = $(this).closest('.gallery-item').attr('data-item');
            var $wrap = $(this).closest('.gallery');
            var $big = $wrap.find('.vce-gallery-big');
            $big.find('.big-gallery-item').fadeOut(400);
            $big.find('.item-' + item_id).fadeIn(400);

        });


        /* GALLERY POST SLIDER */

        vce_gallery($('.site-content'));

        function vce_gallery(obj) {

            $('body').imagesLoaded(function() {

                obj.find('.gallery .vce-gallery-slider, .wp-block-gallery.columns-1').each(function() {

                    var $gallery = $(this);

                    $gallery.owlCarousel({
                        margin: 1,
                        loop: true,
                        rtl: vce_js_settings.rtl_mode,
                        nav: true,
                        mouseDrag: false,
                        center: false,
                        autoHeight: true,
                        fluidSpeed: 100,
                        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                        items: $gallery.attr('data-columns') ? $gallery.attr('data-columns') : 1,
                        autoWidth: false
                    });
                });
            });
        }



        /* MODULE SLIDERS */

        var vce_slider_items_num;
        if ($("body").hasClass('vce-sid-none')) {
            vce_slider_items_num = {
                'b': 2,
                'cdf': 3,
                'e': 7,
                'h': 3
            };
        } else {
            vce_slider_items_num = {
                'b': 1,
                'cdf': 2,
                'e': 5,
                'h': 2
            };
        }

        $(".vce-slider-pagination.vce-slider-a, .vce-slider-pagination.vce-slider-g").each(function() {

            var vce_autoplay;
            vce_autoplay = $(this).attr('data-autoplay');

            $(this).owlCarousel({
                loop: true,
                autoHeight: false,
                rtl: vce_js_settings.rtl_mode,
                autoWidth: true,
                nav: true,
                autoplay: vce_autoplay,
                autoplaySpeed: 500,
                autoplayTimeout: vce_autoplay,
                autoplayHoverPause: true,
                fluidSpeed: 100,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                responsive: {
                    0: {
                        items: 1,
                        nav: true,
                        autoWidth: false,
                        margin: 10
                    },
                    600: {
                        items: 1,
                        autoWidth: false
                    },
                    768: {
                        items: 1,
                        margin: 20,
                        autoWidth: false
                    },
                    1023: {
                        items: 1,
                        autoWidth: false,
                        margin: 20,
                    }
                }
            });
        });



        $(".vce-slider-pagination.vce-slider-b").each(function() {

            var vce_autoplay;
            vce_autoplay = $(this).attr('data-autoplay');

            $(this).owlCarousel({
                loop: true,
                autoHeight: false,
                autoWidth: true,
                rtl: vce_js_settings.rtl_mode,
                nav: true,
                fluidSpeed: 100,
                autoplay: vce_autoplay,
                autoplaySpeed: 500,
                autoplayTimeout: vce_autoplay,
                autoplayHoverPause: true,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                responsive: {
                    0: {
                        items: 1,
                        nav: true,
                        autoWidth: false,
                        margin: 10
                    },
                    600: {
                        items: 1,
                        autoWidth: false
                    },
                    768: {
                        items: 1,
                        margin: 20,
                        autoWidth: false
                    },
                    1023: {
                        items: vce_slider_items_num.b,
                        autoWidth: false,
                        margin: 20,
                    }
                }
            });
        });

        $(".vce-slider-pagination.vce-slider-c, .vce-slider-pagination.vce-slider-d, .vce-slider-pagination.vce-slider-f").each(function() {
            var vce_num_items;
            var vce_res_num_items;
            if ($(this).parent().parent().hasClass('main-box-half')) {
                vce_num_items = 1;
                vce_res_num_items = 1;
            } else {
                vce_num_items = vce_slider_items_num.cdf;
                vce_res_num_items = 2;
            }

            var vce_autoplay;
            vce_autoplay = $(this).attr('data-autoplay');

            $(this).owlCarousel({
                loop: true,
                autoHeight: false,
                rtl: vce_js_settings.rtl_mode,
                autoWidth: true,
                nav: true,
                fluidSpeed: 100,
                autoplay: vce_autoplay,
                autoplaySpeed: 500,
                autoplayTimeout: vce_autoplay,
                autoplayHoverPause: true,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                responsive: {
                    0: {
                        items: 1,
                        nav: true,
                        autoWidth: false,
                        margin: 10
                    },
                    670: {
                        items: vce_res_num_items,
                        margin: 18,
                        autoWidth: false
                    },
                    768: {
                        items: vce_res_num_items,
                        margin: 15,
                        autoWidth: false
                    },
                    1023: {
                        items: vce_num_items,
                        autoWidth: false,
                        margin: 19,
                    }
                }
            });
        });

        var vce_autoplay;
        vce_autoplay = $(this).attr('data-autoplay');

        $(".vce-slider-pagination.vce-slider-e").each(function() {
            var vce_autoplay;
            vce_autoplay = $(this).attr('data-autoplay');

            $(this).owlCarousel({
                loop: true,
                autoHeight: false,
                autoWidth: true,
                rtl: vce_js_settings.rtl_mode,
                nav: true,
                fluidSpeed: 100,
                autoplay: vce_autoplay,
                autoplaySpeed: 500,
                autoplayTimeout: vce_autoplay,
                autoplayHoverPause: true,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                responsive: {
                    0: {
                        items: 2,
                        nav: true,
                        autoWidth: false,
                        margin: 5
                    },
                    600: {
                        items: 3,
                        margin: 18,
                        autoWidth: false
                    },
                    768: {
                        items: 5,
                        margin: 15,
                        autoWidth: false
                    },
                    1023: {
                        items: vce_slider_items_num.e,
                        autoWidth: false,
                        margin: 19,
                    }
                }
            });
        });

        $(".vce-slider-pagination.vce-slider-h").each(function() {

            var vce_autoplay;
            vce_autoplay = $(this).attr('data-autoplay');

            $(this).owlCarousel({
                loop: true,
                autoHeight: false,
                autoWidth: true,
                rtl: vce_js_settings.rtl_mode,
                nav: true,
                fluidSpeed: 100,
                autoplay: vce_autoplay,
                autoplaySpeed: 500,
                autoplayTimeout: vce_autoplay,
                autoplayHoverPause: true,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                responsive: {
                    0: {
                        items: 1,
                        nav: true,
                        autoWidth: false,
                        margin: 10
                    },
                    600: {
                        items: 1,
                        autoWidth: false
                    },
                    768: {
                        items: 2,
                        margin: 20,
                        autoWidth: false
                    },
                    1023: {
                        items: vce_slider_items_num.h,
                        autoWidth: false,
                        margin: 20
                    }
                }
            });
        });

        function vce_sticky_sidebar(fixed) {

            if ($(window).width() >= 1024) {

                if ($('.vce-sticky').length > 0) {

                    var content_height = $('#main-wrapper').find('.site-content').last().height();
                    var sidebar_height = $('#main-wrapper').find('.sidebar').last().height();
                    var vce_top_position;

                    if ($('.header-sticky').length) {
                        vce_top_position = 80;
                    } else {
                        vce_top_position = 30;
                    }


                    if (content_height > sidebar_height) {

                        $('#main-wrapper').find('.sidebar').last().css('min-height', content_height - 30);

                        $(".vce-sticky").stick_in_parent({
                            parent: ".sidebar",
                            inner_scrolling: false,
                            offset_top: vce_top_position
                        });

                        if (fixed === true && $(".vce-sticky").last().css('position') == 'absolute') {
                            $(".vce-sticky").last().css('position', 'fixed').css('top', vce_top_position);
                        }
                    } else {
                        $('.sidebar').css('min-height', sidebar_height);
                    }
                }

            } else {
                $('.sidebar').each(function() {
                    $(this).css('height', 'auto');
                    $(this).css('min-height', '1px');
                });

                $(".vce-sticky").trigger("sticky_kit:detach");
            }

        }

        var last_width = $(window).width();
        $(window).on('resize', function() {

            // Don't do anything in full screen mode
            if (document.fullscreenElement || document.mozFullScreenElement || document.webkitFullscreenElement || document.msFullscreenElement) {
                return;
            }

            //Put left sidebar after main content in responsive mode
            if (last_width !== $(window).width()) {
                if ($(window).width() < 1024) {
                    if (!$('#content .sidebar.left').is(':last-child'))
                        $('.sidebar.left').insertAfter('.vce-main-content');
                } else {
                    if (!$('#content .sidebar.left').is(':first-child'))
                        $('.sidebar.left').insertBefore('.vce-main-content');

                    if ($('body').hasClass('sidr-main-open')) {
                        $.sidr('close', 'sidr-main');
                        $(this).removeClass('nav-open');
                    }
                }
                last_width = $(window).width();
            }

            vce_sticky_sidebar();






        });

        //Put left sidebar after main content in responsive mode
        if ($(window).width() < 1024 && $('.sidebar.left').length) {
            if (!$('#content .sidebar.left').is(':last-child'))
                $('.sidebar.left').insertAfter('.vce-main-content');
        } else {
            if (!$('#content .sidebar.left').is(':first-child'))
                $('.sidebar.left').insertBefore('.vce-main-content');
        }

        $('body').imagesLoaded(function() {

            /* MATCH HEIGHT FOR LAYOUTS */

            $('.vce-mega-menu-posts-wrap .mega-menu-link').matchHeight();
            $('.vce-slider-c .vce-lay-c,.vce-slider-e .vce-lay-e').matchHeight();


            /* Initialize sticky sidebar */
            vce_sticky_sidebar();

        });


        align_full_fix();

        function align_full_fix() {

            var style = '.alignfull, .vce-sid-left .alignwide, .vce-sid-right .alignwide { max-width: ' + $('.main-box').width() + 'px; position: relative; -webkit-transform: translateX(-50%); -ms-transform: translateX(-50%); transform: translateX(-50%); width: 100vw; left: 50%; }';

            if ($('#voice-full-fix').length) {
                $('#voice-full-fix').html(style);
            } else {
                $('head').append('<style id="voice-full-fix" type="text/css">' + style + '</style>');
            }


        }

        /* Fit videos */

        responsive_videos();

        function responsive_videos() {
            var obj = $('.entry-content, .meta-media');
            var iframes = [
                "iframe[src*='youtube.com/embed']",
                "iframe[src*='player.vimeo.com/video']",
                "iframe[src*='kickstarter.com/projects']",
                "iframe[src*='players.brightcove.net']",
                "iframe[src*='hulu.com/embed']",
                "iframe[src*='vine.co/v']",
                "iframe[src*='videopress.com/embed']",
                "iframe[src*='dailymotion.com/embed']",
                "iframe[src*='vid.me/e']",
                "iframe[src*='player.twitch.tv']",
                "iframe[src*='facebook.com/plugins/video.php']",
                "iframe[src*='gfycat.com/ifr/']",
                "iframe[src*='liveleak.com/ll_embed']",
                "iframe[src*='media.myspace.com']",
                "iframe[src*='archive.org/embed']",
                "iframe[src*='channel9.msdn.com']",
                "iframe[src*='content.jwplatform.com']",
                "iframe[src*='wistia.com']",
                "iframe[src*='vooplayer.com']",
                "iframe[src*='content.zetatv.com.uy']",
                "iframe[src*='embed.wirewax.com']",
                "iframe[src*='eventopedia.navstream.com']",
                "iframe[src*='cdn.playwire.com']",
                "iframe[src*='drive.google.com']",
                "iframe[src*='videos.sproutvideo.com']",
                "iframe[src*='ipcamlive.com']"
            ];

            obj.fitVids({
                customSelector: iframes.join(','),
                ignore: '[class^="wp-block"]'
            });
        }

        $('body').on('mouseenter', '.vce-featured-header .vce-hover-effect', function() {

            $('.vce-featured-header .vce-featured-header-background').animate({
                opacity: vce_js_settings.fa_big_opacity[2]
            }, 100);

        });


        $('body').on('mouseleave', '.vce-featured-header .vce-hover-effect', function() {
            $('.vce-featured-header .vce-featured-header-background').animate({
                opacity: vce_js_settings.fa_big_opacity[1]
            }, 100);
        });


        $(".nav-menu li").on('mouseenter mouseleave', function(e) {

            if ($(this).find('ul').length) {

                var rt = ($(window).width() - ($(this).find('ul').offset().left + $(this).find('ul').outerWidth()));

                if (rt < 0) {
                    $(this).find('ul').addClass('vce-rev');
                } else {
                    $(this).find('ul').removeClass('vce-rev');
                }

            }
        });



        /* Responsive navigation */

        $('#vce-responsive-nav').sidr({
            name: 'sidr-main',
            source: '#site-navigation',
            speed: 100
        });

        /*Top bar on resposive navigation */
        if (vce_js_settings.top_bar_mobile != 0) {

            var mobile_nav = $('#sidr-id-vce_main_navigation_menu');

            if ($('#vce_top_navigation_menu').length) {

                var top_navigation = $('#vce_top_navigation_menu').children().clone();
                var top_navigation_group = $('<li class="sidr-class-menu-item-has-children"></li>').append('<a href="#">' + vce_js_settings.top_bar_more_link + '</a>');

                if ($('.sidr-class-search-header-wrap').length) {

                    if (vce_js_settings.top_bar_mobile_group != 0) {
                        top_navigation_group.append($('<ul class="sidr-class-sub-menu">').append(top_navigation)).insertBefore(mobile_nav.find('.sidr-class-search-header-wrap'));
                    } else {
                        top_navigation.insertBefore(mobile_nav.find('.sidr-class-search-header-wrap'));
                    }
                } else {
                    if (vce_js_settings.top_bar_mobile_group != 0) {
                        mobile_nav.append(top_navigation);
                    } else {
                        top_navigation_group.append($('<ul class="sidr-class-sub-menu">').append(top_navigation));
                    }
                }

            }

            if ($('#vce_social_menu').length) {
                var social_navigation = $('#vce_social_menu').clone().addClass('clear');
                mobile_nav.append($('<li/>').append(social_navigation));
            }

        }

        /* mega menu on responsive navigation */
        if ($('.sidr-class-vce-mega-menu-wrapper li').length) {
            var mega_menu_wrapper = $('.sidr-class-vce-mega-menu-wrapper').css('display', 'none');
            mega_menu_wrapper.closest('li').addClass('sidr-class-menu-item-has-children');
        }

        $("body").on('click', '.vce-responsive-nav', function() {
            if (!$(this).hasClass('nav-open')) {
                $.sidr('open', 'sidr-main');
                $(this).addClass('nav-open');
            } else {
                $.sidr('close', 'sidr-main');
                $(this).removeClass('nav-open');
            }
        });

        $('#main-wrapper').on('click', function() {
            if ($('body').hasClass('sidr-open')) {
                $.sidr('close', 'sidr-main');
                $('.vce-responsive-nav').removeClass('nav-open');
            }
        });

        $('.sidr ul li').each(function() {
            if ($(this).hasClass('sidr-class-menu-item-has-children')) {
                $(this).append('<span class="vce-menu-parent fa fa-angle-down"></span>');
            }
        });
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            $('.vce-menu-parent').on('touchstart', function(e) {
                $(this).prev().slideToggle();
                $(this).parent().toggleClass('sidr-class-current_page_item');
            });

            $('.soc_sharing').on('click', function() {
                $(this).toggleClass('soc_active');
            });

        } else {
            $('.vce-menu-parent').on('click', function(e) {
                $(this).prev().slideToggle();
                $(this).parent().toggleClass('sidr-class-current_page_item');
            });
        }



        /* SCROLL TO COMMENTS */

        $('body').on('click', '.vce-single .entry-meta .comments a, body.single .vce-featured .entry-meta .comments a', function(e) {
            e.preventDefault();
            var section = $(this).closest('.site-content');
            var target = this.hash,
                $target = section.find(target);
            $('html, body').stop().animate({
                'scrollTop': $target.offset().top
            }, 900, 'swing', function() {
                window.location.hash = target;
            });
        });


        /* Hendling url on ajax call for load more and infinite scroll case */
        if ($('.vce-infinite-scroll').length || $('.vce-load-more').length || $('.vce-infinite-scroll-single').length) {

            var vce_url_pushes = [];
            var vce_pushes_up = 0;
            var vce_pushes_down = 0;

            var push_obj = {
                prev: window.location.href,
                next: '',
                offset: $(window).scrollTop(),
                prev_title: window.document.title,
                next_title: window.document.title
            };

            vce_url_pushes.push(push_obj);
            window.history.pushState(push_obj, '', window.location.href);

            var last_up, last_down = 0;

            $(window).scroll(function() {
                if (vce_url_pushes[vce_pushes_up].offset != last_up && $(window).scrollTop() < vce_url_pushes[vce_pushes_up].offset) {

                    last_up = vce_url_pushes[vce_pushes_up].offset;
                    last_down = 0;
                    window.document.title = vce_url_pushes[vce_pushes_up].prev_title;
                    window.history.replaceState(vce_url_pushes, '', vce_url_pushes[vce_pushes_up].prev); //1

                    vce_pushes_down = vce_pushes_up;
                    if (vce_pushes_up != 0) {
                        vce_pushes_up--;
                    }
                }
                if (vce_url_pushes[vce_pushes_down].offset != last_down && $(window).scrollTop() > vce_url_pushes[vce_pushes_down].offset) {

                    last_down = vce_url_pushes[vce_pushes_down].offset;
                    last_up = 0;

                    window.document.title = vce_url_pushes[vce_pushes_down].next_title;
                    window.history.replaceState(vce_url_pushes, '', vce_url_pushes[vce_pushes_down].next);

                    vce_pushes_up = vce_pushes_down;
                    if (vce_pushes_down < vce_url_pushes.length - 1) {
                        vce_pushes_down++;
                    }

                }
            });

        }

        /* Load More Posts */

        var vce_load_ajax_new_count = 0;

        $("body").on('click', '.vce-load-more a', function(e) {
            e.preventDefault();
            var $link = $(this);
            var start_url = window.location.href;
            var prev_title = window.document.title;
            var page_url = $link.attr("href");
            $link.addClass('vce-loader');

            $("<div>").load(page_url, function() {

                var n = vce_load_ajax_new_count.toString();
                var $wrap = $link.closest('.main-box-inside').find('.vce-loop-wrap');
                var $new = $(this).find('.vce-loop-wrap .vce-post').addClass('vce-new-' + n);
                var $this_div = $(this);

                $new.imagesLoaded(function() {

                    $new.hide().appendTo($wrap).fadeIn(400);



                    if ($this_div.find('.vce-load-more').length) {
                        $link.closest('.main-box-inside').find('.vce-load-more').html($this_div.find('.vce-load-more').html());
                    } else {
                        $link.closest('.main-box-inside').find('.vce-load-more').fadeOut('fast').remove();
                    }

                    if (page_url != window.location) {

                        vce_pushes_up++;
                        vce_pushes_down++;
                        var next_title = $this_div.find('title').text();

                        var push_obj = {
                            prev: start_url,
                            next: page_url,
                            offset: $(window).scrollTop(),
                            prev_title: prev_title,
                            next_title: next_title
                        };

                        vce_url_pushes.push(push_obj);
                        window.document.title = next_title;
                        window.history.pushState(push_obj, '', page_url);

                    }

                    vce_load_ajax_new_count++;

                    vce_sticky_sidebar(true);

                    return false;
                });

            });

        });


        /* Infinite scroll */

        var vce_infinite_allow = true;
        if ($('.vce-infinite-scroll').length) {
            $(window).scroll(function() {
                //console.log('top: ' + $(this).scrollTop());
                ///console.log('inf: ' + ( $('.vce-infinite-scroll').offset().top - $(this).height() ) );
                if (vce_infinite_allow && $('.vce-infinite-scroll').length && ($(this).scrollTop() > ($('.vce-infinite-scroll').offset().top) - $(this).height() - 200)) {
                    var $link = $('.vce-infinite-scroll a');
                    var page_url = $link.attr("href");
                    var start_url = window.location.href;
                    var prev_title = window.document.title;
                    if (page_url !== undefined) {
                        $link.parent().animate({
                            opacity: 1,
                            height: 32
                        }, 300).css('padding', '20px');

                        vce_infinite_allow = false;

                        $("<div>").load(page_url, function() {

                            var n = vce_load_ajax_new_count.toString();
                            var $wrap = $link.closest('.main-box-inside').find('.vce-loop-wrap');
                            var $new = $(this).find('.vce-loop-wrap .vce-post').addClass('vce-new-' + n);
                            var $this_div = $(this);

                            $new.imagesLoaded(function() {
                                $new.hide().appendTo($wrap).fadeIn(400);

            

                                if ($this_div.find('.vce-infinite-scroll').length) {
                                    $link.closest('.main-box-inside').find('.vce-infinite-scroll').html($this_div.find('.vce-infinite-scroll').html()).animate({
                                        opacity: 0,
                                        height: 0
                                    }, 300).css('padding', '0');
                                    vce_infinite_allow = true;
                                } else {
                                    $link.closest('.main-box-inside').find('.vce-infinite-scroll').fadeOut('fast').remove();
                                }

                                if (page_url != window.location) {

                                    vce_pushes_up++;
                                    vce_pushes_down++;
                                    var next_title = $this_div.find('title').text();

                                    var push_obj = {
                                        prev: start_url,
                                        next: page_url,
                                        offset: $(window).scrollTop(),
                                        prev_title: prev_title,
                                        next_title: next_title
                                    };

                                    vce_url_pushes.push(push_obj);
                                    window.document.title = next_title;
                                    window.history.pushState(push_obj, '', page_url);

                                }
                                vce_load_ajax_new_count++;

                                vce_sticky_sidebar(true);

                                return false;
                            });

                        });
                    }
                }
            });
        }

        /* Infinite scroll on single post page*/

        var vce_infinite_allow_single = true;
        var vce_load_ajax_new_count_single = 0;

        if ($('.vce-infinite-scroll-single').length) {

            $(window).scroll(function() {

                if (vce_infinite_allow_single && $('.vce-infinite-scroll-single').length && ($(this).scrollTop() > ($('.vce-infinite-scroll-single').offset().top) - $(this).height() - 100)) {

                    var $link = $('.vce-infinite-scroll-single a');
                    var page_url = $link.attr("href");
                    var start_url = window.location.href;
                    var prev_title = window.document.title;

                    if (page_url !== undefined) {
                        $link.parent().animate({
                            opacity: 1,
                            height: 32
                        }, 300).css('padding', '0 0 20px');

                        vce_infinite_allow_single = false;


                        $("<div>").load(page_url, function() {

                            var n = vce_load_ajax_new_count_single.toString();
                            var $wrap = $link.closest('#main-wrapper').find('.site-content').last();
                            var $new = $(this).find('.site-content').last().addClass('vce-new-' + n);
                            var $featured = $(this).find('.vce-featured').last().addClass('vce-featured-opacity vce-featured-' + n);
                            $featured.find('.vce-featured-info').addClass('vce-info-opacity');
                            var $this_div = $(this);

                            $new.imagesLoaded(function() {

                                if ($featured.hasClass('vce-featured-opacity')) {
                                    $featured.hide().insertAfter($wrap).fadeIn(400);
                                    $new.hide().insertAfter($featured).fadeIn(400);
                                } else {
                                    $new.hide().insertAfter($wrap).fadeIn(400);
                                }

                                $('body').removeClass('vce-sid-none', 'vce-sid-left', 'vce-sid-right');


                                vce_image_popup($new);
                                vce_gallery_popup($new);
                                vce_gallery($new);
                                vce_post_widget_slider($new);

                                if ($this_div.find('.vce-infinite-scroll-single').length) {
                                    $link.closest('#main-wrapper').find('.vce-infinite-scroll-single').html($this_div.find('.vce-infinite-scroll-single').html()).animate({
                                        opacity: 0,
                                        height: 0
                                    }, 300).css('padding', '0');
                                    vce_infinite_allow_single = true;
                                } else {
                                    $link.closest('#main-wrapper').find('.vce-infinite-scroll-single').fadeOut('fast').remove();
                                }

                                if (page_url != window.location) {

                                    vce_pushes_up++;
                                    vce_pushes_down++;
                                    var next_title = $this_div.find('title').text();

                                    var push_obj = {
                                        prev: start_url,
                                        next: page_url,
                                        offset: $(window).scrollTop(),
                                        prev_title: prev_title,
                                        next_title: next_title
                                    };

                                    vce_url_pushes.push(push_obj);
                                    window.document.title = next_title;
                                    window.history.pushState(push_obj, '', page_url);

                                }

                                vce_load_ajax_new_count_single++;

                                vce_sticky_sidebar();


                                return false;
                            });

                        });

                    }
                }
            });
        }


        /* ACCORDION MENU WIDGET */

        $('body').on('click', '.widget_nav_menu .menu-item-has-children, .widget_pages .page_item_has_children', function() {
            $(this).find('ul.sub-menu:first, ul.children:first').slideToggle('fast');
        });

        $('body').on("click", ".search_header", function() {
            $(this).find('i').toggleClass('fa-times', 'fa-search');
            $(this).toggleClass('vce-item-selected');
            $(this).parent().toggleClass('vce-zoomed');
            $(this).next().find('.search-input').focus();
        });


        /* BACK TO TOP */

        $(window).scroll(function() {
            if ($(this).scrollTop() > 400) {
                $('#back-top').fadeIn();
            } else {
                $('#back-top').fadeOut();
            }
        });

        $('body').on('click', '#back-top', function() {
            $('body,html').animate({
                scrollTop: 0
            }, 800);
            return false;
        });
        

        /* STICKY HEADER */

        if (vce_js_settings.sticky_header) {
            var sticky_header_created = false;

            if ($('#header').length) {

                var sticky_header_top = $('#header').offset().top + parseInt(vce_js_settings.sticky_header_offset);

                $(window).scroll(function() {
                    if ($(window).width() > 480) {
                        if ($(window).scrollTop() > sticky_header_top) {
                            $('body').addClass('sticky-active');
                            $('#sticky_header').addClass('header-is-sticky');
                        } else {
                            $('body').removeClass('sticky-active');
                            $('#sticky_header').removeClass('header-is-sticky');
                        }

                    } else {

                        $('body').addClass('sticky-active');

                        //call for hasScrolled() function
                        vce_setInterval();
                    }

                });

            }

        }

        /**
         * Check if is set some other laguage and return his language key to fix ajax request
         * @type mixed Sting or Null
         */
        var wpml_current_lang = vce_js_settings.ajax_wpml_current_lang !== null ? '?wpml_lang=' + vce_js_settings.ajax_wpml_current_lang : '';

        /* Mega menu */

        if (vce_js_settings.ajax_mega_menu) {

            $('body').on("mouseover touchend", "#vce_main_navigation_menu li.vce-mega-cat a", function() {

                var $ul_wrap = $(this).parent().find('.vce-mega-menu-wrapper');

                if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
                    $(this).attr('href','#');
                }

                if ($ul_wrap.is(':empty')) {

                    $ul_wrap.addClass('vce-loader');

                    var data = {
                        action: 'vce_mega_menu',
                        cat: $(this).attr('data-mega_cat_id')
                    };

                    $.post(vce_js_settings.ajax_url + wpml_current_lang, data, function(response) {
                        if ($ul_wrap.is(':empty')) {
                            //$ul_wrap.append(response);

                            var $response = $($.parseHTML(response));

                            $ul_wrap.removeClass('vce-loader');
                            setTimeout(function() {
                                $.fn.matchHeight._apply('.vce-mega-menu-posts-wrap .mega-menu-link', true);
                            }, 300);
                            $response.hide().appendTo($ul_wrap).fadeIn(400);

                            if (vce_js_settings.mega_menu_slider) {
                                vce_mega_menu_slider($ul_wrap.find('.vce-mega-menu-posts-wrap > ul'));
                            }
                        }
                    });
                }

            });

        } else {

            if (vce_js_settings.mega_menu_slider) {

                $('#header .vce-mega-menu-posts-wrap > ul').each(function() {
                    vce_mega_menu_slider($(this));
                });
            }
        }




        $(window).resize(function() {

            align_full_fix();
        });

    }); //end document ready




})(jQuery);