<?php
require_once 'api/noti.php';
$db = new fromDb();
?>

<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/index.css">
  	<link rel="stylesheet"
  		href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400, 700">
    <script type='text/javascript' src='js/header.js'></script>
    <script type='text/javascript' src='js/content.js'></script>
    <title>소리교회 - 말씀과 사랑이 넘쳐나는 건강한 교회</title>
  </head>
  <body>
    <div id="wrapper">
      <!-- generate header html codes -->
      <?php generateHeader("") ?>

      <section id="content">
        <button id="scrollToTop" onClick="scrollToTop()">Top</button>
        <div>
          <div>
            <img src="image/interior.jpeg">
          </div>
          <div id="slider_container">
            <div id="slider1" class="slideshow"
              style="position: absolute; top: 0; left: 0%;"
            ></div>

            <div id="slider2" class="slideshow"
              style="position: absolute; top: 0; left: 100%;"
            ></div>

            <div id="slider3" class="slideshow"
              style="position: absolute; top: 0; left: 200%;"
            ></div>

            <div id="slider4" class="slideshow"
              style="position: absolute; top: 0; left: 300%;"
            ></div>

            <span id="prev" onClick="prevSlide()">&#10094;</span>
            <span id="next" onClick="nextSlide()">&#10095;</span>

            <p id="sliderBullets">
              <span class="activeBullet"></span>
              <span></span>
              <span></span>
              <span></span>
            </p>
          </div>
        </div>

        <div id="info_box">
          <div id="worship_info">
            <p>예배 및 모임</p>
  					<div>
              <div>
    						<p id="worship_time">예배</p>
  							<p id="sunday_sermon_time"><span class="sermon_type">주일예배</span> <span class="sermon_day">주일</span> 11:00 am</p>
  							<p id="wednesday_sermon_time"><span class="sermon_type">수요예배</span> <span class="sermon_day">수요일</span> 7:30 pm</p>
              </div>
              <div>
    						<p id="group_time">모임</p>
  							<p id="sunday_ST_time"><span class="sermon_type">S.T.모임</span> <span class="sermon_day">주일</span> 1:30 pm</p>
              </div>
  					</div>
          </div>

          <div id="pastor_info">
            <img id="pastor_pic" src="image/pastor_oh_transparent1.png">
            <p id="pastor_intro0">
              <a href="pastor.php">
              <?php $db->get_main_page_writing("main page writing1"); ?>
              </a>
            </p>
            <p id="pastor_intro1">
              "<?php $db->get_main_page_writing("main page writing2"); ?>"
            </p>
            <p id="pastor_intro2">
              <?php $db->get_main_page_writing("main page writing3");?>
            </p>
            <p id="pastor_intro3">담임목사<span id="pastor_intro4">오세진</span></p>
          </div>

          <div id="sermon_info">
            <p>주일 5분 설교</p>
            <iframe <?php $db->get_youtube_src() ?> frameborder="0" allow="autoplay" allowfullscreen></iframe>
          </div>
        </div>

        <div id="noti_box">
          <div class="noti_box">
            <a href="noti.php"><p class="info_intro">소리 소식<span>+</span></p></a>
  					<?php $db->noti("noti", "noti.php"); ?>
          </div>

          <div class="noti_box">
  					<a href="ST.php"><p class="info_intro">ST 문맥<span>+</span></p></a>
  					<?php $db->noti("ST", "ST.php"); ?>
  				</div>

          <div class="noti_box">
  					<a href="column.php"><p class="info_intro">담임목사 칼럼<span>+</span></p></a>
  					<?php $db->noti("weekly_column", "column.php"); ?>
  				</div>

  				<div class="noti_box">
  					<a href="forum.php"><p class="info_intro">자유게시판<span>+</span></p></a>
  					<?php $db->noti("forum", "forum.php"); ?>
  				</div>
        </div>
      </section>

      <!-- generate header html codes -->
      <?php generateFooter() ?>
    </div>
  </body>
</html>
