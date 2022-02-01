<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function saveContacts(Request $request){

        //$contact = Contact::where(['email'=>$request->email])->first();

        try{
            if(isset($request['name'], $request['email'], $request['phone'], $request['message'])){
                Contact::create([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'phone'=>$request->phone,
                    'message'=>$request->message

                ]);

                $details = [
                    'name' => 'Contact Name: ' . $request->name,
                    'email' => 'Contact Email: ' . $request->email,
                    'phone' => 'Phone: ' . $request->phone,
                    'message' => 'Message: ' . $request->message
                ];
            }
            else{
                return('el usuario ya existe'); 
            }
        }
        catch(Exception $error){
            return($error);
        }

        
        \Mail::to('example@example.com')->send(new \App\Mail\sendContact($details));

        return('El contanto se guardo correctamente');
    }
}
