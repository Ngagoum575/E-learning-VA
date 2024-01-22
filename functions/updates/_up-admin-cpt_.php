
<?php 


function update_compte_admin($id,$login,$pwd,$email)
	{
		$bd = new ConnectDB();
		$q = $bd->bdd->prepare("UPDATE useradmin SET 
													
														    idCpte= :idCpte,
														    loginCpte= :loginCpte,
														    pwdCpte= :pwdCpte,
														    emailCpte= :emailCpte
															
															WHERE idCpte = '".$id."' ");

		        $q->bindValue(':idCpte', $id);			
				$q->bindValue(':loginCpte', $login);
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