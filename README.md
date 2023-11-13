# testWebVotacion
Test para postulacion a trabajo de desarrollador Web, proyecto consiste en un formulario de votación desarrollado con PHP, JavaScript y MySQL.

## Configuración

1. Clona el repositorio: `git clone https://github.com/tuusuario/tuproyecto.git`
2. Configura tu servidor web para que apunte al directorio del proyecto.
3. Importa la base de datos desde el archivo `database.sql`.
4. Asegúrate de tener PHP y MySQL instalados.

## Estructura del Proyecto
- **/js:** Archivos JavaScript para la validación y carga de datos.
- **/sql:** Archivos SQL para configurar la base de datos necesaria para este ejemplo
- **/** Archivos php para la funcionalidad del proyecto mas index donde se visualiza el formulario


## Base de Datos

### Estructura de la Base de Datos
- Tabla 'votaciones': Almacena los datos de los votantes
- Tabla 'regiones': Almacena los datos de las regiones del territorio Chileno
- Tabla 'comunas': Guarda los datos de las comunas asociadas a cada region por un id_region
- Tabla 'candidatos': Guarda los datos de los candidatos por los que se puede votar 

## Configuración Adicional

- **/uploads:** Directorio para cargar archivos (si es necesario).
- **/logs:** Directorio para almacenar registros de errores (si es necesario).

## Problemas Conocidos

- Algunos usuarios pueden experimentar problemas con la validación del RUT en ciertos navegadores.
- El mensaje de validacion del checkbox mediante jQuery muestra la descripcion de la regla definida sobre los otros input checkbox. 100% funcional, esteticamente por mejorar.


## Historial de Cambios

- **v1.0.0 (2023-11-08):** Versión inicial del formulario de votación.

