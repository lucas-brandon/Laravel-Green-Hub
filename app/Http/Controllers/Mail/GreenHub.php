<?php

//namespace App\Mail;
namespace App\Http\Controllers\Mail;

//namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;

use \Illuminate\Support\Facades\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use stdClass;

class GreenHub extends Mailable
{
    use Queueable, SerializesModels;

    private $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(stdClass $user)
    {
        //
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject($this->user->subject);
        $this->to($this->user->email, $this->user->name);
        
        return $this->markdown('mail.GreenHub', [
            'user' => $this->user,
        ]);
    }

    public function mail(Request $req)
    {
        //dd($req['email']);
        $user = new \stdClass();
        $user->name = $req['name'];
        $user->email = $req['email'];
        $user->msg = $req['msg'];
        $user->subject = $req['assunto'];
        //return response()->json($user);
        try{
            //$user->name = 'Nome';
            //$user->email = 'green.hub.suplementos@gmail.com';
            //$user->message

            $user->name = $req['name'];
            $user->email = $req['email'];
            $user->msg = $req['msg'];
            $user->subject = $req['assunto'];

            //return new GreenHub($user);
            Mail::send(
                new GreenHub($user)
            );
        }
        catch(\Exception $e){
            return response()->json($e->getMessage());
        }
    }
}
