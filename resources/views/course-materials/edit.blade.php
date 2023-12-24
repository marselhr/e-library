@extends('layouts.app', ['title' => 'Edit Materi'])

@push('customCss')
@endpush
@push('customJs')
    <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>

    <script src="{{ asset('assets/static/js/pages/ckeditor.js') }}"></script>

    <script>
        ClassicEditor
            .create(document.querySelector('#editor_description'))
            .catch(error => {
                console.error(error);
            });
        ClassicEditor
            .create(document.querySelector('#editor_embed_link'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endpush
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-4 order-md-1 order-last">
                    <h3>Edit Course Materials</h3>
                </div>
                <div class="col-12 col-md-8 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">Course</a></li>
                            <li class="breadcrumb-item active " aria-current="page">{{ $course->title }}
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Formulir Edit Materi</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('course_materials.update', [$course->id, $courseMaterial->id]) }}"
                        method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-12 col-md-8">

                                <label for="title" class="form-label">Judul Materi</label>
                                <input type="text" name="title" id="title" value="{{ $courseMaterial->title }}"
                                    class="form-control @error('title') is-invalid @enderror">
                                @error('title')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12 col-md-4">
                                <label for="order" class="form-label">Urutan</label>
                                <input type="number" min="1" id="order"
                                    class="form-control @error('order') is-invalid @enderror" name="order"
                                    placeholder="Masukkan urutan materi dalam kursus ini"
                                    value="{{ $courseMaterial->order }}">
                                @error('order')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3">

                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea name="description" id="editor_description" class="form-control @error('description') is-invalid @enderror">{!! $courseMaterial->description !!}</textarea>
                            @error('description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="embed_link" class="form-label">Embed Link Materi</label>
                            <textarea id="editor_embed_link" name="embed_link" class="form-control @error('embed_link') is-invalid @enderror">
                                {!! $courseMaterial->embed_link !!}
                            </textarea>
                            @error('embed_link')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('course_materials.index', $course) }}" class="btn btn-secondary">Kembali</a>
                            <div>
                                <button class="btn btn-secondary me-md-2" type="reset">reset</button>
                                <button class="btn btn-primary" type="submit">Simpan</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="row">
                </div>

            </div>
        </section>
    @endsection
