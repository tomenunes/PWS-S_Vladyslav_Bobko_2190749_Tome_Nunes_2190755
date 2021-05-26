<?php


class Aviao extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('id'), array('referencia'), array('lotacao'), array('tipo_aviao'));

}
