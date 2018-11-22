/* 
требований для логина нет
требования для пароля: минимум 5 знаков, минимум 1 цифра, минимум 1 заглавная
доп.требования для емейла нет, помимо тех, что в html
 */
(function () {
    'use strict';

function checkPresence(arr, item) {
  if(arr.includes(item.value)) { 
      console.log('It is occupied');
      item.style.borderColor = "red";
      //функция раскрытия блока снизу, что занят
      showText();
    function showText(){  
        let yes = document.getElementById('yes');
         return yes.style.display = 'block'; 
        }
   } else {
     item.style.borderColor = "green";
           hideText();
    function hideText(){  
        let yes = document.getElementById('yes');
         return yes.style.display = 'none'; 
        }
    
  }
 return;
}

let login = document.getElementById("name"); //получение логина из формы
let logins = ['fox', 'bear']; //массив логинов
let psw = document.getElementById("psw"); //получение пароля из формы
let email = document.getElementById("email"); //получение емейла из формы
let emails = ['fox@ab.com', 'bear@bear.com']; //массив емейлов
let country = document.getElementById("country"); //получение стран из формы
let userData = []; //массив, куда попадают данные пользователей
let i, checkPsw, result;

//получение логина с предварительной проверкой возможного повтора по имеющейся базе
    login.onchange = function () {
    checkPresence(logins, login);
 };

//получение пароля с предварительной проверкой на выполнение условий (минимум 5 знаков, 1 цифра, 1 заглавная)
//функция проверки наличия цифры в строке
function checkCond(a)
{
var regexp= /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{5,}/; 
regexp.test(a);
return result = regexp.test(a);
}

psw.onchange = function () {
//преобразование в строку и проверка на условия(минимум 5 знаков, 1 цифра, 1 заглавная)
let str = psw.value;
checkCond(str);

if(result === true){
        psw.style.borderColor = "green";
        checkPsw = 1;
        doneRight();
        function doneRight(){  
        let div = document.getElementById('info');
          div.style.color = 'darkgreen'; 
          div.innerHTML = "success!";
          }
    }
else {
    psw.style.borderColor = "red";
    checkPsw = 0;
    
}
};
//получение емейла
    email.onchange = function () {
         checkPresence(emails, email);
 };


//при нажатии на кнопку создать, данные попадают в массив(если все условия выполнены) и забираются 
let createBtn = document.getElementById('create');
createBtn.addEventListener('click', startEvents);

let choose;
function startEvents(event){
    //получение страны
    for (i = 1; i < country.length; i++){
        
    if(country[i].selected){
        choose = country[i].innerHTML;
//        console.log(choose);
        hideRemind();
    function hideRemind(){  
        let remind = document.getElementById('remind');
         return remind.style.display = 'none'; 
        }
    }
}
if(choose === undefined) {
//    console.log('choose your country');
       showRemind();
    function showRemind(){  
        let remind= document.getElementById('remind');
         return remind.style.display = 'block'; 
        }
}

  if(login.value === "" || email.value === "" || psw.value === "") {
      //работает submit по умолчанию
      psw.value = "";
    } else if(checkPsw === 0 || logins.includes(login.value)||emails.includes(email.value) || choose === undefined) {
       event.preventDefault();
       psw.value = "";
       alert('Ups..check your input info');
  }
      else {
      event.preventDefault();
      logins.includes(login.value);
      emails.includes(email.value);
      userData.push('UserData:',login.value, email.value, psw.value, choose);
      console.log(userData);
      alert("Welcome to Rainbow world!");
  }
    }

}(window));