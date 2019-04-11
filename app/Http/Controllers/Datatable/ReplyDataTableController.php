<?php

namespace App\Http\Controllers\Datatable;

use App\Reply;
use App\Http\Controllers\Controller;

class ReplyDataTableController extends Controller
{
    public function index()
    {
        $replies = Reply::all();
        $data = [];
        foreach ($replies as $index => $list) {
            $row = [];
            $row[] = ++$index;
            $row[] = $list->user->email;
            $row[] = $list->product->name;
            $row[] = $list->comment->description;
            $row[] = $list->description;
            $row[] = '<div class="text-center"><div class="btn-group">
               <button type="button" onclick="editForm(' . $list->id . ')" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
               <button type="button" onclick="deleteData(' . $list->id . ')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></div></div>';
            $data[] = $row;
        }

        $output = ['data' => $data];
        return response()->json($output);
    }
}
