<?php
namespace App\Services;

error_reporting(E_ALL);
ini_set('display_errors', '1');
/**
 * gameService.php
 */



class gameService {

    private $storage;
    private $isDBReady = true;

    /**
     * gameService constructor.
     */
    public function __construct() {
        // Verify he database
        if ($this->isDBReady) {
            $this->storage = new StorageService();
        }
    }

    /**
     * @param string $title
     * @param string $developer
     * @param string $description
     * @param string $console
     * @param date $releaseDate
     * @param number $rate
     * @param string $url
     *
     */
    public function createGame($title, $developer, $description, $console, $releaseDate, $rate, $url) {
        $result = [];

        // Verify that title has at least one character
        if (strlen(trim($title)) > 0){
            // Verify that developer has at least one character
            if (strlen(trim($developer)) > 0){
                // Verify that description has at least one character
                if (strlen(trim($description)) > 0){
                    // Verify that console has at least one character
                    if (strlen(trim($console)) > 0){
                        // Verify that releaseDate has at least one character
                        if (strlen(trim($releaseDate)) > 0){
                            // Verify that rate has at least one character
                            if (strlen(trim($rate)) > 0){
                                // Verify is a number
                                if (is_numeric($rate)) {
                                    // Verify that url has at least one character
                                    if (strlen(trim($url)) > 0){
                                        $query = "INSERT INTO videGame (title, developer, description, console, releaseDate, rate, url) VALUES (:title, :developer, :description, :console, :releaseDate, :rate, :url)";
                                        $parametros = [
                                            ":title" => $title,
                                            ":developer" => $developer,
                                            ":description" => $description,
                                            ":console" => $console,
                                            ":releaseDate" => $releaseDate,
                                            ":rate" => $rate,
                                            ":url" => $url,
                                        ];
            
                                    $resultQuery = $this->storage->query($query, $parametros);
                                    $result["message"] = "Game successfully created";

                                    }else{
                                        //The url is blank
                                        $result["message"] = "url is required.";
                                        $result["error"] = true;
                                    }
                                }else{
                                // is not a number
                                $result["message"] = "rate must be a number.";
                                $result["error"] = true;
                            }
                            }else{
                                //The rate is blank
                                $result["message"] = "rate is required.";
                                $result["error"] = true;
                            }
                        }else{
                            //The releaseDate is blank
                            $result["message"] = "releaseDate is required.";
                            $result["error"] = true;
                        }
                    }else{
                        //The console is blank
                        $result["message"] = "console is required.";
                        $result["error"] = true;
                    }
                }else{
                    //The description is blank
                    $result["message"] = "description is required.";
                    $result["error"] = true;
                }
            }else{
                //The developer is blank
                $result["message"] = "developer is required.";
                $result["error"] = true;
            }
        }else{
            //The title is blank
            $result["message"] = "title is required.";
            $result["error"] = true;
        }
            return $result;
    }


     /**
     *
     * @param number $id
     *
     * @return array
     */
        public function getByID($id) {
        $result = [];

        // Verify that the title, does not have spaces, and have at least 1 character
        if (strlen(trim($id)) > 0) {
    
                    $query = "SELECT * FROM videGame WHERE id = :id LIMIT 1";
                    $params = [":id" => $id];

                    // check database
                    if ($this->isDBReady) {
                        $result = $this->storage->query($query, $params);

                        // if the sentence has at least one row, it means that we find our game
                        if (count($result['data']) > 0) {
                            // Store the game in the variable `game`
                            $game = $result['data'][0];

                            // Success message
                            $result["message"] = "Game found.";

                            $result["game"] = [
                                "id" => $game["id"],
                                "title" => $game["title"],
                                "developer" => $game["developer"],
                                "description" => $game["description"],
                                "console" => $game["console"],
                                "releaseDate" => $game["releaseDate"],
                                "rate" => $game["rate"],
                                "url" => $game ["url"]
                            ];
                        } else {
                            // the game is not found
                            $result["message"] = "Invalid credentials.";
                            $result["error"] = true;
                        }
                    } else {
                        // The database is not ready 
                        $result["message"] = "Database has not been setup yet.";
                        $result["error"] = true;
                    }

        } else {
            // The id is blank
            $result["message"] = "title is required.";
            $result["error"] = true;
        }

        return $result;
    }

