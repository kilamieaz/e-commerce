<?php

namespace App\Http\Controllers\Datatable;

use App\Category;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;

class SubCategoryDataTableController extends Controller
{
    public function index()
    {
        // $categories = Category::with('parent')->where('parent_id', '!=', null)->get();
        $categories = Category::with('parent')->whereNotNull('parent_id')->get();
        // $categories = Category::where('parent_id', '!=', null)->with('parent');

        $data = [];
        foreach ($categories as $index => $list) {
            $row = [];
            $row[] = ++$index;
            $row[] = $list->name;
            $row[] = $list->parent->name;
            $row[] = $list->description;
            $row[] = '<div class="text-center"><img style="height:50px; width:50px" src="' . Storage::url($list->image) . '"></div>';
            $row[] = '<div class="text-center"><div class="btn-group">
               <button type="button" onclick="editForm(' . $list->id . ')" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
               <button type="button" onclick="deleteData(' . $list->id . ')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></div></div>';
            $data[] = $row;
        }

        $output = ['data' => $data];
        return response()->json($output);
    }
}
