/* 
counter of likes
 */
(function (globalVar) {
     'use strict';

let like = document.getElementById('like');
let counter = 0; //счетчик
globalVar.like.onclick = function(event) {//счетчик количества кликов
    counter++;
    console.log(event);
    console.log("likes:",counter);
    return document.querySelector(".like").innerHTML = (counter); //вывод кол-ва кликов
};
    console.log(window);
}(window));
