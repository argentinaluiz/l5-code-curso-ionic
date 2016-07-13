angular.module('starter.controllers')
.controller('ClientViewProductCtrl',
	['$scope', '$state', 'Product', '$ionicLoading', '$localStorage', '$cart',
    function($scope, $state, Product, $ionicLoading, $localStorage, $cart){
        $scope.products = [];
        $ionicLoading.show({
        	template: 'Caregando...'
        });

        Product.query({},function(data){
        	$scope.products = data.data;
        	$ionicLoading.hide();
        },function(dataError){
        	$ionicLoading.hide();
        });

        $scope.addItem = function(item){
        	item.qtd = 1;
        	$cart.addItem(item);
        	$state.go('client.checkout');
        }
}]);