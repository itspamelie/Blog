<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function getUsers(){
        //SELECT * FROM USERS
        $data = User:: all();
       // dd($data);
       return view("admin.users")->with('usuarios',$data);
    }

    //Al recibir datos por POST se usa el request
    public function createUsers(Request $request){
       //dd($request->email);
       //REGLAS DE VALIDACION
       $request->validate([
        "name"=>'required',
        "nickname"=>'required|min:3|unique:users,nickname',
        //Unico de la tabla usuarios, el campo email
        "email"=>'required|email|unique:users,email',
        "password"=>'required|min:4',
        "password-confirm"=>'required|min:4|same:password',
       ]);
       //GUARDAR REGISTRO
       $user = new User();
       $user->name=$request->name;
       $user->email=$request->email;
       $user->password=Hash::make($request->password);
       $user->nickname=$request->nickname;
       $user->img='default.jpg';
       $user->save();

       return redirect()
            ->back()
            ->with('success','Registro insertado correctamente.');
    }

}
