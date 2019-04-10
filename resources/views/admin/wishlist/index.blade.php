@extends('layouts.admin.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Wishlist</h1>
    <p class="mb-4">Description</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" onclick="addForm()" class="btn btn-success float-right"><i
                    class="fa fa-plus-circle"></i> Add</button>
        </div>
        <div class="card-body">
            @component('components.datatable', [
            'table_id' => 'wishlist-datatable',
            'route_name' => 'datatable.wishlist',
            'columns' => [
            ['header' => 'User'],
            ['header' => 'Product'],
            ]
            ])
            @endcomponent
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@component('components.modal', [
'modal_id' => 'input-wishlist-modal',
'modal_header' => 'Wishlist',
'inputs' => [
['name' => 'user_id', 'type' => 'select' , 'value' => $users, 'header' => 'Email', 'label_id' => 'label_email'],
['name' => 'product_id', 'type' => 'select', 'value' => $products, 'header' => 'Product', 'label_id' => 'label_product'],
]
])
@endcomponent
@endsection

@push('scripts')
<script type="text/javascript">
    var save_method;
    $(document).ready(function () {
        var table = $('#wishlist-datatable').DataTable();
        $('#input-wishlist-modal form').on('submit', function (e) {
            if (!e.isDefaultPrevented()) {
                var id = $('#id_hidden').val();
                if (save_method == "add") url = "{{ route('wishlist.store') }}";
                else url = "wishlist/" + id;

                $.ajax({
                    url: url,
                    type: "POST",
                    data: $('#input-wishlist-modal form').serialize(),
                    success: function (data) {
                        $('#input-wishlist-modal').modal('hide');
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
        $('#input-wishlist-modal').modal('show');
        $('#input-wishlist-modal form')[0].reset();
        $('.modal-title').text('Add Wishlist');
    }

    function editForm(id) {
        save_method = "edit";
        $('input[name=_method]').val('PATCH');
        $('#input-wishlist-modal form')[0].reset();
        $.ajax({
            url: "wishlist/" + id + "/edit",
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('#input-wishlist-modal').modal('show');
                $('.modal-title').text('Edit Wishlist');
                $('#id_hidden').val(data.id);
                $('#user_id > option[value="'+ data.user.id +'"]').prop('selected', true);
                $('#product_id > option[value="'+ data.product.id +'"]').prop('selected', true);
            },
            error: function () {
                alert("Tidak dapat menampilkan data!");
            }
        });
    }

    function deleteData(id) {
        if (confirm("Are you sure?")) {
            $.ajax({
                url: "wishlist/" + id,
                type: "POST",
                data: {
                    '_method': 'DELETE',
                    '_token': $('meta[name=csrf-token]').attr('content')
                },
                success: function (data) {
                    $("#wishlist-datatable").DataTable().ajax.reload();
                },
                error: function () {
                    alert("Error!");
                }
            });
        }
    }

</script>
@endpush
