<?php
class CommandeManager{
  private $_db; // Instance de PDO

  public function __construct($db){
    $this->setDb($db);
  }
   // Requete liste Action Mené
   
  public function ListeCommande($db){

	$stmt = $db->prepare("SELECT * FROM commande");
	$stmt->execute();
	
	echo "<table id='dernier' align='center'>";
						
		echo "<tr><th>"; echo "Commande"; echo "</th>";
		echo "<th>"; echo "Description"; echo "</th>";
		echo "<th>"; echo "Modifier"; echo "</th>";
		echo "<th>"; echo "Supprimer"; echo "</th></tr>";
	
	foreach(($stmt->fetchAll()) as $donnees){	
		
		echo "<tr><th>"; echo $donnees['commande']; echo "</th>";
		echo "<th>"; echo $donnees['description']; echo "</th>";
		echo "<th>"; echo '<a href="modifier.php?id3='.$donnees['id'].'"><img src="css/modifier.png"></a>'; echo "</th>";
		echo "<th>"; echo '<a href="?id1='.$donnees['id'].'"><img src="css/delete.png"></a>'; echo "</th></tr>"; 
		
	}
	echo "</table>";
	
  }

  // Requete Insert
  
  public function InsertCommande($db, $commande, $description){
		
		try {	
				$sql = "Insert INTO commande (commande, description) VALUES ('$commande', '$description')";
				$db->exec($sql);
				echo "Insertion réussi";
			}
			catch(Exception $e){
				
				echo("<h1>Erreur : Base de données </h1>");
				die('Erreur : ' .$e->getMessage());
			
			}
  }
  
  public function DeleteCommande($db, $id){
	  
	  try{
		$sql = "delete from commande where id=$id";
		$db->exec($sql);
	  
	  }catch(Exception $e){
		  echo("<h1>Erreur : Base de données </h1>");
		die('Erreur : ' .$e->getMessage());
		  
	  }
	  echo '<meta http-equiv="refresh" content="0;URL=commandelinux.php">';
  }
  
    public function Modification ($db){
	  try{
		 
		$stmt = $db->prepare("select * from commande where id='".$_GET['id3']."'");
		$stmt->execute();

		 foreach(($stmt->fetchAll()) as $donnees){
		  
		  ?>	
				<form method="post" action="">
								</br>
								<label for="commande">Commande</label>
								</br>
								<input type="text" id="commande" name="commande" value="<?php echo $donnees['commande']; ?>">
								</br>
								<label for="description">Description</label>
								</br>
								<textarea name="description" rows="8" cols="60"><?php echo $donnees['description']; ?></textarea>
								</br>
								<input type="submit" id="valider1" name="valider1" value="Valider">
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
			
		$sql = "UPDATE commande SET commande='" .$_POST['commande']. "',description='" .$_POST['description']. "' WHERE id='" .$_GET['id3']. "'";
		$db->exec($sql);
				
		echo "Modification réussi";
		echo '<meta http-equiv="refresh" content="0;URL=modifier.php?id3='.$_GET['id3'].'">';
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