<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsersRequest;
use App\Http\Requests\UsersUpdateRequest;
use App\Models\Photo;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view('admin.users.index',compact('users'));}
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::pluck('name','id')->all();
        return view('admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsersRequest $request)
    {
        if(trim($request->password)==''){
            $input=$request->except('password');
        }else{
            $input=$request->all();
            $input['password']=bcrypt($request->password);
        }
        $input=$request->all();
        if($file=$request->file('photo_id')){
            $name=time().$file->getClientOriginalName();
            $file->move('images',$name);
            $photo=Photo::create(['file'=>$name]);
            $input['photo_id']=$photo->id;}
        $input['password']=bcrypt($request->password);
        User::create($input);
        return redirect('/admin/users');
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
        $user=User::findOrFail($id);
        $user['password']=bcrypt($user->password);
        $roles=Role::pluck('name','id')->all();
        return view('admin.users.edit',compact('user','roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsersUpdateRequest  $request, $id)
    {
        $user=User::findOrFail($id);
        $input=$request->all();
         if(trim($request->password)==''){
            $input=$request->except('password');
        }else{
            $input=$request->all();
            $input['password']=bcrypt($request->password);
        }

            if($file=$request->file('photo_id')){

$name=time().$file->getClientOriginalName();
$file->move('images',$name);
$photo=Photo::create(['file'=>$name]);
$input['photo_id']=$photo->id;
    }

$user->update($input);
        return redirect('/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)

    {
        $user=User::findOrFail($id);
        unlink(public_path().$user->photo->file);
    $user->delete();
       Session::flash('deleted_user','user has been successfully deleted');
       return redirect('/admin/users');
    }
}
