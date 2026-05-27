<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $datauser = User::all();
        return view('user.index',compact('datauser'));


    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required|string|max:255',
            'email' => 'required|unique:users',
            'password'=> 'required|min:3',
            'role' => 'required'
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('user.index');
    }

    public function edit($id)
    {
        $dataedituser = User::find($id);
        return view ('user.edit',compact('dataedituser'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'nama' => 'required|string|max:255',
            'email' => 'required|unique:users',
            'password'=> 'required|min:3',
            'role' => 'required'
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        return redirect()->route('user.index');
    }

    public function destroy($id)
    {
        User::where('user_id',$id)->delete();
       return redirect(route('user.index'));
        
    }
}
