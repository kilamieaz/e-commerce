<?php

namespace App\Http\Controllers\Datatable;

use App\Http\Controllers\Controller;
use App\Transaction;

class TransactionDataTableController extends Controller
{
    public function index()
    {
        $transactions = Transaction::all();
        $data = [];
        foreach ($transactions as $index => $list) {
            $row = [];
            $row[] = ++$index;
            $row[] = $list->user->email;
            $row[] = $list->product->name;
            $row[] = $list->total;
            $row[] = $list->quantity;
            $row[] = '<div class="text-center"><div class="btn-group">
               <button type="button" onclick="editForm(' . $list->id . ')" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></button>
               <button type="button" onclick="deleteData(' . $list->id . ')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></div></div>';
            $data[] = $row;
        }

        $output = ['data' => $data];
        return response()->json($output);
    }
}
