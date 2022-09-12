
<div class="container">
	<h2>Récapitulatif</h2>
	<!-- Three columns of text below the carousel -->
	<div class="row">
	<div class="flex-container">
		<p>Envoyé à :</p>
		<p>Livraison : 
			<?php 
				if($_SESSION["delivery"] == "POSTE")
					echo 'Par la poste';
				if($_SESSION["delivery"] == "SHOP")
					echo 'Retrait au magasin';
			?></p>
		<p>Paiement :
			<?php 
				if($_SESSION["payment"] == "FACTURE")
					echo 'Sur facture';
				if($_SESSION["payment"] == "ADVANCE")
					echo 'Paiement par avance';
				if($_SESSION["payment"] == "CARD")
					echo 'Carte de crédit';
			?></p>
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

	<table>
	<tr>
	<th>Description</th>
	<th>Prix</th>
	<th>Quantité</th>
	<th>Sous-total</th>
	</tr>

	<?php
	$total = 0;

	foreach($products as $product){
        echo '<tr>
            <td>'. $product[0]['proName'] .'</td>
            <td> CHF '. $product[0]['proPrice'] .'</td>
            <td>'. $_SESSION["basket"][$product[0]['idProduct']]. '</td>
            <td> CHF '. $_SESSION["basket"][$product[0]['idProduct']] * $product[0]['proPrice'] . '</td>
            </tr>';
        $total += $_SESSION["basket"][$product[0]['idProduct']] * $product[0]['proPrice'];
    }

	if($_SESSION['delivery'] == 'POSTE'){
        $total += 7.95;
        echo '<tr>
            <td>Par poste</td>
            <td></td>
            <td></td>
            <td>CHF 7.95</td>
            </tr>';
    }else if($_SESSION['delivery'] == 'SHOP'){
        echo '<tr>
            <td>Retrait au magasin</td>
            <td></td>
            <td></td>
            <td>CHF 0</td>
            </tr>';
    }
	echo '<tr>
			<td>Total</td>
            <td></td>
            <td></td>
            <td>CHF ' . $total . '</td>
            </tr>';

	if($_SESSION['payment'] == 'FACTURE'){
        echo '<tr>
        	<td>Sur facture (+ CHF 2.-)</td>
        	<td></td>
        	<td></td>
        	<td>CHF 2</td>
        	</tr>';
        	$total+=2;
    }else if($_SESSION['payment'] == 'ADVANCE'){
        echo '<tr>
        	<td>Paiement par avance</td>
        	<td></td>
        	<td></td>
        	<td>CHF 0</td>
        	</tr>';
    }else{
        echo '<tr>
        	<td>Carte de crédit (+2%)</td>
        	<td></td>
        	<td></td>
        	<td>CHF ' . $total*0.02 . '</td>
        	</tr>';
        	$total+= $total*0.02;
    }

	echo '<tr>
            <td>Total à payer</td>
            <td></td>
            <td></td>
            <td>CHF ' . $total . '</td>
            </tr>';
	?>

	</table>
	</div>
</div>