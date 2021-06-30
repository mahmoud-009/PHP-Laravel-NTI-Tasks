<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */



    public function __construct(){

        $this->middleware('checkAuth',['except'  => ['create']]);

     }


    public function index()
    {
        //


        $data = Product::get();

            return view('product.index',['data' => $data ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('product.add');
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
        $data = $this->validate($request,[
            "name"  => "required|min:3",
            "desc" => "required|min:3",
            "price" => "required|min:5|max:10"
         ]);

        // $data['password'] = bcrypt($data['password']);

        $op =   Product::create($data);

        $message = "Error Try Again";

        if($op){
            $message = "Data Inserted";
        }


        session()->flash('message',$message);

        return redirect(url('/product'));






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
        //
        $data = Product::find($id)->toArray();
        return view('product.edit',['data' => $data]);

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
        //
        $data = $this->validate($request,[
            "name"  => "required|min:3",
            "desc" => "required|min:3",
            "price" => "required|min:3",

         ]);


         $op = Product::where('id',$id)->update($data);


         $message = "Error Try Again !!!";

         if($op){
             $message = "Data Updated";
         }

        session()->flash('message',$message);

         return redirect(url('/product'));




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
        $op = Product::find($id)->delete();

        $message = "Error in delete";

        if($op){
            $message = "User Removed";
        }
       session()->flash('message',$message);
        return back();
    }






}
