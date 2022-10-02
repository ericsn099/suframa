<?php


include 'Controller/FuncionarioController.php';
include 'Controller/AdmController.php';
include 'Controller/LoginController.php';
include 'Controller/DemandaController.php';
include 'Controller/PaginaNaoEncontradaController.php';

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);



switch($url){
	case '/':
		LoginController::index();
	break;

	case '/adm':
		AdmController::index();
	break;

	case '/adm/save':
		FuncionarioController::save();
	break;
	
	case '/adm/update':
		FuncionarioController::update();
	break;
	
	case '/atualizarFuncionario':
		AdmController::alterarFuncionario();
	break;

	case '/adm/delete':
		FuncionarioController::delete();
	break;

	case '/paginaInicial':
		FuncionarioController::index();
	break;

	case '/paginaInicial/save':
		DemandaController::save();
	break;

	case '/paginaInicial/update':
		DemandaController::update();
	break;

	case '/login/validarLogin':
        LoginController::validarLogin();
    break;

	default:
		PaginaNaoEncontradaController::paginaNaoEncontrada();
	break;
};