<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use App\Http\Requests\AddUserRequestAdmin;

use App\Http\Requests;

use App\User ;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all();
        return view('admin.users.index')->with('users',$users) ;   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


          return view('admin.users.add') ;   
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddUserRequestAdmin $request , User $user)
    {
        $user->create([
            'name'=>$request->name ,
            'email'=>$request->email,
            'admin'=>$request->admin,
            'userDisc'=>$request->userDisc,
            'password'=>bcrypt($request->password),
        ]);

        return redirect('adminpanel/users')->withFlashMessage('تم تسجيل المستخدم بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::find($id);

        return view('admin.users.edit')->with('users',$users);
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
        $userUpdate = User::find($id);
        $userUpdate->fill($request->all())->save();
        return Redirect::back();
    }

    public function UpdatePassword(Request $request , User $user)
    {
        $userupdate = $user->find($request->users_id);
        $password = bcrypt($request->password);
        $userupdate->fill(['password'=>$password])->save();
        return Redirect::back()->withFlashMessage('تم تغيير الباسورد بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
