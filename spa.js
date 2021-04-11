
var app = angular.module('myApp', ['ngRoute']);

app.config(function ($routeProvider) {
    $routeProvider
        .when('/', {
            templateUrl: 'signin.php',
            controller: 'SignInController'})
        .when('/signup', {
            templateUrl: 'signup.php',
            controller: 'SignUpController'})
        .when('/home', {
            templateUrl: 'index.php',
            controller: 'HomeController'})
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

app.controller('SignInController');
app.controller('SignUpController');
app.controller('HomeController');
app.controller('AboutusController');
app.controller('ContactusController');
app.controller('ReviewsController');
app.controller('ShoppingCartController');
