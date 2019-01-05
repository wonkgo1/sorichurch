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
    <link rel="stylesheet" href="css/pastor.css">
  	<link rel="stylesheet"
  		href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400, 700">
    <script type='text/javascript' src='js/header.js'></script>
    <script type='text/javascript' src='js/content.js'></script>
    <title>소리교회 - 말씀과 사랑이 넘쳐나는 건강한 교회</title>
  </head>
  <body>
    <div id="wrapper">
      <!-- generate header html codes -->
      <?php generateHeader("pastor") ?>

      <section id="content">
        <div>
          <?php
            $content = new dbContent("담임목사 소개", 'pastor', 'pastor.php');
            $content->generateSideNavi();
          ?>
          <button id="scrollToTop" onClick="scrollToTop()">Top</button>

          <div>
            <?php
              $content->getPageNameTag();
            ?>
            <div>
              <div id="pastor_resume">
                <img id="pastor_img" src="image/pastor_oh.png">
                <p><span id="pastor_name">오세진</span><span id="pastor_title">목사</span></p>
                <p class="resume"><span>총신대학교</span>
                  <span>신학과 졸업</span></p>
                <p class="resume"><span>총신대학교</span>
                  <span>신학대학원(M.Div) 졸업</span></p>
                <p class="resume">edan@hanmail.net</p>
              </div>
              <div>
                <p>&nbsp;&nbsp;&nbsp;1979년에 태어나 초등학교 시절부터 목사가 되겠다는 꿈을 갖고 성장해 총신대학교 신학과에 이어 총신대학교 신학대학원에 진학했습니다. 총신대학교 신학대학원 1학년 재학 시절(2006년)에 기도 중 말씀과 사랑이 넘쳐나는, 건강한 교회를 개척하기로 결정하고 교회 이름을 '소리교회'로 정했습니다. </p>
                <p>&nbsp;&nbsp;&nbsp;그렇게 교회개척을 마음에 품고서 교회 부교역자 사역과 선교단체(아나톨레) 간사 사역을 감당하다가 2014년 1월에 다섯 명의 개척맴버들과 함께 가정교회로 교회 개척을 시작했습니다. 그렇게 함께 기대하고 기다리고 기도하며 3년 5개월 동안 교회 설립을 준비했고, 그 결과 하나님의 은혜로 2017년 6월에 현재의 장소(목동)에 교회를 설립해 본격적으로 교회사역(목회활동)을 시작하게 되었습니다.</p>
                <p>&nbsp;&nbsp;&nbsp;소리교회는 10년 넘게 준비된 교회입니다.<br>&nbsp;&nbsp;&nbsp;소리교회는 생명의 말씀이 선포되는 교회입니다.<br>&nbsp;&nbsp;&nbsp;소리교회는 뜨거운 사랑이 가득한 교회입니다.</p>
                <p>&nbsp;&nbsp;&nbsp;이런 소리교회에 여러분을 자신있게 초대합니다. 아직 예수 그리스도를 믿지 않으시는 분들, 교회에 다녔으나 실망하고 상처받으신 분들, 뿌리내릴 건강한 교회를 찾으시는 분들, 주저하지 마시고 말씀과 사랑이 넘쳐나는, 건강한 '소리교회'로 오십시오! 여러분과의 만남을 기대합니다!</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- generate header html codes -->
      <?php generateFooter() ?>
    </div>
  </body>
</html>
