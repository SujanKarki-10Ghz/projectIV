<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Category;
use App\Models\Groups;
use App\Models\Products;
use App\Models\Subcategory;
// use Request;
use App\Http\Controllers\Controller;
use MongoDB\BSON\Type;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function groupview($group_url)
    {
        $group = Groups::where('url', $group_url)->first();
        $group_id = $group->id;

        $category = Category:: where('group_id', $group_id)->where('status', '!=', '2')->where('status', '0')->get();
        return view('frontend.collection.category')
            ->with('category', $category)
            ->with('group', $group);
    }

    public function categoryview($group_url, $cate_url)
    {
        $category = Category::where('url', $cate_url)->first();
        $category_id = $category->id;
        $subcategory = Subcategory::where('category_id', $category_id)->where('status', '!=', '2')->where('status', '0')->get();
        return view('frontend.collection.subcategory')
            ->with('category', $category)
            ->with('subcategory', $subcategory);
    }

    public function subcategoryview(Request $request , $group_url, $cate_url, $subcate_url)
    {
        $subcategory = Subcategory::where('url', $subcate_url)->first();
        $subcategory_id = $subcategory->id;
        $category_id = $subcategory->category_id;
        $subcategorylist = Subcategory::where('category_id', $category_id)->get();

        if ($request->get('sort') == 'price_asc') {
            $products = Products::where('sub_category_id', $subcategory_id)
                ->orderBy('offered_price', 'asc')
                ->where('status', '!=', '2')
                ->where('status', '0')->get();
        } elseif ($request->get('sort') == 'price_desc') {
            $products = Products::where('sub_category_id', $subcategory_id)
                ->orderBy('offered_price', 'desc')
                ->where('status', '!=', '2')
                ->where('status', '0')->get();
        } elseif ($request->get('sort') == 'newest') {
            $products = Products::where('sub_category_id', $subcategory_id)
                ->orderBy('created_at', 'desc')
                ->where('status', '!=', '2')
                ->where('status', '0')->get();
        } elseif ($request->get('sort') == 'popularity') {
            $products = Products::where('sub_category_id', $subcategory_id)
                ->where('popular_products', '1')
                ->where('status', '!=', '2')
                ->where('status', '0')->get();
        } elseif ($request->get('filterbrand')) {
            $checked = $_GET['filterbrand'];
            $products = Products::whereIn('sub_category_id', $checked)->where('status', '0')->get();
        } else {
            $products = Products::where('sub_category_id', $subcategory_id)->where('status', '!=', '2')->where('status', '0')->get();
        }


        return view('frontend.collection.product')
            ->with('products', $products)
            ->with('subcategory', $subcategory)
            ->with('subcategorylist', $subcategorylist);
    }

    public function productview($group_url, $cate_url, $subcate_url, $prod_url)
    {
        $products = Products::where('url', $prod_url)->where('status', '!=', '2')->where('status', '0')->first();
        return view('frontend.collection.productview')
            ->with('products', $products);
    }


    public function SearchautoComplete(Request $request){
        $query = $request->get('term','');
        $products = Products::where('name', 'LIKE', '%'.$query.'%')->where('status', '0')->get();
        $data =[];
        foreach ($products as $items) {
            $data[] =[
                'value'->$items->name,
                'id'->$items->id
            ];
        }
        if(count($data))
        {
            return $data;
        }
        else
        {
            return ['value'=>'No Result Found', 'id'=>''];
        }
    }


    public function result(Request $request)
    {
        $searchingdata = $request->get('search_product');
        $products = Products::where('name', 'LIKE', '%'.$searchingdata.'%')->where('status', '0')->first();

        if($products)
        {
            if(isset($_POST['searchbtn']))
            {
                return redirect('collection/'.$products->subcategory->category->group->url.'/'.$products->subcategory->category->url.'/'.$products->subcategory->url);
            }
            else
            {
                return redirect('collection/'.$products->subcategory->category->group->url.'/'.$products->subcategory->category->url.'/'.$products->subcategory->url.'/'.$products->url);
            }
            //return redirect('search/' .$products->url);
        }
        else{
            return redirect('/')->with('status', 'Product Not Available');
        }
    }
}
