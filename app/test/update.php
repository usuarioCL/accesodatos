<?php

require_once '../models/Mascota.php';

$mascota = new Mascota();
$params = [
    'idmascota'     => 1, 
    'idpropietario' => 2,
    'tipo'          => 'Perro',
    'nombre'        => 'bob',
    'color'         => 'amarillo',
    'genero'        => 'Macho'
];
$num = $mascota->update($params);

var_dump($num);