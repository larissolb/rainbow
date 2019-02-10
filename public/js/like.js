/* 
counter of likes
 */
(function () {
     'use strict';

let like = document.forms.like;
let plus = document.querySelector(".like");
let current = Number.parseInt(plus.value);

       function addLike(event) {
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
        if (response === "LIKE") {
            plus.value = (current + 1);
            plus.innerHTML = plus.value; //вывод кол-ва кликов
//             location.reload();
   
        } else if (response === "GO_AUTH"){
            alert("Please, sign in or register");
            return "GO_AUTH";
        }   else {
            console.log("system error");
        }
    }

            like.addEventListener('click', addLike);
        
    
    

}());