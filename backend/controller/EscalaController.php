<?php
use ArmoredCore\Controllers\BaseController;
use ArmoredCore\WebObjects\Post;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\View;
use ArmoredCore\Interfaces\ResourceControllerInterface;

class   EscalaController extends BaseController implements ResourceControllerInterface
{


    /**
     * @return Returns
     */
    public function create()
    {
        $aeroporto = Aeroporto::all();
        $voo = Voo::all();
        $aviao = Aviao::all();
        View::make('escala.create', ['aeroporto' => $aeroporto,'voo' => $voo,'aviao' => $aviao]);
    }
    public function createVoo($id)
    {

        $aeroporto = Aeroporto::all();
        $voo = Voo::all([$id]);
        $escala = Escala::count(array('conditions' => array('id_voos = ?', $id)));

        if($escala >= $voo->escalas_total){

            Redirect::toRoute('escala/show/', $id);
        }elseif($escala == $voo->escalas_total-1){
            $aviao = Aviao::all();
            $igual = true;
            $voo = Voo::all([$id]);
            $escala = Escala::last(array('conditions' => array('id_voos = ?', $id)));
            View::make('escala.createDef', ['aeroporto' => $aeroporto,'voo' => $voo,'aviao' => $aviao,'escala' => $escala,'igual' => $igual]);


        }else{
        $aviao = Aviao::all();
            $voo = Voo::all([$id]);
            $igual = false;

            $escala = Escala::last(array('conditions' => array('id_voos = ?', $id)));
            View::make('escala.createDef', ['aeroporto' => $aeroporto,'voo' => $voo,'aviao' => $aviao,'escala' => $escala,'igual' => $igual]);

    }
    }
    public function createA()
    {
        $last = Escala::last();
        $escala = new Escala();
        $escala->id = $last->id + 1;
        $escala->id_voos = Post::get('id_voos');
        $escala->id_aviao = Post::get('id_aviao');
        $escala->id_aeroporto_origem = Post::get('aeroporto_origem');
        $escala->id_aeroporto_destino = Post::get('aeroporto_destino');
        $escala->data_origem = Post::get('data_origem');
        $escala->data_destino = Post::get('data_destino');

        if($escala->is_valid()){
            $escala->save();
            Redirect::toRoute('escala/index');
        } else {
            Redirect::ToRoute('escala/create');
        }
    }

    /**
     * @return Returns
     */
    public function store()
    {
        // TODO: Implement store() method.
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id){
        $escalatotal = Escala::count(array('conditions' => array('id_voos = ?', $id)));
        if($escalatotal != 0){
        $escala = Escala::all(array('conditions' => array('id_voos = ?', $id)));

        $aeroporto = Aeroporto::all();
        $voo = Voo::All();
        $aviao = Aviao::All();
        View::make('escala.show', ['escala' => $escala,'voo' => $voo,'aviao' => $aviao,'aeroporto' => $aeroporto]);
        }else{
            Redirect::toRoute('voo/index');
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $escala = Escala::find([$id]);
        $voo = Voo::All();
        $aviao = Aviao::All();
        $aeroporto = Aeroporto::All();
        View::make('escala.edit', ['escala' => $escala,'voo' => $voo,'aeroporto' => $aeroporto,'aviao' => $aviao]);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function update($id)
    {
        $escala = Escala::find([$id]);
        $escala->update_attributes(Post::getAll());

        if($escala->is_valid()){
            $escala->save();
            Redirect::toRoute('escala/index');
        } else {
            //redirect to form with data and errors
            Redirect::flashToRoute('escala/edit', ['escala' => $escala]);
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $escala = Escala::find([$id]);

            $escala->delete();
            Redirect::toRoute('escala/index');
        }



    public function index()
    {
        $user = \ArmoredCore\WebObjects\Session::get('role');
        if ($user == 'admin' ||$user == 'gestorvoo' ){

        $escala = Escala::all();
        $aeroporto = Aeroporto::all();
        $voo = Voo::All();
        $aviao = Aviao::All();
        View::make('escala.index', ['escala' => $escala,'voo' => $voo,'aviao' => $aviao,'aeroporto' => $aeroporto]);
    }else{
Redirect::toRoute('home/index');
}  }
    public function search($value)
    {
        $escala = Escala::find(array('referencia'=> $value));
        var_dump($escala);
        die;
        $escala = Escala::all();
        View::make('escala.index', ['escala' => $escala]);
    }
}