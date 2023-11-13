<?php
// funciones.php Contiene función para verificar si el usuario está registrado
include 'funciones.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Recupera los datos del formulario
        $nombre = $_POST["nombre"];
        $alias = $_POST["alias"];
        $rut = $_POST["rut"];
        $email = $_POST["email"];
        $region = $_POST["region"];
        $comuna = $_POST["comuna"];
        $candidato = $_POST["candidato"];

        $fuentes = isset($_POST["fuente"]) ? $_POST["fuente"] : array();
        $fuentesText = implode(",", $fuentes); // Variable limpia para agregarla a la SQL

        // Verifica si el registro ya existe en la base de datos
        if (!estaRegistrado($rut)) {
            // La persona no está registrada, se debe agregar sus datos
            $conexion = obtenerConexion();

            // Consulta SQL para insertar los datos (evitar la inyección SQL utilizando parámetros)
            $consulta_sql = "INSERT INTO votaciones (nombre, alias, rut, email, id_region, id_comuna, id_candidato, fuente) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $consulta = $conexion->prepare($consulta_sql);

            if ($consulta !== false) {
                // Bind de los parámetros
                $consulta->bindParam(1, $nombre, PDO::PARAM_STR);
                $consulta->bindParam(2, $alias, PDO::PARAM_STR);
                $consulta->bindParam(3, $rut, PDO::PARAM_STR);
                $consulta->bindParam(4, $email, PDO::PARAM_STR);
                $consulta->bindParam(5, $region, PDO::PARAM_INT);
                $consulta->bindParam(6, $comuna, PDO::PARAM_INT);
                $consulta->bindParam(7, $candidato, PDO::PARAM_INT);
                $consulta->bindParam(8, $fuentesText, PDO::PARAM_STR);

                // Intenta ejecutar la consulta
                if ($consulta->execute()) {
                    // Éxito al guardar los datos
                    ?>
                    <script>
                        //Mensaje al usuario de éxito en el proceso
                        alert('Los Datos se Guardaron Correctamente!!');
                        location.href='index.html';
                    </script>
                    <?php
                } else {
                    // Error al ejecutar la consulta, se muestra el error
                    echo "Error al ejecutar la consulta: " . $consulta->errorInfo()[2];
                }

                // Cierra la conexión a la base de datos
                $conexion = null;
            } else {
                // Error al preparar la consulta, se muestra el error
                echo "Error al preparar la consulta: " . $conexion->errorInfo()[2];
            }
        } else {
            // La persona ya está registrada
            ?>
            <script>
                //Mensaje de aviso que la persona ya está registrado
                alert('El Rut ingresado ya se encuentra Registrado');
                location.href='index.html';
            </script>
            <?php
        }
    } catch (PDOException $e) {
        // Manejar el error de conexión
        echo "Error al procesar la solicitud: " . $e->getMessage();
    }
} else {
    // Acceso directo al script no permitido
    ?>
    <script>
        alert('Acceso no Autorizado');
        location.href='index.html';
    </script>
    <?php
}
?>
