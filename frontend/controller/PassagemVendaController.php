<?php


use ArmoredCore\Controllers\BaseController;
use ArmoredCore\Interfaces\ResourceControllerInterface;
use ArmoredCore\WebObjects\Post;
use ArmoredCore\WebObjects\Redirect;
use ArmoredCore\WebObjects\Session;
use ArmoredCore\WebObjects\View;
use Dompdf\Dompdf;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;
use NcJoes\OfficeConverter\OfficeConverter;
use PhpOffice\PhpWord\TemplateProcessor;

class PassagemVendaController extends BaseController implements ResourceControllerInterface
{

    /**
     * @inheritDoc
     */
    public function index()
    {

        $passagem = PassagemVenda::all();
        View::make('passagemvenda.index', ['passagem' => $passagem]);
    }
    public function indexPurchase($id)
    {

        $voo = Voo::all([$id]);
        View::make('purchase.index', ['voo' => $voo]);
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
        $cliente =User::all();
        $aeroporto =Aeroporto::all();
        $aviao =Aviao::all();
        $passagem = PassagemVenda::find([$id]);
        $escala = Escala::all(array('conditions' => array('id_voos = ?', $passagem->id_voos)));
        View::make('passagemvenda.show', ['passagem' => $passagem,'cliente' => $cliente,'aeroporto' => $aeroporto,'escala' => $escala,'aviao' => $aviao]);
    }

    /*  if(Session::has('user')){

            $user = Session::get('user');
            $cliente = User::all();
        $passagem = PassagemVenda::all(array('conditions' => array('id_utilizador = ?', $user->id)));

        View::make('user.historico', ['passagem'=>$passagem, 'cliente' => $cliente]);
          }else{
            Redirect::toRoute("home/login");
        }*/

    public function edit($id)
    {
        // TODO: Implement edit() method.
    }
    public function purchase()
    {
        $user = Session::get('user');
        $passagem = new PassagemVenda();
        $total = PassagemVenda::last();
        $total = $total->id +1;
        $voo = Voo::find([Post::get('id_voo')]);
        $passagem->id = $total;
        $passagem->id_voos = Post::get('id_voo');
        $passagem->id_utilizador = $user->id;
        $passagem->tipo_bilhete = Post::get('tipo_bilhete');
        $passagem->preco = Post::get('preco');

        if ($passagem->is_valid()) {
            $passagem->save();

            $passagem = PassagemVenda::first(array('conditions' => array('id = ?', $total)));
            $passageiro = User::first(array('conditions' => array('id = ?', $passagem->id_utilizador)));

            $aeroporto = Aeroporto::all();

foreach ($aeroporto as $aeroportos){
    if($aeroportos->id == $voo->id_aeroporto_inicial){
        $nomeaeroportoinicial=$aeroportos->nome;
    }
    if($aeroportos->id == $voo->id_aeroporto_final){
        $nomeaeroportofinal=$aeroportos->nome;
    }
}
        $templateProcessor = new TemplateProcessor('../frontend/bilhetes/template/ticket_aviao_template.docx');

        $templateProcessor->setValue('origem', $nomeaeroportoinicial);
        $templateProcessor->setValue('destino', $nomeaeroportofinal);
        $templateProcessor->setValue('id_voo', $voo->id);
        $templateProcessor->setValue('id', $voo->id);
        $templateProcessor->setValue('tipo_voo', $passagem->tipo_bilhete);
        $templateProcessor->setValue('escala', $voo->escalas_total);
        $templateProcessor->setValue('time', $voo->data_final->format('H:i:s'));
        $templateProcessor->setValue('nome_passageiro', $passageiro->nome);
        $templateProcessor->saveAs('../frontend/bilhetes/ticket'. $passageiro->id.'ticket'. $passagem->id .'.docx');
       Redirect::toRoute('user/historico');
        } else {
            Redirect::toRoute('home/perfil');
        }
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