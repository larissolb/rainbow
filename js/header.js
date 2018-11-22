/**
header sign in rainbow style
 */

//Get arrays of the text
let letters = document.querySelector('#txt').innerHTML.split('');


// Converts integer to hex 
const colToHex = (c) => {
  // Hack so colors are bright enough
  let color = (c < 75) ? c + 75 : c;
  let hex = color.toString(16);
  return hex.length === 1 ? "0" + hex : hex;
};

// uses colToHex to concatenate
// a full 6 digit hex code
const rgbToHex = (r,g,b) => {
  return "#" + colToHex(r) + colToHex(g) + colToHex(b);
};

// Returns three random 0-255 integers
const getRandomColor = () => {
  return rgbToHex(
    Math.floor(Math.random() * 255),
    Math.floor(Math.random() * 255),
    Math.floor(Math.random() * 255));
};

// This is the prototype function
// that changes the color of each
// letter by wrapping it in a span
// element.
Array.prototype.randomColor = function() {
  let html = '';
  this.map( (letter) => {
    let color = getRandomColor();
    html +=
      "<span style=\"color:" + color + "\">"
      + letter +
      "</span>";
  }) 
  return html;
};

// Set the text
document.querySelector('#txt').innerHTML = letters.randomColor();

//авторизация
let pswI = document.getElementById("psw1"); //получение пароля из формы
let emailI = document.getElementById("email1"); //получение емейла из формы
let emails = ['fox@ab.com', 'bear@bear.com']; //массив емейлов

console.log(emailI);

let InBtn = document.getElementById('inBtn');
InBtn.addEventListener('click', goInto);

emailI.onchange = function () {
   return console.log(emailI.value);
 };
 
pswI.onchange = function () {
   return console.log(emailI.value);
 }; 
 
function goInto(event){

    if(emailI.value === "" || pswI.value === "") {
      //работает submit по умолчанию
      pswI.value = "";
    } else if(emails.includes(emailI.value) === false) {
       event.preventDefault();
       pswI.value = "";
       alert('Ups..your email is not found. Pass registration :-)');
  } 
  //здесь еще должна быть проверка на совпадение емейла и пароля
      else {
      event.preventDefault();
      alert("Oh, good! We glad to see you!");
  }
    }

//восстановление пароля
let emailRec = document.getElementById('emailRec');
console.log(emailRec);
let recBtn = document.querySelector('button[name="Recovery"]');
console.log(recBtn);

recBtn.addEventListener('click', checkEmail);
function checkEmail(event){

    if(emailRec.value === "") {
      //работает submit по умолчанию
    } else if(emails.includes(emailRec.value) === false) {
       event.preventDefault();
        alert('Ups..your email is not found. Pass registration or try again');
  } 
  //здесь еще должна быть проверка на совпадение емейла и пароля
      else {
      event.preventDefault();
      alert("Wait a few minutes and check your email :-)");
  }
    }


