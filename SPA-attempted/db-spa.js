
var app = angular.module('myApp', ['ngRoute']);

app.config(function ($routeProvider) {
    $routeProvider
        .when('/', {
            templateUrl: 'DB/view.php',
            controller: 'ViewController'})
        .when('/insert', {
            templateUrl: 'DB/insert.php',
            controller: 'InsertController'})
        .when('/insert/cars', {
            templateUrl: 'DB/insert_cars.php',
            controller: 'InsertController'})
        .when('/delete', {
            templateUrl: 'DB/delete.php',
            controller: 'DeleteController'})
        .when('/update', {
            templateUrl: 'DB/update.php',
            controller: 'UpdateController'})
        .when('/logout', {
            templateUrl: 'signin.html',
            controller: 'SignInController'})
        .otherwise({ redirectTo: '/' });
          });

app.controller('ViewController', function($scope){});
app.controller('InsertController', function($scope, $http){

});
