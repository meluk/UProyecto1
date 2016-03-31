angular.module('practicaPHP01.controllers')
    /**
     * Inicia la sesión del usuario en el sistema.
     */
    .controller('LoginController', ['$scope', 'UserService', '$location',
        function ($scope, UserService, $location) {
            $scope.init = function() {
                console.debug('Login');

              
            };

            $scope.userEmail;
            $scope.userPassword;

            $scope.login= function () {
                var result = UserService.isLoggedIn;
                if(result.success==true){
                   $location.path('/home');
                }else{
                    UserService.login($scope.userEmail, $scope.userPassword);
                   
                }


            };

            $scope.init();
        }]);
