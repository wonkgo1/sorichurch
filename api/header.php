<?php
require_once 'api/login.php';

function generateHeader($url) {
  echo
  '<section id="header">
    <a id="pcLogo" href="index.php">
      <div>
        <p>대한예수교장로회</p>
        <img src="image/logo.png">
        <p>소리교회</p>
        <p>Sound Church</p>
        <p><span>말씀</span>과 <span>사랑</span>이 넘쳐나는 <span>교회</span></p>
      </div>
    </a>

    <a href="index.php"><img src="image/banner.jpeg" alt="sorichurch logo" id="logo"></a>
    <a href="#" onClick="openCloseMenu()"><img src="image/menubar.png" id="menubar"></a>

    <div id="closeMenu" onClick="openCloseMenu()"></div>

    ';
    sub_menu();
    echo '
    <div id="menu">
      <a href="#" '.checkActiveSubMenu('intro', $url).' onClick="openCloseSubMenu(0)">
        교회소개<span>+</span>
      </a>
      <div>
        <a href="intro.php" '.checkActiveUrl("intro", $url).'>교회소개</a>
        <a href="noti.php" '.checkActiveUrl("noti", $url).'>교회소식</a>
        <a href="pastor.php" '.checkActiveUrl("pastor", $url).'>담임목사 소개</a>
        <a href="contact.php" '.checkActiveUrl("contact", $url).'>오시는 길</a>
      </div>

      <a href="#" '.checkActiveSubMenu('sermon', $url).' onClick="openCloseSubMenu(1)">
        설교말씀<span>+</span>
      </a>
      <div>
        <a href="sundaySermon.php" '.checkActiveUrl("sundaySermon", $url).'>주일 5분 설교</a>
        <a href="wednesdaySermon.php" '.checkActiveUrl("wednesdaySermon", $url).'>수요 5분 설교</a>
        <a href="proverb.php" '.checkActiveUrl("proverb", $url).'>잠언 3분 설교</a>
      </div>

      <a href="#" '.checkActiveSubMenu('column', $url).' onClick="openCloseSubMenu(2)">
        칼럼<span>+</span>
      </a>
      <div>
        <a href="column.php" '.checkActiveUrl("column", $url).'>담임목사 칼럼</a>
      </div>

      <a href="#" '.checkActiveSubMenu('community', $url).' onClick="openCloseSubMenu(3)">
        커뮤니티<span>+</span>
      </a>
      <div>
        <a href="forum.php" '.checkActiveUrl("forum", $url).'>자유게시판</a>
        <a href="ST.php" '.checkActiveUrl("ST", $url).'>ST 본문 문맥</a>
        <a href="gallery.php" '.checkActiveUrl("gallery", $url).'>갤러리</a>
      </div>
    </div>
  </section>';
}

function checkActiveUrl($url, $activeUrl) {
  if ($url === $activeUrl)
    return 'class="currentPage"';
}

function checkActiveSubMenu($url, $activeUrl) {
  $result = '';
  $intro = array('intro', 'noti', 'pastor', 'contact');
  $sermon = array('sundaySermon', 'wednesdaySermon', 'proverb');
  $column = array('column');
  $community = array('forum', 'ST', 'gallery');
  switch($url) {
    case 'intro':
      if (array_search($activeUrl, $intro) !== FALSE)
        $result .= 'class="activeSubMenu"';
      break;
    case 'sermon':
      if (array_search($activeUrl, $sermon) !== FALSE)
        $result .= 'class="activeSubMenu"';
      break;
    case 'column':
      if (array_search($activeUrl, $column) !== FALSE)
        $result .= 'class="activeSubMenu"';
      break;
    case 'community':
      if (array_search($activeUrl, $community) !== FALSE)
        $result .= 'class="activeSubMenu"';
      break;
  }
  return $result;
}

function generateFooter() {
  echo '
  <section id="footer">
    <div>
      <img src="image/banner.jpeg" alt="sorichurch logo">
      <p class="footer_content">서울시 양천구 목동 736-1 2층  TEL : 02-2642-3820</p>
      <p class="footer_content">주일예배 : 오전 11시  |  수요예배 : 오후 7시 30분</p>
      <p class="footer_content">Copyright ⓒ 2017 Sorichurch &#38; Gyuwon Kim ALL RIGHT RESERVED.</p>
    </div>
  </section>';
}

?>
