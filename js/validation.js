$(document).ready(function () {

    // Método para validar RUT a jQuery Validator
    $.validator.addMethod("validaRut", function (value, element) {
        // Elimina puntos y guión del RUT
        value = value.replace(/[.-]/g, '');

        // Extrae el dígito verificador
        var dv = value.slice(-1);
        // Extrae el cuerpo del RUT (sin el dígito verificador)
        var rut = value.slice(0, -1);

        // Calcula el dígito verificador esperado
        var suma = 0;
        var multiplo = 2;

        for (var i = rut.length - 1; i >= 0; i--) {
            suma += parseInt(rut.charAt(i)) * multiplo;
            multiplo = multiplo < 7 ? multiplo + 1 : 2;
        }

        var dvEsperado = 11 - (suma % 11);

        // Compara el dígito verificador calculado con el ingresado
        return (dvEsperado == 11 && dv == 0) || (dvEsperado == 10 && dv.toLowerCase() == 'k') || (dvEsperado == dv);
    }, "Ingresa un Rut válido");


    // Codigo que asigna el evento blur al campo de entrada del RUT
    $("#rut").on("blur", function () {
        // Obtiene el valor del campo de entrada
        var rut = $(this).val();

        // Formatea el RUT
        var rutFormateado = formatearRut(rut);

        // Asigna el RUT formateado de nuevo al campo de entrada
        $(this).val(rutFormateado);
    });


    // Método alphanumeric a jQuery Validator (Permite el ingreso SOLO de Letras y Numeros)
    $.validator.addMethod("alphanumeric", function (value, element) {
        return this.optional(element) || /^[A-Za-z0-9]+$/.test(value);
    }, "Solo se permiten letras y números");


    //  Validaciones con jQuery de los datos del Formulario 
    $("#form_votacion").validate({
        rules: {
            nombre: {
                required: true
            },
            alias: {
                required: true,
                alphanumeric: true,
                minlength: 5
            },
            rut: {
                required: true,
                maxlength: 13,
                validaRut: true
            },
            email: {
                required: true,
                email: true
            },
            region: "required",
            comuna: "required",
            candidato: "required",
            "fuente[]": {
                required: true,
                minlength: 2
            }
        },
        messages: {
            nombre: "El nombre es obligatorio",
            alias: {
                required: "El alias es obligatorio",
                alphanumeric: "El alias debe contener solo números y letras",
                minlength: "El alias debe tener al menos 5 caracteres"
            },
            rut: {
                required: "El Rut es obligatorio",
                maxlength: "Ha excedido el máximo de caracteres para un Rut válido",
                validaRut: "Ingresa un Rut válido"
            },
            email: {
                required: "El correo electrónico es obligatorio",
                email: "Ingresa un correo electrónico válido"
            },
            region: "Selecciona una Región",
            comuna: "Selecciona una Comuna",
            candidato: "Selecciona un Candidato",
            "fuente[]": {
                required: "Selecciona al menos dos opciones",
                minlength: "Selecciona al menos dos opciones"
            }
        }
    });

    // Función para dar formato al RUT
    function formatearRut(rut) {
        // Verifica si el RUT está vacío
        if (!rut.trim()) {
            return null;
        }

        // Elimina puntos y guión del RUT
        rut = rut.replace(/[.-]/g, '');

        // Separa el cuerpo del RUT del dígito verificador
        var cuerpo = rut.slice(0, -1);
        var dv = rut.slice(-1);

        // Formatea el cuerpo del RUT con puntos y guión
        cuerpo = cuerpo.replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.');

        // Concatena el cuerpo y el dígito verificador
        return cuerpo + '-' + dv;
    }
});