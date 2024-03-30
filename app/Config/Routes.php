<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// busca filtro visitante para a rota de LOGIN 
// só deixa acessar URL de login para visitantes (nao logados)
$routes->get('/login', 'Login::novo', ['filter' => 'visitante']); 

