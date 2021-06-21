<?php
use ArmoredCore\Controllers\BaseController;
use ArmoredCore\WebObjects\Post;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\View;
use ArmoredCore\Interfaces\ResourceControllerInterface;

class   AeroportoController extends BaseController implements ResourceControllerInterface
{


    /**
     * @return Returns
     */
    public function create()
    {
        $user = \ArmoredCore\WebObjects\Session::get('role');
        if ($user == 'admin'){
        $aeroporto = Aeroporto::all();
        View::make('aeroporto.create', ['aeroporto' => $aeroporto]);

    }else{
            Redirect::toRoute('home/index');
        }
    }
    public function createA()
    {
        $aeroporto = new Aeroporto();
        $last = Aeroporto::last();

        $aeroporto->nome = Post::get('nome');
        $aeroporto->id = $last->id + 1;

        if($aeroporto->is_valid()){
            $aeroporto->save();
            Redirect::toRoute('aeroporto/index');
        } else {
            Redirect::ToRoute('aeroporto/create');
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
    public function show($id)
    {
        // TODO: Implement show() method.
    }

    /**
     * @param $id
     * @return mixed
     */
    public function edit($id)
    {
        $user = \ArmoredCore\WebObjects\Session::get('role');
        if ($user == 'admin'){

        $aeroporto = Aeroporto::find([$id]);
        View::make('aeroporto.edit', ['aeroporto' => $aeroporto]);
        }else{
Redirect::toRoute('home/index');
}
    }

    /**
     * @param $id
     * @return mixed
     */
    public function update($id)
    {
        $aeroporto = Aeroporto::find([$id]);
        $aeroporto->update_attributes(Post::getAll());

        if($aeroporto->is_valid()){
            $aeroporto->save();
            Redirect::toRoute('aeroporto/index');
        } else {
            //redirect to form with data and errors
            Redirect::flashToRoute('aeroporto/edit', ['aeroporto' => $aeroporto]);
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $aeroporto = Aeroporto::find([$id]);
        $aeroporto->delete();
        Redirect::toRoute('aeroporto/index');
    }

    /**
     * @return Returns
     */
    public function index()
    {
        $user = \ArmoredCore\WebObjects\Session::get('role');
        if ($user == 'admin'){

        $aeroporto = Aeroporto::all();
        View::make('aeroporto.index', ['aeroporto' => $aeroporto]);
        }else{
Redirect::toRoute('home/index');
}
    }
    public function search($value)
    {
        $escala = Escala::find(array('referencia'=> $value));
        var_dump($escala);
        die;
        $escala = Escala::all();
        View::make('escala.index', ['escala' => $escala]);
    }
}