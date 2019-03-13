// ANGULAR MODULE
var pokeApp = angular.module("pokeApp", []);
pokeApp.controller('pokeCtrl', function($scope, $http, $window) {
	
	$scope.sortby = "'pokemonID'";
	// $scope.currentUser = $scope.sessionUser;
	
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
		if($scope.currentUser != "" && $scope.currentUser != "new") {
			// get table data from server script
			$http.get("getUserData.php?userid=" + $scope.currentUser).then(function(response) {
				$scope.user = response.data;
				console.log($scope.user);
			});
		}
	}
	
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
