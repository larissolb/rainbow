/* 
обработка формы с share.html
//как правильно нужно получать картинки загруженные пользоваталем?!.
 */
(function () {
    'use strict';
/* данные с формы   */
let nameBook = document.getElementById('nameBook');
let theme = document.querySelector('input[name="theme"]:checked').value;
    // console.log(theme);
let instrument = document.getElementById('type'); 
let inst;
let quanColor = document.getElementById('amount');
let describe = document.getElementById('describe');
let pic = document.getElementById('pics');

let shareBtn = document.getElementById('shareBtn');
  
 //массивы, где все будет храниться
  let fullInfo = [];
  let onlyPics = []; //только картинки с тематикой
  
  //действия, чтобы загрузилось все в базу
  
  shareBtn.addEventListener('click', getInfo);
  function getInfo(event) {
      event.preventDefault();
    //получение типа используемого инструмента
      for (let i = 0; i < instrument.length; i++){
        if(instrument[i].selected) {
          inst = instrument[i].innerHTML;
        }  
      }
     
    
    fullInfo.push(nameBook.value, theme, inst, quanColor.value, describe.value, pic.value);
    return console.log(fullInfo);
  }
  

}(window));
