/* 
 * ФОРМА РЕГИСТРАЦИИ/АВТОРИЗАЦИИ/ВОССТАНОВЛЕНИЯ ПАРОЛЯ
 * для регистрации логин и емейл должны быть уникальными
 * для пароля - 5 мин знаков, чтобы хотя бы одна цифра и одна заглавная
 */

(function () {
    'use strict';
    
    let userData = []; //массив, куда попадают данные пользователя

let logins = ['bear']; //массив логинов
let emails = ['bear@bear.com']; //массив емейлов

//registration
let loginReg = document.getElementById("loginReg"); //получение логина из формы
let pswReg = document.getElementById("pswReg"); //получение пароля из формы
let emailReg = document.getElementById("emailReg"); //получение емейла из формы
let country = document.getElementById("country"); //получение стран из формы
let i, checkPsw, result;

/*получение данных при заполнении полей регистрации
 * для логина и емейла сразу с проверкой на повтор
*/
//получение логина
    loginReg.onchange = function () {
    checkPresence(logins, loginReg);
 };

//получение емейла
    emailReg.onchange = function () {
         checkPresence(emails, emailReg);
 };

//функция проверки данных на повтор
let busyLogin = document.getElementById('busyLogin');
let busyEmail = document.getElementById('busyEmail');

function checkPresence(arr, item) {
  if(arr.includes(item.value)) { 
    console.log('It is occupied');
    item.style.borderColor = "red";
    if(item === loginReg){
        busyLogin.style.display = 'block';
    }
    if(item === emailReg) {
        busyEmail.style.display = 'block';
    }
    }
    else {
    item.style.backgroundColor = "#98FB98";
    if(item === loginReg){
        busyLogin.style.display = 'none';
    }
    if(item === emailReg) {
        busyEmail.style.display = 'none';
    }
    }
 return;
 }
/*получение пароля*/

//функция проверки пароля на выполнение условий (минимум 5 знаков, 1 цифра, 1 заглавная) в строке
function checkCond(a)
{
var regexp= /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}/; 
regexp.test(a);
return result = regexp.test(a);
}

let div = document.getElementById('info');
pswReg.onchange = function () {
//преобразование в строку и проверка на условия(минимум 5 знаков, 1 цифра, 1 заглавная)
let str = pswReg.value;
checkCond(str);

if(result === true){
    pswReg.style.backgroundColor = "#98FB98";
    checkPsw = 1;

    div.style.color = 'darkgreen'; 
    div.innerHTML = "success!";
    } else {
    pswReg.style.borderColor = "red";
    checkPsw = 0;
    }
};

//при нажатии на кнопку создать, данные попадают в массив(если все условия выполнены) и забираются 
let createBtn = document.getElementById('createBtn');
createBtn.addEventListener('click', startEvents);

let choose;
let remind = document.getElementById('noCountry');
function startEvents(event){
    //получение страны
    for (i = 1; i < country.length; i++){
        
    if(country[i].selected){
        choose = country[i].innerHTML;
        remind.style.display = 'none'; 
        }
    if(choose === undefined) {
        remind.style.display = 'block'; 
    }
        }
//проверка заполнения логина/емейла/пароля согласоно условиям
    if(loginReg.value === "" || emailReg.value === "" || pswReg.value === "") {
      //работает submit по умолчанию
      pswReg.value = "";
      pswReg.style.backgroundColor = 'white';
    } else if(checkPsw === 0 || logins.includes(loginReg.value)||emails.includes(emailReg.value) || choose === undefined) {
       event.preventDefault();
       pswReg.value = "";
       pswReg.style.backgroundColor = 'white';
       div.innerHTML = "Password must content min 5 characters, 1 upper letter and 1 number";
       alert('Ups..check your input info');
       console.log('Ups..check your input info');
  }
      else {
      event.preventDefault();
      logins.includes(loginReg.value);
      emails.includes(emailReg.value);
      userData.push('UserData:',loginReg.value, emailReg.value, pswReg.value, choose);
//      console.log(userData);
//      alert("Welcome to Rainbow world!");
       return responseHandler("USER_ADDED");
  }
    }


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
        if (response === "USER_ADDED") {
            alert("Welcome to Rainbow world!");
            window.location.href = "/rating";
        } else if (response === "USER_AUTH"){
            alert("Wow! We glad to see you!");
            window.location.href = "/share";
        }else if (response === "USER_EXISTS"){
            alert("Wait a few minutes and check your email :-)");
            window.location.href = "/";
        }else if (response === "EMAIL_ERROR"){
            alert("Ups..your email is not found. Pass registration or try again")
            window.location.href = "#authorization"; 
        }else if (response === "PSW_ERROR"){
           alert("Password is wrong, try again or recovery"); 
        }
        else {
            console.log("вывод ошибки данных");
        }
    }
    
   function addFormListener() {
       for (let i = 0; i < document.forms.length; i++) {
           document.forms[i].addEventListener('submit', sendForm);
       }
   }

   addFormListener();



}());