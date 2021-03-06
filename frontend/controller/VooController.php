<?php

use ArmoredCore\Controllers\BaseController;
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
        View::make('voo.index', ['voos' => $voos]);

    }

    /**
     * @inheritDoc
     */
    public function create()
    {
        // TODO: Implement create() method.
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
        // TODO: Implement edit() method.
    }

    public function update($id)
    {
        // TODO: Implement update() method.
    }

    public function destroy($id)
    {
        // TODO: Implement destroy() method.
    }
}