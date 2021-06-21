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

   public function edit()
    {

        return View::make('user.edit');

    } public function editusers($id)
    {
        $user = \ArmoredCore\WebObjects\Session::get('role');
        if ($user == 'admin'){

        $cliente = User::find([$id]);
        return View::make('user.editusers', ['cliente'=>$cliente]); }else{
Redirect::toRoute('home/index');
}

    } public function index()
    {
        $user = \ArmoredCore\WebObjects\Session::get('role');
        if ($user == 'admin'){

        $cliente = User::all();

        return View::make('user.index', ['cliente'=>$cliente]);
        }else{
Redirect::toRoute('home/index');
}

    }
    public function register()
    {
       /* $user = new User();

        $user->nome = Post::get('nome');
        $user->username = Post::get('username');
        $user->email = Post::get('email');
        $user->nif = Post::get('nif');
        $password = base64_encode(hash("sha256", mb_convert_encoding(Post::get('password'), "UTF-16LE"), true));
        $user->password = $password;

        if ($user->is_valid()) {
            $user->save();
            Redirect::toRoute('user/login');
        } else {
            Redirect::flashToRoute('user/register', ['user' => $user]);
        }*/
    }
    /**
     * @inheritDoc
     */
    public function login()
    {

        $password = base64_encode(hash("sha256", mb_convert_encoding(Post::get('password'), "UTF-16LE"), true));
        if (User::exists(array('email' => Post::get('email'), 'password' => $password))) {
            $user = User::find(array('email' => Post::get('email')));

            if($user->role != "Passageiro"){

                Session::set('userbackend', $user);
                Session::set('role',$user->role);
                Redirect::toRoute('home/index');

        } else {

                Redirect::toRoute('home/login');
            }
        } else {

            Redirect::toRoute('home/login');
        }

    }
    public function logout()
    {
        Session::destroy();

        Redirect::toRoute('home/login');
    }


    public function showsession(){
        $res = Session::get('object');
        var_dump($res);
    }

    public function destroysession(){

        Session::destroy();
        Redirect::toRoute('home/index');
    }
    public function destroy($id){
        $user = User::find([$id]);
        if($user->delete()){
            Redirect::toRoute('user/index');

        }else{
            Redirect::toRoute('user/index');

        }
    }
    public function update(){

        $user = Session::get('userbackend');


        $user->update_attributes(Post::getAll());


        if ($user->is_valid()) {
            $user->save();
            Session::set('userbackend', $user);
            Redirect::toRoute('home/index');
        } else {
            Redirect::toRoute('user/edit');
        }
    }
    public function updateusers($id){

        $user = User::find([$id]);


        $user->update_attributes((array)Post::getAll());


        if ($user->is_valid()) {
            $user->save();
            Redirect::toRoute('user/index');
        } else {
            Redirect::toRoute('user/edit');
        }
    }


}