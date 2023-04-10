var app = angular.module("myApp", []);

app.config(function($interpolateProvider) {
  $interpolateProvider.startSymbol("[[");
  $interpolateProvider.endSymbol("]]");
});

app.controller("myController", function($scope, $http, $q) {
  $scope.search = "";
  $scope.showResults = false;
  $scope.results = [];

  $scope.getResults = function() {
    if ($scope.search.length >= 2) {
      var api1 = $http.get("http://creativehub.enzotang.fr/api/projet?q=" + $scope.search);
      var api2 = $http.get("http://creativehub.enzotang.fr/api/domaine?q=" + $scope.search);

      $q.all([api1, api2]).then(function(responses) {
        var results = [];
        for (var i = 0; i < responses.length; i++) {
          results = results.concat(responses[i].data.slice(0, 3));
        }
        $scope.results = results;
        $scope.showResults = true;
      });
    } else {
      $scope.showResults = false;
    }
  }
});
