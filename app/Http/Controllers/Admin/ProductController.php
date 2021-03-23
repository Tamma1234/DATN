<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
  public function index()
  {
    $products = Product::all();
    return view('admin.product.index', compact('products'));
  }
  public function create(Request $request, Product $users)
  {
    $products = Product::all();
    return view('admin.product.create', compact('products'));
  }

  public function delete(Request $request)
  {
    $product = Product::find($request->id);

    Storage::disk('public')->delete($product->images);
    if (!$product) {
        return redirect()->route('product.index')->with('msg', 'Người dùng không tồn tại');
    } else {
        $product->delete();
        return redirect()->route('product.index')->with('msg', 'Xóa người dùng thành công');
    }

  }

  public function store(Request $request)
  {
    $products = new Product();
    $data = $request->all();
    if ($request->hasFile('images')) {
      $originalFileName = $request->images->getClientOriginalName();
      $fileName = uniqid() . '_' . str_replace(' ', '_', $originalFileName);
      $data['images'] = $request->file('images')->storeAs('user_image', $fileName, 'public');
    }
    $products->fill($data);
    $products->save();
    return redirect()->route('product.index')->with('msg', 'Thêm sản phẩm thành công');
  }

  public function edit(Request $request, Product $users)
  {
    $products = Product::find($request->id);
    if(!$products){
      return redirect()->route('product.index')->with('msg','Sản phẩm không tồn tại');
    }
    else{
      return view('admin.product.edit',compact('products'));
    }
  }

  public function update(Request $request)
  {
    $products = Product::where('id',$request->id)->first();
    $data = $request->except('_token');
    if ($request->hasFile('images')) {
      Storage::disk('public')->delete($products->images);
      $originalFileName = $request->images->getClientOriginalName();
      $fileName = uniqid() . '_' . str_replace(' ', '_', $originalFileName);
      $data['images'] = $request->file('images')->storeAs('user_image', $fileName, 'public');
  }
    $products = Product::where('id',$request->id)->update($data);
    return redirect()->route('product.index')->with('msg', 'Sửa sản phẩm thành công');
  }
}
