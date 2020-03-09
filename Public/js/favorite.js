const hearts = document.querySelectorAll("i");
const sectionVisibilty = document.querySelector("#favorites");
const pokemonFavorite = document.querySelector("#pokemonFavorite");
let cookiesValues = 0;
let favoriteArray = [];
let allCookiesSplit = document.cookie.split(';');
if (allCookiesSplit.length > 3) {
  let str = allCookiesSplit[0];
  cookiesValues = str.slice(10);
}
if (cookiesValues.length > 0) {
  favoriteArray = cookiesValues.split(",");
  resetHearts();
  fillSection(favoriteArray);
}

function toggle() {
  // check heartSymbol
  let result = this.classList.contains("fa-heart-o");
  if (result) {
    this.classList.remove("fa-heart-o");
    this.classList.add("fa-heart");
    favoriteArray.push(this.parentElement.textContent.trim());
    if (favoriteArray !== null) {
      fillSection(favoriteArray);
    }
  } else {
    this.classList.remove("fa-heart");
    this.classList.add("fa-heart-o");
    for (let i = 0; i < favoriteArray.length; i++) {
      if (favoriteArray[i] === this.parentElement.textContent.trim()) {
        favoriteArray.splice(i, 1)
      }
    }
    if (favoriteArray) {
      fillSection(favoriteArray);
    }
  }
}

function resetHearts() {
  for (let i = 0; i < hearts.length; i++) {
    let stringOfFavorite = favoriteArray.toString();
    if (stringOfFavorite.includes(hearts[i].parentElement.textContent.trim())) {
      hearts[i].classList.remove("fa-heart-o");
      hearts[i].classList.add("fa-heart");
    }
    //fillSection(favoriteArray);
  }
}

function fillSection(favoriteArray) {
  if (favoriteArray.length > 0) {
    sectionVisibilty.classList.remove("d-none");
    sectionVisibilty.classList.add("d-block");
    pokemonFavorite.innerHTML = favoriteArray.join(",");
    let favoriteList = pokemonFavorite.innerHTML;
    document.cookie = "favorites =" + favoriteList;
  } else {
    sectionVisibilty.classList.remove("d-block");
    sectionVisibilty.classList.add("d-none");
  }
}

for (let i = 0; i < hearts.length; i++) {
  hearts[i].addEventListener("click", toggle);
}

