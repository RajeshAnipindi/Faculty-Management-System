<?php
	session_destroy();
	require("connection/connect.php");
	header("Location: index.php");
?>
