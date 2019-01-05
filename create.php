<?php
require_once 'api/header.php';
require_once 'api/login.php';
require_once 'api/content.php';

function creating_content_kind() {
	$page = $_GET['page'];
  echo '<div id="sideNavi">';
	echo '<p>글 작성</p>';
	if ($page === 'forum') {
		echo '<p>자유게시판</p>';
	}
	else if ($page === 'sermon') {
		echo '<p>주일 5분 설교</p>';
	}
	else if ($page === 'weekly_column') {
		echo '<p>담임목사 칼럼</p>';
	}
	else if ($page === 'noti') {
		echo '<p>교회소식</p>';
	}
	else if ($page === 'wednesday_sermon') {
		echo '<p>수요 5분 설교</p>';
	}
	else if ($page === 'proverb') {
		echo '<p>잠언 3분 설교</p>';
	}
	else if ($page === 'ST') {
		echo '<p>ST 본문 문맥</p>';
	}
	else {
		echo '<p>게시물 관리</p>';
	}
  echo '</div>';
}

function create_content() {
	if (isset($_SESSION['logged_in'])) {
		if (isset($_POST['editor'])) {
			$mysqli = connect();
			$page = $_GET['page'];
			$sql = "INSERT INTO ";
			if ($page === "forum")
				$sql .= "forum";
			else if ($page === "sermon") {
				$sql .= "sermon";
				if (!($_SESSION['id'] === "sorichurch"))
					die ("권한이 없는 관리자입니다.");
			}
			else if ($page === "weekly_column") {
				$sql .= "weekly_column";
				if (!($_SESSION['id'] === "sorichurch"))
					die ("권한이 없는 관리자입니다.");
			}
			else if ($page === "noti") {
				$sql .= "noti";
				if (!($_SESSION['id'] === "sorichurch"))
					die ("권한이 없는 관리자입니다.");
			}
			else if ($page === "wednesday_sermon") {
				$sql .= "wednesday_sermon";
				if (!($_SESSION['id'] === "sorichurch"))
					die ("권한이 없는 관리자입니다.");
			}
			else if ($page === "proverb") {
				$sql .= "proverb";
				if (!($_SESSION['id'] === "sorichurch"))
					die ("권한이 없는 관리자입니다.");
			}
			else if ($page === "ST") {
				$sql .= "ST";
				if (!($_SESSION['id'] === "sorichurch"))
					die ("권한이 없는 관리자입니다.");
			}
			$sql .= "(title, id, date, content) VALUES ('".$_POST['title']."', '".$_SESSION['id']."', now(), '".$_POST['editor']."');";
			$result = $mysqli->query($sql) or die($sql);

			echo $sql;

			if ($result) {
				if ($page === "noti")
					header("Location: index.php");
				else
					header("Location: $page.php");
			}
			else {
				die("Error: access failed");
			}
		}
		else {
			echo '<form action="create.php?page='.$_GET['page'].'" method="POST">
						<input id ="txt_field" type="text" name="title" placeholder="제목을 입력하세요">
						<textarea class="ckeditor" name="editor"></textarea>
						<input id="submit_button" type="submit" value="INSERT">
					</form';
		}
	}
	else {
		die("로그인을 먼저 해주세요");
	}
}
?>

<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/std.css">
    <link rel="stylesheet" href="css/createModify.css">
  	<link rel="stylesheet"
  		href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400, 700">
    <script type='text/javascript' src='js/header.js'></script>
    <script type='text/javascript' src='js/content.js'></script>
    <script src="/ckeditor/ckeditor.js"></script>
    <title>소리교회 - 말씀과 사랑이 넘쳐나는 건강한 교회</title>
  </head>
  <body>
    <div id="wrapper">
      <!-- generate header html codes -->
      <?php generateHeader("create") ?>

      <section id="content">
        <div>
          <?php
            // $content = new dbContent("갤러리", 'gallery', 'gallery.php');
            creating_content_kind();
          ?>
          <button id="scrollToTop" onClick="scrollToTop()">Top</button>
          <div>
            <?php
              create_content();
            ?>
          </div>
        </div>
      </section>

      <!-- generate header html codes -->
      <?php generateFooter() ?>
    </div>
  </body>
</html>
