<?php


class PassagemVenda extends \ActiveRecord\Model
{
    static $validates_presence_of = array(
        array('id_voos'),
        array('id_utilizador', 'message' => 'YooaaH it must be provided'),
        array('tipo_bilhete', 'message' => 'YooaaH it must be provided'),
        array('preco', 'message' => 'YooaaH it must be provided'),
        array('data_venda', 'message' => 'YooaaH it must be provided')
    );

}