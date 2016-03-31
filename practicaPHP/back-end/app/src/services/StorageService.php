<?php

/**
 * StorageService.php
 * Interacción con la base de datos.
 */

namespace App\Services;

use \PDO;
use \PDOException;

class StorageService {

    // Instancia de la conexión a la BD, usada internamente.
    private $pdo;

    public function __construct() {
       
        $config = [   //aqui se cambian los datos de la base datos
            'db_host' => '127.0.0.1:1337',
            // 'db_host' => 'localhost',
            'db_name' => 'practicaPHP',
            'db_user' => 'admin',
            'db_pass' => 'admin'
        ];

        // Creamos una nueva conexión.
        $this->pdo = new PDO(
            "mysql:host={$config['db_host']};dbname={$config['db_name']}",
            $config['db_user'], $config['db_pass']
        );

        // Le solicitamos a la conexión que nos notifique de todos los errores.
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    /**
     * Ejecuta una sentencia de SQL.
     *
     * @param string $query
     * @param array $params
     *
     * @return array
     */
    public function query($query, $params=[]) {
        
        $result = [
            'data' => null
        ];

        try {
            // Preparamos la sentencia a ejecutar
            $stmt = $this->pdo->prepare($query);

            // Asignamos los parámetros a la sentencia
            $stmt->execute($params);

            // Ejecutamos la sentencia
            while ($content = $stmt->fetch()) {
                // Vaciando el contenido de cada fila dentro de `data` en el diccionario `result`.
                $result['data'][] = $content;
            }
        } catch (PDOException $e) {
            // En caso de que algo saliera mal con nuestro intento de conexión, el mensaje se envia de vuelta al
            // servicio que consumió este método.
            $result['error'] = true;
            $result['message'] = $e->getMessage();
        }

        // Retorne el arreglo de resultado a quien sea que lo haya llamado.
        return $result;
    }

}
