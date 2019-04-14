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
            ['header' => 'First Name'],
            ['header' => 'Last Name'],
            ['header' => 'Email'],
            ['header' => 'Address'],
            ['header' => 'Phone Number'],
            ['header' => 'Created.'],
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
['name' => 'first_name', 'type' => 'text' , 'value' => '', 'header' => 'First Name', 'label_id' => 'user_label_firstname'],
['name' => 'last_name', 'type' => 'text' , 'value' => '', 'header' => 'Last Name', 'label_id' => 'user_label_lastname'],
['name' => 'email', 'type' => 'text' , 'value' => '', 'header' => 'Email', 'label_id' => 'user_label_email'],
['name' => 'password', 'type' => 'password', 'value' => '', 'header' => 'Password', 'label_id' => 'user_label_password'],
['name' => 'address', 'type' => 'text' , 'value' => '', 'header' => 'Address', 'label_id' => 'user_label_address'],
['name' => 'phone_number', 'type' => 'text' , 'value' => '', 'header' => 'Phone Number', 'label_id' => 'user_label_phone'],
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

    function editForm(id) {
        save_method = "edit";
        $('input[name=_method]').val('PATCH');
        $('#input-user-modal form')[0].reset();
        $.ajax({
            url: "user/" + id + "/edit",
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('#input-user-modal').modal('show');
                $('.modal-title').text('Edit User');
                $('#id_hidden').val(data.id);
                $('#first_name').val(data.user_profile.first_name);
                $('#last_name').val(data.user_profile.last_name);
                $('#address').val(data.user_profile.address);
                $('#phone_number').val(data.user_profile.phone_number);
                $('#email').val(data.email);
                $('#password,#label_password').hide();

            },
            error: function () {
                alert("Tidak dapat menampilkan data!");
            }
        });
    }

</script>
@endpush
