import Glider from 'glider-js/glider';

/**
 * Subscriptions class
 */
 export default class Slider {

    /**
     * Executed when the document is ready
     * 
     * @return  {Object}
     */
    static create() {
        const instance = new this();
        instance.configure();
        return instance;
    }

    /**
     * Executed when crating the component
     * 
     * @return {void}
     */
    configure() {

        window.addEventListener('DOMContentLoaded', () => {

            const gliderSliders = document.querySelectorAll('.glider');
        
            if (!gliderSliders.length) return;
        
            let i = 1;
            for (const gliderSlider of gliderSliders) {
        
                new Glider(gliderSlider, {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    draggable: true,
                    duration: 0.25,
                    arrows: {
                        prev: '.glider-prev-' + i,
                        next: '.glider-next-' + i,
                    },
                    responsive: [
                        {
                            breakpoint: 767,
                            settings: {
                                slidesToShow: 3,
                            }
                        }, {
                            breakpoint: 991,
                            settings: {
                                slidesToShow: 4,
                            }
                        }, {
                            breakpoint: 1199,
                            settings: {
                                slidesToShow: 5,
                            }
                        }
                    ]
                });
                i++;
            }

            setTimeout( () => {
                this.centerGliderButtons();
            }, 100);
            
        });

        window.onresize = this.centerGliderButtons;
    }

    /**
     * Centers the left and right arrows
     * 
     * @return {void}
     */
    centerGliderButtons() {

        const images = document.querySelectorAll('.glider-contain .glider-slide img');
        if (!images.length) return;
        
        const firstImageHeight = images[0].offsetHeight;
        const gliderNextButtons = document.querySelectorAll('.glider-next');
        const gliderPrevButtons = document.querySelectorAll('.glider-prev');
        
        if (gliderNextButtons.length) {
            for (let i = 0; i < gliderNextButtons.length; i++) {
                gliderNextButtons[i].style.top = ((firstImageHeight - gliderNextButtons[i].offsetHeight) / 2) + 10 + 'px';
            }
        }
        
        if (gliderPrevButtons.length) {
            for (let i = 0; i < gliderPrevButtons.length; i++) {
                gliderPrevButtons[i].style.top = ((firstImageHeight - gliderPrevButtons[i].offsetHeight) / 2) + 10 + 'px';
            }
        }
    }
}