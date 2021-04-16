
var app = angular.module('myApp', ['ngRoute']);

app.config(function ($routeProvider) {
    $routeProvider
        .when('/', {
            templateUrl: 'signin.html',
            controller: 'SignInController'})
        .when('/signup', {
            templateUrl: 'signup.html',
            controller: 'SignUpController'})
        .when('/home', {
            templateUrl: 'index.php',
            controller: 'ServiceController'})
        .when('/home/serviceA', {
            templateUrl: 'serviceA.php',
            controller: 'ServiceController'})
        .when('/home/serviceB', {
            templateUrl: 'serviceB.php',
            controller: 'ServiceController'})
        .when('/home/serviceC', {
            templateUrl: 'serviceC.php',
            controller: 'ServiceController'})
        .when('/home/serviceC_A', {
            templateUrl: 'serviceC_A.php',
            controller: 'ServiceController'})
        .when('/home/serviceC_B', {
            templateUrl: 'serviceC_B.php',
            controller: 'ServiceController'})
        .when('/home/serviceD', {
            templateUrl: 'serviceD.php',
            controller: 'ServiceController'})
        .when('/aboutus', {
            templateUrl: 'about.html',
            controller: 'AboutusController'})
        .when('/contactus', {
            templateUrl: 'contact.html',
            controller: 'ContactusController'})
        .when('/reviews', {
            templateUrl: 'reviews.php',
            controller: 'ReviewsController'})
        .when('/shoppingcart', {
            templateUrl: 'cart.php',
            controller: 'ShoppingCartController'})
        .otherwise({ redirectTo: '/' });
});

app.controller('SignInController', function($scope, $http, $location) {
    $scope.modes = ["User", "Admin"];

    $scope.changeRoute = function(newRoute){
        $location.path(newRoute);
     }

    $scope.checkLogin = function(){
    $http.post("signin.php",{'username':$scope.username, 'password':$scope.password, 'mode':$scope.selectedMode})
		.then(function(){
            $location.path('/home');
		})
    }
});
app.controller('SignUpController', function($scope, $http, $location) {
    $scope.insertUser = function(){
		$http.post("signup.php",{'username':$scope.username, 'password':$scope.password, 'fname':$scope.fname, 'lname':$scope.lname, 'number':$scope.number, 'address':$scope.address, 'email':$scope.email})
		.then(function(){
            $location.path('/');
		})
	}
});
app.controller('HomeController');
app.controller('ServiceController', function($scope){
  $scope.message = "it works!";
});
app.controller('AboutusController');
app.controller('ContactusController');
app.controller('ReviewsController');
app.controller('ShoppingCartController');
