<div class="container">
	<h2>Choisir un moyen de livraison</h2>
	<!-- Three columns of text below the carousel -->
	<div class="row">

	<form action="index.php?controller=order&action=payment" method="post">
		<input type="radio" id="poste" value="POSTE" name="delivery" required>
		<label for="poste">Par la poste ( + CHF 7.95)</label><br>
		<input type="radio" id="shop" value="SHOP" name="delivery" required>
		<label for="shop">Retrait au magasin</label><br>
		<input class="btn btn-default command" type="submit" value="Suivant">
	</form>
	</div>
</div>