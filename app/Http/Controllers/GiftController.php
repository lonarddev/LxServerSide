<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Gift;
use Illuminate\Http\Request;

class GiftController extends Controller
{
    //Mostrar todas as prendas
    public function allGifts() {
        $gifts = Gift::with('user')->get();

        return view('gifts.all_gifts', compact('gifts'));
    }

    // Guardar uma nova prenda
    public function storeGift(Request $request){

    //Validar os dados recebidos
    $giftData = $request->validate([
        'name' => 'required|string|max:255',
        'expected_value' => 'required|numeric|min:0',
        'user_id' => 'required|exists:users,id',
        'spent_value' => 'nullable|numeric|min:0'
    ]);

    // Inserir os dados na tabela gifts
    Gift::create($giftData);

    // Regressar à lista de prendas
    return redirect()->route('gifts.all')->with('success', 'Prenda adicionada com sucesso!');
    }

    // Apresentar o formulário para adicionar uma prenda
    public function addGift(){

    $users = User::select('id', 'name')->get();

    return view('gifts.add_gift', compact('users'));
    }

    // Apresentar os dados de uma gift para editar
    public function editGift(int $id){

    $gift = Gift::findOrFail($id);

    $users = User::select('id', 'name')->get();

    return view('gifts.edit_gift', compact('gift', 'users'));
    }

    //Actualizar uma prenda existente
    public function updateGift(Request $request, int $id){

    // Validar os dados recebidos
    $giftData = $request->validate([
        'name' => 'required|string|max:255',
        'expected_value' => 'required|numeric|min:0',
        'user_id' => 'required|exists:users,id',
        'spent_value' => 'nullable|numeric|min:0'
    ]);

    // Procurar a gift
    $gift = Gift::findOrFail($id);

    // Actualizar os dados
    $gift->update($giftData);

    // Regressar à lista all_gifts
    return redirect()->route('gifts.all')->with('success', 'Prenda atualizada com sucesso!');
    }

    public function deleteGift(int $id){

    // Procurar a gift através do ID
    $gift = Gift::findOrFail($id);

    // Eliminar a gift
    $gift->delete();

    // Regressar à lista de gifts
    return redirect()->route('gifts.all')->with('sucess', 'Prenda eliminada com sucesso!');
    }
}
