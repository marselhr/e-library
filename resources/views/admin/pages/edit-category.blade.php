@extends('layouts.app', ['title' => 'Edit Kategori Buku'])
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <a href="{{ route('categories.index') }}" class="btn btn-secondary">
                Kembali</a>
            <div class="row">
                <div class="col-12 col-md-4 order-md-1 order-last">
                    <h3>Edit Data Kategori</h3>
                </div>
                <div class="col-12 col-md-8 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">Data Kategori</a></li>
                            <li class="breadcrumb-item active " aria-current="page">Edit Data
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Formulir Tambah Edit Kategori</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('categories.update', $category->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" name="name" value="{{ $category->name ?? old('name') }}" id="name"
                                class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">

                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea name="description" id="editor_description" class="form-control @error('description') is-invalid @enderror">{{ $category->description ?? old('description') }}</textarea>

                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>


                        <div class="d-flex justify-content-end">
                            <button class="btn btn-secondary me-md-2" type="reset">reset</button>
                            <button class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    @endsection
