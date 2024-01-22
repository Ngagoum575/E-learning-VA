
<?php 

	
		
		function update_reset_password($id,$pwd,$email)
			{
				$bd = new ConnectDB();
				$q = $bd->bdd->prepare("UPDATE  useradmin SET 
																pwdCpte= :pwdCpte, 
																emailCpte= :emailCpte 
																WHERE emailCpte = '".$id."' ")
																
					or die(mysql_error());

						$q->bindValue(':pwdCpte', $pwd);			
						$q->bindValue(':emailCpte', $email);

						if ($q->execute())
						{
							return true;					
						}else{
							return false;				
						}
			}
	

	
	
?>