<?php
include_once "header.php";
include_once "bdd/connexion.php";
include_once "bdd/CommandeManager.php";
?>
<section>
	<div class="transbox">
		</br>
		<?php  
			$ComManager = new CommandeManager($db);
			$ComManager->ListeCommande($db);
			
			 if (isset($_GET['id1'])){
				$ComManager->DeleteCommande($db, $_GET['id1']);
			}
			
			?>
	</div>
</section>