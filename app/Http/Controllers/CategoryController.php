<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
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
        $categories = Category::All();

        return view('category',['categories'=> $categories]);
    }

    public function getList()
    {
        $categories= Category::select('id','name','thumbnail' ,'slug','description');
        return datatables()->of($categories)
            ->addColumn('action', function($category){
                return ' <button data-title="show" categoryId="'. $category->id .'" data-toggle="modal" data-target="#show" class="btn btn-info show"><i class="fas fa-eye"></i></button>
                    <button data-title="edit" categoryId="'. $category->id .'" data-toggle="modal" data-target="#edit" class="btn btn-sm btn-primary edit"><i class="fas fa-edit"></i> </button>
                    <button categoryId="'. $category->id .'" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>';

            })
        // // ->addColumn('photo', function($categorie){
        // //     return '<img class="img-fluid" src="'. $categorie->avatar .'">';
        // // })
        ->rawColumns(['action'])
        ->toJson();
    }

    public function show($id){
        $categories= Category::find($id);
        return response()->json($categories);
    }
    public function store(CreateRequestcategorie $resq){
        $data=$resq->all();

        $category= new Category;
        $category->name=$data['name'];
        $category->email=$data['email'];
        $category->password=$data['password'];
        
        $category->save();

        return redirect('admin/dashboard')->with('flag','Success. You have added a categorie');
    }
    public function destroy($id)
    {
        categorie::find($id)->delete();
        return response()->json(['eror'=>false]);
    }
}
