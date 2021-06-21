<?php


use ArmoredCore\WebObjects\Post;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\View;

class PassagemVendaController extends \ArmoredCore\Controllers\BaseController implements \ArmoredCore\Interfaces\ResourceControllerInterface
{

    /**
     * @inheritDoc
     */
    public function index()
    {

        $passagem = PassagemVenda::all();
        $user = User::all();

        View::make('passagemvenda.index', ['passagem' => $passagem,'cliente' => $user]);
    }

    /**
     * @inheritDoc
     */
    public function create()
    {
        View::make('passagemvenda.create');
    }
    public function createA()
    {
        $passagem = new PassagemVenda();
        $passagem->referencia = Post::get('referencia');
        $passagem->lotacao = Post::get('lotacao');
        $passagem->tipo_aviao = Post::get('tipo_aviao');

        if($passagem->is_valid()){
            $passagem->save();
            Redirect::toRoute('passagemvenda/index');
        } else {
            Redirect::ToRoute('passagemvenda/create');
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
        $passagem = PassagemVenda::find([$id]);
        $voo = Voo::all();
        $p = PassagemVenda::all();
        View::make('passagemvenda.edit', ['passagem' => $passagem , 'voo' => $voo, 'passagemtotal' =>  $p]);
    }
    public function checkin($id)
    {
        $passagem = PassagemVenda::find([$id]);
        $passagem->checkin = 1;
        if($passagem->is_valid()){
            $passagem->save();
            Redirect::toRoute('passagemvenda/index');
        }
    }

    public function update($id)
    {
        $passagem = PassagemVenda::find([$id]);
        $passagem->update_attributes((array)Post::getAll());

        if($passagem->is_valid()){
            $passagem->save();
            Redirect::toRoute('passagemvenda/index');
        } else {
            //redirect to form with data and errors
            Redirect::flashToRoute('passagemvenda/edit', ['passagemvenda' => $passagem]);
        }
    }

    public function destroy($id)
    {
        $passagem = PassagemVenda::find([$id]);
        if($passagem->delete()){
            Redirect::toRoute('passagemvenda/index');

        }else{
            Redirect::toRoute('passagemvenda/index');

        }
    }
}