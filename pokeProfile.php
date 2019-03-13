
<?php
include 'getPokemonDataMike.php';
session_start();
?>

<!DOCTYPE html>
<html lang="en-US">
	<head>
		<title>Pokedex</title>

		<meta charset="UTF-8">
		<meta name="description" content="A pokedex">
		<meta name="keywords" content="pokemon">
		<meta name="author" content="Group5">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
		<link rel="stylesheet" href="styles.css" />

<link rel="icon" href="https://cdn.bulbagarden.net/upload/d/dc/GO_Pok%C3%A9_Ball.png" type="icon">

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
		<script src="pokeApp.js"></script>

	</head>

	<style>


					tr:nth-child(3){background-color: #f2f2f2}
					tr:nth-child(4){background-color: #f2f2f2}
					tr:nth-child(6){background-color: #f2f2f2}
					tr:nth-child(8){background-color: #f2f2f2}
					tr:nth-child(10){background-color: #f2f2f2}
					tr:nth-child(12){background-color: #f2f2f2}
					tr:nth-child(14){background-color: #f2f2f2}


					#grad1 {
						color: white;
						font-weight: 900;
						width: 30%;
						height: 50px;
						background: linear-gradient(to right, #a1d993, #81d498, #53d49e, #28c7a2);
						border-radius: 12px;
							/* Standard syntax (must be last) */
					}

	</style>

	<body class="w3-red">


		<div class="w3-display-container w3-margin" style="width: 100%">
			<span class="w3-display-topleft w3-badge w3-jumbo w3-blue w3-border w3-border-pale-red">&MediumSpace;&MediumSpace;&MediumSpace;&MediumSpace;&MediumSpace;&hairsp; </span>
				<h1 class="font1 w3-display-topmiddle">PoK&#x000E9;MoN</h1>
			<div class="w3-container w3-display-position" style="top:-15px;left:90px">
				<span class="w3-badge w3-small w3-pink w3-border w3-border-pale-red">&MediumSpace;</span>
				<span class="w3-badge w3-small w3-yellow w3-border w3-border-pale-red">&MediumSpace;</span>
				<span class="w3-badge w3-small w3-green w3-border w3-border-pale-red">&MediumSpace;</span>
			</div>
			<div class="w3-display-topright w3-padding" style="text-align:center;">
				<p><font size="3" color="white">
							<?php
							// Echo session variables that were set on previous page
							echo "Welcome " . $_SESSION["username"] . "!   " . "<br>";
							?>
				</font></p>
			</div>
		</div>

		<div class="w3-container" style="height: 6pc;"></div>

		<div class="w3-container w3-margin w3-round w3-grey" ng-app="pokeApp" ng-controller="pokeCtrl" >



			<table border="0" align="center" style="align-content: center; width:80%;" class="font2">
				<tr>

						<th colspan="8">
							<p># <?php echo "$outpID"; ?></p>
							<p><font size="50px"> <?php echo "$outpName"; ?></font></p>
						</th>
				</tr>
				<tr>
						<td colspan="8">
							<div align="center">
			<img style="background: blue;" ng-src="https://img.pokemondb.net/artwork/<?php echo strtolower("$outpsearchName"); ?>.jpg" alt="<?php echo "$outpName"; ?>" height="300px" width="300px" >

				<!--				<img src="downloads/sprites/<?php echo "$outpID"; ?>.png" alt="<?php echo "$outpName"; ?>" height="300px" width="300px"> -->
							</div>
						</td>
				</tr>
				<tr class="pokestatstable">
						<td colspan="8">
							<p>BASE STATS</p>
						</td>
				</tr>
				<tr class="pokestatstable">
						<td colspan="4">
							<p>Primary Type:</p>
						</td>
						<td colspan="4">
							<p>Secondary Type:</p>
						</td>
				</tr>

				<tr class="pokestatstable">
						<td>
							<p></p>
						</td>
						<td colspan="2">
							<p><?php echo "$outpType1"; ?></p>
						</td>
						<td>
							<p></p>
						</td>
						<td>
							<p></p>
						</td>
						<td colspan="2">
							<p><?php echo "$outpType2"; ?></p>
						</td>
						<td>
							<p></p>
						</td>
				</tr>
				<tr class="pokestatstable">
						<td colspan="8">
							<p>HP:</p>
						</td>
				</tr>
				<tr class="pokestatstable">
						<td colspan="8">
							<p><?php echo "$outpHP"; ?></p>
						</td>
				</tr>
				<tr class="pokestatstable">
						<td colspan="8">
							<p>Speed:</p>
						</td>
				</tr>
				<tr class="pokestatstable">
						<td colspan="8">
							<p><?php echo "$outpSpeed"; ?></p>
						</td>
				</tr>
				<tr class="pokestatstable">
						<td colspan="4">
							<p>Attack:</p>
						</td>
						<td colspan="4">
							<p>Defense:</p>
						</td>
				</tr>

				<tr class="pokestatstable">
						<td>
							<p></p>
						</td>
						<td colspan="2">
							<p><?php echo "$outpAttack"; ?></p>
						</td>
						<td>
							<p></p>
						</td>
						<td>
							<p></p>
						</td>
						<td colspan="2">
							<p><?php echo "$outpDefense"; ?></p>
						</td>
						<td>
							<p></p>
						</td>
				</tr>

				<tr class="pokestatstable">
						<td colspan="4">
							<p>Special Attack:</p>
						</td>
						<td colspan="4">
							<p>Special Defense:</p>
						</td>
				</tr>
				<tr class="pokestatstable">
						<td>
							<p></p>
						</td>
						<td colspan="2">
							<p><?php echo "$outpSattack"; ?></p>
						</td>
						<td>
							<p></p>
						</td>
						<td>
							<p></p>
						</td>
						<td colspan="2">
							<p><?php echo "$outpSdefense"; ?></p>
						</td>
						<td>
							<p></p>
						</td>
				</tr>
				<tr class="pokestatstable">
						<td colspan="8">
							<p>Total Base Stats:</p>
						</td>
				</tr>
				<tr class="pokestatstable">
						<td colspan="8">
							<p><?php echo "$outpTotal"; ?></p>
						</td>
				</tr>



  			</tr>
			</table>


<br><br>

			<div align= "center">
				<a style=" text-decoration: none;" href="pokeProfile.php?id=<?php echo "$outpEvolveID"; ?>">
						<button id="grad1" type="button">EVOLVE</button>
				</a>
			</div>


<br><br>
		</div>


		<script>
		    window.onload = function() {
		        var evo = (<?php echo "$outpEvolveID"; ?>)

		        if( evo != "") {
		            document.getElementById('grad1').style.display = 'block';
		        } else {
		            document.getElementById('grad1').style.display = 'none';
		        }
		    }

		</script>


	</body>



<br><br>


<footer>
	<div class="myb" style="width: 100%">


		<a class="myl" href="pokeProfile.php?id=<?php echo "$outpLast"; ?>">
		<img class="pokeBall" src="downloads/left-arrow.png" width="75px" />
		</a>



		<a class="myl" href="index.php">
		<img class="w3-circle w3-pale-green pokeBall" src="https://cdn.bulbagarden.net/upload/d/dc/GO_Pok%C3%A9_Ball.png" width="75px" />
		</a>



		<a class="myl" href="pokeProfile.php?id=<?php echo "$outpNext"; ?>">
		<img class="pokeBall" src="downloads/right-arrow.png" width="75px" />
		</a>


</div>
</footer>


</html>
