<?php


class Utilizador extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('nome'),
        array('morada'),
        array('email'),
        array('nif'),
        array('telefone'),
        array('username'),
        array('password'),
        array('perfil'),
        array('Role'),
        array('sessionid')
    );
}