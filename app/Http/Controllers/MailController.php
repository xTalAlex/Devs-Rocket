<?php

namespace App\Http\Controllers;

use App\Models\Mail as DBMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailOfRequest;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $notification_type="success";
        $notification_message="Email Inviata!";

        $validated=$request->validate([
                'name' => 'required|string|alpha_spaces',
                'email' => 'required|email',
                'message' => 'required|string|max:1000',
                'attachment' => 'nullable|mimetypes:application/zip,image/jpeg,application/pdf|max:10240',
            ]);

        $user=\App\Models\User::where('email',$validated['email'])->first();

        $mail=DBMail::create([
            'user_id'   => $user ? $user->id : null,
            'full_name' => $user ? $user->full_name : $validated['name'],
            'email'     => $validated['email'],
            'message'   => $validated['message'],
        ]);

        if($mail){
            if($validated['attachment'] ?? false){
                try{
                    $name=$validated['attachment']->getClientOriginalName();
                    $mail->addMediaFromRequest('attachment')->usingFileName($name)->toMediaCollection('attachment','local');
                }
                catch (\Exception $e) {
                    $notification_type="warning";
                    $notification_message="Email inviata, ma l'allegato é andato perso.";
                }
            }

            if(env('MAIL_FROM_ADDRESS', false))
                Mail::to(env('MAIL_FROM_ADDRESS'))->send(new MailOfRequest($mail));
        }
        else{
            $notification_type="error";
            $notification_message="Errore durante l'elaborazione della mail.";
        }

        return back()->flash($notification_type, $notification_message);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function show(Mail $mail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function edit(Mail $mail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mail $mail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mail  $mail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mail $mail)
    {
        //
    }
}
