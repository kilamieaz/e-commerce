<?php

namespace App\Http\Controllers\Datatable;

use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;
use App\User;

class UserDataTableController extends Controller
{
    public function index()
    {
        $users = User::all();
        return DataTables::of($users)->make(true);
        // return Datatables::of(User::query())->make(true);
    }
}
