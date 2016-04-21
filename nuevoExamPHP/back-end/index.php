<?php

/**
 * index.php
 * router to the back-end.
 */

require "bootstrap.php";

use Slim\Http\Request;
use Slim\Http\Response;

// Show all errors
$configuration = [
    'settings' => [
        'displayErrorDetails' => true,
    ],
];

$contenedor = new \Slim\Container($configuration);

// Errors
// http://www.slimframework.com/docs/handlers/error.html
$app = new \Slim\App($contenedor);

//create
$app->post(
    '/game/create',
    function ($request, $response) {

        $gameController = new App\Controllers\gameController();

        // Save result on the variable
        $result = $gameController->createGame($request);

        // Return a JSON with results from the front-end
        return $response->withJson($result);
    }
);


// Game List
$app->get(
    '/game/list',
    function ($request, $response) {
        // Request for the controller
        $gameController = new App\Controllers\gameController();

        // Save result on the variable
        $result = $gameController->getDetails($request);

        // Return a JSON with results from the front-end
        return $response->withJson($result);
    }
);

// Delete Game
$app->get(
    '/game/delete/{id}',
    function ($request, $response) {
        // Request for the controller
        $gameController = new App\Controllers\gameController();

        // Save result on the variable
        $result = $gameController->deleteGame($request);

        // Return a JSON with results from the front-end
        return $response->withJson($result);
    }
);

// Edit Game
$app->post(
    "/game/edit/{id}",
    function ($request, $response) {
        // Request for the controller
        $gameController = new App\Controllers\gameController();

        // Save result on the variable
        $result = $gameController->editGame($request);

        // Return a JSON with results from the front-end
        return $response->withJson($result);
    }
);

// Game by ID
$app->post(
    '/game/gameId',
    function ($request, $response) {
        /** @var Request $request */
        /** @var Response $response */

        // Pedimos una instancia del controlador del usuario
        $gameController = new App\Controllers\gameController();

        // Almacenamos el resultado de la operación en la siguiente variable
        $result = $gameController->getByID($request);

        // Retornamos un JSON con el resultado al Front-End
        return $response->withJson($result);
    }
);


// Run app.
$app->run();
