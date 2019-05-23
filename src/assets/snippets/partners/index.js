import './style.styl';

define(['jquery', 'slick-carousel'], ($) => {

    const carousel = $('.partners[data-carousel=true]'); 

    carousel.each(function(){
        const item = $('.partners__list', this);
        item.find('.partners__item--empty').remove();
        item.slick({
            slidesToShow: 7,
            slidesToScroll: 1,
            nextArrow: '<button class="slick-next" type="button"><i class="fas fa-chevron-right"></i></button>',
            prevArrow: '<button class="slick-prev" type="button"><i class="fas fa-chevron-left"></i></button>',
            responsive: [
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 5,
                        dots: true,
                        arrows: false
                    }
                },
                {
                    breakpoint: 500,
                    settings: {
                        slidesToShow: 2,
                        dots: true,
                        arrows: false
                    }
                }
            ]
        });
    });
});