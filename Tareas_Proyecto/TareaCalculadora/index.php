<?php
$nombre = "Proyecto 1";

// Lista de archivos de JavaScript a cargar
$scripts = ["js/angular.min.js", "js/app.js"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tarea Calculadora</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div>
    <div class="col-md-4 col-md-offset-4">
        <div class="page-header text-center">
            <h1>Tarea Calculadora</h1>
        </div>

        
            
            <div class="panel-body" ng-app="proyectoUno" ng-controller="ProyectoUnoController">

                <!-- miCalcu -->
                  
                  <div id="calculadora">
    <!-- Screen and clear key -->
    <div class="top">
        <span class="borrar" ng-click="borrar()">C</span>
        <div class="pantalla">{{ sigoPantalla }} {{ numPantalla }} {{resultado}}</div>
    </div>
    
    <div class="btn-calcu">
        <!-- operators and other keys -->
        <span ng-click="enviarNumero(7)">7</span>
        <span ng-click="enviarNumero(8)">8</span>
        <span ng-click="enviarNumero(9)">9</span>
        <span class="operator" ng-click="enviarOperacion('suma')">+</span>
        <span ng-click="enviarNumero(4)">4</span>
        <span ng-click="enviarNumero(5)">5</span>
        <span ng-click="enviarNumero(6)">6</span>
        <span class="operator" ng-click="enviarOperacion('resta')">-</span>
        <span ng-click="enviarNumero(1)">1</span>
        <span ng-click="enviarNumero(2)">2</span>
        <span ng-click="enviarNumero(3)">3</span>
        <span class="operator" ng-click="enviarOperacion('divide')">÷</span>
        <span ng-click="enviarNumero(0)">0</span>
        <span>.</span>
        <span class="igual" ng-click="calcular()">=</span>
        <span class="operator" ng-click="enviarOperacion('multiplica')">x</span>
    </div>
</div>

                <!-- miCalcu -->

        </div>

</div>
<?php foreach ($scripts as $script) { ?>
    <script src="<?php echo($script); ?>"></script>
<?php } ?>
</body>
</html>