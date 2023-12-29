@extends('layouts.app', ['title' => 'Tambah Buku'])
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-4 order-md-1 order-last">
                    <h3>Tambah Data Buku</h3>
                </div>
                <div class="col-12 col-md-8 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">Buku</a></li>
                            <li class="breadcrumb-item active " aria-current="page">Tambah Buku
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Formulir Tambah Buku</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('books.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="title" class="form-label">Judul Buku</label>
                            <input type="text" name="title" value="{{ old('title') }}" id="title"
                                class="form-control @error('title') is-invalid @enderror">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="row">

                            <div class="form-group mb-3 col-12 col-md-6">
                                <label for="category_id" class="form-label">Kategori Buku</label>

                                <select name="category_id" id=""
                                    class="form-select @error('category_id') is-invalid @enderror">
                                    @foreach ($categories as $category)
                                        @if (old('category_id') === $category->id)
                                            <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                        @else
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group mb-3 col-12 col-md-6">
                                <label for="" class="form-label">Jumlah</label>
                                <input type="number" name="quantity" value="{{ old('quantity') }}" min="1"
                                    id="" class="form-control @error('quantity') is-invalid @enderror">
                                @error('quantity')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-12 col-md-6">
                                <label for="file" class="form-label">Sampul Buku <span
                                        class="text-muted">(*gambar)</span></label>
                                <input type="file" name="cover" id="cover"
                                    class="form-control @error('cover') is-invalid @enderror"
                                    accept="image/png, image/gif, image/jpeg">
                                @error('cover')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                            <div class="mb-3 col-12 col-md-6">
                                <label for="file" class="form-label">File Buku <span
                                        class="text-muted">(*pdf)</span></label>
                                <input type="file" name="file" id="file"
                                    class="form-control @error('file') is-invalid @enderror" accept="application/pdf">
                                @error('file')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>
                        </div>
                        <div class="form-group mb-3">

                            <label for="description" class="form-label">Deskripsi Buku</label>
                            <textarea name="description" id="editor_description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>

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
