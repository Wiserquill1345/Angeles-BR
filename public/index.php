<?php

require_once __DIR__ . "/../includes/app.php";

use Controllers\LoginController;
use MVC\Router;
use Controllers\PropiedadController;
use Controllers\VendedorController;
use Controllers\PaginasController;

$router = new Router();
//Zona privada
$router->get("/admin",[PropiedadController::class,'index']);
$router->get("/propiedades/crear",[PropiedadController::class,'crear']);
$router->post("/propiedades/crear",[PropiedadController::class,'crear']);
$router->get("/propiedades/actualizar",[PropiedadController::class,'actualizar']);
$router->post("/propiedades/actualizar",[PropiedadController::class,'actualizar']);
$router->post("/propiedades/eliminar",[PropiedadController::class,'eliminar']);

$router->get("/vendedores/crear",[VendedorController::class,'crear']);
$router->post("/vendedores/crear",[VendedorController::class,'crear']);
$router->get("/vendedores/actualizar",[VendedorController::class,'actualizar']);
$router->post("/vendedores/actualizar",[VendedorController::class,'actualizar']);
$router->post("/vendedores/eliminar",[VendedorController::class,'eliminar']);


//Zona publica
$router->get("/", [PaginasController::class,"index"]);
$router->get("/nosotros", [PaginasController::class,"nosotros"]);
$router->get("/propiedades", [PaginasController::class,"propiedades"]);
$router->get("/propiedad", [PaginasController::class,"propiedad"]);
$router->get("/blog", [PaginasController::class,"blog"]);
$router->get("/entrada", [PaginasController::class,"entrada"]);
$router->get("/contacto", [PaginasController::class,"contacto"]);
$router->post("/contacto", [PaginasController::class,"contacto"]);

//Zona publica - desarrollos
$router->get("/desarrollos/monet", [PaginasController::class,"monet"]);
$router->get("/desarrollos/paseoSantiago", [PaginasController::class,"paseoSantiago"]);
$router->get("/desarrollos/altaria", [PaginasController::class,"altaria"]);
$router->get("/desarrollos/camille", [PaginasController::class,"camille"]);
$router->get("/desarrollos/granAlameda", [PaginasController::class,"granAlameda"]);
$router->get("/desarrollos/quintaGranadaIII", [PaginasController::class,"quintaGranadaIII"]);
$router->get("/desarrollos/palermo", [PaginasController::class,"palermo"]);
$router->get("/desarrollos/corceles", [PaginasController::class,"corceles"]);

//Login y autenticacion
$router->get("/login",[LoginController::class, "login"]);
$router->post("/login",[LoginController::class, "login"]);
$router->get("/logout",[LoginController::class, "logout"]);

$router->comprobarRutas();