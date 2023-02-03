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
            <form>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="col-form-label">Nama Pembeli</label>
                            <input type="text" class="form-control" placeholder="Ciki Taro" />
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="col-form-label">Tanggal Lahir</label>
                                <input class="form-control" type="date" value="2021-06-18" id="html5-date-input" />
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label">Gender</label>
                                <div class="d-flex align-items-center">
                                    <div class="form-check">
                                        <input name="default-radio-1" class="form-check-input" type="radio" value="" id="defaultRadio1"/>
                                        <label class="form-check-label" for="defaultRadio1"> Pria </label>
                                    </div>
                                    <div class="form-check" style="margin-left: 16px;">
                                        <input name="default-radio-1" class="form-check-input" type="radio" value="" id="defaultRadio2"/>
                                        <label class="form-check-label" for="defaultRadio2"> Wanita </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Username</label>
                            <input type="text" class="form-control" placeholder="dianaldiansyah" />
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="col-form-label">Password</label>
                                <input type="password" class="form-control"/>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label">Retype-Password</label>
                                <input type="password" class="form-control"/>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Alamat</label>
                            <textarea class="form-control" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="col-form-label">ID Card</label>
                            <div style="width: 100%; height: 400px; object-fit: cover; overflow: hidden;">
                                <img style="width: 100%; height: 100%; object-fit: cover;" src="https://images.bangunteknologi.com/DSC00072.jpg" alt="" srcset="">
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