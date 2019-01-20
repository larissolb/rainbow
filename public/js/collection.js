(function () {
    'use strict';

    function sendForm(event) {
        event.preventDefault();

        let form_data = new FormData(this);

        let xhr = new XMLHttpRequest();
        xhr.open("POST", this.action, true);
        xhr.send(form_data);

        xhr.onload = function (oEvent) {
            if (xhr.status == 200) {
                let pic = document.getElementById('pics');
                if(pic.value === "") {
                return responseHandler("NO_PIC");
                }
                console.log("xhr response", xhr.responseText);
                responseHandler(xhr.responseText);
            }
        };
    }

    function responseHandler(response) {
        if (response === "LOAD_SUCCESS") {
            alert("Your pic has uploaded!");
            window.location.href = "/share";
        } else if (response === "TYPE_ERROR"){
            alert("Sorry, this pic has bad type. Use only .png images");
        } else if (response === "SIZE_ERROR"){
            alert("Size is more than 50kb");         
        }else if (response === "NO_PIC"){
            alert("You've forgotten your pic :-('");          
        }
        
        else {
            console.log("system error");
        }
    }

    function addFormListener() {
        for (let i = 0; i < document.forms.length; i++) {
            document.forms[i].addEventListener('submit', sendForm);
        }
    }

    addFormListener();

}());