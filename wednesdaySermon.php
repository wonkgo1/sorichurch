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
  	<link rel="stylesheet"
  		href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400, 700">
    <script type='text/javascript' src='js/header.js'></script>
    <script type='text/javascript' src='js/content.js'></script>
    <title>소리교회 - 말씀과 사랑이 넘쳐나는 건강한 교회</title>
  </head>
  <body>
    <div id="wrapper">
      <!-- generate header html codes -->
      <?php generateHeader("wednesdaySermon") ?>

      <section id="content">
        <?php
          $content = new dbContent("수요 5분 설교", 'wednesday_sermon', 'wednesdaySermon.php');
          $content->printContent();
        ?>
      </section>

      <!-- generate header html codes -->
      <?php generateFooter() ?>
    </div>
  </body>
</html>
