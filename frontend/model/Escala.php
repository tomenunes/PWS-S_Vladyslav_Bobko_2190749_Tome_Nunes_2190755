<?php


class Escala extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('id'), array('id_voos'), array('id_aviao'), array('id_aeroporto_origem'), array('id_aeroporto_destino'), array('data_destino'), array('data_origem'));


}
