<?php
class ActionManager{
  private $_db; // Instance de PDO

  public function __construct($db){
    $this->setDb($db);
  }
   
  public function ListeAction($db){

	$stmt = $db->prepare("SELECT * FROM action");
	$stmt->execute();
	
	echo "<table id='dernier' align='center'>";
						
		echo "<tr><th>"; echo "Action Mene"; echo "</th>";
		echo "<th>"; echo "Description"; echo "</th>";
		echo "<th>"; echo "Modifier"; echo "</th>";
		echo "<th>"; echo "Supprimer"; echo "</th></tr>";
	
	foreach(($stmt->fetchAll()) as $donnees){	
		
		echo "<tr><th>"; echo $donnees['action_mene']; echo "</th>";
		echo "<th>"; echo $donnees['description']; echo "</th>";
		echo "<th>"; echo '<a href="modifier.php?id2='.$donnees['id'].'"><img src="css/modifier.png"></a>'; echo "</th>";
		echo "<th>"; echo '<a href="?id1='.$donnees['id'].'"><img src="css/delete.png"></a>'; echo "</th></tr>"; 
	}
	echo "</table>";
	
  }

  public function InsertAction($db, $action_mene, $description){
		
		try {	
				$sql = "Insert INTO action (action_mene, description) VALUES ('$action_mene', '$description')";
				$db->exec($sql);
				echo "Insertion réussi";
			}
			catch(Exception $e){
				
				echo("<h1>Erreur : Base de données </h1>");
				die('Erreur : ' .$e->getMessage());
			
			}
  }
  
  public function DeleteAction($db, $id){
	  
	  try{
		$sql = "delete from action where id=$id";
		$db->exec($sql);
	  
	  }catch(Exception $e){
		  echo("<h1>Erreur : Base de données </h1>");
		die('Erreur : ' .$e->getMessage());
		  
	  }
	  echo '<meta http-equiv="refresh" content="0;URL=actionmene.php">';
  }
  
  
  public function Modification($db){
	  try{
		  
		$stmt = $db->prepare("select * from action where id='" .$_GET['id2']. " '");
		$stmt->execute();
		  	  
	   	foreach(($stmt->fetchAll()) as $donnees){

			?>
				<div>
				<form method="post" action="">
					</br>
					<label for="action_mene">Action Mené</label>
					</br>
					<input type="text" id="action_mene" name="action_mene" value="<?php echo $donnees['action_mene'];?>">
					</br>
					<label for="description">Description</label>
					</br>
					<textarea name="description" rows="8" cols="60"><?php echo $donnees['description'];?></textarea>
					</br>
					<input type="submit" id="valider" name="valider" value="Valider">
					</form>	
				</div>
				<?php	
			}
				  
	  }catch(Exception $e){
		
		echo("<h1>Erreur : Base de données </h1>");
		die('Erreur : ' .$e->getMessage());
	  }   
  }
  
  public function Update($db){
	
		try {
			
		$sql = "UPDATE action SET action_mene='" .$_POST['action_mene']. "',description='" .$_POST['description']. "' WHERE id='" .$_GET['id2']. "'";
		$db->exec($sql);
				
		echo "Modification réussi";
		echo '<meta http-equiv="refresh" content="0;URL=modifier.php?id2='.$_GET['id2'].'">';
		}
		catch(Exception $e){
			
		echo("<h1>Erreur : Base de données </h1>");
		die('Erreur : ' .$e->getMessage());
			
	}
}
  
  public function setDb(PDO $db){
    $this->_db = $db;
  }
}




?>


						
					
						
						