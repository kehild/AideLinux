<?php
include_once "header.php";
include_once "bdd/connexion.php";
include_once "bdd/ActionManager.php";
include_once "bdd/ProblemeManager.php";
include_once "bdd/CommandeManager.php";
?>
<section>
	<div class="transbox">
		</br>
<?php		
if (isset($_GET['id2'])){
				$manager = new ActionManager($db);
				$manager->Modification($db);
				
				if (isset($_POST['valider'])){
					$manager->Update($db);
				}	
}

if (isset($_GET['id3'])){
				$ComManager = new CommandeManager($db);
				$ComManager->Modification($db);
				
				if (isset($_POST['valider1'])){
					$ComManager->Update($db);
				}	
	
}

if (isset($_GET['id4'])){
				$prob = new ProblemeManager($db);
				$prob->Modification($db);
			
				if (isset($_POST['valider2'])){
					$prob->Update($db);
				}	
}

?>
	</div>
</section>