<div class="container">
	<h2>Votre panier</h2>
	<!-- Three columns of text below the carousel -->
	<div class="row">
		<?php

		$total = 0;

		if(isset($_SESSION["basket"])){
			echo '<table>';
			echo '<tr>';
			echo '<th>Description</th>';
			echo '<th>Prix</th>';
			echo '<th>Quantité</th>';
			echo '<th>Sous-total</th>';
			echo '</tr>';
			foreach ($products as $product) {
				echo '<tr>
				<td>'. $product[0]['proName'] .'</td>
				<td> CHF '. $product[0]['proPrice'] .'</td>
				<td>'. $_SESSION["basket"][$product[0]['idProduct']]. '</td>
				<td> CHF '. $_SESSION["basket"][$product[0]['idProduct']] * $product[0]['proPrice'] . '</td>';
				$total += $_SESSION["basket"][$product[0]['idProduct']] * $product[0]['proPrice'];
			}
			echo '<tr>
			<td> Total </td>
			<td> </td>
			<td> </td>
			<td> CHF '. $total .'</td>';
			echo '</table>';
		}
		else{
			echo "T'es pauvre";
		}
		?>

	</div>
</div>