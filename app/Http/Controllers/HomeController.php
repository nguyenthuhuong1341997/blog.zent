<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests\CreateRequestUser;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');  //kiem tra dang nhap hay chua
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::All();

        return view('home',['users'=> $users]);
    }

    public function getList()
    {
        $users= User::select('id','name', 'email');
        return datatables()->of($users)
            ->addColumn('action', function($user){
                return ' <button data-title="show" userId="'. $user->id .'" data-toggle="modal" data-target="#show" class="btn btn-info show"><i class="fas fa-eye"></i></button>
                    <button data-title="edit" userId="'. $user->id .'" data-toggle="modal" data-target="#edit" class="btn btn-sm btn-primary edit"><i class="fas fa-edit"></i> </button>
                    <button userId="'. $user->id .'" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>';

            })
        // // ->addColumn('photo', function($user){
        // //     return '<img class="img-fluid" src="'. $user->avatar .'">';
        // // })
        ->rawColumns(['action'])
        ->toJson();
    }

    public function show($id){
        $users= User::find($id);
        return response()->json($users);
    }
    public function update(Request $request, $id){
        $users= User::find($id)->update($request->all());
        return response()->json("yes");
    }
    public function store(CreateRequestUser $resq){
        $data=$resq->all();

        $user= new User;
        $user->name=$data['name'];
        $user->email=$data['email'];
        $user->password=$data['password'];
        
        $user->save();
        return response()->json("yes");
        //return redirect('admin/dashboard')->with('flag','Success. You have added a user');
    }
    public function destroy($id)
    {
        User::find($id)->delete();
        return response()->json(['eror'=>false]);
    }
}
