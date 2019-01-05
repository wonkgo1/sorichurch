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
    <link rel="stylesheet" href="css/intro.css">
  	<link rel="stylesheet"
  		href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400, 700">
    <script type='text/javascript' src='js/header.js'></script>
    <script type='text/javascript' src='js/content.js'></script>
    <title>소리교회 - 말씀과 사랑이 넘쳐나는 건강한 교회</title>
  </head>
  <body>
    <div id="wrapper">
      <!-- generate header html codes -->
      <?php generateHeader("intro") ?>

      <section id="content">
        <div>
          <?php
            $content = new dbContent("교회 소개", 'intro', 'intro.php');
            $content->generateSideNavi();
          ?>
          <button id="scrollToTop" onClick="scrollToTop()">Top</button>

          <div>
            <?php
              $content->getPageNameTag();
            ?>

            <p class="content_paragraph">서울시 양천구 목동에 위치한 소리교회는 대한예수교 장로회 합동(총신대학계통) 교단에 소속된 교회입니다.</p>
            <p class="content_paragraph">소리교회의 '소(紹)'는 '소개하다, 알리다, 계승하다'라는 뜻을 가지고 있으며
            소리교회의 '리(理)'는 '길, 이치, 도리'라는 뜻을 가지고 있습니다. 참된 이치와 도리는 세상적인 가치관이나 사람의 생각이 아니라 오직 성경에 기록되어 있는 예수 그리스도의 복음입니다. 교회는 이 복음을 땅 끝까지 전파해야 할 사명을 가지고 있습니다. 소리교회는 이와 같은 교회의 사명을 계승해서 길이요, 진리요, 생명이신 예수 그리스도의 복음을 많은 사람들에게 소개하고 알려주고자 합니다. </p>
            <p class="content_paragraph">또한 소리교회의 '소리'는 영어로 'sound'이며 'sound'는 '건강한'이라는 뜻을 가지고 있습니다. 건강한 교회는 말씀과 사랑이 넘쳐나는 교회입니다. 하나님께서는 건강한 교회 하나를 예비하시고 마침내 이 땅에 세우셨습니다. 여기에 말씀과 사랑이 넘쳐나는, 건강한 교회가 있습니다. 소리교회에 오시면 말씀의 기근에 허덕일 일이 없습니다. 소리교회에 오시면 사랑의 결핍으로 아파할 일이 없습니다.</p>
            <p class="content_paragraph">복음을 힘써 전하는 교회, 말씀과 사랑이 넘쳐나는 교회, 소리교회로 오십시오. 절대 후회하지 않으실 겁니다.<br><br></p>

            <p class="content_subject">교회 로고 설명</p>
            <img id="sori_logo_desp" src="image/sori_logo.png">
            <p class="content_paragraph">1. 로고의 두 가지 색은 교회의 소속 교단인 대한예수교 장로회 합동 교단의 로고에 사용된 두 가지 색과 동일하며, 파란색은 평화와 말씀에 기초한 믿음을, 연녹색은 주 예수 그리스도의 사랑과 생명을 상징한다.</p>
            <p class="content_paragraph">2. 두 개의 수레 위에 놓여 있는 성경과 하트는 '말씀'과 '사랑'을 의미한다.</p>
            <p class="content_paragraph">3. 두 개의 수레는 말씀과 사랑을 널리 전한다는 의미와 더불어 말씀과 사랑이 넘쳐나는, 건강한 교회의 모습을 계승한다는 의미를 갖고 있다.<br><br></p>

            <p class="content_subject">예배 시간 안내</p>
            <p class="content_paragraph">주일 예배 : 오전 11시 (예배 후에는 점심식사 및 소그룹 모임이 있습니다)<br>수요 예배 : 오후 7시 30분<br>※ 매월 마지막째 주 주일 오후 2시에는 찬양 예배가 있습니다.<br><br></p>

            <p class="content_subject">교회 연혁</p>
            <ul id="chronicle">
              <li><span>2014년 1월 5일
                <span>경기도 부천시 오정구 원종동에서 가정교회로 개척해 5명의 교인들<span id="small_font">(김민경, 김현우, 김혜윤, 민동준, 우상욱)</span>과 창립예배를 드림</span></span></li>
              <li><span>2014년 5월 4일
                <span>서울시 양천구 신월동에 임시예배처소를 구함</span></span></li>
              <li><span>2015년 4월 26일
                <span>담임목사의 선배목사가 운영하는 턴어라운드 코칭사무실(서울시 양천구 목동)에서 주일예배를 드림</span></span></li>
              <li><span>2015년 12월 27일
                <span>턴어라운드 코칭사무실의 이전(경기도 고양시 덕양구 행신동)으로 인해 주일예배 장소가 변경됨</span></span></li>
              <li><span>2016년 10월 11일
                <span>담임목사가 소래노회에서 한서노회로 소속 노회를 옮겨 이명처리됨 (한서노회 제70회 정기노회)</span></span></li>
              <li><span>2017년 4월 11일
                <span>소리교회가 한서노회 남시찰회 소속 교회로 정식 가입됨 (한서노회 제71회 정기노회)</span></span></li>
              <li><span>2017년 7월 3일
                <span>서울시 양천구 목동(서울시 양천구 목동 736-1 2층)에 교회 장소를 임대해 설립예배를 드림</span></span></li>
            </ul>
          </div>
        </div>
      </section>

      <!-- generate header html codes -->
      <?php generateFooter() ?>
    </div>
  </body>
</html>
