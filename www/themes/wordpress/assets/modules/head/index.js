import './style.styl';

define(['stickyfilljs'], (Stickyfill) => {
    const header = document.querySelector('.head');
    Stickyfill.add(header);
});
