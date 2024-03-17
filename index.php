<?php

// Función para validar la entrada del usuario
function validarEntrada($entrada) {
    // Comprobar si es un número entero positivo
    if (!is_numeric($entrada) || $entrada <= 0 || strpos($entrada, '.') !== false) {
        return false;
    }
    return true;
}

// Función para calcular el número de rollos y los metros restantes
function calcularRollos($longitud) {
    // Definir las longitudes de los rollos
    $longitudRollos = array(500, 300, 75);
    
    // Inicializar el contador de rollos y metros restantes
    $rollos = array(0, 0, 0);
    $metrosRestantes = $longitud;
    
    // Calcular el número de rollos para cada longitud
    foreach ($longitudRollos as $index => $longitudRollo) {
        while ($metrosRestantes >= $longitudRollo) {
            $metrosRestantes -= $longitudRollo;
            $rollos[$index]++;
        }
    }
    
    // Devolver el resultado
    return array($rollos, $metrosRestantes);
}

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener la longitud total del alambre
    $longitudTotal = $_POST["longitud"];
    
    // Validar la entrada del usuario
    if (validarEntrada($longitudTotal)) {
        // Calcular los rollos y los metros restantes
        list($rollos, $metrosRestantes) = calcularRollos($longitudTotal);
        
        // Imprimir los resultados
        echo "Rollos de 500 metros: " . $rollos[0] . "<br>";
        echo "Rollos de 300 metros: " . $rollos[1] . "<br>";
        echo "Rollos de 75 metros: " . $rollos[2] . "<br>";
        echo "Metros restantes: " . $metrosRestantes . "<br>";
    } else {
        // Mensaje de error si la entrada no es válida
        echo "Por favor, ingrese un número entero positivo.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de rollos de alambre</title>
</head>
<body>
    <h2>Ingrese la longitud total de alambre en metros:</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="text" name="longitud">
        <input type="submit" value="Calcular">
    </form>
</body>
</html>
