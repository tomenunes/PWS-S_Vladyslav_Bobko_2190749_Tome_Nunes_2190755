<?php
use ArmoredCore\Controllers\BaseController;
use ArmoredCore\WebObjects\View;
use ArmoredCore\Interfaces\ResourceControllerInterface;

class AviaoController extends BaseController implements ResourceControllerInterface
{


    /**
     * @return Returns
     */
    public function create()
    {
        // TODO: Implement create() method.
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
        // TODO: Implement edit() method.
    }

    /**
     * @param $id
     * @return mixed
     */
    public function update($id)
    {
        // TODO: Implement update() method.
    }

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }

    /**
     * @return Returns
     */
    public function index()
    {

        $aviao = Aviao::all();
        View::make('aviao.index', ['aviao' => $aviao]);
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