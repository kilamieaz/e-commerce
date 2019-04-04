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
            <button type="button" onclick="addForm()" class="btn btn-success float-right"><i
                    class="fa fa-plus-circle"></i> Add</button>
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
@component('components.modal', [
'modal_id' => 'input-user-modal',
'modal_header' => 'User',
'inputs' => [
['name' => 'email', 'type' => 'text' , 'value' => '', 'header' => 'Email'],
['name' => 'password', 'type' => 'password', 'value' => '', 'header' => 'Password'],
]
])
@endcomponent
@endsection

@push('scripts')
<script type="text/javascript">
    var save_method;
    $(document).ready(function () {
        var table = $('#user-datatable').DataTable();
        $('#input-user-modal form').on('submit', function (e) {
            // console.log('here');
            if (!e.isDefaultPrevented()) {
                var id = $('#id_hidden').val();
                if (save_method == "add") url = "{{ route('user.store') }}";
                else url = "user/" + id;

                $.ajax({
                    url: url,
                    type: "POST",
                    data: $('#input-user-modal form').serialize(),
                    success: function (data) {
                        $('#input-user-modal').modal('hide');
                        table.ajax.reload();
                    },
                    error: function () {
                        alert("Error!");
                    }
                });
                return false;
            }
        });
    });

    function addForm() {
        save_method = "add";
        $('input[name=_method]').val('POST');
        $('#input-user-modal').modal('show');
        $('#input-user-modal form')[0].reset();
        $('.modal-title').text('Add User');
    }

    

</script>
@endpush
