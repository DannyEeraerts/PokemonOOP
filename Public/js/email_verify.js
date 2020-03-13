let emailInput = document.querySelector('#InputEmail');
let errorMessage = document.querySelector('#errorMessage');

function emailVerify() {

  if (emailInput.value !== "") {
    if (regmailCheck(emailInput.value)) {
      emptyMessage(errorMessage);
      emailInput.value = cleanEmail(emailInput.value);
    } else {
      errorMessage.innerHTML = "<div>Email has no valid format&nbsp;&#x274C</div>";
      toggleErrorMessage(errorMessage);
    }
  } else {
    errorMessage.innerHTML = "<div>Email is required&nbsp;&#x274C;</div>";
    toggleErrorMessage(errorMessage);
  }
}

function toggleErrorMessage(errorMessage) {
  errorMessage.classList.remove("hide");
  errorMessage.classList.add("show");

}

function regmailCheck(mailCheck) {

  let emailRegex = /^(([\-\w]+)\.?)+@(([\-\w]+)\.?)+\.[a-zA-Z]{2,6}$/;
  return (emailRegex.test(mailCheck));
}

function emptyMessage(errorMessage) {

  errorMessage.innerHTML = "";
  errorMessage.classList.remove("show");
  errorMessage.classList.add('hide');
}

function cleanEmail(string) {
  return string.toLowerCase();
}

function removeErrorMessage() {

  this.classList.remove("show");
  this.classList.add("hide");
}


emailInput.addEventListener('blur', emailVerify);
errorMessage.addEventListener("click", removeErrorMessage);