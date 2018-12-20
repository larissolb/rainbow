/* 
print pic
 */


let type = document.getElementById('print');
let pic = document.getElementsByClassName('slider');
type.onclick = function printPic() {
    console.log(pic);
    return window.print(pic);

};

