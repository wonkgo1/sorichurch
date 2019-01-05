<?php
start_session();
session_unset();
if (session_destroy())
	echo "session destroyed";
else
	echo "session destroying failed";
header('Location: index.php');

function start_session() {
	if (session_id() == "") {
	session_start(); // start the session if none has started;"
	}
}
?>
