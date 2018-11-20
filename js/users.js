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
   } else {
     arr.push(item.value);
     item.style.borderColor = "green";
     userData.push(item.value);
  }
 
 return console.log('получившийся массив',arr);
  
}

let login = document.getElementById("name"); //получение логина из формы
let logins = []; //массив логинов
let psw = document.getElementById("psw"); //получение пароля из формы
let email = document.getElementById("email"); //получение емейла из формы
let emails = []; //массив емейлов
let country = document.getElementsByTagName("option"); //получение стран из формы
let userData = []; //массив, куда попадают данные пользователей
let i, num, Big;

//получение логина с предварительной проверкой возможного повтора по имеющейся базе
    login.onchange = function () {
    checkPresence(logins, login);
//    userData.push(login.value);
//    return console.log(userData);
 };

//получение пароля с предварительной проверкой на выполнение условий
//требования для пароля: минимум 5 знаков, 1 цифра, 1 заглавная


//функция проверки наличия цифры в строке
function checkNum(a)
{
var regexp= /\d/;
regexp.test(a);
return num = regexp.test(a);
} 

//функция проверки наличия заглавной буквы в строке
function checkBigLetters(b) {
    var regex = /[A-Z]/;
    regex.test(b);
    return Big = regex.test(b);
}

psw.onchange = function () {
//преобразование в строку и проверка кол-во знаков
let str = psw.value;
//console.log('str',str);
//console.log('str длина',str.length);

//проверка наличия цифры в строке
checkNum(str);
//console.log(num);

//проверка наличия заглавной буквы в строке
checkBigLetters(str);
//console.log(Big);


if(str.length > 4 && num === true && Big === true){
        psw.style.borderColor = "green";
        userData.push(psw.value);}
else {
    psw.style.borderColor = "red";
    console.log('check conditions for password');
   
    //функция раскрытия блока с требованиями
}
console.log(userData);
};

//получение емейла
    email.onchange = function () {
         checkPresence(emails, email);

    
// //получение страны
//   for (i = 0; i < country.length; i++){
//    if(country[i].selected && country[i].selected !== "Choose country"){
//    userData.push(country[i].innerHTML);
//       }else {
//           alert('Choose your country');
//       }
//    }
 };


//при нажатии на кнопку создать, данные забираются 
let createBtn = document.getElementById('create');
createBtn.addEventListener('click', startEvents);

function startEvents(event){
    //получение страны
   for (i = 0; i < country.length; i++){
    if(country[i].selected){
        userData.push(country[i].innerHTML);
        }   
    }
  if(logins.length === emails.length && logins.length !== 0 && emails.length !== 0 && login.value !== "" && email.value !== ""){
    event.preventDefault();
    return  console.log(userData);
    
  } else if(logins.length === emails.length || logins.length !== 0 || emails.length !== 0 || login.value !== "" || email.value !== ""){
    
    console.log("fix your one of which data");
   
  } else {
       event.preventDefault();
        console.log("fix your data");
    }
    }

}(window));


