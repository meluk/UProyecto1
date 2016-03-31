angular.module('practicaPHP01.controllers')
    /**
     * Le permite a un usuario crear una nueva contraseña en el sistema.
     */
    .controller('RegisterController', ['$scope', 'UserService',
        function ($scope, UserService) {

            $scope.register = function() {

                console.debug("trying registration");
                if(  $scope.fullName != null &&  $scope.fullName != undefined && scope.email != null && scope.email != undefined){
                    console.log("si estan seteados");
                }else{
                    console.log("no estan seteads");
                };
            };


            $scope.init = function() {
                console.debug('Register');

            };

            $scope.init();
        }]);
