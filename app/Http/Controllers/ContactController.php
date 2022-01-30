<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function saveContacts(Request $request){

        $contact = Contact::where(['email'=>$request->email])->first();

        if(empty($contact)){
            Contact::create([
                'name'=>$request->name,
                'email'=>$request->email,
                'phone'=>$request->phone,
                'message'=>$request->message

            ]);
            dd('Contacto guardado en la base de datos'); //cambar por un return
        }
        else{
            dd('el usuario ya existe'); //cambiar por un return
        }
    }
}
