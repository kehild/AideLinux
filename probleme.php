<?php
include_once "header.php";
include_once "bdd/connexion.php";
include_once "bdd/ProblemeManager.php";
?>
<section>
	<div class="transbox">
		</br>
		<?php  
			$prob = new ProblemeManager($db);
			$prob->ListeProbleme($db);
			
			 if (isset($_GET['id1'])){
				$prob->DeleteProbleme($db, $_GET['id1']);
			}
			
			?>
	</div>
</section>