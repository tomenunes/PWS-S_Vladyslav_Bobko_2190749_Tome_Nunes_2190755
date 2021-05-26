<?php


class Voo extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('id_aviao'),
        array('aeroporto_destino'),
        array('aeroporto_origem'),
        array('data_origem'),
        array('data_destino'),
        array('distancia'),
        array('preco')
    );
}