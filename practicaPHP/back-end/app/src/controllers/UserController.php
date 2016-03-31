<?php



namespace App\Controllers;

use App\Services\UserService;
use Slim\Http\Request;

class UserController {

    private $userService;
    private $nombreCookie = "loggedIn";

    /**
     * UserController constructor.
     */
    public function __construct() {
        $this->userService = new UserService();
    }

    /**
     * Intermediario entre el Front-End y el servicio.
     *
     * @param Request $request
     *
     * @return []
     */
    public function login($request) {
        $result = [];

        $formData = $request->getParsedBody();
        $email = null;
        $password = null;

        // Verificamos que efectivamente exista una entrada de email
        if (array_key_exists("email", $formData)) {
            $email = $formData["email"];
        }

        // Verificamos que efectivamente exista una entrada de password
        if (array_key_exists("password", $formData)) {
            $password = $formData["password"];
        }

       
        if (isset($email, $password)) {
            $loginResult = $this->userService->login($email, $password);

            if (array_key_exists("error", $loginResult)) {
                $result["error"] = true;
            } else {
                setcookie($this->nombreCookie, true, time()+3600);
            }

            $result["message"] = $loginResult["message"];
        } else {
            $result["error"] = true;
            $result["message"] = "Email and password can not be empty.";
        }

                return $result;
    }

    /**
     * Cierra la sesión del usuario del lado del back-end.
     *
     * @param Request $request
     *
     * @return string []
     */
    public function logout($request) {
        $result = [];

       

        return $result;
    }

    /**
     * Registra un nuevo usuario en el sistema.
     *
     * @param Request $request
     *
     * @return string []
     */
    public function register($request) {
        $result = [];

       

        return $result;
    }

}
