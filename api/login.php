<?php
function start_session() {
	if (session_id() == "") {
		session_start(); // start the session if none has started;"
	}
}

function connect() {
	$host = 'uws64-249.cafe24.com';
	$user = 'sorichurch';
	$password = 'sc141735';
	$db = 'sorichurch';
	$mysqli = new mysqli($host, $user, $password, $db);
	if ($mysqli->connect_error)
		die("Connection failed: ".$mysqli->connect_error);
	return $mysqli;
}

function sub_menu() {
	if (!login()) {
		echo '<form class="subMenu" method="POST" action="index.php">
						ID  :  <input type="text" name="id" class="text_field">
						PW  :  <input type="password" name="password" class="text_field">
						<input type="submit" value="로그인" class="sub_menu_button">
						<button class="sub_menu_button" type="button" href="signup.php">회원가입</button>
					</form>';
	}
}

function login() {
	start_session();
	if (isset($_SESSION['logged_in'])) {
		$id = $_SESSION['id'];
		echo '<p class="subMenu">'.$id.'님 안녕하세요&nbsp;&nbsp;<a href="sign_out.php"><button class="sub_menu_button" type="button">로그아웃</button></a>';
		// if ($_SESSION['id'] === 'sorichurch') {
		// 	echo '&nbsp;<a href="manage.php?manage=writing"><button class="sub_menu_button" type="button">사이트 관리</button></a>';
		// }
		echo '</p>';
		return true;
	}
	else if (isset($_POST['id']) && isset($_POST['password'])) {
		$mysqli = connect();
		$id = $mysqli->escape_string($_POST['id']);
		$result = $mysqli->query("SELECT * FROM accounts WHERE id='$id'");
		if ($result->num_rows === 0) {
			// no existing id
			return false;
		}
		else {
			// id exists
			// check password
			$user = $result->fetch_assoc();

			if (password_verify($_POST['password'], $user['password'])) {
				// login success
				$_SESSION['id'] = $user['id'];
				$_SESSION['email'] = $user['email'];
				$_SESSION['hash'] = $user['hash'];
				$_SESSION['active'] = $user['active'];
				$_SESSION['logged_in'] = true;
				echo '<p class="subMenu">'.$id.'님 안녕하세요&nbsp;&nbsp;<a href="sign_out.php"><button class="sub_menu_button" type="button">로그아웃</button></a>';
				// if ($_SESSION['id'] === 'sorichurch') {
				// 	echo '&nbsp;<a href="manage.php?manage=writing"><button class="sub_menu_button" type="button">사이트 관리</button></a>';
				// }
				echo '</p>';
				return true;
			}
			else {
				// login failed
				return false;
			}
		}
	}
	return false;
}
?>
