<?php
require_once 'login.php';

class dbContent {
  private $name;
  private $table;
  private $url;

  function __construct($name, $table, $url) {
    $this->name = $name;
    $this->table = $table;
    $this->url = $url;
  }

  function printContent() {
    $this->getContent();
  }

  function selectFromDb($num) {
    $mysqli = connect();
  	$sql = "SELECT num, title, id, date_format(date, '%Y-%m-%d') as date,
    content FROM $this->table ORDER BY num LIMIT 1 OFFSET ".($num - 1).";";
  	$result = $mysqli->query($sql);

  	if ($result->num_rows > 0) {
  		return $result->fetch_assoc();
  	}
  	else {
  		die("Contents does not exist where (forum_num=$num)");
  	}
  }

  function printRow($num, $title, $id, $date) {
  	echo '
      <a href='.$this->url.'?forum_num='.$num.' class="articleLink">
        <div class="articleList">
          <p class="num">'.$num.'</span>
          <p>
            <span class="title">'.$title.'</span>
            <span class="name">'.$id.'</span>
      			<span class="date">'.$date.'</span>
          </p>
        </div>
      </a>';
  }

  function makePageNum() {
  	$mysqli = connect();
  	$sql = "SELECT COUNT(*) FROM $this->table;";
  	$result = $mysqli->query($sql);
  	if ($result->num_rows > 0) {
  		$row = $result->fetch_assoc();
  		$max = $row['COUNT(*)'];
  		$num_page = ($max - $max % 15) / 15 + 1;

  		$html = '<p id="pageNum">';
  		if ($num_page > 1)
  			$html .= '<a href="'.$this->url.'">[처음]</a> ';
  		for ($i = 0; $i < $num_page; ++$i) {
        $currentPage = '';
        if ((isset($_GET['forum_page_num']) && $_GET['forum_page_num'] === strval($i+1))
            || (!isset($_GET['forum_page_num']) && $i === 0))
          $currentPage = 'class="currentPage"';
  			$html .= ' <a href="'.$this->url.'?forum_page_num='.($i+1).'" '.$currentPage.'>'.($i+1).'</a> ';
  		}
  		if ($num_page > 1)
  			$html .= ' <a href="'.$this->url.'?forum_page_num='.$num_page.'">[마지막]</a>';
  		if (isset($_SESSION['logged_in']) && isset($_SESSION['id']) && $_SESSION['id'] === 'sorichurch')
  			$html .= '<a href="create.php?page='.$this->table.'"><button id="create">글쓰기</button></a>';
      $html .= '</p>';
  		echo $html;
  	}
  	else {
  		die("MAX(num) failed in $this->url at make_page_num()");
  	}
  }

  function make_gallery_page_num($count) {
  	$html = '<p id="pageNum">';
  	if ($count > 1)
  		$html .= '<a href="gallery.php">[처음]</a> ';
  	for ($i = 0; $i < $count; ++$i) {
      $currentPage = '';
      if ((isset($_GET['forum_page_num']) && $_GET['forum_page_num'] === strval($i+1))
          || (!isset($_GET['forum_page_num']) && $i === 0))
        $currentPage = 'class="currentPage"';
  		$html .= ' <a href="gallery.php?forum_page_num='.($i+1).'" '.$currentPage.'>'.($i+1).'</a> ';
  	}
  	if ($count > 1)
  		$html .= ' <a href="gallery.php?forum_page_num='.$count.'">[마지막]</a>';
  	$html .= '</p>';

  	echo $html;
  }

  function readTableList() {
    $mysqli = connect();
  	$sql = "SELECT COUNT(*) FROM $this->table;";
  	$result = $mysqli->query($sql);

  	if ($result->num_rows > 0) {
  		// data exists
  		$row = $result->fetch_assoc();
  		$num_row = $row['COUNT(*)'];
  		$page_num = 1;
  		if (isset($_GET['forum_page_num']))
  			$page_num = $_GET['forum_page_num'];
  		$offset = ($page_num - 1) * 15;

  		$sql = "SELECT num, title, id, date_format(date, '%Y-%m-%d')
      as date FROM $this->table ORDER BY num DESC LIMIT 15 offset ".$offset.";";
  		$result = $mysqli->query($sql);

  		if ($result->num_rows > 0) {
  			while ($row = $result->fetch_assoc()) {
  				$num = $num_row - $offset++;
  				$this->printRow($num, $row['title'], $row['id'], $row['date']);
  			}
  		}
  	}
  }

