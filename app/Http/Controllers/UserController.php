<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return view('profile',[
            'socials' => \App\Models\Social::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user=auth()->user();

        $validated = $request->validate([
            'newAvatar' => 'nullable|image',
            'removeAvatar' => 'nullable|boolean',
            'biography' => 'nullable|string'
        ]);

        if($validated['newAvatar'] ?? false){
            $user->clearMediaCollection('avatar');
            $name=$user->id.'_avatar';
            $ext=$validated['newAvatar']->getClientOriginalExtension();
            $user->addMediaFromRequest('newAvatar')->usingName($name)->usingFileName($name.'.'.$ext)->toMediaCollection('avatar');
        }
        if($validated['removeAvatar']){
            $user->clearMediaCollection('avatar'); 
        }

        $user->update([
            'biography' => $validated['biography'],
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
