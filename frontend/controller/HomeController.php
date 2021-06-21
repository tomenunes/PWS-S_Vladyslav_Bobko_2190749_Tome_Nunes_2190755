<?php
use ArmoredCore\Controllers\BaseController;
use ArmoredCore\WebObjects\Post;
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
    public function login(){
        $voo  = Voo::all();
        return View::make('home.login' , ['voo' => $voo]);
    }
    public function signup(){
        return View::make('home.signup');
    }
    public function book(){
        return View::make('home.book');
    }

    public function index(){

        $escala = Escala::all();
        $aeroporto = Aeroporto::all();

        return View::make('home.index', ['escalas' => $escala,'aeroporto' => $aeroporto]);
    }

    public function search(){

      if(Post::get('data_origem') == "" && Post::get('data_destino') == ""){
          $search = Voo::all(

              array('conditions' => array('id_aeroporto_inicial = ?', Post::get('aeroporto_origem')))
              ,array('conditions' => array('id_aeroporto_final = ?', Post::get('aeroporto_destino'))));

      }elseif (Post::get('aeroporto_origem') == "" && Post::get('aeroporto_destino') == "") {
          $search = Voo::all(array('conditions' => array('data_inicial = ?', Post::get('data_origem')))
              , array('conditions' => array('data_final = ?', Post::get('data_destino')))
              , array('conditions' => array('id_aeroporto_final = ?', Post::get('aeroporto_destino'))));
      }elseif (Post::get('data_origem') == "" && Post::get('data_destino') == "" && Post::get('aeroporto_origem') == "" && Post::get('aeroporto_destino') == ""){
          $search = Voo::all();
      }else{

          $search = Voo::all(array('conditions' => array('data_inicial = ?', Post::get('data_origem')))
              ,array('conditions' => array('data_final = ?', Post::get('data_destino')))
              ,array('conditions' => array('id_aeroporto_inicial = ?', Post::get('aeroporto_origem')))
              ,array('conditions' => array('id_aeroporto_final = ?', Post::get('aeroporto_destino'))));
      }

        $aeroporto = Aeroporto::all();


        return View::make('home.search', ['search' => $search,'aeroporto' => $aeroporto]);
    }
    public function searchl(){

        $search = Voo::all();
        $aeroporto = Aeroporto::all();

        return View::make('home.search', ['search' => $search,'aeroporto' => $aeroporto]);
    }



    public function worksheet(){

        View::attachSubView('titlecontainer', 'layout.pagetitle', ['title' => 'MVC Worksheet']);

        return View::make('home.worksheet');
    }





    public function destroysession(){

        Session::destroy();
        Redirect::toRoute('home/index');
    }


}