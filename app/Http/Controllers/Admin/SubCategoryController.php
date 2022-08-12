<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\Types\AbstractList;
use File;

class SubCategoryController extends Controller
{
    public function index()
    {
        $category = Category::where('status', '!=', '2')->get();
        $subcategory = Subcategory::where('status', '!=', '2')->get(); //2=>deleted records
        return view('admin.collection.subcategory.index')
            ->with('subcategory', $subcategory)
            ->with('category', $category);

    }

    public function store(Request $request)
    {
        $subcategory = new Subcategory();
        $subcategory->category_id = $request->input('category_id');
        $subcategory->url = $request->input('url');
        $subcategory->name = $request->input('name');
        $subcategory->description = $request->input('description');
        if ($request->hasfile('image')) {

            $image_file = $request->file('image');
            $img_extension = $image_file->getClientOriginalExtension();//getting image extension
            $image_filename = time() . '.' . $img_extension;
            $image_file->move('uploads/subcategory/', $image_filename);
            $subcategory->image = $image_filename;
        }
            $subcategory->priority = $request->input('priority');
            $subcategory->status = $request->input('status') == true ? '1' : '0';
            $subcategory->save();
            return redirect()->back()->with('status', 'Subcategory saved successfully ');

    }

    public function edit($id)
    {
        $category = Category::where('status', '!=', '2')->get();
        $subcategory = Subcategory::find($id);
        return view('admin.collection.subcategory.edit')
                ->with('subcategory', $subcategory)
                -> with('category', $category);

    }

    public function update (Request $request, $id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->category_id = $request->input('category_id');
        $subcategory->url = $request->input('url');
        $subcategory->name = $request->input('name');
        $subcategory->description = $request->input('description');
        if ($request->hasfile('image')) {
            $filepath_image ='uploads/subcategory/'.$subcategory->image;
            if(File::exists($filepath_image))
            {
                File::delete($filepath_image);
            }

            $image_file = $request->file('image');
            $img_extension = $image_file->getClientOriginalExtension();//getting image extension
            $image_filename = time() . '.' . $img_extension;
            $image_file->move('uploads/subcategory/', $image_filename);
            $subcategory->image = $image_filename;
        }
            $subcategory->priority = $request->input('priority');
            $subcategory->status = $request->input('status') == true ? '1' : '0';
            $subcategory->update();
            return redirect('sub-category')->with('status', 'Subcategory Updated successfully ');
        }
        public function delete($id)
        {
            $subcategory= Subcategory::find($id);
            $subcategory->status='2'; //2=>deleted record
            $subcategory->update();
            return redirect()->back()->with('status','Sub-Category deleted successfully');
        }
    public function deletedrecords()
    {
        $subcategory = Subcategory::where('status','2')->get();
        return view('admin.collection.subcategory.deleted')
            ->with('subcategory', $subcategory);
    }
    public function deletedrestore($id)
    {
        $subcategory =Subcategory::find($id);
        $subcategory->status="0"; //0=>show, 1=>hide 2=>delete
        $subcategory->update();
        return redirect('sub-category')->with('status', 'Data Restored');

    }


}
