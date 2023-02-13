(function($) {

    "use strict";

    $(document).ready(function() {

        $("body").on('click', '#vce_welcome_box_hide', function(e) {
            e.preventDefault();
            $(this).parent().fadeOut(300).remove();
            $.post(ajaxurl, { action: 'vce_hide_welcome' }, function(response) {});
        });

        $("body").on('click', '#vce_update_box_hide', function(e) {
            e.preventDefault();
            $(this).parent().remove();
            $.post(ajaxurl, { action: 'vce_update_version' }, function(response) {});
        });

        $('body').on('click', '.mks-twitter-share-button', function(e) {
            e.preventDefault();
            var data = $(this).attr('data-url');
            vce_social_share(data);
        });


        $('.vce-redux-marker').each(function() {
            var elem = $(this);
            elem.parents('tr:first').css({ display: 'none' }).prev('tr').css('border-bottom', 'none');
            var group = elem.parents('.redux-group-tab:first');
            if (!group.hasClass('sectionsChecked')) {
                group.addClass('sectionsChecked');
                var test = group.find('.redux-section-indent-start h3');
                jQuery.each(
                    test,
                    function(key, value) {
                        jQuery(value).css('margin-top', '20px')
                    }
                );

                if (group.find('h3:first').css('margin-top') == "20px") {
                    group.find('h3:first').css('margin-top', '0');
                }
            }

        });

    });

    function vce_social_share(data) {
        window.open(data, "Share", 'height=500,width=760,top=' + ($(window).height() / 2 - 250) + ', left=' + ($(window).width() / 2 - 380) + 'resizable=0,toolbar=0,menubar=0,status=0,location=0,scrollbars=0');
    }

})(jQuery);