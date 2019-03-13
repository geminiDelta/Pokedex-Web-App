
<?php
include 'getPokemonDataMike1.php';
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


</style>

	<body class="w3-red">

		<!--<div class="w3-container w3-margin" style="width: 275px;">
			<div class="w3-display-container w3-panel">
				<span class="w3-display-topleft w3-badge w3-jumbo w3-blue">&MediumSpace;&MediumSpace;&MediumSpace;&MediumSpace;&MediumSpace;&hairsp; </span>
				<div class="w3-container w3-display-topmiddle">
					<span class="w3-badge w3-small w3-pink">&MediumSpace;</span>
					<span class="w3-badge w3-small w3-yellow">&MediumSpace;</span>
					<span class="w3-badge w3-small w3-green">&MediumSpace;</span>
				</div>
			</div>
		</div>-->
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
<br><br>
<div class="w3-container w3-margin w3-round w3-grey" ng-app="pokeApp" ng-controller="pokeCtrl" >


<!--  LEFT SIDE  -->

        <div class="leftTest">
          <div style="width: 100%;">
            <div align= "center">


          			<table align="center" style="align-content: center; width:95%;" class="font2">
          				<tr >
                      <th colspan="4">
												<p>#<?php echo "$outpID"; ?></p>
												<p style="font-size: 50px;"><?php echo "$outpName"; ?></p>
              				</th>

                      </th>
                      <th colspan="4">
												<p>#<?php echo "$outpID2"; ?></p>
          							<p style="font-size: 50px;"><?php echo "$outpName2"; ?></p>
          						</th>
          				</tr>
          				<tr>
          						<td colspan="4">
          							<div align="center">
          			             <img style="background: blue;" ng-src="https://img.pokemondb.net/artwork/<?php echo strtolower("$outpName"); ?>.jpg" alt="<?php echo "$outpName"; ?>" height="300px" width="300px" >
          							</div>
          						</td>
                      <td colspan="4">
          							<div align="center">
          			             <img style="background: blue;" ng-src="https://img.pokemondb.net/artwork/<?php echo strtolower("$outpName2"); ?>.jpg" alt="<?php echo "$outpName"; ?>" height="300px" width="300px" >
          							</div>
          						</td>
          				</tr>
          				<tr class="pokestatstable">
          						<td colspan="4">
          							<p>BASE STATS</p>
          						</td>
                      <td colspan="4">
                        <p>BASE STATS</p>
                      </td>
          				</tr>
          				<tr class="pokestatstable">
          						<td colspan="2">
          							<p>Primary Type:</p>
          						</td>
          						<td colspan="2">
          							<p>Secondary Type:</p>
          						</td>
                      <td colspan="2">
          							<p>Primary Type:</p>
          						</td>
          						<td colspan="2">
          							<p>Secondary Type:</p>
          						</td>
          				</tr>

          				<tr class="pokestatstable">

          						<td colspan="2">
          							<p><?php echo "$outpType1"; ?></p>
          						</td>
          						<td colspan="2">
          							<p><?php echo "$outpType2"; ?></p>
          						</td>
                      <td colspan="2">
          							<p><?php echo "$outpType12"; ?></p>
          						</td>
          						<td colspan="2">
          							<p><?php echo "$outpType22"; ?></p>
          						</td>
          				</tr>
          				<tr class="pokestatstable">
          						<td colspan="4">
          							<p>HP: </p>
          						</td>
                      <td colspan="4">
          							<p>HP: </p>
          						</td>
          				</tr>
                  <tr class="pokestatstable">
          						<td colspan="4">
          							<p><?php echo "$outpHP"; ?></p>
          						</td>
                      <td colspan="4">
          							<p><?php echo "$outpHP2"; ?></p>
          						</td>
          				</tr>
          				<tr class="pokestatstable">
          						<td colspan="4">
          							<p>Speed: </p>
          						</td>
                      <td colspan="4">
          							<p>Speed: </p>
          						</td>
          				</tr>
                  <tr class="pokestatstable">
          						<td colspan="4">
          							<p><?php echo "$outpSpeed"; ?></p>
          						</td>
                      <td colspan="4">
          							<p><?php echo "$outpSpeed2"; ?></p>
          						</td>
          				</tr>
          				<tr class="pokestatstable">
          						<td colspan="2">
          							<p>Attack:</p>
          						</td>
          						<td colspan="2">
          							<p>Defense:</p>
          						</td>
                      <td colspan="2">
          							<p>Attack:</p>
          						</td>
          						<td colspan="2">
          							<p>Defense:</p>
          						</td>
          				</tr>
          				<tr class="pokestatstable">
          						<td colspan="2">
          							<p><?php echo "$outpAttack"; ?></p>
          						</td>
          						<td colspan="2">
          							<p><?php echo "$outpDefense"; ?></p>
          						</td>
                      <td colspan="2">
          							<p><?php echo "$outpAttack2"; ?></p>
          						</td>
          						<td colspan="2">
          							<p><?php echo "$outpDefense2"; ?></p>
          						</td>
          				</tr>
          				<tr class="pokestatstable">
          						<td colspan="2">
          							<p>Special Attack:</p>
          						</td>
          						<td colspan="2">
          							<p>Special Defense:</p>
          						</td>
                      <td colspan="2">
                        <p>Special Attack:</p>
                      </td>
                      <td colspan="2">
                        <p>Special Defense:</p>
                      </td>
          				</tr>
          				<tr class="pokestatstable">
          						<td colspan="2">
          							<p><?php echo "$outpSattack"; ?></p>
          						</td>
          						<td colspan="2">
          							<p><?php echo "$outpSdefense"; ?></p>
          						</td>
                      <td colspan="2">
          							<p><?php echo "$outpSattack2"; ?></p>
          						</td>
          						<td colspan="2">
          							<p><?php echo "$outpSdefense2"; ?></p>
          						</td>
          				</tr>
          				<tr class="pokestatstable">
          						<td colspan="4">
          							<p>Total Base Stats: </p>
          						</td>
                      <td colspan="4">
          							<p>Total Base Stats: </p>
          						</td>
          				</tr>
                  <tr class="pokestatstable">
          						<td colspan="4">
          							<p><?php echo "$outpTotal"; ?></p>
          						</td>
                      <td colspan="4">
          							<p><?php echo "$outpTotal2"; ?></p>
          						</td>
          				</tr>


          			</table>

                <br>


		         </div>
        </div>
</div>


<br><br>

</div>



	</body>

<br>

	<footer>
		<div class="myb" style="width: 100%">


			<a class="myl" href="pokeCompare.php?pokemon1=<?php echo "$outpLast"; ?>&pokemon2=<?php echo "$outpLast2"; ?>">
			<img class="pokeBall" src="downloads/left-arrow.png" width="75px" />
			</a>



			<a class="myl" href="index.php">
			<img class="w3-circle w3-pale-green pokeBall" src="https://cdn.bulbagarden.net/upload/d/dc/GO_Pok%C3%A9_Ball.png" width="75px" />
			</a>



			<a class="myl" href="pokeCompare.php?pokemon1=<?php echo "$outpNext"; ?>&pokemon2=<?php echo "$outpNext2"; ?>">
			<img class="pokeBall" src="downloads/right-arrow.png" width="75px" />
			</a>


	</div>
	</footer>

</html>
