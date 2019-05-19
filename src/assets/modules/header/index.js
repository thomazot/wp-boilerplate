import './style.styl';

const body       = document.querySelector('body');

define(['stickyfilljs'], (Stickyfill) => {
    const header = document.querySelector('#header');
    Stickyfill.add(header);
});

const menu = document.querySelector('#header__menu');

Array.from(menu.querySelectorAll('[aria-controls]')).forEach((control) => {
    control.addEventListener('click', (evt) => {
        const expanded = menu.getAttribute('aria-expanded') == 'false' ? true : false;
        menu.setAttribute('aria-expanded', expanded);
        if(expanded) body.setAttribute('data-fixed', true);
        else         body.setAttribute('data-fixed', false);
    })
});

let currentTop = 0;
let oldTop     = 0;
let headerTop  = document.querySelector('#header').offsetHeight;

body.setAttribute('data-scrolling', false);
body.setAttribute('data-scrolling-mode', 'none');

window.addEventListener('scroll', () => { 
    currentTop = window.pageYOffset;
    
    if(currentTop == 0)     body.setAttribute('data-scrolling', false);
    else                    body.setAttribute('data-scrolling', true);

    if(currentTop > headerTop) {
        if(oldTop > currentTop) {
            body.setAttribute('data-scrolling-mode', 'up');
        } else if (oldTop < currentTop) {   
            body.setAttribute('data-scrolling-mode', 'down');
        } else {
            body.setAttribute('data-scrolling-mode', 'none'); 
        }
        oldTop = currentTop;
    } else body.setAttribute('data-scrolling-mode', 'none');
});