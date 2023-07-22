<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allCategory()
    {
        return view('admin.category.index');
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
    }
}
