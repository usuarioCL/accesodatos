<?php

require_once '../entities/Mascota.entidad.php';
require_once '../models/Mascota.php';

//Entidad = CONTENEDOR DE DATOS
$entidad = new MascotaEntidad();
$entidad->__SET('idpropietario', 1);
$entidad->__SET('tipo', 'Perro');
$entidad->__SET('nombre', 'Fifi');
$entidad->__SET('color', 'Marron');
$entidad->__SET('genero', 'Macho');

//Modelo = accion/logica de negocio
$mascota = new Mascota();

$idgenerado = $mascota->create($entidad);
var_dump($idgenerado);