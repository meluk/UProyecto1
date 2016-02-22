angular.module('proyectoUno', [])
    
    .service('CalculadoraService', ['$http',
        function($http) {
         
           //El método operar toma lo dos numeros y la operación 
           
            var operar = function operar(primerValor, segundoValor, operacionValor) {
                var url = 'controlador.php'; 
                url += '?primerValor=' + primerValor;
                url += '&segundoValor=' + segundoValor;
                url += '&operacion='+ operacionValor;

                return $http({url: url});
            };

            return {
                operar: operar
            };

        }])
   
    .controller('ProyectoUnoController',
        ['$scope', 'CalculadoraService',
            function ($scope, CalculadoraService) {
                $scope.init = function() {
                    $scope.resultado = null;
                    $scope.numPantalla = '0';
                    $scope.nuevoNumero = true;
                    $scope.simbPantalla= '';
                    $scope.otroValor = null;
                    $scope.laOperacion = null;
                    $scope.sigoPantalla = null;

                };

                $scope.enviarNumero = function(numero){
                   if($scope.numPantalla == '0' || $scope.nuevoNumero){
                     $scope.sigoPantalla = null;
                     $scope.numPantalla = numero;
                     $scope.nuevoNumero = false;
                   }else{
                     $scope.numPantalla += String(numero); 
                   }
                   
                };

                //función enviarOperacion envia la operacion y pasa el viejo valor a otra variable(otroValor)
                $scope.enviarOperacion = function(signo){
                    switch(signo)
                   {
 
                   case "suma":
                     $scope.sigoPantalla = '+';
                   break;
                   case "resta":
                     $scope.sigoPantalla = '-';
                   break;
                   case "multiplica":
                     $scope.sigoPantalla = 'x';
                   break;
                   case "divide":
                     $scope.sigoPantalla = '/';
                   break;
          
                   }

                    $scope.nuevoNumero =  true;
                    $scope.otroValor = aNumero($scope.numPantalla);
                    $scope.laOperacion = signo;
                };

                $scope.borrar = function(){
                   $scope.init(); 
                };


                aNumero = function(numeroString){
                    var resultado = 0;
                    if (numeroString) {
                        resultado = numeroString*1;
                    };
                    return resultado;
                };

                //función calcular, se activa al dar clik en el boton de igual

                $scope.calcular = function () {
                        CalculadoraService
                            .operar($scope.otroValor, $scope.numPantalla, $scope.laOperacion)
                            .then(function(response) {
                                if (response.data) {
                                    $scope.resultado = response.data;
                                }
                            }, function(response) {
                                $scope.resultado = response; 
                            });
                            $scope.numPantalla = $scope.resultado;
                };
               
                $scope.init();
            }])
;