    public function deleteGame($id) {
        $result = [];
        if(is_numeric($id)) {

            $query = "DELETE FROM videGame WHERE id = :id";
            $params = [":id" => $id];
            $resultQuery = $this->storage->query($query, $params);

            if (array_key_exists("data", $resultQuery) && $resultQuery["data"]["count"] == 1) {
                $result["message"] = "Eliminated game";
            } else {
                $result["message"] = "$id Invalid ID / or function ran and delete your game, check the database ...";
                $result["error"] = true;
            }
        } else {
            $result["message"] = "Id must be a number";
            $result["error"] = true;
        }
        return $result;
    }



    public function getDetails() {
    $result = [];
    $query = "SELECT * From videGame";

    if ($this->isDBReady) {
                 
                    $resultado = $this->storage->query($query);

                    // if the sentence has at least one row, it means that we find our games
                    if (count($resultado['data']) > 0) {
                        $details = $resultado['data'];
                        //  Success message
                        $result["message"] = "User found.";

                            foreach ($details as $vidList) {
                                 $result["data"][] = [
                                "id" => $vidList["id"],
                                "title" => $vidList["title"],
                                "console" => $vidList["console"],
                                "releaseDate" => $vidList["title"]
                            ]; 
                        }
     
                    } else {
                        // the games is not found
                        $result["message"] = "Invalid game.";
                        $result["error"] = true;
                    }
                }

    return $result;
}


    /**
     * @param number $id
     * @param string $title
     * @param string $developer
     * @param string $description
     * @param string $console
     * @param date $releaseDate
     * @param number $rate
     * @param string $url
     *
     * @return array
     */
    public function editGame($id, $title, $developer, $description, $console, $releaseDate, $rate, $url) {
        $result = [];

        // Verify that title has at least one character
        if (strlen(trim($title)) > 0){
            // Verify that developer has at least one character
            if (strlen(trim($developer)) > 0){
                // Verify that description has at least one character
                if (strlen(trim($description)) > 0){
                    // Verify that console has at least one character
                    if (strlen(trim($console)) > 0){
                        // Verify that releaseDate has at least one character
                        if (strlen(trim($releaseDate)) > 0){
                            // Verify that rate has at least one character
                            if (strlen(trim($rate)) > 0){
                                // Verify is a number
                                if (is_numeric($rate)) {
                                    // Verify that url has at least one character
                                    if (strlen(trim($url)) > 0){
                                        $query = "UPDATE videGame SET title = :title,
                                                      developer = :developer,
                                                      description = :description,
                                                      console = :console,
                                                      releaseDate = :releaseDate,
                                                      rate = :rate,
                                                      url = :url
                                                WHERE id = :id";
                                        $parametros = [
                                            ":id" => $id,
                                            ":title" => $title,
                                            ":developer" => $developer,
                                            ":description" => $description,
                                            ":console" => $console,
                                            ":releaseDate" => $releaseDate,
                                            ":rate" => $rate,
                                            ":url" => $url,
                                        ];
            
                                    $resultQuery = $this->storage->query($query, $parametros);
                                    $result["message"] = "updated game";

                                    }else{
                                        //The url is blank
                                        $result["message"] = "url is required.";
                                        $result["error"] = true;
                                    }
                                }else{
                                // is not a number
                                $result["message"] = "rate must be a number.";
                                $result["error"] = true;
                            }
                            }else{
                                //The rate is blank
                                $result["message"] = "rate is required.";
                                $result["error"] = true;
                            }
                        }else{
                            //The releaseDate is blank
                            $result["message"] = "releaseDate is required.";
                            $result["error"] = true;
                        }
                    }else{
                        //The console is blank
                        $result["message"] = "console is required.";
                        $result["error"] = true;
                    }
                }else{
                    //The description is blank
                    $result["message"] = "description is required.";
                    $result["error"] = true;
                }
            }else{
                //The developer is blank
                $result["message"] = "developer is required.";
                $result["error"] = true;
            }
        }else{
            //The title is blank
            $result["message"] = "title is required.";
            $result["error"] = true;
        }
            return $result;
    }



}
