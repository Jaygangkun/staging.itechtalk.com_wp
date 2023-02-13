(function($) {

    "use strict";

    $(document).ready(function() {
        $('body').on('click', 'img.vce-img-select', function(e) {
            e.preventDefault();
            $(this).closest('ul').find('img.vce-img-select').removeClass('selected');
            $(this).addClass('selected');
            $(this).closest('ul').find('input').prop('checked', false).removeAttr('checked');
            $(this).closest('li').find('input').prop('checked', true).attr('checked', 'checked');
        });
    });

})(jQuery);