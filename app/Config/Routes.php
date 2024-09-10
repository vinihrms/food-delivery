<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// busca filtro visitante para a rota de LOGIN 
// só deixa acessar URL de login para visitantes (nao logados)
$routes->get('/login', 'Login::novo', ['filter' => 'visitante']); 



$routes->group('admin', static function ($routes) {
    $routes->get('formas', 'Admin\FormasPagamento::index');
    $routes->get('formas/criar', 'Admin\FormasPagamento::criar');
    $routes->get('formas/show/(:num)', 'Admin\FormasPagamento::show/$1');
    $routes->get('formas/editar/(:num)', 'Admin\FormasPagamento::editar/$1');
    $routes->get('formas/desfazerexclusao/(:num)', 'Admin\FormasPagamento::desfazerexclusao/$1');
    $routes->get('formas/show/(:num)', 'Admin\FormasPagamento::show/$1');

    $routes->post('formas/atualizar/(:num)', 'Admin\FormasPagamento::atualizar/$1');
    $routes->post('formas/cadastrar', 'Admin\FormasPagamento::cadastrar');

    $routes->match(['get', 'post'], 'formas/excluir/(:num)', 'Admin\FormasPagamento::excluir/$1');
    $routes->match(['get', 'post'], 'expedientes', 'Admin\Expedientes::expedientes');


});
