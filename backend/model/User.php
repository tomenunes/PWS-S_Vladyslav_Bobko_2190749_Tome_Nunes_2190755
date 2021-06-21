<?php


use ActiveRecord\Model;

class User extends Model
{
    static $validates_presence_of = array(
        array('id'),
        array('nome'),
        array('morada'),
        array('email'),
        array('nif'),
        array('telefone'),
        array('username'),
        array('password'),
        array('role')
    );


    static $validates_inclusion_of = array(
        array('role', 'in' => array('Passageiro','operadorcheckin','gestorvoo','admin'))
    );
}