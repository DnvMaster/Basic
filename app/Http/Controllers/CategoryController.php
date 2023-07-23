<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function allCategory()
    {
        $categories = Category::latest()->paginate(5);
        // $categories = DB::table('categories')->latest()->paginate(5);
        return view('admin.category.index',compact('categories'));
    }
    public function addCategory(Request $request)
    {
        $validateData = $request->validate([
            'category_name'=>'required|unique:categories|max:255',
        ],
        [
            'category_name.required'=> 'Пожалуйста, введите название категории.',
            'category_name.max'=>'Название категории, должно быть, не менее 255 символов.',
        ]);

        /*
        Category::insert([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
            'created_at' => Carbon::now(),
        ]);
        */

        $category = new Category;
        $category->category_name = $request->category_name;
        $category->user_id = Auth::user()->id;
        $category->save();

        /*
        $data = array();
        $data['category_name'] = $request->category_name;
        $data['user_id'] = Auth::user()->id;
        DB::table('categories')->insert($data);
        */

        return Redirect()->back()->with('success','Категория была успешно добавлена');

    }
}
