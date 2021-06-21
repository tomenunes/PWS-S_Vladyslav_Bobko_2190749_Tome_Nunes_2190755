<?php
/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 02-05-2016
 * Time: 11:18
 */
use ArmoredCore\Facades\Router;

/****************************************************************************
 *  URLEncoder/HTTPRouter Routing Rules
 *  Use convention: controllerName@methodActionName
 ****************************************************************************/

Router::get('/',			'HomeController/index');
Router::get('home/',		'HomeController/index');
Router::get('home/index',	'HomeController/index');
Router::get('home/start',	'HomeController/start');
Router::get('home/login',	'HomeController/login');
Router::get('home/signup',	'HomeController/signup');
Router::post('home/search', 'HomeController/search');
Router::get('home/search', 'HomeController/searchl');

/************ USER ***********/
Router::post('user/signup', 'UserController/register');
Router::post('user/login', 'UserController/login');
Router::get('user/perfil', 'UserController/perfil');
Router::post('user/edit', 'UserController/edit');
Router::get('user/logout', 'UserController/logout');
Router::get('user/historico', 'UserController/historico');

/************ Passsagem venda ***********/
Router::get('passagemvenda/show', 'PassagemVendaController/show');
Router::get('purchase/index', 'PassagemVendaController/indexPurchase');
Router::post('passagemvenda/purchase', 'PassagemVendaController/purchase');
/************** End of URLEncoder Routing Rules ************************************/