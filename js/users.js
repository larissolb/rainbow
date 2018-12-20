/* 
 * ФОРМА РЕГИСТРАЦИИ/АВТОРИЗАЦИИ/ВОССТАНОВЛЕНИЯ ПАРОЛЯ
* требований для логина нет, доп.требования для емейла нет, помимо тех, что в html
* требования для пароля: минимум 5 знаков, минимум 1 цифра, минимум 1 заглавная
 */



(function () {
    'use strict';
let userData = []; //массив, куда попадают данные пользователя

let logins = ['fox', 'bear']; //массив логинов
let emails = ['fox@ab.com', 'bear@bear.com']; //массив емейлов

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
//    doneRight();
//    function doneRight(){  
//    let div = document.getElementById('info');
//    div.style.color = 'darkgreen'; 
//    div.innerHTML = "success!";
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
      console.log(userData);
      alert("Welcome to Rainbow world!");
  }
    }

//авторизация
let BtnEnter = document.getElementById('BtnEnter');
BtnEnter.addEventListener('click', goInto);

//проверка на наличие емейла в базе и заполненности обоих полей
function goInto(event){
    let psw = document.getElementById("psw"); //получение пароля из формы
    let email = document.getElementById("email"); //получение емейла из формы
    if(email.value === "" || psw.value === "") {
      //работает submit по умолчанию
      psw.value = "";
    } else if(emails.includes(email.value) === false) {
       event.preventDefault();
       psw.value = "";
       alert('Ups..your email is not found. Pass registration or try again :-)');
       console.log('Ups..your email is not found. Pass registration or try again :-)');
  } 
  /*здесь еще должна быть проверка на совпадение емейла и пароля, видимо, через php, 
  *пока просто получение пароля и отправка в базу
  *let UserEmailPsw =[];
  *UserEmailPsw.push(email.value, psw.value);
  */
    
      else {
      event.preventDefault();
      alert("Wow! We glad to see you!");
      console.log("Wow! We glad to see you!");
  }
    }
    
//восстановление пароля
let recBtn = document.querySelector('button[name="Recovery"]');
recBtn.addEventListener('click', checkEmail);

function checkEmail(event){
let emailRec = document.getElementById('emailRec');
    if(emailRec.value === "") {
      //работает submit по умолчанию
    } else if(emails.includes(emailRec.value) === false) {
       event.preventDefault();
        alert('Ups..your email is not found. Pass registration or try again');
        console.log('Ups..your email is not found. Pass registration or try again');
  } 

      else {
      event.preventDefault();
      alert("Wait a few minutes and check your email :-)");
      console.log('Wait a few minutes and check your email :-)');
  }
    }

}(window));





