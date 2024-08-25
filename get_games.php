<?php
require 'vendor/autoload.php'; // Asegúrate de que la ubicación del archivo autoload.php sea correcta

use Firebase\JWT\JWT;

if (isset($_POST['Name_JUEGO']) && isset($_POST['PLATAFORMA'])){
    //incluyendo el archivo que permite llamar la configuración:
    include_once 'leer_configuracion.php';
    // Supongamos que tienes estos valores ingresados por el usuario
    $enteredvideogame = $_POST['Name_JUEGO'];
    $enteredplataforma = $_POST['PLATAFORMA'];


    try{
        $sql = "SELECT * FROM juegos WHERE PLATAFORMAS = ? OR NOMBRE_JUEGO = ?";
      
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param("ss",$enteredplataforma,$enteredvideogame );
        $stmt->execute();
        $stmt->bind_result($id_juego, $NOMBRE_JUEGO,$FECHA_LANZAMIENTO,$PLATAFORMAS);
        
        // Inicializar una lista para almacenar los resultados
        $resultados = array();

        while ($stmt->fetch()) {
            $resultado = array(
                "id_juego" => $id_juego,
                "NOMBRE_JUEGO" => $NOMBRE_JUEGO,
                "FECHA_LANZAMIENTO" => $FECHA_LANZAMIENTO,
                "PLATAFORMAS" => $PLATAFORMAS

            );
            $resultados[] = $resultado;
        }
        // Cierra la conexión y la declaración
        $stmt->close();
        $conexion->close();

        // Convertir la lista a formato JSON
        $json_resultados = json_encode($resultados);

        // Devolver el JSON
        echo $json_resultados;

    }catch(Exception $ex){
        $error_message = "Ocurrió una excepción al intentar obtener información de la tabla: " . $ex->getMessage();
        Logger::logError($error_message, $log_file);
        header("Location: server_error_500.html"); // Redirigir a la página de bienvenida

    }
    
}

function almacenar_cookie($token) {
    // Implementa tu lógica de encriptación aquí (por ejemplo, usando OpenSSL)
    // Aquí hay un ejemplo simple utilizando base64 para demostración:
    $token_encoded =  base64_encode($token);
    // Define la vida de la cookie en segundos (por ejemplo, 7 días)
    $tiempo_expiracion = time() + (3600);
    // Establece la cookie encriptada
    setcookie('jwt', $token_encoded, $tiempo_expiracion, '/');
}

?>
