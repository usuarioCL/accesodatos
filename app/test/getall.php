<?php

require_once '../models/Mascota.php';
$mascota = new Mascota();
$mascotas = $mascota->getAll();

foreach ($mascotas as $mascota) {
    echo "ID: {$mascota['idmascota']}, ";
    echo "Tipo: {$mascota['tipo']}, ";
    echo "Nombre: {$mascota['nombre']}, ";
    echo "Color: {$mascota['color']}, ";
    echo "Género: {$mascota['genero']}, ";
    echo "Propietario: {$mascota['propietario']}\n";
}