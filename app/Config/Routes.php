
<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', 'Inicio::index');

$routes->get('creditos', 'Creditos::index');
$routes->get('dashboard', 'Dashboard::index');

$routes->get('login', 'Login::index');
$routes->post('processar', 'Login::processar');
$routes->get('logout', 'Login::logout');

$routes->post('salvar_frequencia', 'Salvar_frequencia::salvar');
$routes->post('salvar_justificativa', 'Salvar_justificativa::salvar');
$routes->post('salvar_justificativa_falta', 'Salvar_justificativa_falta::salvar');

$routes->post('excluir_justificativa', 'Dashboard::excluir_justificativa');
$routes->post('excluir_frequencia', 'Dashboard::excluir_frequencia');

$routes->get('download/atestado/(:num)', 'Download::atestado/$1');
$routes->get('arquivo/atestado/(:num)', 'Arquivo::atestado/$1');

$routes->get('tabela', 'Tabela::index');

$routes->get('alterar_turma', 'Alterar_turma::index');
$routes->post('alterar_turma', 'Alterar_turma::index');
$routes->post('login/processar', 'Login::processar');
$routes->get('login/logout', 'Login::logout');

// Rotas adicionais
$routes->get('config', 'Config::index');
