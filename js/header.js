window.onload = function() {
  // if (document.documentMode || /Edge/.test(navigator.userAgent)) {
  //
  // }
  console.log('running check');
  // Internet Explorer 6-11
  var isIE = /*@cc_on!@*/false || !!document.documentMode;
  // Edge 20+
  var isEdge = !isIE && !!window.StyleMedia;
  console.log('ie', isIE);
  console.log('edge', isEdge);
  if (isIE || isEdge) {
    alert('in ie Edge mode');
    var menu = document.getElementById('menu');
    menu.style.marginTop = '0';
  }
}

function openCloseMenu() {
  var wrapper = document.getElementById('wrapper');
  var menu = document.getElementById('menu');
  var closeMenuDiv = document.getElementById('closeMenu');
  if (wrapper.style.left === '0px' || wrapper.style.left === ''){
    wrapper.style.left = '-60%';
    menu.style.position = 'fixed';
    menu.style.left = '40%';
    closeMenuDiv.style.left = '0%';
  }
  else {
    wrapper.style.left = '0px';
    menu.style.left = '100%';
    closeMenuDiv.style.left = '-40%';
  }
}

function getMenuList(menu) {
  var menuList = [];
  var menuIndex = 0;
  for (var i = 0; i < menu.children.length; ++i) {
    if (menu.children[i].tagName === 'A')
      menuList[menuIndex++] = menu.children[i];
  }
  return menuList;
}
function openCloseSubMenu(index) {
  var deviceWidth = (window.innerWidth > 0) ? window.innerWidth : screen.width;
  var menu = document.getElementById('menu');
  var menuList = getMenuList(menu);
  var subMenu = menu.getElementsByTagName('div');
  if (deviceWidth < 500) {
    // mobile phone
    if (!subMenu[index].classList.contains('active'))
      subMenu[index].classList.add('active');
    else {
      subMenu[index].classList.remove('active');
    }
  }
  else {
    // tablet or pc
    var closeSubMenu = subMenu[index].classList.contains('active');
    for (var i = 0; i < subMenu.length; ++i) {
      menuList[i].classList.remove('focused');
      subMenu[i].classList.remove('active');
    }
    if (!closeSubMenu) {
      menuList[index].classList.add('focused');
      subMenu[index].classList.add('active');
    }
  }
}
