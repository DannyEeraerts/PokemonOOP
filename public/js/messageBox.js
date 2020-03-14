let errorMessageBox1 = document.querySelector('#errorMessageBox1');
let errorMessageBox2 = document.querySelector('#errorMessageBox2');

console.log(errorMessageBox1);
console.log(errorMessageBox2);

function removeErrorMessageBox() {
  console.log(this.value);
  this.setAttribute("class", "hide-box");
}

if (typeof(errorMessageBox1) != 'undefined' && errorMessageBox1 != null)
{
  errorMessageBox1.addEventListener("click", removeErrorMessageBox);
}

if (typeof(errorMessageBox2) != 'undefined' && errorMessageBox2 != null)
{
  errorMessageBox2.addEventListener("click", removeErrorMessageBox);
}