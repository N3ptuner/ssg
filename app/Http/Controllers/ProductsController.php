<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Product;

class ProductsController extends Controller
{
    public function store(Request $request)
    {
//        $this->validate($request, [
//            'product_name' => 'required',
//            'introduction' => 'required|max:100',
//            'cover' => 'image',
//            'classification' => ['required', Rule::in(['game', 'music', 'picture', 'tool'])],
//            'files' => 'file',
//        ]);
//
//        $product = Product::create([
//           'created_at' => now(),
//           'updated_at' => now(),
//           'name' => $request->product_name,
//           'introduction' => $request->introduction,
//           'cover' => '#',
//           'classification' => $request->classification,
//           'files' => '#',
//            'tag_list' => '#'
//        ]);
//
//
//
//
//        session()->flash('info', '创建项目成功！');
//        return redirect()->route('users.projects', [Auth::user()]);
    }

    public function index()
    {
        return 'index pages';
    }

}
