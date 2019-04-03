@extends('layouts.admin.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Customers</h1>
    <p class="mb-4">Description</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Customers</h6>
        </div>
        <div class="card-body">
            @component('components.datatable', [
            'table_id' => 'user-datatable',
            'route_name' => 'datatable.users',
            'columns' => [
            ['data' => 'email', 'name' => 'email', 'header' => 'Email'],
            ['data' => 'created_at', 'name' => 'created_at', 'header' => 'Created.'],
            ]
            ])
            @endcomponent
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
