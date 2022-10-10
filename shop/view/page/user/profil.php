<div class="container">

	<h2><?= $_SESSION['username']?></h2>
	<?php

	$table = 't_user';
	$columns = 'idUser';
	$where =  "useLogin = '". $_SESSION["username"] . "'";

	$db = new DataBaseQuery();
	$val = $db->select($table,$columns,$where);

	var_dump($val);
	
	?>
	<!-- Three columns of text below the carousel -->
	<div class="row">

	</div>
