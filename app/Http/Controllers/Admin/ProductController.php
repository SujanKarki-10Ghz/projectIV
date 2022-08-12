<?php

namespace App\Http\Controllers\Admin;

use App\Models\Products;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function index()
    {
        $products = Products::where('status', '!=','2')->get();
        return view('admin.collection.product.index')
            ->with('products', $products);

    }
    public function create()
    {
        $subcategory = Subcategory::where('status','!='.'2')->get();
        return view('admin.collection.product.create')
            ->with('subcategory', $subcategory);
    }
    public function store(Request $request)
    {
        $products= new Products();
        $products->name = $request->input('name');
        $products->sub_category_id = $request->input('sub_category_id');
        $products->url = $request->input('url');
        $products->small_description = $request->input('small_description');
      if ($request->hasfile('image'))
      {
          $image_file=$request->file('image');
          $img_extension= $image_file->getClientOriginalExtension();//getting image extension
          $image_filename = time() . '.' .$img_extension;
          $image_file->move('uploads/products/', $image_filename);
          $products->image =$image_filename;
      }


        $products->sale_tag = $request->input('sale_tag');
        $products->original_price = $request->input('original_price');
        $products->offered_price = $request->input('offered_price');
        $products->Quantity = $request->input('quantity');
        $products->priority = $request->input('priority');

        $products->p_highlight_heading = $request->input('p_highlight_heading');
        $products->p_highlights = $request->input('p_highlights');
        $products->p_description_heading = $request->input('p_description_heading');
        $products->p_description = $request->input('p_description');
        $products->p_details_heading = $request->input('p_details_heading');
        $products->p_details = $request->input('p_details');

        $products->meta_title = $request->input('meta_title');
        $products->meta_description = $request->input('meta_description');
        $products->meta_keyword = $request->input('meta_keyword');

        $products->new_arrival_products=$request->input('new_arrival_products')==true? '1':'0';
        $products->featured_products=$request->input('featured_products')==true? '1':'0';
        $products->popular_products=$request->input('popular_products')==true? '1':'0';
        $products->offered_products=$request->input('offered_products')==true? '1':'0';
        $products->status=$request->input('status')==true?'1':'0';

        $products->save();
        return redirect()->back()->with('status', 'Product Successfully Added');


    }
    public function edit($id)
    {
        $products=Products::find($id);
        $subcategory=Subcategory::where('status', '!=','2')->get();
        return view('admin.collection.product.edit')
            ->with('products', $products)
            ->with('subcategory', $subcategory);

    }
    public function update( Request $request, $id)
    {
        $products = Products::find($id);
        $products->name = $request->input('name');
        $products->sub_category_id = $request->input('sub_category_id');
        $products->url = $request->input('url');
        $products->small_description = $request->input('small_description');
        if ($request->hasfile('image'))
        {
            $image_file=$request->file('image');
            $img_extension= $image_file->getClientOriginalExtension();//getting image extension
            $image_filename = time() . '.' .$img_extension;
            $image_file->move('uploads/products/', $image_filename);
            $products->image =$image_filename;
        }


        $products->sale_tag = $request->input('sale_tag');
        $products->original_price = $request->input('original_price');
        $products->offered_price = $request->input('offered_price');
        $products->Quantity = $request->input('quantity');
        $products->priority = $request->input('priority');

        $products->p_highlight_heading = $request->input('p_highlight_heading');
        $products->p_highlights = $request->input('p_highlights');
        $products->p_description_heading = $request->input('p_description_heading');
        $products->p_description = $request->input('p_description');
        $products->p_details_heading = $request->input('p_details_heading');
        $products->p_details = $request->input('p_details');

        $products->meta_title = $request->input('meta_title');
        $products->meta_description = $request->input('meta_description');
        $products->meta_keyword = $request->input('meta_keyword');

        $products->new_arrival_products=$request->input('new_arrival_products')==true? '1':'0';
        $products->featured_products=$request->input('featured_products')==true? '1':'0';
        $products->popular_products=$request->input('popular_products')==true? '1':'0';
        $products->offered_products=$request->input('offered_products')==true? '1':'0';
        $products->status=$request->input('status')==true?'1':'0';

        $products->update();
        return redirect()->back()->with('status','Product Details Updated');
    }
    public function delete($id)
    {
        $products= Products::find($id);
        $products->status='2'; //2=>deleted record
        $products->update();
        return redirect()->back()->with('status','Product deleted successfully');
    }
    public function deletedrecords()
    {
        $products = Products::where('status','2')->get();
        return view('admin.collection.product.deleted')
            ->with('products', $products);
    }
    public function deletedrestore($id)
    {
        $products =Products::find($id);
        $products->status= "0"; //0=>show, 1=>hide 2=>delete
        $products->update();
        return redirect('products')->with('status', 'Data Restored');

    }
}
