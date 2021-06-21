<?php


class Aviao extends \ActiveRecord\Model
{

    static $validates_presence_of = array(
        array('referencia'),
        array('lotacao'),
        array('tipo_aviao')

    );

}
