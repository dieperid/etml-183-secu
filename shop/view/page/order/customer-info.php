<div class="container">
	<h2>Adresse d'envoi</h2>
	<!-- Three columns of text below the carousel -->
	<div class="row">
	<form action="index.php?controller=order&action=summary" method="post">
        <input type="text" id="title" name="title" value="" placeholder="Titre" required><br><br>
        <input type="text" id="name" name="name" value="" placeholder="Nom" required>
        <input type="text" id="firstname" name="firstname" value="" placeholder="Prénom" required><br><br>
        <input type="text" id="street" name="street" value="" placeholder="Rue" required>
        <input type="text" id="streetNumber" name="streetNumber" value="" placeholder="N°" required><br><br>
        <input type="text" id="npa" name="npa" value="" placeholder="NPA" required>
        <input type="text" id="locality" name="locality" value="" placeholder="Localité" required><br><br>
        <input type="email" id="mail" name="mail" value="" placeholder="Adresse mail" required>
        <input type="text" id="phone" name="phone" value="" placeholder="Téléphone" required><br><br>
		<input type="hidden" name="csrf-token" value="CIwNZNlR4XbisJF39I8yWnWX9wX4WFoz" />
        <input class="btn btn-default command" type="submit" value="Suivant">
	</form>
	</div>
</div>