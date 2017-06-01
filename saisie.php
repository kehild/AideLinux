<?php
include_once "header.php";
include_once "bdd/connexion.php";
include_once "bdd/ActionManager.php";
include_once "bdd/CommandeManager.php";
include_once "bdd/ProblemeManager.php";

 if(isset($_POST['valider'])){
	$manager = new ActionManager($db);
	$manager->InsertAction($db,$_POST['action_mene'], $_POST['description']);
}
 if(isset($_POST['valider1'])){
	$ComManager = new CommandeManager($db);
	$ComManager->InsertCommande($db,$_POST['commande'], $_POST['description']);
}
 if(isset($_POST['valider2'])){
	$prob = new ProblemeManager($db);
	$prob->InsertProbleme($db,$_POST['probleme'], $_POST['solution']);
}

?>
   <script type="text/javascript">
      function catsel(sel) {
        //if (sel.value=="-1" ) return; 
        var opt=sel.getElementsByTagName("option");
        for (var i=0; i<opt.length; i++) {
          var x=document.getElementById(opt[i].value);
          if (x) x.style.display="none";
        }
        var cat = document.getElementById(sel.value);
        if (cat) cat.style.display="block";
      } 
	</script>
	<body>   
		<section>
			<div class="transbox">
					Choix de la categorie
					</br>
					  <select onchange="catsel(this)" name="types" id="types">
					  <!--<option value="-1">None</option>!-->
						<option value="1">Action Mené</option>
						<option value="2">Commande</option>
						<option value="3">Problème</option>
					  </select>
					</td>
							
					  <div id="1" style="display:block"> <!-- Action -->
						<form method="post" action="">
								</br>
								<label for="action_mene">Action Mené</label>
								</br>
								<input type="text" id="action_mene" name="action_mene">
								</br>
								<label for="description">Description</label>
								</br>
								<textarea name="description" rows="8" cols="60"></textarea>
								</br>
								<input type="submit" id="valider" name="valider" value="Valider">
						</form>	
					  </div>
					  <div id="2" style="display:none"> <!-- Commande -->
							<form method="post" action="">
								</br>
								<label for="commande">Commande</label>
								</br>
								<input type="text" id="commande" name="commande">
								</br>
								<label for="description">Description</label>
								</br>
								<textarea name="description" rows="8" cols="60"></textarea>
								</br>
								<input type="submit" id="valider1" name="valider1" value="Valider">
						</form>	
					  </div>
					  <div id="3" style="display:none"> <!-- Problème -->
						<form method="post" action="">
								</br>
								<label for="probleme">Problème</label>
								</br>
								<input type="text" id="probleme" name="probleme">
								</br>
								<label for="solution">Solution</label>
								</br>
								<textarea name="solution" rows="8" cols="60"></textarea>
								</br>
								<input type="submit" id="valider2" name="valider2" value="Valider">
						</form>	
					  </div>		
		</section>
</body>
