@extends('layouts.admin.master')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Transaction</h1>
    <p class="mb-4">Description</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <button type="button" onclick="addForm()" class="btn btn-success float-right"><i
                    class="fa fa-plus-circle"></i> Add</button>
        </div>
        <div class="card-body">
            @component('components.datatable', [
            'table_id' => 'transaction-datatable',
            'route_name' => 'datatable.transaction',
            'columns' => [
            ['header' => 'User'],
            ['header' => 'Product'],
            ['header' => 'Total'],
            ['header' => 'Quantity'],
            ]
            ])
            @endcomponent
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@component('components.modal', [
'modal_id' => 'input-transaction-modal',
'modal_header' => 'Transaction',
'inputs' => [
['name' => 'user_id', 'type' => 'select' , 'value' => $users, 'header' => 'Email', 'label_id' => 'transaction_label_email'],
['name' => 'product_id', 'type' => 'select', 'value' => $products, 'header' => 'Product', 'label_id' => 'transaction_label_product'],
['name' => 'total', 'type' => 'number', 'value' => '', 'header' => 'Total', 'label_id' => 'transaction_label_total'],
['name' => 'quantity', 'type' => 'number', 'value' => '', 'header' => 'Quantity', 'label_id' => 'transaction_label_quantity'],
]
])
@endcomponent
@endsection

@push('scripts')
<script type="text/javascript">
    var save_method;
    $(document).ready(function () {
        var table = $('#transaction-datatable').DataTable();
        $('#input-transaction-modal form').on('submit', function (e) {
            if (!e.isDefaultPrevented()) {
                var id = $('#id_hidden').val();
                if (save_method == "add") url = "{{ route('transaction.store') }}";
                else url = "transaction/" + id;

                $.ajax({
                    url: url,
                    type: "POST",
                    data: $('#input-transaction-modal form').serialize(),
                    success: function (data) {
                        $('#input-transaction-modal').modal('hide');
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
        $('#input-transaction-modal').modal('show');
        $('#input-transaction-modal form')[0].reset();
        $('.modal-title').text('Add Transaction');
    }

    function editForm(id) {
        save_method = "edit";
        $('input[name=_method]').val('PATCH');
        $('#input-transaction-modal form')[0].reset();
        $.ajax({
            url: "transaction/" + id + "/edit",
            type: "GET",
            dataType: "JSON",
            success: function (data) {
                $('#input-transaction-modal').modal('show');
                $('.modal-title').text('Edit Transaction');
                $('#id_hidden').val(data.id);
                $('#user_id > option[value="'+ data.user.id +'"]').prop('selected', true);
                $('#product_id > option[value="'+ data.product.id +'"]').prop('selected', true);
                $('#total').val(data.total);
                $('#quantity').val(data.quantity);
            },
            error: function () {
                alert("Tidak dapat menampilkan data!");
            }
        });
    }

    function deleteData(id) {
        if (confirm("Are you sure?")) {
            $.ajax({
                url: "transaction/" + id,
                type: "POST",
                data: {
                    '_method': 'DELETE',
                    '_token': $('meta[name=csrf-token]').attr('content')
                },
                success: function (data) {
                    $("#transaction-datatable").DataTable().ajax.reload();
                },
                error: function () {
                    alert("Error!");
                }
            });
        }
    }

</script>
@endpush
