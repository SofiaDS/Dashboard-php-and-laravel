<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\users;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function read() //read
    {
        $users = users::orderBy('id','ASC')->paginate(7);//->where() paginate fa già la paginazione
        return view('v1.crud.read',['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = new users();
        $user->name = $request->name;
        $user->email =$request->email;
        $user->password =$request->password;

        $user->save(); //salva la nuova pizza nel db
        return redirect('dashboard');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = users::find($id);
        return view('v1.crud.update',['users'=>$users]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = users::find($id);
        $user->name = $request->name;
        $user->email =$request->email;
        $user->password =$request->password;
        $user->save(); //salva la pizza nel db

        return redirect('dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)//delete
    {
        // $user = users::find($id)->delete();
        users::destroy($id);
        return redirect('dashboard');
    }
}
