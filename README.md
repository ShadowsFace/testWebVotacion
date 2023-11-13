# testWebVotacion
Test para postulacion a trabajo de desarrollador Web, proyecto consiste en un formulario de votación desarrollado con PHP, JavaScript y MySQL.
Fomulario valida que los datos ingresados sean consistentes, ademas mediante una consulta a la base de datos, se verifica si el votante ya realizo su voto consultando si su rut ya se encuentra ingresado.

## Configuración

1. Clona el repositorio: `git clone https://github.com/tuusuario/tuproyecto.git`
2. Configura tu servidor web para que apunte al directorio del proyecto o descarga el codigo y ejecutalo en tu maquina de manera local.
3. Importa la base de datos desde el archivo `sql/database.sql`.
4. Asegurate de crear el usuario testWeb en la base de datos y que su password sea testWeb, o crear un usuario a tu gusto pero deberas modificar el archivo de conexion para que funcione, deberas asignarle los permisos necesarios a las tablas contenidas en el archivo sql.
5. Asegúrate de tener PHP y MySQL instalados. (proyecto ejecutado en servidor local WAMP, PHP 8.0.26 y MySQL 8.0.31)


## Estructura del Proyecto
- **/js:** Archivos JavaScript para la validación del formulario y carga de datos desde la base de datos a los select.
- **/sql:** Archivos SQL para configurar la base de datos necesaria para este ejemplo
- **/** Archivos php para la funcionalidad del proyecto mas index donde se visualiza el formulario


## Base de Datos

### Estructura de la Base de Datos
- Tabla 'votaciones': Almacena los datos de los votantes y su voto por un candidato, ademas de su region y comuna asociadas a las tablas correspondientes. (restriccion de campo rut como unique para evitar votos duplicados)
- Tabla 'regiones': Almacena los datos de las regiones del territorio Chileno
- Tabla 'comunas': Guarda los datos de las comunas asociadas a cada region por un id_region
- Tabla 'candidatos': Guarda los datos de los candidatos por los que se puede votar 

## Problemas Conocidos

- Algunos usuarios pueden experimentar problemas con la validación del RUT en ciertos navegadores.
- El mensaje de validacion del checkbox mediante jQuery muestra la descripcion de la regla definida sobre los otros input checkbox. 100% funcional, esteticamente por mejorar.


## Historial de Cambios

- **v1.0.0 (2023-11-08):** Versión inicial del formulario de votación.

