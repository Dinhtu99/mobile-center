<?php

namespace Modules\Admin\Http\Controllers;

use App\Http\Requests\AddProductRequest;
use App\Http\Requests\EditProductRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $product = Product::with('category:cate_id,cate_name')->with('brand:brand_id,brand_name')->paginate();
        $data['prodList'] = Product::all();
        return view('admin::product.index',$data);
    }
    public function getAdd(){
        $data['cateList'] = Category::all();
        $data['brandList'] = Brand::all();
        return view('admin::product.add',$data);
    }
    public function postAdd(AddProductRequest $request){
        $filename = $request->prod_img->getClientOriginalName();
        $product = new Product();
        
        $product->prod_name = $request->prod_name;
        $product->prod_slug = str_slug($request->prod_name);
        $product->prod_img = $filename;
        $product->prod_price = $request->prod_price;
        $product->prod_accessories = $request->prod_accessories;
        $product->prod_promotion = $request->prod_promotion;
        $product->prod_warranty = $request->prod_warranty;
        $product->prod_condition = $request->prod_condition;
        $product->prod_active = $request->prod_active;
        $product->prod_description = $request->prod_description;

        $product->prod_content = $request->prod_content;
        $product->prod_title_seo = $request->prod_title_seo ? $request->prod_title_seo : $request->prod_name;
        $product->prod_description_seo = $request->prod_description_seo ? $request->prod_description_seo : $request->prod_name;
        $product->prod_cate = $request->prod_cate;

        $product->prod_brand = $request->prod_brand;
        $product->prod_featured = $request->prod_featured;

        $product->save();
        $request->prod_img->storeAs('avatar',$filename);
        return back()->with('success','Thêm sản phẩm thành công');
    }
    public function getEdit($id){
        $data['product'] = Product::find($id);
        $data['cateList'] = Category::all();
        $data['brandList'] = Brand::all();
        return view('admin::product.edit',$data);
    }
    public function postEdit($id,Request $request){
        $product = new Product();
        
        $arr['prod_name'] = $request->prod_name;
        $arr['prod_slug'] = str_slug($request->prod_name);
        $arr['prod_price'] = $request->prod_price;
        $arr['prod_accessories'] = $request->prod_accessories;
        $arr['prod_promotion'] = $request->prod_promotion;
        $arr['prod_warranty'] = $request->prod_warranty;
        $arr['prod_condition'] = $request->prod_condition;
        $arr['prod_active'] = $request->prod_active;
        $arr['prod_description'] = $request->prod_description;

        $arr['prod_content'] = $request->prod_content;
        $arr['prod_title_seo'] = $request->prod_title_seo ? $request->prod_title_seo : $request->prod_name;
        $arr['prod_description_seo'] = $request->prod_description_seo ? $request->prod_description_seo : $request->prod_name;
        $arr['prod_cate'] = $request->prod_cate;

        $arr['prod_brand'] = $request->prod_brand;
        $arr['prod_featured'] = $request->prod_featured;
        if($request->hasFile('prod_img')){
            $img = $request->prod_img->getClientOriginalName();
            $arr['prod_img'] = $img;
            $request->prod_img->storeAs('avatar',$img);
        }

        $product::where('prod_id',$id)->update($arr);
        return redirect('admin/product')->with('success','Sửa sản phẩm thành công');
    }
    public function getDelete($id){
        Product::destroy($id);
        return back()->with('success','Xóa sản phẩm thành công');
    }
}
