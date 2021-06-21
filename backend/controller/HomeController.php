<?php
use ArmoredCore\Controllers\BaseController;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\Session;
use ArmoredCore\WebObjects\View;

/**
 * Created by PhpStorm.
 * User: smendes
 * Date: 09-05-2016
 * Time: 11:30
 */
class HomeController extends BaseController
{

    public function index(){
        if(Session::has('userbackend')){


            $aviao = Aviao::count();
            $cliente = User::all();
            $voos = Voo::all();
            $totalclientes = (new OverallHelper)->getCountPassageiros();


            return View::make('home.index', ['aviao' => $aviao,'clientetotal' => $totalclientes,'cliente' =>$cliente,'voo' =>$voos] );
        }else{
            return Redirect::toRoute("home/login");
        }
    }



    public function login(){
        if(Session::has('userbackend')){
            Redirect::toRoute('home/index');
        }else{


            return View::make('home.login');
    }
    }


    public function worksheet(){

        //View::attachSubView('titlecontainer', 'layout.pagetitle', ['title' => 'MVC Worksheet']);

        return View::make('home.worksheet');
    }
    public function erro(){


        return View::make('home.erro');
    }

    public function setsession(){


        Redirect::toRoute('home/worksheet');
    }

    public function showsession(){
        $res = Session::get('object');
        var_dump($res);
    }

    public function destroysession(){

        Session::destroy();
        Redirect::toRoute('home/worksheet');
    }


}