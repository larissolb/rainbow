/* 
Add comments
 */

(function () {
    'use strict';

let formComment = document.forms.formComment; //определена форма
let text = formComment.elements.comment; //нахождение элемента текстового поля, куда внесен комментарий

    function saveNewComment(N) { //функция сохранения добавленного комментария с выводом на экран пользователю после формы добавления
            if (text.value !== " ") { // если текстовое поле не пустое, то..
        for (let i = 0; i < N; i++) { //запускается цикл, сколько раз, текст был добавлен и отправлен, столько раз появится под формой добавления
        let newDiv = document.createElement('div'); //создается под каждый комментарий отдельный див
        let place = document.getElementById('comments');[0]; //родитель, под которым будут располагаться все создаваемые дивы при добавлении коммента
        // console.log(place); //проверка места родителя
        place.insertBefore(newDiv, place.childNodes[0]); //местоположение создаваемых дивов, после родителя, т.е. будет каждый новый коммент сверху
        newDiv.innerHTML += (text.value); //вывод самого текста комментария
        location.reload();
        formComment.reset();
        }
        }else { 
          alert('Add comment into field');
      
    }
      }
  //после отправки комментария - очистить поле
 if (text.value !== 0) { 
      text.value = " "; 
    }

    function sendForm(event) {
        event.preventDefault();
        
        let form_data = new FormData(this);
     
        let xhr = new XMLHttpRequest();
        xhr.open("POST", this.action, true);
        xhr.send(form_data);

        xhr.onload = function (oEvent) {
            if (xhr.status == 200) {
                console.log("xhr response", xhr.responseText);
                responseHandler(xhr.responseText);
            }
        };
    }

    function responseHandler(response) {
        if (response === "COMMENT_SAVED") {
            saveNewComment(1);
            
        }else if (response === "GO_AUTH"){
            alert("Please, sign in or register");
            formComment.reset();
            return "GO_AUTH";
        }   else {
            console.log("system error");
        }
    }

            formComment.addEventListener('submit', sendForm);

}());