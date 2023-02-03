@extends('apps')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="mb-3 d-flex flex-wrap justify-content-between align-items-center">
        <h4 class="fw-bold mb-0"><span class="text-muted fw-light">Product/</span> List</h4>
        <a href="{{ url('/product/new') }}" style="height: 40px;" class="btn btn-primary">Add New</a>
    </div>

    <!-- Striped Rows -->
    <div class="card">
        <table class="table table-product table-striped">
            <thead>
                <tr>
                    <th height="50">No</th>
                    <th height="50">Photo</th>
                    <th height="50">Name</th>
                    <th height="50">Description</th>
                    <th height="50">Type</th>
                    <th height="50">Stock</th>
                    <th height="50">Buy Price</th>
                    <th height="50">Sell Price</th>
                    <th height="50">Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @if(count($data) > 0)
                    @foreach($data as $key => $product)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>
                                <img src="{{ asset('img/product/'.$product->photo) }}" height="40">
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->type_id }}</td>
                            <td>{{ $product->stock }}</td>
                            <td>{{ $product->price_buy }}</td>
                            <td>{{ $product->price_sell }}</td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ url('/product/edit/'.$product->id) }}">
                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                        </a>
                                        <a class="dropdown-item" onclick="deleteProduct({{$product->id}})">
                                            <i class="bx bx-trash me-1"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="9" class="text-center">No Data Found</td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
    <!--/ Striped Rows -->
</div>
<!-- / Content -->
@endsection