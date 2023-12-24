@extends('layouts.app', ['title' => 'Daftar Materi'])
@push('customCss')
    <link rel="stylesheet" href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/compiled/css/table-datatable-jquery.css') }}">
@endpush
@push('customJs')
    <script src="{{ asset('assets/extensions/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/extensions/datatables.net-bs5/js/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/static/js/pages/datatables.js') }}"></script>

    <script>
        new DataTable('#datatable');
    </script>
@endpush
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-4 order-md-1 order-last">
                    <h3>Course Materials</h3>
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
                    <div class="row ">

                        <div class="col-12 col-md-6 order-md-1 order-last ">
                            <h5 class="card-title">{{ $course->title }} <span class="text-muted"> ({{ $course->duration }}
                                    Bulan)</span></h5>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <a href="{{ route('course_materials.create', $course) }}"
                                class="btn btn-primary float-start float-lg-end">Tambah Materi</a>
                        </div>
                    </div>
                </div>
                @include('generals._validation')
                <div class="card-body">
                    <div class="table-responsive">
                        <div id="table1_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                            <div class="row">

                            </div>
                            <div class="row dt-row">
                                <div class="col-sm-12">
                                    <table class="table dataTable no-footer" id="datatable" aria-describedby="table1_info">
                                        <thead>
                                            <tr>
                                                <th class="text-center text-capitalize">URUTAN</th>
                                                <th class="text-center text-capitalize">JUDUL MATERI</th>
                                                <th class="text-center text-capitalize">DESKRIPSI</th>
                                                <th class="text-center text-capitalize">SEMATAN TAUTAN</th>
                                                <th class="text-center text-capitalize">AKSI</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($materials as $materi)
                                                <tr>
                                                    <td>{{ $materi->order }}</td>
                                                    <td>{{ $materi->title }}</td>
                                                    <td>
                                                        <div class="accordion" id="accordionExample">
                                                            <div class="accordion-item">
                                                                <h2 class="accordion-header" id="headingOne">
                                                                    <button class="accordion-button" type="button"
                                                                        data-bs-toggle="collapse"
                                                                        data-bs-target="#collapse-{{ $loop->iteration }}"
                                                                        aria-expanded="true" aria-controls="collapseOne">
                                                                        <span class="text-truncate"
                                                                            style="width: 20rem">{!! $materi->description !!}</span>
                                                                    </button>
                                                                </h2>
                                                                <div id="collapse-{{ $loop->iteration }}"
                                                                    class="accordion-collapse collapse"
                                                                    aria-labelledby="headingOne"
                                                                    data-bs-parent="#accordionExample">
                                                                    <div class="accordion-body">
                                                                        {!! $materi->description !!}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>{!! $materi->embed_link !!}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button
                                                                class="btn
                                                                    btn-sm btn-info"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                data-bs-title="Detail">
                                                                <i class="iconly-boldShow"></i></button>
                                                            <a href="{{ route('course_materials.edit', [$course->id, $materi->id]) }}"
                                                                class="btn btn-sm btn-success" data-bs-toggle="tooltip"
                                                                data-bs-placement="top" data-bs-title="Edit Materi"><i
                                                                    class="iconly-boldEdit"></i></a>

                                                            <form id="delete-{{ $materi->id }}"
                                                                action="{{ route('course_materials.destroy', [$course->id, $materi->id]) }}"
                                                                method="POST">

                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-sm btn-danger"
                                                                    onclick="alertConfirm(this)"
                                                                    data-id="{{ $materi->id }}" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" data-bs-title="Hapus Materi"> <i
                                                                        class="iconly-boldDelete"></i></button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
@endsection
