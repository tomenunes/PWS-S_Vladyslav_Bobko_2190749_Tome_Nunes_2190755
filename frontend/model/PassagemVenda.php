<?php


class PassagemVenda extends \ActiveRecord\Model
{

    static $table_name = "passagemvendas";
    static $validates_presence_of = array(
        array('id'),
        array('id_voos'),
        array('id_utilizador', 'message' => 'YooaaH it must be provided'),
        array('tipo_bilhete', 'message' => 'YooaaH it must be provided'),
        array('preco', 'message' => 'YooaaH it must be provided'),
        array('checkin', 'message' => 'YooaaH it must be provided')
    );



}