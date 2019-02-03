/* 
 * ФОРМА РЕГИСТРАЦИИ/АВТОРИЗАЦИИ/ВОССТАНОВЛЕНИЯ ПАРОЛЯ
 * для регистрации логин и емейл должны быть уникальными
 * для пароля - 5 мин знаков, чтобы хотя бы одна цифра и одна заглавная
 */

(function () {
    'use strict';

/*получение пароля*/
let pswReg = document.getElementById("pswReg"); //получение пароля из формы
let result;
//функция проверки пароля на выполнение условий (минимум 5 знаков, 1 цифра, 1 заглавная) в строке
function checkCond(a)
{
var regexp= /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}/; 
regexp.test(a);
return result = regexp.test(a);
}

let div = document.getElementById('info');
let emailRec = document.getElementById('emailRec');
let emtext = document.getElementById('emtext');
let back = document.getElementById('back');
let send = document.getElementById('send');
let sendhref = document.getElementById('sendhref');
pswReg.onchange = function () {
//преобразование в строку и проверка на условия(минимум 5 знаков, 1 цифра, 1 заглавная)
let str = pswReg.value;
checkCond(str);

if(result === true){
    pswReg.style.backgroundColor = "#98FB98";
    pswReg.style.borderColor = "white";
    div.style.color = 'darkgreen'; 
    div.innerHTML = "success!";
    } else {
     return responseHandler("PSW_WRONG");
    }
};

//отправка через ajax
    function sendForm(event) {
       event.preventDefault();

       let form_data = new FormData(this);
       console.log(form_data);

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
          console.log(response);
        if (response === "USER_ADDED") { //регистрация прошла успешно
            alert("Welcome to Rainbow world!");
            window.location.href = "/rating";
        } else if (response === "USER_AUTH"){ //пользователь успешно авторизовался
            alert("Wow! We glad to see you!");
            window.location.href = "/share";
        }else if (response === "EMAIL_ERROR"){ //при попытке авторизации емейл не найден в БД
            emtext.innerHTML = "Ups..your email is not found. Pass registration or try again";
        }else if (response === "PSW_ERROR"){ //при попытке авторизации пароль введен неверно
           alert("Password is wrong, try again or recovery"); 
          }else if (response === "USER_EXISTS"){ //пользователь найден, ему будет направлен пароль
            emtext.innerHTML = "Wait a few minutes and check your email :-)";
            send.style.display = 'none';
            sendhref.style.display = 'none';
            emailRec.style.display = 'none';
            back.style.display = 'block';
            
        }else if (response === "COUNTRY_EMPTY"){ //проверка заполнения страны при регистрации
            let field = document.getElementById("country"); //список стран
            let remind = document.getElementById('noCountry');
            field.style.borderColor = "red";
            remind.style.display = "block"; 
            pswReg.value = null; 
            pswReg.style.backgroundColor = "white";
            div.innerHTML = "Please, repeat. Password must content min 5 characters, 1 upper letter and 1 number";
            
            field.onchange = function () {
            remind.style.display = "none"; 
            field.style.borderColor = "white";
            };
            
        }else if (response === "PSW_WRONG"){ //при не соблюдении условий к паролю при регистрации
            pswReg.style.borderColor = "red";
            div.innerHTML = "WRONG!\n Password must content min 5 characters, 1 upper letter and 1 number";
            div.style.color = 'red';
            pswReg.value = "PSW_WRONG";
        }else if (response === "LOGIN_EXISTS"){ //проверка на уникальность логина
            let loginReg = document.getElementById("loginReg");
            let busyLogin = document.getElementById('busyLogin');
            let pswReg = document.getElementById("pswReg");
            loginReg.style.borderColor = 'red';
            busyLogin.style.borderColor = "red";
            busyLogin.style.display = 'block';
            pswReg.value = null; 
            pswReg.style.backgroundColor = "white";
            div.innerHTML = "Please, repeat. Password must content min 5 characters, 1 upper letter and 1 number";
        }else {
            console.log("вывод ошибки данных");
        }
    }
    
    
    let authorization = document.forms.authorization; //определена форма авторизации
    authorization.addEventListener('submit', sendForm);
    
    let recovery = document.forms.recovery; //форма восстановления пароля
    recovery.addEventListener('submit', sendForm);

    let create = document.forms.create; //форма регистрации
    create.addEventListener('submit', sendForm);

}());