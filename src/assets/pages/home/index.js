import "./styles.styl";

define(['scrollmagic', 'jquery'], (ScrollMagic, $) => {
    // init controller
    const controller = new ScrollMagic.Controller();
    let startNumber = true;

    // create a scene
    const selectors = ['.home .about', '.home .post-list--services', '.home .post-list--cases', '.home .numbers', '.home .partners', '.home .contact'];

    selectors.forEach((select) => {
        const el = document.querySelector(select);
        if(el) animateAbout(el, controller);
    });

    function animateAbout(el, controller) {
        new ScrollMagic.Scene({
                triggerElement: el,
                duration: 100,
                reverse: true
            })
            .on('start', function(){
                el.setAttribute('data-animate', 'true');
                if(el.classList.contains('numbers')) animateNumbers(el);
            })
            .addTo(controller);
    }

    function animateNumbers(el) {
        if(startNumber) {
            const numbers = Array.from(el.querySelectorAll('[data-number]'));
            numbers.forEach((number) => numberCount(number, 0));
        }
        startNumber = false;
    }

    const finishCount = 2000;

    function numberCount(el, current) {
        const n = parseInt(el.getAttribute('data-number'));
        const time = (finishCount/n) ? finishCount/n : 0;
        current = current + 1;
        el.innerHTML = current;
        if(current <= n) {
            setTimeout(() => numberCount(el, current), time);
        }
    }
});