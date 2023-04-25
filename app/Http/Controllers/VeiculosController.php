<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class VeiculosController extends Controller
{

    public function create()
    {
        return view('Veiculos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Modelo' => 'required|max:120',
            'Marca' => 'required|max:20',
            'Ano' => 'required|max:10',
            'Cor' => 'required|max:20',
            'Placa' => 'required|unique:veiculos|max:10',
            'fotoveiculo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'user_id' => 'required|exists:users,id'
        ]);
        $veiculo = Veiculo::create($request->all());

        if ($request->hasFile('fotoveiculo')) {
            $image = $request->file('fotoveiculo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/veiculos', $filename);
            $veiculo->fotoveiculo = $filename;
        }

        $veiculo->save();
        return redirect()->route('veiculos.index')
            ->with('success', 'Veículo criado com sucesso.');
    }


    public function index()
    {
        // $veiculos = Veiculo::with('user')->get();
        $user_id = Auth::id();

        // Obtém apenas os veículos do usuário logado
        $veiculos = Veiculo::where('user_id', $user_id)->get();
        $Contveiculos = Veiculo::where('user_id', $user_id)->get()->count();
        if ($Contveiculos == 0) {
            return redirect()->route('veiculos.create');
        } else {
            return view('Veiculos.index', compact('veiculos'));
        }
    }

    public function show(Veiculo $veiculo)
    {
        return view('veiculos.show', compact('veiculo'));
    }


    public function edit(Request $request, $id)
    {
        $veiculo = Veiculo::find($id);
        return view('veiculos.update', compact('veiculo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'Modelo' => 'required|max:120', // Erro: O campo Modelo é obrigatório
            'Marca' => 'required|max:20',
            'Ano' => 'required|max:10',
            'Cor' => 'required|max:20',
            'Placa' => 'required|max:10', 'max:10',
            'fotoveiculo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'user_id' => 'required|exists:users,id'
        ]);

        $veiculo = Veiculo::find($id);
        $veiculo->update($request->all());

        // Verifica se o Request contém uma imagem a ser atualizada
        if ($request->hasFile('fotoveiculo')) {
            // Armazena a nova imagem na pasta public/veiculos
            $image = $request->file('fotoveiculo');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('public/veiculos', $filename);
            $veiculo->fotoveiculo = $filename;
        }

        // Salva as alterações no modelo Veiculo
        $veiculo->save();

        return redirect()->route('veiculos.index')
            ->with('success', 'Veículo atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $veiculo = Veiculo::find($id);
        $veiculo->delete();
        return redirect()->route('veiculos.index')
            ->with('success', 'Veículo excluído com sucesso.');
    }
}
