(function (global) {
    'use strict';
    // тело функции

    let slider = {
        init: function (id) {
            console.log(this); // slider undefined
            this.elem = document.getElementById(id);
            this.elem.classList.add('slider');
            this.slides = [];
            this.currentIndex = 0;
        },
        add: function (imagePath, text) {
            let image = document.createElement('img');
            // <img>
            image.setAttribute('src', imagePath);
            //<img src='path'>
            image.setAttribute('alt', text);
            //<img src='path' alt='text'>
            this.elem.appendChild(image);
            // <div id="slider">
                // <img src='path' alt='text'>
            // </div>
            this.slides.push(image);
        },

        run: function () {
            // отображение следующего слайда по клику на рисунок
             this.nextSlide();
            let slide = document.getElementById("slider");
             slide.onclick = function(event){
               console.log(event);      
               slider.nextSlide();
            };
        },
        nextSlide: function () {
            // ['slide 1' , 'slide 2' , 'slide 3' active !]; // 3 <img src='path' alt='text'>
            if (this.currentIndex || this.currentIndex === 0) {
                this.slides[this.currentIndex].classList.remove('active');
                this.currentIndex += 1;
            }
            // ['slide 1' !, 'slide 2' , 'slide 3']; // 3 <img src='path' alt='text'>
            this.currentIndex = this.currentIndex < this.slides.length ?
                this.currentIndex : 0;

            // ['slide 1' active!, 'slide 2' , 'slide 3'  ]; <img src='path' alt='text'>
            this.slides[this.currentIndex].classList.add('active');

        }
    };

    global.sliderInit = slider.init.bind(slider);
    global.sliderAdd = slider.add.bind(slider);
    global.sliderRun = slider.run.bind(slider);


}(window));


