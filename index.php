<?php 

session_start();

if($_SESSION['userid'] == '') {
	$_SESSION['userid'] = 0;
}

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


<link rel="icon" href="downloads/pokedex.png" type="icon">

        <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.6.9/angular.min.js"></script>
		<script>
			// ANGULAR MODULE
			var pokeApp = angular.module("pokeApp", []);
			pokeApp.controller('pokeCtrl', function($scope, $http, $window) {

				$scope.sortby = "'pokemonID'";
				$scope.currentUser = '<?php echo $_SESSION['userid']; ?>';

				// get table data from server script
				$http.get("getPokemonData.php").then(function(response) {
					$scope.names = response.data.records;
					console.log($scope.names);
				});

					// get table data from server script
				$http.get("getUserNameData.php").then(function(response) {
					$scope.users = response.data.records;
					console.log($scope.users);
				});

				$scope.getUserData = function() {
					if($scope.currentUser != 0 && $scope.currentUser != "new") {
						// get table data from server script
						$http.get("getUserData.php?userid=" + $scope.currentUser).then(function(response) {
							$scope.user = response.data;
							console.log($scope.user);
						});
					}
				}
				
				$http.get("getUserData.php?userid=" + $scope.currentUser).then(function(response) {
					$scope.user = response.data;
					console.log($scope.user);
				});

				$scope.deletePartyMember = function(pokeid) {
					console.log(pokeid); // debug: parameter
					var scriptPath = "deletePartyMember.php?userid=" + $scope.currentUser + "&pokeid=" + pokeid;
					$scope.user.party[$scope.user.party.indexOf(pokeid)] = "";
					$http.get(scriptPath).then($scope.getUserData);
				}

				$scope.addPartyMember = function(pokeid) {
					console.log(pokeid); // debug: parameter
					var scriptPath = "addPartyMember.php?userid=" + $scope.currentUser + "&pokeid=" + pokeid;
					$scope.user.party.push(pokeid);
					$http.get(scriptPath).then($scope.getUserData);
				}


				var arrayOfSelectedPokemon = [];
				$scope.boxSelected = function(pokemonID){

							console.log("Pokemon Selected: " + pokemonID);
							if(arrayOfSelectedPokemon.includes(pokemonID)) // the user has deselected the pokemon
							{
								var index = arrayOfSelectedPokemon.indexOf(pokemonID); // index of ID to remove
								console.log("index: " + index);

								// remove the pokemon id from array
								arrayOfSelectedPokemon.splice(index, 1);
							}
							else
								arrayOfSelectedPokemon.push(pokemonID);

							if(arrayOfSelectedPokemon.length == 2)
							{
								var poke1 = arrayOfSelectedPokemon[0];
								var poke2 = arrayOfSelectedPokemon[1];

								console.log("Comparing: " + arrayOfSelectedPokemon[0] + " With: " + arrayOfSelectedPokemon[1]);
								$window.location.assign('http://139.62.210.151/~group5/cop4813/pokeCompare.php?' + 'pokemon1=' + poke1 + '&pokemon2=' + poke2);
							}

				  };

				}); // end Controller

			// DOCUMENT READY
			$(function() {
				console.log("Document ready!");







			});

		</script>
        

	</head>

	<body class="w3-red" ng-app="pokeApp" ng-controller="pokeCtrl">

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
			<span class="w3-display-topleft w3-badge w3-jumbo w3-blue w3-border w3-border-pale-red"> &MediumSpace;&MediumSpace;&MediumSpace;&MediumSpace;&MediumSpace;&hairsp; </span>
			<h1 class="font1 w3-display-topmiddle">PoK&#x000E9;MoN</h1>
			<div class="w3-container w3-display-position" style="top:5px;left:90px">
				<span class="w3-badge w3-small w3-pink w3-border w3-border-pale-red">&MediumSpace;</span>
				<span class="w3-badge w3-small w3-yellow w3-border w3-border-pale-red">&MediumSpace;</span>
				<span class="w3-badge w3-small w3-green w3-border w3-border-pale-red">&MediumSpace;</span>
			</div>
			<div class="w3-display-topright w3-margin-right w3-padding w3-round w3-pale-red" style="top: -17px">
				<select name="userSelect" class="w3-select" ng-model="currentUser" ng-change="getUserData()">
					<option value="0">Are you a Trainer?</option>
					<option value="new">*New Trainer</option>
					<option ng-repeat="u in users | orderBy: 'username'" value="{{ u.userID }}">{{ u.username }}</option>
				</select>
				<br />
				<form action="createUser.php" method="post">
					<input name = "newuser" class="w3-input w3-margin-top" type="text" placeholder="Name of New Trainer..." ng-show="currentUser == 'new'" ng-model="newUser" />
					<input type="submit" class="w3-button w3-pale-blue" ng-show="currentUser == 'new'" value="Register!" />
				</form>

			</div>
		</div>

		<div class="w3-container" style="height: 6pc;"></div>

		<div class="w3-container w3-margin w3-round w3-grey" >


			<!--Filter Bar-->
			<div class="w3-row w3-margin-top">
				<div class="w3-container w3-col" style="width: 40px;" >
					<i class="material-icons w3-xxlarge">filter_list</i>
				</div>
				<!-- Sort By -->
				<div class="w3-quarter w3-container">
					<select  ng-model="sortby" class="w3-select">
						<option value="'pokemonID'" disabled>Sort by...</option>
						<option value="'pokemonID'">Number</option>
						<option value="'type1'">Type</option>
					</select>
				</div>

				<!--Compare-->
				<div class="w3-container w3-col" style="width: 150px;" ng-init="compareBox = false">
					<button class="w3-button w3-round w3-blue" ng-click="compareBox=true;" >Compare</button>
				</div>

				<!--Search-->
				<div class="w3-container w3-col" style="width: 40px;" >
					<i class="material-icons w3-xxlarge">search</i>
				</div>
				<div class="w3-rest w3-container">
					<input class="w3-input w3-animate-input" ng-model="search" style="width: 30%;min-width: 250px" type="text" placeholder="Search..." />
				</div>
			</div>

			<hr />

			<!--Auto generated Cards-->
			<div  class="w3-container w3-margin-top w3-center">



				<div  ng-repeat="x in names | filter: {name: search} | orderBy : sortby" class="pokeCard w3-left w3-card-2 w3-margin w3-white w3-hover-shadow">
					<div class="w3-container w3-center w3-blue-grey">
						<h3><a ng-href="http://139.62.210.151/~group5/cop4813/pokeProfile.php?id={{x.pokemonID}}" style="text-decoration: none;">{{x.name}}</a></h3>
					</div>
					<div class="w3-display-container w3-bottombar w3-leftbar w3-rightbar w3-border-blue-grey" style="height: 270px">
						<a ng-href="http://139.62.210.151/~group5/cop4813/pokeProfile.php?id={{x.pokemonID}}" style="text-decoration: none;">
							<img class="w3-display-middle" ng-src= "https://img.pokemondb.net/artwork/{{x.searchName | lowercase}}.jpg" alt="{{x.name}}" style="width: 95%; height: 95%; object-fit: contain;">
						</a>
						<h4 class="w3-display-bottommiddle w3-badge w3-blue-grey">#{{ ('000000000' + x.pokemonID).substr(-3) }}</h4>

						<a ng-click="deletePartyMember(x.pokemonID)">
							<img class="w3-display-bottomright w3-circle w3-pale-red pokeBall" src="https://cdn.bulbagarden.net/upload/d/dc/GO_Pok%C3%A9_Ball.png" width="75px" ng-show="currentUser != '0' && currentUser != 'new' && user.party.includes({{ x.pokemonID }})" />
						</a>
						<a ng-click="addPartyMember(x.pokemonID)">
							<img class="w3-display-bottomright w3-circle w3-pale-red" style="opacity: 0.5;" src="https://cdn.bulbagarden.net/upload/d/dc/GO_Pok%C3%A9_Ball.png" width="75px" ng-show="currentUser != '0' && currentUser != 'new' && !user.party.includes({{ x.pokemonID }})" />
						</a>

						<input class = "w3-display-bottomleft w3-check" ng-name ="compareBox[]" type="checkbox" ng-model="allCompareBoxes" ng-show ="compareBox" ng-change="boxSelected(x.pokemonID)" value={{x.pokemonID}}>
					</div>
				</div>


			</div>







		</div>

	</body>
</html>
