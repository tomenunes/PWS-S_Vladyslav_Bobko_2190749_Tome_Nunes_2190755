<?php


class Aeroporto extends \ActiveRecord\Model
{
    static $table_name = 'aeroportos';
    static $datetime_format = 'Y-m-d H:i:s';

    static $validates_presence_of = array(
        array('id'),
        array('nome' ,'message' => 'Nome não pode estar vazio!')
    );

}