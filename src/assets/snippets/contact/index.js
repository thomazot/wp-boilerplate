import './style.styl';

define(['jquery'], ($) => {
    $('.wpcf7-form label').click(function(){
        const label = $(this);
        label.addClass('on');
        label.find('input, textarea').on('blur', function(){
            if($.trim($(this).val()).length === 0) label.removeClass('on');
        });
    });
});