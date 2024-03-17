// Función para validar la entrada del usuario
function validarEntrada(entrada) {
    // Comprobar si es un número entero positivo
    if (!Number.isInteger(entrada) || entrada <= 0) {
        return false;
    }
    return true;
}

// Función para calcular el número de rollos y los metros restantes
function calcularRollos(longitud) {
    // Definir las longitudes de los rollos
    const longitudesRollos = [500, 300, 75];
    
    // Inicializar el contador de rollos y metros restantes
    let rollos = [0, 0, 0];
    let metrosRestantes = longitud;
    
    // Calcular el número de rollos para cada longitud
    longitudesRollos.forEach((longitudRollo, index) => {
        while (metrosRestantes >= longitudRollo) {
            metrosRestantes -= longitudRollo;
            rollos[index]++;
        }
    });
    
    // Devolver el resultado
    return [rollos, metrosRestantes];
}

// Función para manejar el evento de clic en el botón
function calcular() {
    // Obtener el valor ingresado por el usuario
    const longitudTotal = parseInt(document.getElementById("longitud").value);
    
    // Validar la entrada del usuario
    if (validarEntrada(longitudTotal)) {
        // Calcular los rollos y los metros restantes
        const [rollos, metrosRestantes] = calcularRollos(longitudTotal);
        
        // Mostrar los resultados en el elemento con id "resultado"
        document.getElementById("resultado").innerHTML = `
            <p>Rollos de 500 metros: ${rollos[0]}</p>
            <p>Rollos de 300 metros: ${rollos[1]}</p>
            <p>Rollos de 75 metros: ${rollos[2]}</p>
            <p>Metros restantes: ${metrosRestantes}</p>
        `;
    } else {
        // Mostrar un mensaje de error si la entrada no es válida
        document.getElementById("resultado").innerHTML = "Por favor, ingrese un número entero positivo.";
    }
}
