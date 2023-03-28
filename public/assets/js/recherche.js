// var app = angular.module('myApp', []);
// app.controller('myController', function($scope, $http) {
//   $scope.search = '';
//   $scope.showResults = false;
//   $scope.results = [];
//   $scope.getResults = function() {
//     if ($scope.search.length >= 2) {
//       $http.get('/search?q=' + $scope.search)
//         .then(function(response) {
//           $scope.results = response.data;
//           $scope.showResults = true;
//         });
//     } else {
//       $scope.showResults = false;
//     }
//   };
// });