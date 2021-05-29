<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactUsFormController extends Controller
{
    // Create Contact Form
    public function createForm(Request $request){
        return view('contact');
    }

    // Store Contact Form data
    public function ContactUsForm(Request $request){

        // Form validation
        $this->validate($request, [
            'nombre' => 'required',
            'email' => 'required|email',
            'telefono' => 'required',
            'asunto' => 'required',
            'mensaje' => 'required',
        ]);

        // Store data in database
        Contact::create($request->all());

        // Send mail to admin
        \Mail::send('mail', array(
            'nombre' => $request->get('nombre'),
            'email' => $request->get('email'),
            'telefono' => $request->get('telefono'),
            'asunto' => $request->get('asunto'),
            'user_query' => $request->get('mensaje'),
        ), function ($message) use ($request){
            $message->from($request->email);
            $message->to('wdeleonl8@miumg.edu.gt', 'Sinder20')->subject($request->get('asunto'));
        });

        return back()->with('success', 'Hemos recibido tu mensaje. Gracias por escribirnos!');
    }

}
