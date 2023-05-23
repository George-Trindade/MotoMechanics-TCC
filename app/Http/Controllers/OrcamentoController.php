<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veiculo;
use App\Models\Orcamento;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class OrcamentoController extends Controller
{

    public function index()
    {
        $orcamentos = Orcamento::where(['user_id' => Auth::user()->id])->get();
        $veiculos = Veiculo::where(['user_id' => Auth::user()->id])->get();
        return view('Orcamentos.index', compact('orcamentos', 'veiculos'));
    }


    public function create()
    {
        $veiculos = Veiculo::where(['user_id' => Auth::user()->id])->get();
        return view('Orcamentos.create', compact('veiculos'));
    }


    public function store(Request $request)
    {
        // Validação dos campos do formulário
        $request->validate([
            'servico' => 'required',
            'descricao' => 'required',
            'veiculo_id' => 'required',
            'fotos.*' => 'image|mimes:jpeg,png,jpg|max:2048', // Validação das imagens (opcional)
        ]);
        if ($request->hasFile('fotos')) {
            foreach ($request->file('fotos') as $foto) {
                $filename = time() . $foto->getClientOriginalName() . '.' . $foto->getClientOriginalExtension();
                $destinationPath = public_path('assets/orcamentos/fotos');
                $caminho = $foto->move($destinationPath, $filename);
                $fotosProblema[] = [
                    'nome' => $filename,
                    'caminho' => $caminho,
                ];
            }
        }
        // Salvando os dados do formulário na tabela de orçamentos
        $orcamento = new Orcamento();
        $orcamento->servico = $request->input('servico');
        $orcamento->valor_total = 0; // Defina o valor total de acordo com a lógica desejada
        if ($request->hasFile('fotos')) {
            $orcamento->fotos_problema = json_encode($fotosProblema); // Converte as fotos em formato JSON
        }
        $orcamento->descricao_problema = $request->input('descricao');
        $orcamento->veiculo_id = $request->input('veiculo_id'); // Defina o ID do veículo apropriado
        $orcamento->user_id = auth()->user()->id; // Obtém o ID do usuário autenticado
        $orcamento->save();

        return redirect()->route('orcamentos.index');
    }

    public function show($id)
    {
        $orcamento = Orcamento::findOrFail($id);
        $veiculos = Veiculo::where(['user_id' => Auth::user()->id])->get();
        // Verifica se o usuário autenticado é o dono do orçamento
        if ($orcamento->user_id !== auth()->user()->id) {
            return redirect()->back()->with('error', 'Você não tem permissão para acessar este orçamento.');
        }

        if ($orcamento->fotos_problema == null) {
            $fotosProblema = [];
        } else {
            // Transforma as fotos do problema em um array de objetos
            $fotosProblema = json_decode($orcamento->fotos_problema);
        }
        return view('Orcamentos.show', compact('orcamento', 'fotosProblema', 'veiculos'));
    }

    public function edit($id)
    {
    }


    public function update(Request $request, $id)
    {
        // Validação dos campos do formulário
        $request->validate([
            'valor_total' => 'required|numeric',
        ]);

        // Obtém o orçamento existente pelo ID
        $orcamento = Orcamento::findOrFail($id);

        // Atualiza o valor total do orçamento
        $orcamento->valor_total = $request->input('valor_total');

        // Salva as alterações no banco de dados
        $orcamento->save();

        return redirect()->route('admin.listaOrcamentos');
    }



    public function destroy($id)
    {
        $orcamentos = Orcamento::find($id);
        $orcamentos->delete();
        return Redirect::route('orcamentos.index')->with('Deletado com sucesso!');
    }
}
