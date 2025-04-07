<?php
require_once '../modelo/database.php';
require_once '../controlador/sesion_valida.php';
require_once '../controlador/rol_valido.php';

$controller = 'pedido';

// Toda esta lógica hará el papel de un FrontController
if (!isset($_REQUEST['c'])) {
    require_once "../controlador/$controller.controlador.php";
    $controller = ucwords($controller) . 'Controlador';
    $controller = new $controller;
    $controller->Index();
} else {
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';

    // Instanciamos el controlador correcto
    require_once "../controlador/$controller.controlador.php";
    $controller = ucwords($controller) . 'Controlador';
    $controller = new $controller;

    // Llama la acción
    call_user_func(array($controller, $accion));
}