  function getContent() {
    echo '<div>
    ';
    $this->generateSideNavi();
    echo '<div>
    ';
    if(isset($_GET['forum_num'])) {
  		$row = $this->selectFromDb($_GET['forum_num']);
  		echo '
            <div id="pageNameTagInArticle">
              <img src="image/nameTagIcon.png">
              <a href="'.$this->url.'"><p>'.$this->name.'</p></a>
            </div>
            <div id="title">
    					<p>'.$row['title'].'</p>
              <span><a href="#" onClick="openSetUp()">&#x2807;</a></span>
              <div id="setup">
                가 : <button onClick="fontSizeUp()">+</button><button onClick="fontSizeDown()">-</button>
              </div>
            </div>
            <div id="closeSetup" onClick="closeSetup()"></div>
  					<p id="forumInfo">
  						<span>아이디 : '.$row['id'].'</span>
  						<span>작성일 : '.$row['date'].'</span>
  					</p>';
      // 글 수정 삭제 버튼
  		if (isset($_SESSION['logged_in']) && isset($_SESSION['id'])) {
  			$id = $_SESSION['id'];
  			$writor = $row['id'];
  			if ($id === $writor || $id === 'sorichurch') {
  				echo '<a href="modify.php?page='.$this->table.'&num='.$row['num'].'"><button id="modify">글 수정</button></a>';
  				echo '<a href="delete.php?page='.$this->table.'&num='.$row['num'].'&id='.$writor.'"><button id="delete">글 삭제</button></a>';
  			}
  		}
      echo '<div id="article">'.$row['content'].'</div>
            <button id="scrollToTop" onClick="scrollToTop()">Top</button>';
  	}
  	else {
      $this->getPageNameTag();
  		echo '
  			<p id="articleListTop">
  				<span id="num_top">번호</span>
  				<span id="title_top">제목</span>
  				<span id="name_top">아이디</span>
  				<span id="date_top">작성일</span>
  			</p>';

  		$this->readTableList();
  		$this->makePageNum();

      echo '<button id="scrollToTop" onClick="scrollToTop()">Top</button>';
  	}
    echo '
      </div>
    </div>';
  }
  function getPageNameTag() {
    echo "<p id='pageNameTag'>$this->name</p>";
  }

  function imgcmp($img_a, $img_b) {
  	$m_a = filemtime($img_a);
      $m_b = filemtime($img_b);

      if ($m_a == $m_b)
          return 0;
      else if ($m_a < $m_b)
          return 1;
      else
          return -1;
  }

  function show_imgs() {
  	// find images uploaded
  	$dir = "ckeditor/kcfinder/upload/images/";
  	$imgs_jpg = glob($dir."*.jpg");
  	$imgs_png = glob($dir."*.png");
  	$imgs_jpeg = glob($dir."*.jpeg");
  	$imgs = array_merge($imgs_jpg, $imgs_png);
  	$imgs = array_merge($imgs, $imgs_jpeg);
  	usort($imgs, [$this, 'imgcmp']);

  	$i = 0;
  	$count = count($imgs);
  	if (isset($_GET['forum_page_num'])) {
  		// page given
  		if ($_GET['forum_page_num'] <= 0)
  			$i = 0;
  		else if ($_GET['forum_page_num'] > (int)($count / 12 + 1))
  			$i = ((int)($count / 12)) * 12;
  		else
  			$i = ($_GET['forum_page_num'] - 1) * 12;
  	}
  	if ($count > $i + 12)
  		$count = $i + 12;

  	for (; $i < $count; ++$i) {
  		// get the name of the img
  		$name = substr(strrchr($imgs[$i], "/"), 1);

  		$index = (int)($i / 12);
  		echo '<div class="gallery_panel" onClick="toggleImgBig(this)">
  				<div><img src="'.$imgs[$i].'"></div>
  				<p>'.$name.'</p>
  			</div>';
  	}

  	$this->make_gallery_page_num((int)(count($imgs) / 12 + 1));
  }

  function generateSideNavi() {
    echo '<div id="sideNavi">
    ';
    switch ($this->name) {
      case '교회 소개':
      case '소리 소식':
      case '담임목사 소개':
      case '오시는 길':
        echo '<p>교회소개</p>
          '.$this->generateNaviLink('교회 소개', 'intro.php').'
          '.$this->generateNaviLink('소리 소식', 'noti.php').'
          '.$this->generateNaviLink('담임목사 소개', 'pastor.php').'
          '.$this->generateNaviLink('오시는 길', 'contact.php').'
        ';
        break;

      case '주일 5분 설교':
      case '수요 5분 설교':
      case '잠언 3분 설교':
        echo '<p>설교말씀</p>
          '.$this->generateNaviLink('주일 5분 설교', 'sundaySermon.php').'
          '.$this->generateNaviLink('수요 5분 설교', 'wednesdaySermon.php').'
          '.$this->generateNaviLink('잠언 3분 설교', 'proverb.php').'
        ';
        break;

      case '담임목사 칼럼':
        echo '<p>칼럼</p>
          '.$this->generateNaviLink('담임목사 칼럼', 'column.php').'
        ';
        break;

      case '자유게시판':
      case 'ST 본문 문맥':
      case '갤러리':
        echo '<p>커뮤니티</p>
          '.$this->generateNaviLink('자유게시판', 'forum.php').'
          '.$this->generateNaviLink('ST 본문 문맥', 'ST.php').'
          '.$this->generateNaviLink('갤러리', 'gallery.php').'
        ';
        break;
    }
    echo '</div>
    ';
  }

  function generateNaviLink($page, $link) {
    if ($page !== $this->name) {
      return '<p><a href="'.$link.'">'.$page.'</a></p>';
    }
    else {
      return "<p>$this->name</p>";
    }
  }
}
?>
