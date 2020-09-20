var navOpened = false;

const navBarMobileBox = document.getElementById("navbar-mobile-box");

// Ícone de hamburguer da NavBar em mobile.
const navBarHambIcon = document.getElementById("navbar-mobile-hamb-button");
// Ícone de fechar da NavBar em mobile.
const navBarCloseIcon = document.getElementById("navbar-mobile-close-button");

function toggleHamburguerIcon() {
  // Classe que torna o ícone visível.
  const classVisible = "navbar--mobile__button";
  // Classe que esconde o ícone.
  const classHidden = "navbar--mobile__button--hidden";

  // Se o ícone de hambúrguer estiver sendo mostrado,
  // escondê-lo e mostrar o botão de fechar.
  if (navBarHambIcon.className === classVisible) {
    navBarHambIcon.className = classHidden;
    navBarCloseIcon.className = classVisible;
  } else {
    // Caso contrário, esconder o botão fechar.
    // E mostrar o ícone de hambúrguer.
    navBarHambIcon.className = classVisible;
    navBarCloseIcon.className = classHidden;
  }
}

function toggleNavBarMenuBox() {
  // Classe que torna o ícone visível.
  const classVisible = "navbar--mobile__container--visible";

  const visible = navBarMobileBox.classList.contains(classVisible);
  // Se está visível.
  if (visible) {
    // Então, remover a classe.
    navBarMobileBox.classList.remove(classVisible);
  } else {
    // Se não, adicionar a classe.
    navBarMobileBox.classList.add(classVisible);
  }
}

function openNav() {
  toggleNavBarMenuBox();
  toggleHamburguerIcon();
  disableScroll();
}

function closeNav() {
  toggleNavBarMenuBox();
  toggleHamburguerIcon();
  enableScroll();
}

function toggleNav() {
  if (navOpened) {
    closeNav();
  } else {
    openNav();
  }
  navOpened = !navOpened;
}

/**
 * UTILS
 */

function disableScroll() {
  if (window.addEventListener)
    // older FF
    window.addEventListener("DOMMouseScroll", preventDefault, false);
  document.addEventListener("wheel", preventDefault, { passive: false }); // Disable scrolling in Chrome
  window.onwheel = preventDefault; // modern standard
  window.onmousewheel = document.onmousewheel = preventDefault; // older browsers, IE
  window.ontouchmove = preventDefault; // mobile
  document.onkeydown = preventDefaultForScrollKeys;
}

function enableScroll() {
  if (window.removeEventListener)
    window.removeEventListener("DOMMouseScroll", preventDefault, false);
  document.removeEventListener("wheel", preventDefault, { passive: false }); // Enable scrolling in Chrome
  window.onmousewheel = document.onmousewheel = null;
  window.onwheel = null;
  window.ontouchmove = null;
  document.onkeydown = null;
}

var keys = { 37: 1, 38: 1, 39: 1, 40: 1 };

function preventDefault(e) {
  e = e || window.event;
  if (e.preventDefault) e.preventDefault();
  e.returnValue = false;
}

function preventDefaultForScrollKeys(e) {
  if (keys[e.keyCode]) {
    preventDefault(e);
    return false;
  }
}
