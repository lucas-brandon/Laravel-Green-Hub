<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use http\Env\Response;
use \Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Mail\GreenHub;
use stdClass;

class AtendimentoController extends Controller
{
    //
    public function enviar(Request $req)
    {
        try
        {
            //$dados = $req->all();

            $user = new stdClass();
            $user->name = $req['name'];
            $user->email = "green.hub.suplementos@gmail.com";
            $user->msg = $req['msg'];
            $user->subject = $req['assunto'];

            Mail::to($req['email'])->send(new GreenHub($user));

            return response()->json("E-mail enviado!", 200);

            //return response()->json($this->classe::create($dados), 201);
        }
        catch(\Exception $e)
        {
            return response()->json($e->getMessage());
        }   
    }
}
