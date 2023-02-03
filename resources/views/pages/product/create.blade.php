@extends('apps')

@section('content')
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="mb-3 d-flex flex-wrap justify-content-between align-items-center">
        <h4 class="fw-bold mb-0"><span class="text-muted fw-light">Product /</span> Add New</h4>
        <a href="{{ url('/product') }}" style="height: 40px;" class="btn btn-secondary">Back</a>
    </div>

    <!-- Striped Rows -->
    <div class="card">
        {{-- <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Tambah Barang</h5>
            <small class="text-muted float-end"><span class="text-danger">*</span> Required</small>
        </div> --}}
        <div class="card-body">
            <form class="form-product-add">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="col-form-label">Nama Barang</label>
                            <input type="text" name="name" class="form-control" placeholder="Ciki Taro" required/>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="col-form-label">Tipe Barang</label>
                                <select class="form-select" name="type" required>
                                    <option value="" selected>Pilih Tipe</option>
                                    @foreach($types as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label">Stok Barang</label>
                                <input type="number" name="stock" class="form-control" value="0" required/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="col-form-label">Harga Jual</label>
                                <input type="text" name="price_sell" class="form-control" value="0" required/>
                            </div>
                            <div class="col-md-6">
                                <label class="col-form-label">Harga Beli</label>
                                <input type="text" name="price_buy" class="form-control" value="0" required/>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="col-form-label">Deskripsi</label>
                            <textarea class="form-control" name="description" rows="5" required></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="col-form-label">Photo</label>
                            <input class="form-control input-image" name="photo" type="file" required/>
                            <div class="mt-3" style="width: 100%; height: 400px; object-fit: cover; overflow: hidden;">
                                <img class="preview-image" style="width: 100%; height: 100%; object-fit: cover;" src="https://images.bangunteknologi.com/DSC00072.jpg">
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