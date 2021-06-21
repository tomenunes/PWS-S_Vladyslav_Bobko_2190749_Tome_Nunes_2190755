<?php


class Voo extends \ActiveRecord\Model
{

    static $validates_presence_of = array(
        array('id'),
        array('preco'),
        array('id_aeroporto_inicial'),
        array('id_aeroporto_final'),
        array('data_inicial'),
        array('data_final'),
        array('estado')

    );
}