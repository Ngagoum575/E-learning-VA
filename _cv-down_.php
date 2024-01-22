<?php

	include_once 'config/ConnectDB.php';

	if (isset($_REQUEST['file_id'])) 

          {
				$file = $_REQUEST['file_id'];
				$bd = new ConnectDB();
				$query =$bd->bdd->query("SELECT * FROM auth_app WHERE id ='$file'");
				$query->execute();
				$fetch = $query->fetch();
			
				header("Content-Disposition: attachment; filename=".$fetch['file']);
				header("Content-Type: application/octet-stream;");
				readfile("public/file/comptes/".$fetch['file']);
	     }
?>

