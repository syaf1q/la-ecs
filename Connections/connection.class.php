<?php
	
	define("HOSTNAME","localhost:3306");
	define("USERNAME","root");
	define("PASSWORD","");
	define("DB_NAME","la-ecs");
	
	function connect()
	{
		$con = mysql_connect(HOSTNAME,USERNAME,PASSWORD);
		
		if(!$con)
		{
			die("Unable to connect!");
		}
		if(!mysql_select_db(DB_NAME,$con))
		{
			die("Unable to locate database!");
		}
		
		return $con;
	}
	
?>