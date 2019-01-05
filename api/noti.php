<?php
require_once 'api/header.php';
require_once 'api/login.php';

class fromDb {
  function get_main_page_writing($classify) {
    $mysqli = connect();
  	$sql = 'SELECT * FROM manager WHERE classify="'.$classify.'";';
  	$result = $mysqli->query($sql);

  	if ($result->num_rows > 0) {
  		$row = $result->fetch_assoc();
  		$content = $row['file'];
  		echo $content;
  		return;
  	}
  	echo 'ERROR no connection';
  }

  function get_youtube_src() {
  	$mysqli = connect();
  	$sql = "SELECT content FROM sermon ORDER BY num DESC LIMIT 1";
  	$result = $mysqli->query($sql);
  	if ($result->num_rows > 0) {
  		$result = $result->fetch_assoc();;
  		$content = $result['content'];
  		$src_start = strpos($content, 'src=');
  		$src_end = strpos($content, '"', $src_start + 5);

  		if($src_start !== false)
  			echo substr($content, $src_start, $src_end - $src_start + 1);
  		else
  			echo "ERROR1";
  	}
  	return "ERROR2";
  }

  function sql_count($table_name) {
  	return "SELECT COUNT(num) FROM ".$table_name;
  }

  function sql_content($table_name) {
  	return "SELECT title, date_format(date, '%m-%d') as date FROM ".$table_name." ORDER BY num DESC LIMIT 4";
  }

  function print_row($page, $num, $title, $date) {
  	echo '<a href="'.$page.'?forum_num='.$num.'">
            <li>
      				<span class="noti_title">'.$title.'</span>
      		  </li>
          </a>';
  }

  function noti($table_name, $page) {
  	$mysqli = connect();
  	$sql = $this->sql_count($table_name);
  	$result = $mysqli->query($sql);
  	if ($result->num_rows > 0) {
  		$row = $result->fetch_assoc();
  		$max_num = $row['COUNT(num)'];

  		$sql = $this->sql_content($table_name);
  		$result = $mysqli->query($sql);

  		if ($result->num_rows > 0) {
  			echo '<ul class="noti_content">';
  			while ($row = $result->fetch_assoc()) {
  				$num = $max_num--;
  				$title = $row['title'];
  				$date = $row['date'];
  				$this->print_row($page, $num, $title, $date);
  			}
  			echo '</ul>';
  		}
  	}
  }
}

?>
