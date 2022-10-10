<div class="container">
	<h2>Paiement par carte de crédit</h2>
	<!-- Three columns of text below the carousel -->
    <div class="row">
        <div class="flex-container">
            <p>Facturé à :</p>
        </div>

        <p><?= $_SESSION["summary"]["title"] ?></p>
        <div class="flex-container2">
            <p><?= $_SESSION["summary"]["name"] ?></p>
            <p><?= $_SESSION["summary"]["firstname"] ?></p>
        </div>
        <div class="flex-container2">
            <p><?= $_SESSION["summary"]["street"] ?></p>
            <p><?= $_SESSION["summary"]["streetNumber"] ?></p>
        </div>
        <div class="flex-container2">
            <p><?= $_SESSION["summary"]["npa"] ?></p>
            <p><?= $_SESSION["summary"]["locality"] ?></p>
        </div>
        <p>Total à payer : CHF <?= $_SESSION['total'] ?></p>
        
        <a class="btn btn-default command" href="index.php?controller=order&action=validOrder">Envoyer la commande</a>
    </div>
</div>