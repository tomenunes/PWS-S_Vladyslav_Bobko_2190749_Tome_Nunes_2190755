<?php
use ArmoredCore\Controllers\BaseController;
use ArmoredCore\WebObjects\Post;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\Session;
use ArmoredCore\WebObjects\View;
use ArmoredCore\Interfaces\ResourceControllerInterface;

class   AviaoController extends BaseController implements ResourceControllerInterface
{


    /**
     * @return Returns
     */
    public function create()
    {
        $user = Session::get('role');
        if ($user == 'admin'){

        View::make('aviao.create');
        }else{
Redirect::toRoute('home/index');
}
    }
    public function createA()
    {
        $aviao = new Aviao();
        $aviao->referencia = Post::get('referencia');
        $aviao->lotacao = Post::get('lotacao');
        $aviao->tipo_aviao = Post::get('tipo_aviao');

        if($aviao->is_valid()){
            $aviao->save();
            Redirect::toRoute('aviao/index');
        } else {
            Redirect::ToRoute('aviao/create');
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
        $user = Session::get('role');
        if ($user == 'admin' ||$user == 'gestorvoo' ){
        $aviao = Aviao::find([$id]);
        View::make('aviao.edit', ['aviao' => $aviao]);
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
        $aviao = Aviao::find([$id]);
        $aviao->update_attributes(Post::getAll());

        if($aviao->is_valid()){
            $aviao->save();
            Redirect::toRoute('aviao/index');
        } else {
            //redirect to form with data and errors
            Redirect::flashToRoute('aviao/edit', ['aviao' => $aviao]);
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $aviao = Aviao::find([$id]);
        if($aviao->delete()){

        }else{

        }
        Redirect::toRoute('aviao/index');
    }

    /**
     * @return Returns
     */
    public function index()
    {
        $user = \ArmoredCore\WebObjects\Session::get('role');
        if ($user == 'admin' ||$user == 'gestorvoo' ){

        $aviao = Aviao::all();
        View::make('aviao.index', ['aviao' => $aviao]);
        }else{
Redirect::toRoute('home/index');
}
    }
    public function search($value)
    {
        $aviao = Aviao::find(array('referencia'=> $value));
        var_dump($aviao);
        die;
        $aviao = Aviao::all();
        View::make('aviao.index', ['aviao' => $aviao]);
    }
}