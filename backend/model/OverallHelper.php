<?php


use ArmoredCore\WebObjects\Layout;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\Session;

class OverallHelper
{
 public function getCountAviao(){

 }
 public function getCountPassageiros(){

     $cliente = User::all();
     $totalclientes=0;
     foreach ($cliente as $clientes) {
         if($clientes->role == "Passageiro"){
             $totalclientes = $totalclientes + 1;
         }
     }
     return $totalclientes;
 }
 public function getTotalBilhetes(){

     $passagem = PassagemVenda::all();
     $totalPreçoBilhetes=0;
     foreach ($passagem as $passagens) {

             $totalPreçoBilhetes = $totalPreçoBilhetes + $passagens->preco;
     }
     return $totalPreçoBilhetes;
 }
 public function CallLayout(){

     if(Session::has('userbackend')){


         $role = Session::get('role');
         switch ($role){
             case "operadorcheckin":
                 Layout::includeLayout('OpCheckinheader');
                 break;
             case "gestorvoo":
                 Layout::includeLayout('GestorVooheader');
                 break;
             case "admin":
                 Layout::includeLayout('adminheader');
                 break;
             default:
                 Layout::includeLayout('OpCheckinheader');
         }
     }else{
         Redirect::toRoute('home/login');
     }


 }
}