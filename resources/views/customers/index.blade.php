@extends('layouts.app')

@section('content')
<script>
    $(document).ready(function() {

        $('#category').change(function() {

            if ($('#category option:selected').val() == "1") {
                $('#country, #number').val("");
                $('#country, #number').css("display", "none");
                $("#code").css("display", "block");
            } else if ($('#category option:selected').val() == "3") {
                $('#country, #code').val("");
                $('#country, #code').css("display", "none");
                $("#number").css("display", "block");
            } else {
                $('#category, #country, #code, #input_number').val("");
                $("#code, #number, #country").css("display", "none");
            }
        });

        $('#country').change(function() {
            if ($(this).val() != '') {
                $('#filter').prop('disabled', false);
            }

        });
        $('#code').change(function() {
            if ($(this).val() != '') {
                $('#filter').prop('disabled', false);
            }
        });
        $('#input_number').keyup(function() {
            if ($('#input_number').val()) {
                $('#filter').prop('disabled', false);
            }
        });
    });
</script>


<div class="row" style="padding-top: 20px;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 style="margin-right: 15px;">Customers</h2>
        </div>
        <div class="pull-left">
            <form action="/customers/filter" method="POST">
                @method('POST')
                @csrf
                <select id="category" name="category">
                    <option value="" selected="selected"> -> Select <- </option> <option value="1">Country</option>
                    <option value="3">Number</option>
                </select>

                <select id="code" name="code" style="display: none;">
                    <option value="" selected="selected"> -> Select <- </option> <option value="(237)">Cameroon</option>
                    <option value="(251)">Ethiopia</option>
                    <option value="(212)">Morocco</option>
                    <option value="(258)">Mozambique</option>
                    <option value="(256)">Uganda</option>
                </select>

                <div id="number" name="number" style="display: none;">
                    <label for="number">Number:</label>
                    <input type="text" id="input_number" name="input_number">
                </div>

                <button id="filter" type="submit" name="filter" disabled='disabled'>Filter</button>

            </form>

        </div>

        <div class="pull-right">
            <a id="circle" class="css-button-rounded" href="{{ route('customers.create') }}" title="Create a customer"> <i class="fas fa-plus-circle"></i></a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered table-responsive-lg">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Valid</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($customers as $customer)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $customer->name }}</td>
        <td>{{ $customer->phone }}</td>
        <td>{{ $customer->valid }}</td>
        <td>
            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">

                <a href="{{ route('customers.show', $customer->id) }}" title="show">
                    <i class="fas fa-eye text-success  fa-lg"></i>
                </a>

                <a href="{{ route('customers.edit', $customer->id) }}">
                    <i class="fas fa-edit  fa-lg"></i>

                </a>

                @csrf
                @method('DELETE')

                <button type="submit" title="delete" style="border: none; background-color:transparent;">
                    <i class="fas fa-trash fa-lg text-danger"></i>

                </button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{!! $customers->links() !!}

@endsection
