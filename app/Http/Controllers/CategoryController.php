<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}
    public function allCategory()
    {
        /*
           $categories = DB::table('categories')
                ->join('users','categories.user_id','users.id')
                ->select('categories.*','users.name')
                ->latest()->paginate(5);
        */

        $categories = Category::latest()->paginate(5);
        $trash = Category::onlyTrashed()->latest()->paginate(3);
        # $categories = DB::table('categories')->latest()->paginate(5);
        return view('admin.category.index',compact('categories','trash'));
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
    public function editCategory($id)
    {
        # $categories = Category::find($id);
        $categories = DB::table('categories')->where('id',$id)->first();
        return view('admin.category.edit',compact('categories'));
    }
    public function updateCategory(Request $request, $id)
    {
        /*
        $update = Category::find($id)->update([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
        ]);
        */

        $data = array();
        $data['category_name'] = $request->category_name;
        $data['user_id'] = Auth::user()->id;
        DB::table('categories')->where('id',$id)->update($data);

        return Redirect()->route('all.category')->with('success','Категория успешно обновлена.');
    }
    public function deleteCategory($id)
    {
        $delete = Category::find($id)->delete();
        return Redirect()->back()->with('success','Категория успешно удалена.');

    }
    public function restoreCategory($id)
    {
        $restore = Category::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success','Категория успешно восстановлена.');
    }
    public function completeRemovalCategory($id)
    {
        $delete = Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success','Категория успешно удалена.');
    }
}
