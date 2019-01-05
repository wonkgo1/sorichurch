<?php
require_once 'api/header.php';
require_once 'api/login.php';
require_once 'api/content.php';
?>

<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/std.css">
    <link rel="stylesheet" href="css/gallery.css">
  	<link rel="stylesheet"
  		href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400, 700">
    <script type='text/javascript' src='js/header.js'></script>
    <script type='text/javascript' src='js/content.js'></script>
    <title>소리교회 - 말씀과 사랑이 넘쳐나는 건강한 교회</title>
  </head>
  <body>
    <div id="wrapper">
      <!-- generate header html codes -->
      <?php generateHeader("gallery") ?>

      <section id="content">
        <div>
          <?php
            $content = new dbContent("갤러리", 'gallery', 'gallery.php');
            $content->generateSideNavi();
          ?>
          <button id="scrollToTop" onClick="scrollToTop()">Top</button>
          <div>
            <?php
              $content->getPageNameTag();
              $content->show_imgs();
            ?>
          </div>
        </div>
      </section>

      <!-- generate header html codes -->
      <?php generateFooter() ?>
    </div>
  </body>
</html>

<script>

function toggleImgBig(panel) {
  var innerDiv = panel.getElementsByTagName('div');
  var img = innerDiv[0].getElementsByTagName('img')[0];

  createBigImage(img);
}

function createBigImage(img) {
  var content = document.getElementById('content');
  var div = document.createElement('div');
  div.setAttribute('id', 'bigImageFixed')
  div.setAttribute('onClick', 'removeBigImg()');
  div.style.visibility = 'hidden';
  div.style.position = 'fixed';
  div.style.top = '0';
  div.style.left = '0';
  div.style.width = '100vw';
  div.style.height = '100vh';
  div.style.backgroundColor = 'black';
  div.style.zIndex = '2';

  var imgBig = document.createElement('img');
  imgBig.setAttribute('src', img.getAttribute('src'));
  imgBig.style.position = 'fixed';
  imgBig.style.maxWidth = '90%';
  imgBig.style.maxHeight = '90vh';
  imgBig.style.cursor = 'pointer';
  div.appendChild(imgBig);
  content.appendChild(div);

  var width = imgBig.offsetWidth;
  var height = imgBig.offsetHeight;
  var widthOffset = (window.innerWidth - width) / 2;
  var heightOffset = (window.innerHeight - height) / 2;
  if (widthOffset < 0) {
    imgBig.style.left = '0';
    imgBig.style.width = '100%';
  }
  else
    imgBig.style.left = widthOffset + 'px';
  if (heightOffset < 0) {
    imgBig.style.top = '0';
    imgBig.style.height = '100vh';
  }
  else
    imgBig.style.top = heightOffset + 'px';

  div.style.visibility = '';
}

function removeBigImg() {
  var element = document.getElementById('bigImageFixed');
  element.parentNode.removeChild(element);
}

</script>
