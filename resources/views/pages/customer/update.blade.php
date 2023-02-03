@extends('apps')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="mb-3 d-flex flex-wrap justify-content-between align-items-center">
        <h4 class="fw-bold mb-0"><span class="text-muted fw-light">Customer /</span> Edit</h4>
        <a href="{{ url('/customer') }}" style="height: 40px;" class="btn btn-secondary">Back</a>
    </div>

    <!-- Striped Rows -->
    <div class="card">
        {{-- <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Tambah Barang</h5>
            <small class="text-muted float-end"><span class="text-danger">*</span> Required</small>
        </div> --}}
        <div class="card-body">
            <form class="form-customer-update">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="col-form-label">Nama Pembeli</label>
                            <input type="text" class="form-control" name="name" placeholder="Aceng" value="{{ $customer->name }}" required/>
                            <input type="hidden" name="id" value="{{ $customer->id }}">
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="col-form-label">Tanggal Lahir</label>
                                <input class="form-control" type="date" name="birth_date" id="html5-date-input" value="{{ $customer->birth_date }}" required/>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label">Gender</label>
                                <div class="d-flex align-items-center">
                                    <div class="form-check">
                                        <input name="gender" class="form-check-input" type="radio" value="m" id="defaultRadio1" {{ ($customer->gender == 'm') ? 'checked' : '' }}/>
                                        <label class="form-check-label" for="defaultRadio1"> Pria </label>
                                    </div>
                                    <div class="form-check" style="margin-left: 16px;">
                                        <input name="gender" class="form-check-input" type="radio" value="f" id="defaultRadio2" {{ ($customer->gender == 'f') ? 'checked' : '' }}/>
                                        <label class="form-check-label" for="defaultRadio2"> Wanita </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Username</label>
                            <input type="text" class="form-control" name="username" placeholder="acengisback" value="{{ $customer->username }}" required/>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="col-form-label">Password</label>
                                <input type="password" class="form-control" name="password"/>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label">Retype-Password</label>
                                <input type="password" class="form-control" name="confirm_password"/>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Alamat</label>
                            <textarea class="form-control" rows="2" name="address" required>{{ $customer->address }}</textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="col-form-label">ID Card</label>
                            <input class="form-control input-image" name="id_card" type="file"/>
                            <div style="width: 100%; height: 400px; object-fit: cover; overflow: hidden;">
                                <img class="preview-image" style="width: 100%; height: 100%; object-fit: cover;" src="{{ asset('img/id_card/'.$customer->id_card) }}">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </div>
                {{-- <div class="form-text">You can use letters, numbers & periods</div> --}}
            </form>
        </div>
    </div>
    <!--/ Striped Rows -->
</div>
<!-- / Content -->
@endsection