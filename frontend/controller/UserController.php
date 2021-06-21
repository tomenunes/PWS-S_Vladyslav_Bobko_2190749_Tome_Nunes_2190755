<?php

use ArmoredCore\Controllers\BaseController;
use ArmoredCore\WebObjects\Post;
use ArmoredCore\WebObjects\View;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\Session;
use ArmoredCore\Interfaces\ResourceControllerInterface;

class UserController extends \ArmoredCore\Controllers\BaseController
{

    /**
     * @inheritDoc
     */
    public function index()
    {
        View::make('user.index');
    }
    public function historico()
    {
        if(Session::has('user')){
            $user = Session::get('user');
            $role = Session::get('role');
        if($role == 'Passageiro'){

            $cliente = User::all();
        $passagem = PassagemVenda::all(array('conditions' => array('id_utilizador = ?', $user->id)));

        View::make('user.historico', ['passagem'=>$passagem, 'cliente' => $cliente]);
        }else{
            Redirect::toRoute("home/login");
        }
          }else{
            Redirect::toRoute("home/login");
        }
    }
    public function perfil()
    {
        if(Session::has('user')){

            View::make('user.perfil');
        }else{
            Redirect::toRoute("home/index");
        }

    }
    public function edit()
    {

        $user = Session::get('user');

        $user->update_attributes(Post::getAll());

        Session::set('user', $user);

        if ($user->is_valid()) {
            $user->save();
            Redirect::toRoute('home/index');
        } else {
            Redirect::toRoute('home/perfil');
        }
    }
    public function register()
    {
        $users = new User();
        $last = User::last();
        $users->id = $last->id + 1;
        $users->nome = Post::get('nome');
        $users->username = Post::get('username');
        $users->email = Post::get('email');
        $users->nif = Post::get('nif');
        $password = base64_encode(hash("sha256", mb_convert_encoding(Post::get('password'), "UTF-16LE"), true));
        $users->password = $password;

        if ($users->is_valid()) {
            $users->save();
            Redirect::toRoute('home/login');
        } else {
            Redirect::flashToRoute('home/signup', ['user' => $users]);
        }
    }
    /**
     * @inheritDoc
     */
    public function login()
    {
        $password = base64_encode(hash("sha256", mb_convert_encoding(Post::get('password'), "UTF-16LE"), true));
        if (User::exists(array('email' => Post::get('email'), 'password' => $password))) {
            $user = User::find(array('email' => Post::get('email')));
            if($user->role == "Passageiro"){
                Session::set('user', $user);
                Session::set('role',$user->role);
                Redirect::toRoute('home/index');}
            else{
                Redirect::ToRoute('home/signup');
            }
        } else {
            Redirect::ToRoute('home/signup');
        }
    }
    public function logout()
    {
        Session::destroy();

        $voos = Voo::all();
        Redirect::toRoute('home/index');
    }



    public function showsession(){
        $res = Session::get('object');
        var_dump($res);
    }

    public function destroysession(){

        Session::destroy();
        Redirect::toRoute('home/index');
    }


}