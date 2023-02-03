@extends('apps')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="mb-3 d-flex flex-wrap justify-content-between align-items-center">
        <h4 class="fw-bold mb-0"><span class="text-muted fw-light">Product /</span> Edit</h4>
        <a href="{{ url('/product') }}" style="height: 40px;" class="btn btn-secondary">Back</a>
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
                            <label class="col-form-label">Nama Barang</label>
                            <input type="text" class="form-control" placeholder="Ciki Taro" />
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="col-form-label">Tipe Barang</label>
                                <select class="form-select">
                                    <option selected>Pilih Tipe</option>
                                    <option value="1">Makanan Ringan</option>
                                    <option value="2">Minuman</option>
                                    <option value="3">Alat Mandi</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label">Stok Barang</label>
                                <input type="text" class="form-control" placeholder="Ciki Taro" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="col-form-label">Harga Jual</label>
                                <input type="text" class="form-control" placeholder="Ciki Taro" />
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label">Harga Beli</label>
                                <input type="text" class="form-control" placeholder="Ciki Taro" />
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Deskripsi</label>
                            <textarea class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="col-form-label">Photo</label>
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