/**
 * OPEN/CLOSE MOBILE NAVBAR
 */

var navOpened = false;

const navBarMobileContainer = document.getElementById(
  "navbar--mobile__container"
);

const navBarHamburguerIcon = document.getElementById(
  "navbar__hamburguer-button"
);

const navBarCloseIcon = document.getElementById("navbar__close-button");

function openNav() {
  navBarMobileContainer.style.height = "450px";
  navBarHamburguerIcon.className = "navbar__button--mobile__hidden"; //hidden
  navBarCloseIcon.className = "navbar__button--mobile";
  disableScroll();
}

function closeNav() {
  navBarMobileContainer.style.height = "0%";
  navBarHamburguerIcon.className = "navbar__button--mobile";
  navBarCloseIcon.className = "navbar__button--mobile__hidden"; //hidden
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
 * OPEN/CLOSE SUBMENUS ON MOBILE NAVBAR
 */

const SUBMENUS = {
  SUBMENU_COMPRE: {
    itemId: "navbar--mobile__item--compre",
    submenuId: "navbar--mobile__submenu--compre",
    open: false
  },
  SUBMENU_APRENDA: {
    itemId: "navbar--mobile__item--aprenda",
    submenuId: "navbar--mobile__submenu--aprenda",
    open: false
  }
};

function toggleSubmenu(TAG) {
  const { open } = SUBMENUS[TAG];
  if (!open) {
    openSubmenu(TAG);
  } else {
    closeSubmenu(TAG);
  }

  SUBMENUS[TAG].open = !open;
}

function openSubmenu(TAG) {
  const { submenuId, itemId } = SUBMENUS[TAG];

  const submenu = document.getElementById(submenuId);
  submenu.style.display = "contents";
  submenu.style.height = "100%";

  const item = document.getElementById(itemId);
  const arrowUp = item.children[0];
  const arrowDown = item.children[1];

  arrowUp.style.display = "block";
  arrowDown.style.display = "none";
}

function closeSubmenu(TAG) {
  const { submenuId, itemId } = SUBMENUS[TAG];

  const submenu = document.getElementById(submenuId);
  submenu.style.display = "none";
  submenu.style.height = "0%";

  const item = document.getElementById(itemId);
  const arrowUp = item.children[0];
  const arrowDown = item.children[1];

  arrowUp.style.display = "none";
  arrowDown.style.display = "block";
}

function startSubmenus() {
  closeSubmenu("SUBMENU_APRENDA");
  SUBMENUS["SUBMENU_APRENDA"].open = false;

  closeSubmenu("SUBMENU_COMPRE");
  SUBMENUS["SUBMENU_COMPRE"].open = false;
}

startSubmenus();

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
