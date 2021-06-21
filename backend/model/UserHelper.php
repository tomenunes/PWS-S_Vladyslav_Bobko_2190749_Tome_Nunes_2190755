<?php


use ArmoredCore\Controllers\BaseController;
use ArmoredCore\WebObjects\Post;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\Session;
use ArmoredCore\WebObjects\View;
use ArmoredCore\Interfaces\ResourceControllerInterface;


class UserHelper
{
public function GetRole(){


        if(Session::has('userbackend'))
        {
            return Session::get('role');
        }else
        {
            return null;
        }
        }



}