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
    public function show(User $user=null)
    {
        if(!$user){
            if(auth()->user())
                $user=auth()->user();
            else
                return redirect()->route('login');
        }


        return view('profile',[
            'user' => $user,
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
        $validated = $request->validate([
            'newAvatar' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:1000',
            'removeAvatar' => 'nullable|boolean',
            'biography' => 'nullable|string|max:300',
            'socials' => 'required|array',
            'socials.*.id' => 'required|exists:socials,id',
            'socials.*.description' => 'required|exists:socials,description',
            'socials.*.link' => 'nullable|string',
        ]);

        if($validated['newAvatar'] ?? false){
            try{
                $name=auth()->user()->id.'_avatar';
                $ext=$validated['newAvatar']->getClientOriginalExtension();
                auth()->user()->addMediaFromRequest('newAvatar')->usingName($name)->usingFileName($name.'.'.$ext)->toMediaCollection('avatar');
            }
            catch(\Throwable $e){
                report($e);
            }
        }
        if($validated['removeAvatar']){
            auth()->user()->clearMediaCollection('avatar'); 
        }

        $sync_data = [];     
        foreach($validated['socials'] as $social){
            if($social['link'])
               $sync_data[$social['id']] = ['link' => $social['link']];
        }
        auth()->user()->socials()->sync($sync_data);

        auth()->user()->update([
            'biography' => $validated['biography'] ?? null,
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
