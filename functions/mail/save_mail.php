
<?php 

	function save_mail($email,$token)
	{
		$bd = new ConnectDB();
		$q = $bd->bdd->prepare("INSERT INTO password_reset SET 
																	emailCpte= :emailCpte,  
																	token= :token") 
																		
			or die(mysql_error());

				$q->bindValue(':emailCpte', $email);						
				$q->bindValue(':token', $token);

				if ($q->execute())
				{
					return true;					
				}else{
					return false;				
				}
	}
	

	
	
?>