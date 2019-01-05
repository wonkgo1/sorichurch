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
    <link rel="stylesheet" href="css/contact.css">
  	<link rel="stylesheet"
  		href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400, 700">
    <script type='text/javascript' src='js/header.js'></script>
    <script type='text/javascript' src='js/content.js'></script>
    <title>소리교회 - 말씀과 사랑이 넘쳐나는 건강한 교회</title>
  </head>
  <body>
    <div id="wrapper">
      <!-- generate header html codes -->
      <?php generateHeader("contact") ?>

      <section id="content">
        <div>
          <?php
            $content = new dbContent("오시는 길", 'contact', 'contact.php');
            $content->generateSideNavi();
          ?>
          <button id="scrollToTop" onClick="scrollToTop()">Top</button>

          <div>
            <p class="subject">오시는길</p>
            <p class="parking_lot">주소 : 서울시 양천구 목동 736-1번지</p>
            <table id="naver_map" cellpadding="0" cellspacing="0" width="330"> <tr> <td style="border:1px solid #cecece;"><a href="http://map.naver.com/?mpx=37.5375364%2C126.8669003%3AZ13%3A0.0058938%2C0.0029474&searchCoord=d3823129e0eb94ee632770313fb7fe79c09b00a26f684afae8ed951352a9523b&query=66qp64%2BZIDczNi0x&menu=location&tab=1&lng=170d2ce20aac0948e9d2d5d6fd5436fc&__fromRestorer=true&mapMode=0&lat=107698f2b9f8f57357b6eabe354472a9&dlevel=14&enc=b64" target="_blank"><img src="http://prt.map.naver.com/mashupmap/print?key=p1511954325105_1833697636" width="330" height="300" alt="지도 크게 보기" title="지도 크게 보기" border="0" style="vertical-align:top;"/></a></td> </tr> <tr> <td> <table cellpadding="0" cellspacing="0" width="100%"> <tr> <td height="30" bgcolor="#f9f9f9" align="left" style="padding-left:9px; border-left:1px solid #cecece; border-bottom:1px solid #cecece;"> <span style="font-family: tahoma; font-size: 11px; color:#666;">2017.11.29</span>&nbsp;<span style="font-size: 11px; color:#e5e5e5;">|</span>&nbsp;<a style="font-family: dotum,sans-serif; font-size: 11px; color:#666; text-decoration: none; letter-spacing: -1px;" href="http://map.naver.com/?mpx=37.5375364%2C126.8669003%3AZ13%3A0.0058938%2C0.0029474&searchCoord=d3823129e0eb94ee632770313fb7fe79c09b00a26f684afae8ed951352a9523b&query=66qp64%2BZIDczNi0x&menu=location&tab=1&lng=170d2ce20aac0948e9d2d5d6fd5436fc&__fromRestorer=true&mapMode=0&lat=107698f2b9f8f57357b6eabe354472a9&dlevel=14&enc=b64" target="_blank">지도 크게 보기</a> </td> <td width="98" bgcolor="#f9f9f9" align="right" style="text-align:right; padding-right:9px; border-right:1px solid #cecece; border-bottom:1px solid #cecece;"> <span style="float:right;"><span style="font-size:9px; font-family:Verdana, sans-serif; color:#444;">&copy;&nbsp;</span>&nbsp;<a style="font-family:tahoma; font-size:9px; font-weight:bold; color:#2db400; text-decoration:none;" href="http://www.nhncorp.com" target="_blank">NAVER Corp.</a></span> </td> </tr> </table> </td> </tr> </table>

            <p class="subject">버스 이용안내</p>
            <div>
              <img src="image/city_bus.png">
              <p>양천01</p>
            </div>

            <div>
              <img src="image/gansunbus.png">
              <p>5616, 6623, 6629, 6714, 6715, 6716</p>
            </div>

            <div>
              <img src="image/jisunbus.png">
              <p>602, 650, 654</p>
            </div>

            <p class="subject">지하철 이용안내</p>
            <div>
              <img src="image/line2.png">
              <p><span class="subway_line">당산역</span>&nbsp;2번 출구 하차 후
                <span class="city_bus">양천01</span>&nbsp;버스 승차 후
                <span class="bold">현대아파트,월드메르디앙아파트</span>&nbsp;
                하차 후 도보 5분</p>
            </div>

            <div>
              <img src="image/line5.png">
              <p><span class="subway_line">목동역</span>&nbsp;3번 출구 하차 후
                <span class="city_bus">5616</span>&nbsp;
                <span class="city_bus">6623</span>&nbsp;
                <span class="city_bus">6629</span>&nbsp;
                <span class="city_bus">6715</span>&nbsp;
                <span class="blue_bus">602</span>&nbsp;
                <span class="blue_bus">650</span>&nbsp;
                <span class="blue_bus">654</span>&nbsp;버스 승차 후
                <span class="bold">영도중.강서고입구.기아양서대리점</span>&nbsp;
                하차 후 도보 5분</p>
            </div>

            <div>
              <img src="image/line9.png">
              <p>
                <span class="subway_line">등촌역</span>&nbsp;2번 출구 하차 후
                <span class="city_bus">6623</span>&nbsp;
                <span class="city_bus">6629</span>&nbsp;
                <span class="city_bus">6714</span>&nbsp;
                <span class="city_bus">6715</span>&nbsp;
                <span class="city_bus">6716</span>&nbsp;
                <span class="blue_bus">602</span>&nbsp;
                <span class="blue_bus">650</span>&nbsp;
                <span class="blue_bus">654</span>&nbsp;버스 승차 후 <span class="bold">용문사.시립화곡청소년수련관</span>&nbsp;하차 후 도보 5분
              </p>
            </div>

            <p class="subject">주차장 이용안내</p>
            <div>
              <p>교회 옆 주차장 이용</p>
              <p>만차시 인근 골목이나 정목주차장(정목초등학교주차장) 이용</p>
            </div>
          </div>
        </div>
      </section>

      <!-- generate header html codes -->
      <?php generateFooter() ?>
    </div>
  </body>
</html>
