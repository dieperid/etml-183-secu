<div class="container">

	<h2>
		<?php
			echo $product[0]['proName'];
		?>
	</h2>
	<!-- Three columns of text below the carousel -->
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<?php
			echo '<p>' . $product[0]['proDescription'] . '</p>';
			echo '<p>Encore : ' . $product[0]['proQuantity'] . ' en stock</p>';
			if($product[0]['proQuantity'] > 0){
				// Bouton ajout au panier
				echo '<a class="btn btn-default" href="index.php?controller=basket&action=addToBasket&id=' . $product[0]['idProduct'] . '&quant= '. $product[0]['proQuantity'] .'"">Ajouter au panier</a>';
				
				// Bouton achat direct
				echo '<a class="btn btn-default" href="index.php?controller=basket&action=addToBasketAndRedirect&id=' . $product[0]['idProduct'] . '&quant= '. $product[0]['proQuantity'] .'"">Achat instantané</a>';
			}
		?>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
		<?php
		/**
		 * A METTRE DANS LE RAPPORT
		 * AFFICHAGE DU WATERMARK
		 */
			echo '<div class="imageProduct"><img src="view/page/shop/watermark.php?jpg=../../../resources/image/' . $product[0]['proImage'] . '"/></div>';
		?>
		</div>
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<?php
			// Si le rabais en CHF est différent de 0
			if($product[0]['proRabChf'] != 0){
				echo '<p> CHF : ' . $product[0]['proPrice'] - $product[0]['proRabChf'] . '</p>';
				echo '<p> au lieu de ' . $product[0]['proPrice'] . '.- (vous économisez '. number_format($product[0]['proRabChf'],1) . '.-)</p>';
			}
			// Si le rabais en Pourcent est différent de 0
			else if($product[0]['proRabPourcent'] != 0){
				echo '<p> CHF : ' . number_format($product[0]['proPrice'] - ($product[0]['proPrice'] * $product[0]['proRabPourcent'] / 100), 1) . '</p>';
				echo '<p> au lieu de ' . $product[0]['proPrice'] . '.- (vous économisez '. number_format($product[0]['proPrice'] * $product[0]['proRabPourcent'] / 100, 1) . '.-)</p>';
			}
			else{
				echo '<p> CHF : ' . $product[0]['proPrice']. '</p>';
			}


			if($product[0]['proLike'] > 0) {
				echo '<p>Ce produit est aimée déjà  <strong>' . $product[0]['proLike'] . '</strong> fois ! </p>';
			}
		?>
		</div>
	</div>
</div>