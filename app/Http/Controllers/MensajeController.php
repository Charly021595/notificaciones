<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mensaje;
use App\Models\User;

use App\Notifications\MensajeEnviado;

class MensajeController extends Controller
{
    public function show(Mensaje $mensaje){
        return view('mensajes.show', compact('mensaje'));
    }

    public function store(Request $request){
        $request->validate([
            'asunto' => 'required|min:10',
            'mensaje' => 'required|min:10',
            'to_user_id' => 'required|exists:users,id', 
        ]);

        $mensaje = Mensaje::create([
            'subject' => $request->asunto,
            'body' => $request->mensaje,
            'from_user_id' => auth()->id(),
            'to_user_id' => $request->to_user_id
        ]);

        $user = User::find($request->to_user_id);
        $user->notify(new MensajeEnviado($mensaje));

        $request->session()->flash('flash.banner', 'Tu mensaje fue enviado');
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect()->back();
    }
}
