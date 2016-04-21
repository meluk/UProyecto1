<?php

/**
 * gameController.php
 */

namespace App\Controllers;

use App\Services\gameService;
use Slim\Http\Request;

class gameController {

    private $gameService;
    private $nombreCookie = "loggedIn";

    /**
     * gameControllert constructor.
     */
    public function __construct() {
        $this->gameService = new gameService();
    }

    /**
     *
     * @param Request $request
     *
     * @return []
     */
    public function createGame($request) {
        $result = [];

        /**
         *The content of `POST`
         *I get calling `getParsedBody`.
         */

        $formData = $request->getParsedBody();
        $title = null;
        $developer = null;
        $description = null;
        $console = null;
        $releaseDate = null;
        $rate = null;
        $url = null;

        // Verified that excites title
        if (array_key_exists("title", $formData)) {
            $title = $formData["title"];
        }

         // Verified that excites developer
        if (array_key_exists("developer", $formData)) {
            $developer = $formData["developer"];
        }

         // Verified that excites description
        if (array_key_exists("description", $formData)) {
            $description = $formData["description"];
        }

        // Verified that excites console
        if (array_key_exists("console", $formData)) {
            $console = $formData["console"];
        }

        // Verified that excites releaseDate
        if (array_key_exists("releaseDate", $formData)) {
            $releaseDate = $formData["releaseDate"];
        }

        // Verified that excites rate
        if (array_key_exists("rate", $formData)) {
            $rate = $formData["rate"];
        }

        // Verified that excites url
        if (array_key_exists("url", $formData)) {
            $url = $formData["url"];
        }


        return $this->gameService->createGame($title, $developer, $description, $console, $releaseDate, $rate, $url);
    }

    /**
     * get the whole list
     *
     * @param Request $request
     *
     * @return string []
     */
     public function getDetails() {
            
        $result = [];
        $result = $this->gameService->getDetails();

        return $result;
    }


        public function getByID($request) {
        $result = [];

        /**
         *The content of `POST`
         *I get calling with `getParsedBody`.
         */
        $formData = $request->getParsedBody();
        $id = null;
   

        // Verified that excites id
        if (array_key_exists("id", $formData)) {
            $id = $formData["id"];
        }
        $getByIDResult = $this->gameService->getByID($id);

        if (array_key_exists("error", $getByIDResult)) {
            $result["error"] = true;
            $result["message"] = $getByIDResult["message"];
        } else {

            $result["game"] = $getByIDResult["game"];
            $result["message"] = $getByIDResult["message"];
        }

        return $result;
    }


    /*
     * @param $request
     * @return array
     */
    public function deleteGame($request) {
        /** @var Request $request */
        $id = $request->getAttribute("id", null);
        return $this->gameService->deleteGame($id);
    }

     /*
     * @param $request
     * @return array
     */
     public function editGame($request) {
        $result = [];
        $id = $request->getAttribute("id", null);
        /**
         *The content of `POST`
         *I get calling `getParsedBody`.
         */
        $formData = $request->getParsedBody();
        $title = null;
        $developer = null;
        $description = null;
        $console = null;
        $releaseDate = null;
        $rate = null;
        $url = null;

        // Verified that excites title
        if (array_key_exists("title", $formData)) {
            $title = $formData["title"];
        }

         // Verified that excites developer
        if (array_key_exists("developer", $formData)) {
            $developer = $formData["developer"];
        }

         // Verified that excites description
        if (array_key_exists("description", $formData)) {
            $description = $formData["description"];
        }

        // Verified that excites console
        if (array_key_exists("console", $formData)) {
            $console = $formData["console"];
        }

        // Verified that excites releaseDate
        if (array_key_exists("releaseDate", $formData)) {
            $releaseDate = $formData["releaseDate"];
        }

        // Verified that excites rate
        if (array_key_exists("rate", $formData)) {
            $rate = $formData["rate"];
        }

        // Verified that excites url
        if (array_key_exists("url", $formData)) {
            $url = $formData["url"];
        }


        return $this->gameService->editGame($id, $title, $developer, $description, $console, $releaseDate, $rate, $url);
    }
}
