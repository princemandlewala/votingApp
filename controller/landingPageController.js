var app = angular.module('landingApp',['ngCookies']);

app.controller('landingPageCtrl',function($scope,$cookies,$http,$window,$location){
	$scope.loginName = $cookies.get('email');
	$scope.items = [];
	$scope.boolean = [];
	$scope.readProducts = function(){
		$http({
			method: "GET",
			url:"../items/read.php?userName="+$scope.loginName
		}).then(function (response){
			$scope.items = response.data;
		},function (response){
		});
	}

	$scope.logout = function(){
		$cookies.remove('email');
		window.location.replace("../index.html");
	}

	$scope.insertLog = function(itemId,loginName){
		$http({
			method: "POST",
			url: "../items/insertLog.php?itemId="+itemId+"&loginName="+loginName
		}).then(function(response){
		},function(response){
		});
	}

	$scope.incrementVotes = function(itemId,noOfVotes){
		var increasedVotes = String(parseInt(noOfVotes)+1);
		var updateData = {itemId:itemId,noOfVotes:increasedVotes};
		$http({
			method: "POST",
			url:"../items/update.php",
			data: updateData
		}).then(function (response){
			$scope.insertLog(itemId,$scope.loginName);
			$scope.readProducts();
		},function (response){
			console.log(response.data);
		});
	}
});