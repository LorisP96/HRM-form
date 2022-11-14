<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Form;
use Illuminate\Support\Facades\Validator;

class FormController extends Controller
{
    public function store(Request $request) {
        $data = $request->all();

        // validazione
        $validator = Validator::make($data, [
            'user_name' => 'required|max:255',
            'user_surname' => 'required|max:255',
        ]);

        // se l'utente non rispetta la validazione ritorno false e stampo gli errori
        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }
        
        // altrimenti salvo i campi nel database
        $new_input = new Form();
        $new_input->fill($data);
        $new_input->save();

        return response()->json([
            'success' => true
        ]);
    }
}
