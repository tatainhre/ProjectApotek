@extends('template.main')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Obat</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active">Data Obat</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- jquery validation -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Edit Data Obat</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('obat.update', $obat->id) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('put')
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="kode_obat">Kode Obat</label>
                                        <input type="text" name="kode_obat" class="form-control" id="kode_obat"
                                            placeholder="Masukkan Kode Obat" value="{{ $obat->kode_obat }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama_obat">Nama Obat</label>
                                        <input type="text" name="nama_obat" class="form-control" id="nama_obat"
                                            placeholder="Masukkan Nama Obat" value="{{ $obat->nama_obat }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="id_kategori">Kategori Obat</label>
                                        <select name="id_kategori" id="id_kategori" class="form-control select2bs4"
                                            style="width: 100%;">
                                            <option value="">Pilih Kategori Obat</option>
                                            @foreach ($kategoris as $k)
                                                <option value="{{ $k->id }}"
                                                    {{ $obat->id_kategori == $k->id ? 'SELECTED' : '' }}>
                                                    {{ $k->kategoris_obat }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="stok">Stok Obat</label>
                                        <input type="text" name="stok"
                                            class="form-control @error('stok') is-invalid @enderror" id="stok"
                                            placeholder="Masukkan Stok Obat" value="{{ $obat->stok }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="harga">Harga</label>
                                        <input type="text" name="harga"
                                            class="form-control @error('harga') is-invalid @enderror" id="harga"
                                            placeholder="Masukkan Harga Obat " value="{{ $obat->harga }}">
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <div class="col-md-6">

                    </div>
                    <!--/.col (right) -->
                </div>
                <!-- /.card -->
            </div>
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection
