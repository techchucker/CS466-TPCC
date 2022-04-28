<?php
	define('DB_SERVER', 'tpcc.cgdl9talsrzb.us-east-2.rds.amazonaws.com:3306');
	define('DB_USERNAME', 'cs466_tpcc');
	define('DB_PASSWORD', 'pkflhLj#3jhmL6K');
	define('DB_DATABASE', 'tpcc');
	$db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

	#PDO
	$host       = DB_SERVER;
	$username   = DB_USERNAME;
	$password   = DB_PASSWORD;
	$dbname     = DB_DATABASE;
	$dsn        = "mysql:host=$host;dbname=$dbname";
	#$options    = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
	#$options    = array(PDO::ATTR_EMULATE_PREPARES=>false,PDO::MYSQL_ATTR_USE_BUFFERED_QUERY=>true,PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_ASSOC);
	$options    = array(PDO::ATTR_EMULATE_PREPARES=>true,PDO::MYSQL_ATTR_USE_BUFFERED_QUERY=>true);
	$pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password, $options);
?>
