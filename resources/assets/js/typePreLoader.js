// jshint ignore: start
/* eslint-disable */
const preloadFonts = (id) => {
    return new Promise((resolve, reject) => {
        WebFont.load({
            typekit: {
                id: id
            },
            active: resolve
        });
    });
 };

 preloadFonts('yxr4ufi').then(() => {
    document.body.classList.remove('loading');
    console.log('Neue Haas Unica Loaded')
 });

