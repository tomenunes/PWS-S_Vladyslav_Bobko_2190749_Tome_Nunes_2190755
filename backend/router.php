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




/************ HOME ***********/
Router::get('/','HomeController/index');
Router::get('home/','HomeController/index');
Router::get('home/index','HomeController/index');
Router::get('home/erro','HomeController/erro');
Router::get('home/login','HomeController/login');



/************ USER ***********/
Router::post('user/login', 'UserController/login');
Router::get('user/logout', 'UserController/logout');
Router::get('user/edit', 'UserController/edit');
Router::get('user/editusers', 'UserController/editusers');
Router::post('user/updateusers', 'UserController/updateusers');
Router::get('user/index', 'UserController/index');
Router::post('user/update', 'UserController/update');
Router::post('user/destroy', 'UserController/destroy');


/************ Voos ***********/
Router::get('voo/index', 'VooController/index');
Router::get('voo/edit', 'VooController/edit');
Router::get('voo/create', 'VooController/create');
Router::post('voo/update', 'VooController/update');
Router::post('voo/destroy', 'VooController/destroy');
Router::post('voo/createA', 'VooController/createA');
Router::post('voo/finish', 'VooController/finish');


/************ aviao ***********/
Router::get('aviao/edit', 'AviaoController/edit');
Router::get('aviao/create', 'AviaoController/create');
Router::post('aviao/update', 'AviaoController/update');
Router::post('aviao/destroy', 'AviaoController/destroy');
Router::post('aviao/createA', 'AviaoController/createA');


/************ escalas ***********/
Router::get('escala/edit', 'EscalaController/edit');
Router::post('escala/show', 'EscalaController/show');
Router::get('escala/create', 'EscalaController/create');
Router::post('escala/update', 'EscalaController/update');
Router::post('escala/destroy', 'EscalaController/destroy');
Router::post('escala/createA', 'EscalaController/createA');
Router::post('escala/createVoo', 'EscalaController/createVoo');

/************ Aeroportos ***********/
Router::get('aeroporto/edit', 'AeroportoController/edit');
Router::get('aeroporto/create', 'AeroportoController/create');
Router::post('aeroporto/update', 'AeroportoController/update');
Router::post('aeroporto/destroy', 'AeroportoController/destroy');
Router::post('aeroporto/createA', 'AeroportoController/createA');

/************ Passagem Vendas ***********/
Router::get('passagemvenda/edit', 'PassagemVendaController/edit');
Router::get('passagemvenda/create', 'PassagemVendaController/create');
Router::post('passagemvenda/update', 'PassagemVendaController/update');
Router::post('passagemvenda/destroy', 'PassagemVendaController/destroy');
Router::post('passagemvenda/createA', 'PassagemVendaController/createA');
Router::post('passagemvenda/checkin', 'PassagemVendaController/checkin');

/************ resources ***********/
Router::resource('aviao', 'AviaoController');
Router::resource('voo', 'VooController');
Router::resource('escala', 'EscalaController');
Router::resource('aeroporto', 'AeroportoController');
Router::resource('passagemvenda', 'PassagemVendaController');








/************** End of URLEncoder Routing Rules ************************************/