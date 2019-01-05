<?php
require_once 'api/header.php';
require_once 'api/login.php';
require_once 'api/content.php';

function updating_content_kind() {
	$page = $_GET['page'];
  echo '<div id="sideNavi">';
	echo '<p>글 수정</p>';
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

function update_content() {
	if (isset($_SESSION['logged_in']) && isset($_GET['num'])) {
		if (isset($_POST['editor'])) {
			$mysqli = connect();
			$page = $_GET['page'];
			$sql = "UPDATE ";
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

			$sql .= " SET title='".$_POST['title']."', content='".$_POST['editor']."' WHERE num=".$_GET['num'].";";
			if (isset($_SESSION['id']) && ($_SESSION['id'] === $_GET['id'] || $_SESSION['id'] === 'sorichurch')) {
				$result = $mysqli->query($sql) or die($sql);

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
				die ("작성자가 아닙니다.");
			}
		}
		else {
			$mysqli = connect();
			$page = $_GET['page'];
			$sql = "SELECT num, title, id, date_format(date, '%Y-%m-%d') as date, content FROM ";
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
			$sql .= " WHERE num=".$_GET['num'].";";
			$result = $mysqli->query($sql) or die($sql);

			if ($result) {
				$row = $result->fetch_assoc();
				$title = $row['title'];
				$content = $row['content'];

				echo '<form action="modify.php?page='.$_GET['page'].'&num='.$_GET['num'].'&id='.$row['id'].'" method="POST">
						<input id ="txt_field" type="text" name="title" value="'.$title.'">
						<textarea class="ckeditor" name="editor">'.$content.'</textarea>
						<input id="submit_button" type="submit" value="수정">
					</form';
			}
			else {
				die ("Connection failed");
			}
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
            updating_content_kind();
          ?>
          <button id="scrollToTop" onClick="scrollToTop()">Top</button>
          <div>
            <?php
              update_content();
            ?>
          </div>
        </div>
      </section>

      <!-- generate header html codes -->
      <?php generateFooter() ?>
    </div>
  </body>
</html>
