(function () {
    $app = angular.module('app',[], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
    });
    $app.controller('maincontroller',function ($scope, $http) {
        $scope.title = "Details about your services";
        $scope.f = "";
        $http.get("http://dev.villa.fr/faq/").then(
                function (response) {
                   $scope.f = response['data']['results'];
                   console.log($scope.f);
                },
                function (err) {
                    console.log(err);
                }
            );
    });
})();