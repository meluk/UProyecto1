angular.module('practicaPHP01.controllers')
    /**
     * Inicia la sesión del usuario en el sistema.
     */
    .controller('LogoutController', ['$scope', '$location', 'UserService',
        function ($scope, $location, UserService) {
            $scope.init = function() {
                console.debug('Logout');


            };

            $scope.init();
        }]
    );
