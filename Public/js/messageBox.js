let errorMessageBox1 = document.querySelector('#errorMessageBox1');
let errorMessageBox2 = document.querySelector('#errorMessageBox2');

console.log(errorMessageBox1);
console.log(errorMessageBox2);

function removeErrorMessageBox() {
  //console.log(this);
  this.setAttribute("class", "hide-box");
}

errorMessageBox1.addEventListener("click", removeErrorMessageBox);
errorMessageBox2.addEventListener("click", removeErrorMessageBox);