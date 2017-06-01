<?php
class ProblemeManager{
  private $_db; // Instance de PDO

  public function __construct($db){
    $this->setDb($db);
  }
   // Requete liste Action Mené
   
  public function ListeProbleme($db){

	$stmt = $db->prepare("SELECT * FROM probleme");
	$stmt->execute();
	
	echo "<table id='dernier' align='center'>";
						
		echo "<tr><th>"; echo "Problème"; echo "</th>";
		echo "<th>"; echo "Solution"; echo "</th>";
		echo "<th>"; echo "Modifier"; echo "</th>";
		echo "<th>"; echo "Supprimer"; echo "</th></tr>";
	
	foreach(($stmt->fetchAll()) as $donnees){	
		
		echo "<tr><th>"; echo $donnees['probleme']; echo "</th>";
		echo "<th>"; echo $donnees['solution']; echo "</th>";
		echo "<th>"; echo '<a href="modifier.php?id4='.$donnees['id'].'"><img src="css/modifier.png"></a>'; echo "</th>"; 
		echo "<th>"; echo '<a href="?id1='.$donnees['id'].'"><img src="css/delete.png"></a>'; echo "</th></tr>"; 
		
	}
	echo "</table>";
	
  }

  // Requete Insert
  
  public function InsertProbleme($db, $probleme, $solution){
		
		try {	
				$sql = "Insert INTO probleme (probleme, solution) VALUES ('$probleme', '$solution')";
				$db->exec($sql);
				echo "Insertion réussi";
			}
			catch(Exception $e){
				
				echo("<h1>Erreur : Base de données </h1>");
				die('Erreur : ' .$e->getMessage());
			
			}
  }
  
    public function DeleteProbleme($db, $id){
	  
	  try{
		$sql = "delete from probleme where id=$id";
		$db->exec($sql);
	  
	  }catch(Exception $e){
		  echo("<h1>Erreur : Base de données </h1>");
		die('Erreur : ' .$e->getMessage());
		  
	  }
	  echo '<meta http-equiv="refresh" content="0;URL=probleme.php">';
  }
  
      public function Modification ($db){
	  try{  
		  
		$stmt = $db->prepare("select * from probleme where id='".$_GET['id4']."'");
		$stmt->execute();
		  
		foreach(($stmt->fetchAll()) as $donnees){
		  
		  ?>
				<form method="post" action="">
								</br>
								<label for="probleme">Problème</label>
								</br>
								<input type="text" id="probleme" name="probleme" value="<?php echo $donnees['probleme']; ?>">
								</br>
								<label for="solution">Solution</label>
								</br>
								<textarea name="solution" rows="8" cols="60"><?php echo $donnees['solution']; ?></textarea>
								</br>
								<input type="submit" id="valider2" name="valider2" value="Valider">
						</form>	
				<?php		
		  }  
		  
	  }catch(Exception $e){
		
		echo("<h1>Erreur : Base de données </h1>");
		die('Erreur : ' .$e->getMessage());
	  } 
  }
  
     public function Update($db){
	
		try {
			
		$sql = "UPDATE probleme SET probleme='" .$_POST['probleme']. "',solution='" .$_POST['solution']. "' WHERE id='" .$_GET['id4']. "'";
		$db->exec($sql);
				
		echo "Modification réussi";
		echo '<meta http-equiv="refresh" content="0;URL=modifier.php?id4='.$_GET['id4'].'">';
		}
		catch(Exception $e){
			
		echo("<h1>Erreur : Base de données </h1>");
		die('Erreur : ' .$e->getMessage());
			
	}
}
  
  
  public function setDb(PDO $db)
  {
    $this->_db = $db;
  }
}

?>