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
			if($product[0]['proQuantity'] > 0)
				echo '<a class="btn btn-default" href="index.php?controller=basket&action=addToBasket&id=' . $product[0]['idProduct'] . '&quant= '. $product[0]['proQuantity'] .'"">Ajouter au panier</a>';
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
			echo '<p> CHF : ' . $product[0]['proPrice'] . '</p>';

			if($product[0]['proLike'] > 0) {
				echo '<p>Ce produit est aimée déjà  <strong>' . $product[0]['proLike'] . '</strong> fois ! </p>';
			}
		?>
		</div>
	</div>
</div>