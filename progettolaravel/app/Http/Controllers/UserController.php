<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\{LoginRequest, SignupUserRequest};
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Hash};

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
        return view('user.signup');//
    }

    //autenticare utente
    public function login(Loginrequest $request)
    {
        // se la richiesta è in get, mostra il login form
        if($request->isMethod('get')){
            return view('user.login');
        }

        $isLogged = Auth::attempt([//ci da un booleano, riuscita o fillimento dell'autenticazione
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ]);

        return $isLogged ? redirect('/dashboard') : view('user.login', [
            'error' => true
        ]);
    }

    // public function login(Loginrequest $request)
    // {
    //     // se la richiesta è in get, mostra il login form
    //     if($request->isMethod('get')){
    //         return view('user.login');
    //     }

    //     //se non entro nell'if del GET, il metodo è POST, proseguo con la registarzione utente
    //     // cerco l'utente facendo un secondo if:
    //     $user = User::findByEmail($request->input('email'));

    //     if(!$user){
    //         return view('user.login', []);
    //     }

    //     if(Hash::check($request->input('password'), $user->password)){ // controllo elemento request (in chiaro, non sotto forma di Hash) con la password Hash
    //         Auth::user($user);

    //         //aggiungere redirect
    //     }
    //     //ritorna al form perchè email / password non son validi
    //     // altrimenti torna al form perche email o password non validi
    // }

     public function signup(SignupUserRequest $request)
    {
        $user = new User();
        $user->email = $request->input('email');
        $user->name = $request->input('name');
        $user->password = Hash::make($request->input('password'));

        $user->save();

        return view('user.signup-success');
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
    public function show(User $user)
    {
        //
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
    public function update(Request $request, User $user)
    {
        //
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
