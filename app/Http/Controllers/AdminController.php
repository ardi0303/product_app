<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    function dashboard(){
        $countProduct = Product::countData();
        $countProductActive = Product::countDataActive();
        $countUser = User::countData();
        $countUserActive = User::countDataActive();
        $data = Product::latest()->take(10)->get();
        return view('admin.dashboard', compact('countProduct', 'countProductActive', 'countUser', 'countUserActive', 'data'));
    }
    function customer() {
        $data = User::where('usertype', 'user')->get();
        return view('admin.customer', compact('data'));
    }
    function product(){
        $data = Product::all();
        return view('admin.product', compact('data'));
    }
    function add_product(){
        return view('admin.addproduct');
    }
    function insert_product(Request $request){
        $data = Product::create($request->all());
        if($request->hasFile('photo')){
            $request->file('photo')->move('productphoto/', $request->file('photo')->getClientOriginalName());
            $data->photo = $request->file('photo')->getClientOriginalName();
            $data->save();
        }
        return redirect()->route('products');
    }
    function edit_product($id){
        $data = Product::where('id_product', $id)->first();
        // dd($data); 
        return view('admin.editproduct' , compact('data'));
    }

    public function update_product(Request $request, $id){
        $data = Product::find($id);
        $data->name = $request->input('name');
        $data->price = $request->input('price');
        $data->stock = $request->input('stock');
        $data->description = $request->input('description');
        if($request->hasFile('photo')){
            $destination = 'productphoto/'.$data->photo;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $request->file('photo')->move('productphoto/', $request->file('photo')->getClientOriginalName());
            $data->photo = $request->file('photo')->getClientOriginalName();
        }
        $data->update();
        return redirect()->route('products');
    }


    function delete_product($id){
        $data = Product::where('id_product', $id)->first();
        $data->delete();
        return redirect()->route('products');
    }

    public function editUserStatus($id){
        $user = User::find($id);

        if (!$user) {
            return redirect()->back()->with('error', 'User not found');
        }
        $user->status = ($user->status == 'Aktif') ? 'Non Aktif' : 'Aktif';
        $user->save();
        return redirect()->back()->with('success', 'User status updated successfully');
    }
}
