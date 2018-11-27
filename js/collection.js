/* 
обработка формы с share.html
//как правильно нужно получать картинки загруженные пользоваталем?!.
 */
(function () {
    'use strict';
/* данные с формы   */
let nameBook = document.getElementById('nameBook');
let theme = document.querySelector('input[name="theme"]:checked').value;
let themeM = document.getElementById('themeM');
let instrument = document.getElementById('type'); 
let inst;
let quanColor = document.getElementById('amount');
let describe = document.getElementById('describe');
let pic = document.getElementById('pics');

let shareBtn = document.getElementById('shareBtn');
  
 //массив, куда все попадает
  let fullInfo = [];
 
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
      for (let i = 0; i < themeM.length; i++){
        if(themeM[i].selected) {
          themeM = themeM[i].innerHTML;
        }  
      }      
      if(pic.value === "") {
          alert("you've forgotten your pic :-('");
          console.log("you've forgotten your pic :-('");
         return;
      }
     
    
    fullInfo.push(nameBook.value, theme, themeM, inst, quanColor.value, describe.value, pic.value);
        return console.log(fullInfo);
  }
  

}(window));
