<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Groups;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use File;

class CategoryController extends Controller
{
    public function index()
    {
        $category=Category::where('status','!=','2')->get();
        return view('admin.collection.category.index')
            ->with('category', $category);
    }
    public function create()
    {
        $group= Groups::where('status','!=','2')->get();//2=>deleted data
        return view('admin.collection.category.create')
            ->with('group', $group);
    }
    public function store(Request $request)
    {
            $category = new Category();
            $category->group_id= $request->input('group_id');
            $category->url= $request->input('url');
            $category->name=$request->input('name');
            $category->description=$request->input('description');
            if ($request->hasfile('category_img'))
            {
                $image_file =$request->file('category_img');
                $img_extension =$image_file->getClientOriginalExtension();
                $image_filename =time() . '.'.$img_extension;
                $image_file->move('uploads/categoryimage/',$image_filename);
                $category->image =$image_filename;

            }
            if ($request->hasfile('category_icon'))
            {
                $icon_file =$request->file('category_icon');
                $icon_extension =$icon_file->getClientOriginalExtension();
            $icon_filename=time() . '.'.$icon_extension;
            $icon_file->move('uploads/categoryicon/',$icon_filename);
            $category->icon =$icon_filename;

        }
        $category->status=$request->input('status')==true? '1':'0';//0=>show 1=> hide
        $category->save();
        return redirect()->back()->with('status','Category added successfully');
    }
    public function edit($id)
    {
        $group = Groups::where('status','!=','2')->get();
        $category = Category::find($id);
        return view('admin.collection.category.edit')
            ->with('group', $group)
            ->with('category',$category);
    }
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->group_id= $request->input('group_id');
        $category->url= $request->input('url');
        $category->name=$request->input('name');
        $category->description=$request->input('description');
        if ($request->hasfile('category_img'))
        {
            $filepath_image = 'uploads/categoryimage/'.$category->image;
            if(File::exists($filepath_image))
            {
                File::delete($filepath_image);
            }
            $image_file =$request->file('category_img');
            $img_extension =$image_file->getClientOriginalExtension();//getting image extension
            $image_filename =time() . '.'.$img_extension;
            $image_file->move('uploads/categoryimage/',$image_filename);
            $category->image =$image_filename;

        }
        if ($request->hasfile('category_icon'))
        {

            $filepath_icon = 'uploads/categoryicon/'.$category->icon;
            if(File::exists($filepath_icon))
            {
                File::delete($filepath_icon);
            }
            $icon_file =$request->file('category_icon');
            $icon_extension =$icon_file->getClientOriginalExtension();//getting icon extension
            $icon_filename=time() . '.'.$icon_extension;
            $icon_file->move('uploads/categoryicon/',$icon_filename);
            $category->icon =$icon_filename;

        }
        $category->status=$request->input('status')==true? '1':'0';//0=>show 1=> hide
        $category->save();
        return redirect()->back()->with('status','Category Updated Successfully');

    }
    public function delete($id)
    {
        $category= Category::find($id);
        $category->status='2'; //2=>deleted record
        $category->update();
        return redirect()->back()->with('status','Category deleted successfully');
    }
    public function deletedrecords()
    {
        $category = Category::where('status','2')->get();
        return view('admin.collection.category.deleted')
            ->with('category', $category);
    }
    public function deletedrestore($id)
    {
        $category =Category::find($id);
        $category->status="0"; //0=>show, 1=>hide 2=>delete
        $category->update();
        return redirect('category')->with('status', 'Data Restored');

    }
}

