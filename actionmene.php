<?php
include_once "header.php";
include_once "bdd/ActionManager.php";
include_once "bdd/connexion.php";
?>
<section>
	<div class="transbox">
		</br>
		<?php  
			$manager = new ActionManager($db);
			$manager->ListeAction($db);
			 
			 if (isset($_GET['id1'])){
				$manager->DeleteAction($db, $_GET['id1']);
			}
			
			
			?>
	</div>
</section>