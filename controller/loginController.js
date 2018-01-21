var app = angular.module('mainApp',['ngRoute','ngCookies']);

app.config(function($routeProvider){
	$routeProvider
	.when('/',{
		templateUrl:'partials/login.html'
	})
});

app.controller('loginCtrl',function($scope,$window,$location,$cookies,$http){
	$scope.submitLogin = function(email){
		$http({
			method: "GET",
			url:"items/login.php?userName=" + email
		}).then(function (response){
			if(response.data.message.toLowerCase()=="found"){
				$cookies.put('email',email);
				window.location.replace("partials/landingPage.html");
			}
			else{
				$scope.errorMessageLogin = true;
			}
		},function (response){
			console.log(response.data);
		});
	}
});