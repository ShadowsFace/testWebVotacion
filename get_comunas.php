<?php
// Incluye el archivo de conexión
include 'conexion.php';

// Obtiene la conexión a la base de datos
$conexion = obtenerConexion();

if (isset($_GET['id_region'])) {
    $categoria_id = $_GET['id_region'];

    // Consulta para obtener las subcategorías relacionadas con la categoría seleccionada
    $query = "SELECT id, nombre FROM comunas WHERE id_region = ?";
    $statement = $conexion->prepare($query);
    $statement->execute([$categoria_id]);
    $subcategorias = $statement->fetchAll(PDO::FETCH_ASSOC);

    // Devuelve las subcategorías como JSON
    echo json_encode($subcategorias);
} else {
    // Si no se proporciona una categoría_id, devuelve un mensaje de error
    echo json_encode(array("error" => "Categoría no especificada"));
}
