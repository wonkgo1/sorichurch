window.onload = function() {
  detectIEEdge();
  setContentHeight();
}

function detectIEEdge() {
  // Internet Explorer 6-11
  var isIE = /*@cc_on!@*/false || !!document.documentMode;
  // Edge 20+
  var isEdge = !isIE && !!window.StyleMedia;
  if (isIE || isEdge) {
    var menu = document.getElementById('menu');
    menu.style.marginTop = '10px';
  }
}

window.addEventListener('scroll', function() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
      document.getElementById("scrollToTop").style.display = "block";
  }
  else {
      document.getElementById("scrollToTop").style.display = "none";
  }
});

function scrollToTop() {
  window.scrollTo({
    top: 0,
    behavior: "smooth"
});
}

function setContentHeight() {
  var header = document.getElementById('header');
  var footer = document.getElementById('footer');
  var content = document.getElementById('content');
  var offset = header.offsetHeight + footer.offsetHeight;
  content.style.minHeight = window.innerHeight - offset + 'px';
}

function openSetUp() {
  var setup = document.getElementById("setup");
  var div = document.getElementById('closeSetup');
  if (setup.style.display === 'none' ||
      setup.style.display === '') {
    setup.style.display = 'block';
    div.style.display = 'block';
  }
  else {
    setup.style.display = 'none';
    div.style.display = 'none';
  }
}

function closeSetup() {
  var setup = document.getElementById('setup');
  var div = document.getElementById('closeSetup');
  setup.style.display = 'none';
  div.style.display = 'none';
}

function fontSizeUp() {
  var article = document.getElementById('article');
  var p = article.getElementsByTagName('p');
  var span = article.getElementsByTagName('span');
  for (var i = 0; i < p.length; ++i) {
    var fontSize = parseInt(p[i].style.fontSize, 10);
    p[i].style.fontSize = (fontSize + 1) + 'px';
  }
  for (var i = 0; i < span.length; ++i) {
    var fontSize = parseInt(span[i].style.fontSize, 10);
    span[i].style.fontSize = (fontSize + 1) + 'px';
  }
}

function fontSizeDown() {
  var article = document.getElementById('article');
  var p = article.getElementsByTagName('p');
  var span = article.getElementsByTagName('span');
  for (var i = 0; i < p.length; ++i) {
    var fontSize = parseInt(p[i].style.fontSize, 10);
    fontSize -= 1;
    if (fontSize < 0)
      fontSize = 0;
    p[i].style.fontSize = fontSize + 'px';
  }
  for (var i = 0; i < span.length; ++i) {
    var fontSize = parseInt(span[i].style.fontSize, 10);
    fontSize -= 1;
    if (fontSize < 0)
      fontSize = 0;
    span[i].style.fontSize = fontSize + 'px';
  }
}

var sliderIndex = 0;
var sliderDivs = document.getElementsByClassName('slideshow');
function nextSlide() {
  if (sliderDivs[0].style.left === '-300%')
    return;

  var spans = document.getElementById('sliderBullets').children;
  spans[sliderIndex].classList.remove('activeBullet');
  spans[++sliderIndex].classList.add('activeBullet');

  for(var i = 0; i < sliderDivs.length; ++i) {
    var locationLeft = parseInt(sliderDivs[i].style.left, 10);
    sliderDivs[i].style.left = (locationLeft - 100) + '%';
  }
}

function prevSlide() {
  if (sliderDivs[0].style.left === '0%')
    return;

    var spans = document.getElementById('sliderBullets').children;
    spans[sliderIndex].classList.remove('activeBullet');
    spans[--sliderIndex].classList.add('activeBullet');

  for(var i = 0; i < sliderDivs.length; ++i) {
    var locationLeft = parseInt(sliderDivs[i].style.left, 10);
    sliderDivs[i].style.left = (locationLeft + 100) + '%';
  }
}
