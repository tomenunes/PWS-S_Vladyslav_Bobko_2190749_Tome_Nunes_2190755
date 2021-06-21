<?php

use ArmoredCore\Controllers\BaseController;
use ArmoredCore\WebObjects\Post;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\View;
use ArmoredCore\Interfaces\ResourceControllerInterface;


class VooController extends \ArmoredCore\Controllers\BaseController implements \ArmoredCore\Interfaces\ResourceControllerInterface
{

    /**
     * @inheritDoc
     */
    public function index()
    {
        $voos = Voo::all();
        $aeroporto = Aeroporto::all();

        View::make('voo.index', ['voo' => $voos,'aeroporto' => $aeroporto]);

    }

    /**
     * @inheritDoc
     */
    public function create()
    {
        $aeroporto = Aeroporto::all();
        View::make('voo.create', ['aeroporto' => $aeroporto]);
    }
    public function createA()
    {
        $voo = new Voo();

        $last = Voo::last();

        $voo->preco = Post::get('preco');
        $voo->id_aeroporto_inicial = Post::get('aeroporto_inicial');
        $voo->id_aeroporto_final = Post::get('aeroporto_final');
        $voo->data_inicial = Post::get('data_inicial');
        $voo->data_final = Post::get('data_final');
        $voo->estado = 'Agendado';
        $voo->escalas_total = 'escalas_total';

        $voo->id = $last->id + 1;
        if($voo->is_valid()){
            $voo->save();
            Redirect::toRoute('voo/index');
        } else {
            Redirect::ToRoute('voo/create');
        }
    }
    /**
     * @inheritDoc
     */
    public function store()
    {
        // TODO: Implement store() method.
    }

    public function show($id)
    {
        // TODO: Implement show() method.
    }

    public function edit($id)
    {
        $voo = Voo::find([$id]);
        View::make('voo.edit', ['voo' => $voo]);
    }
    public function finish($id)
    {
        $voo = Voo::find([$id]);
        $voo->estado = "Finalizado";
        if($voo->is_valid()){
            $voo->save();
            Redirect::toRoute('voo/index');
        }

    }


    public function update($id)
    {
        $voo = Voo::find([$id]);
        $voo->update_attributes(Post::getAll());

        if($voo->is_valid()){
            $voo->save();
            Redirect::toRoute('voo/index');
        } else {
            //redirect to form with data and errors
            Redirect::flashToRoute('voo/edit', ['voo' => $voo]);
        }
    }

    public function destroy($id)
    {
        $voo = Voo::find([$id]);
        $escala = Escala::count(array('conditions' => array('id_voos = ?', $id)));
        if($escala == 0){

            $voo->delete();

    }
        Redirect::toRoute('voo/index');
    }
}