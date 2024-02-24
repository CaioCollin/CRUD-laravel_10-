<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public readonly User $User;

    public function __construct(){
        $this->User = new User();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = $this->User->all();
        return view('users' , ['users' => $users ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('user_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $created = $this->User->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' =>password_hash($request->input('password'), PASSWORD_DEFAULT),

        ]);

        if($created){
            return redirect()->back()->with('message', 'Successfully Create');
        }
        
        return redirect()->back()->with('message', 'Error create');
        

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('user_show' , ['User' => $user ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('user_edit' , ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $user = $this->User->find($id);

        // Verifica se o usuário foi encontrado
        if (!$user) {
            return redirect()->back()->with('message', 'User not found');
        }

        // Atualiza os dados do usuário
        $update = $user->update($request->except(['_token', '_method']));
        
        // Verifica se a atualização foi bem sucedida
        if($update){
            return redirect()->back()->with('message', 'Successfully updated');
        } else {
            return redirect()->back()->with('message', 'Error updating');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->User->where('id', $id)->delete();

        return redirect()->route('user.index');
    }
}
