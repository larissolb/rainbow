/* 
Add comments
 */


'use strict';
let formComment = document.forms.formComment; //определена форма
let commentBtn = formComment.elements.commentBtn; //определена кнопка, по которой будут отправляться данные
commentBtn.addEventListener('click', sendComment); //событие при нажатии кнопки "Комментировать"

function sendComment(event) { //действия при нажатии кнопки "Комментировать"
    event.preventDefault(); // отменяет действие по умолчанию
    console.log("sendComment", true); //проверка нажатия кнопки отправки комментария
    let text = formComment.elements.text; //нахождение элемента текстового поля, куда внесен комментарий
    console.log(text.value); //вывод в консоль комментария, который был написан в текстовом поле 
    if (text.value !== " ") { // если текстовое поле не пустое, то..
      saveNewComment(1); //запускать функцию создания нового комментария
  }else { 
          alert('Add comment into field');
      
    }
    function saveNewComment(N) { //функция сохранения добавленного комментария с выводом на экран пользователю после формы добавления
          'use strict';
      for (let i = 0; i < N; i++) { //запускается цикл, сколько раз, текст был добавлен и отправлен, столько раз появится под формой добавления
        let newDiv = document.createElement('div'); //создается под каждый комментарий отдельный див
        let place = document.getElementById('comments');[0]; //родитель, под которым будут располагаться все создаваемые дивы при добавлении коммента
        // console.log(place); //проверка места родителя
        place.insertBefore(newDiv, place.childNodes[0]); //местоположение создаваемых дивов, после родителя, т.е. будет каждый новый коммент сверху
        newDiv.innerHTML += (text.value); //вывод самого текста комментария
        }
      }
  //после отправки комментария - очистить поле
 if (text.value !== 0) { 
      text.value = " "; 
    }
}
