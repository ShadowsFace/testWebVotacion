// Función para cargar opciones en un select desde la base de datos
const cargarOpciones = (url, select, valueKey, textKey) => {
    fetch(url)
        .then(response => response.json())
        .then(data => {
            data.forEach(option => {
                const optionElement = document.createElement("option");
                optionElement.value = option[valueKey];
                optionElement.textContent = option[textKey];
                select.appendChild(optionElement);
            });
        })
        .catch(error => {
            console.error(`Error al cargar opciones desde la base de datos (${url}): ${error}`);
        });
};

// Obtener referencias a los select
const regionesSelect = document.getElementById("region");
const comunasSelect = document.getElementById("comuna");
const candidatoSelect = document.getElementById("candidato");

// Cargar opciones para candidatos
cargarOpciones("get_candidatos.php", candidatoSelect, "id_candidato", "nombre");

// Cargar opciones para regiones
cargarOpciones("get_regiones.php", regionesSelect, "id", "nombre");

// Agregar un evento change al primer select para cargar subcategorías según la selección
regionesSelect.addEventListener("change", () => {
    const selectedRegion = regionesSelect.value;

    // Limpiar el segundo select
    comunasSelect.innerHTML = "<option value=''>Selecciona una Comuna</option>";

    // Cargar subcategorías basadas en la región seleccionada
    if (selectedRegion) {
        cargarOpciones(`get_comunas.php?id_region=${selectedRegion}`, comunasSelect, "id", "nombre");
    }
});
