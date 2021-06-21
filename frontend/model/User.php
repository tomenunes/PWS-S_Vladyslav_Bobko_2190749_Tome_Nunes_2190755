<?php


use ActiveRecord\Model;

class User extends Model
{
    static $table_name = "users";



    static $validates_inclusion_of = array(
        array('role', 'in' => array('Passageiro','operadorcheckin','gestorvoo','admin'))
    );
}