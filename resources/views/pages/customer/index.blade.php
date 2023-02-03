@extends('apps')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="mb-3 d-flex flex-wrap justify-content-between align-items-center">
        <h4 class="fw-bold mb-0"><span class="text-muted fw-light">Customer/</span> List</h4>
        <a href="{{ url('/customer/new') }}" style="height: 40px;" class="btn btn-primary">Add New</a>
    </div>

    <!-- Striped Rows -->
    <div class="card">
        <table class="table table-product table-striped">
            <thead>
                <tr>
                    <th height="50">No</th>
                    <th height="50">Name</th>
                    <th height="50">Birth Date</th>
                    <th height="50">Gender</th>
                    <th height="50">Address</th>
                    <th height="50">Username</th>
                    <th height="50">ID Card</th>
                    <th height="50">Actions</th>
                </tr>
            </thead>
            <tbody class="table-border-bottom-0">
                @if(count($data) > 0)
                    @foreach($data as $key => $customer)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->birth_date }}</td>
                            <td>{{ $customer->gender }}</td>
                            <td>{{ $customer->address }}</td>
                            <td>{{ $customer->username }}</td>
                            <td>
                                <img src="{{ asset('img/id_card/'.$customer->id_card) }}" height="40">
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="{{ url('/customer/edit/'.$customer->id) }}">
                                            <i class="bx bx-edit-alt me-1"></i> Edit
                                        </a>
                                        <a class="dropdown-item" onclick="deleteCustomer({{$customer->id}})">
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