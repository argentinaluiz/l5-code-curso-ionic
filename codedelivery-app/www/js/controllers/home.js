angular.module('starter.controllers')
.controller('HomeCtrl',['$scope', '$state', 'Logged',
    function($scope, $state, Logged){
        Logged.query({},function(data){
        	console.log(data.data);
        	$scope.name = data.data.name;
        	$scope.email = data.data.email;
        });
}]);