<div class="container">
	<h2>Choisir un moyen de paiement</h2>
	<!-- Three columns of text below the carousel -->
	<div class="row">

	<form action="index.php?controller=order&action=customer" method="post">
		<input type="radio" id="facture" value="FACTURE" name="payment" required>
		<label for="facture">Sur facture ( + CHF 2)</label><br>
        <input type="radio" id="advance" value="ADVANCE" name="payment" required>
		<label for="advance">Paiement par avance</label><br>
		<input type="radio" id="card" value="CARD" name="payment" required>
		<label for="card">Carte de crédit ( + 2%)</label><br>
		<input class="btn btn-default command" type="submit" value="Suivant">
	</form>
	</div>
</div>