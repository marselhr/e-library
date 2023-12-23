@extends('layouts.app', ['title' => 'Courses'])

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
        const modalEdit = new bootstrap.Modal($('#modalEdit'))
        $('#datatable').on('click', '.action-edit', function() {
            const data = $(this).data()
            modalEdit.show()
            $("#myForm").attr('action', data.url_update);
            $.ajax({
                type: 'GET',
                url: data.url_edit,
                success: function(res) {
                    $('input[name=title]').val(res.title)
                    $('input[name=duration]').val(res.duration)
                }
            })
        })
    </script>
@endpush
@section('content')
    <!--Modals Start-->
    @include('courses.modals.edit')
    @include('courses.modals.add')
    <!--Modals End-->
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Kursus</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Data Kursus</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <button type="button" class="btn btn-primary float-end " data-bs-toggle="modal"
                        data-bs-target="#modalAdd">Tambah Kursus</button>
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
                                                <th>#</th>
                                                <th>JUDUL KURSUS</th>
                                                <th>DURASI</th>
                                                <th>AKSI</th>
                                            </tr>
                                        </thead>
                                        <Tbody>
                                            @foreach ($courses as $course)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $course->title }}</td>
                                                    <td>{{ $course->duration }} bulan</td>
                                                    <td>
                                                        <div class="btn-group" role="group">

                                                            <a href="{{ route('course_materials.index', $course) }}"
                                                                class="btn btn-sm btn-info" data-bs-toggle="tooltip"
                                                                data-bs-placement="top"
                                                                data-bs-title="Lihat Daftar Materi"><i
                                                                    class="iconly-boldShow"></i></a>
                                                            <button type="button"
                                                                class="btn btn-sm btn-success action-edit"
                                                                data-id_kategori="{{ $course->id }}"
                                                                data-url_edit="{{ route('courses.edit', $course->id) }}"
                                                                data-url_update="{{ route('courses.update', $course->id) }}"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                data-bs-title="Edit Kursus"><i
                                                                    class="iconly-boldEdit"></i></button>
                                                            <form id="delete-{{ $course->id }}"
                                                                action="{{ route('courses.destroy', $course) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="button" class="btn btn-sm btn-danger"
                                                                    onclick ="alertConfirm(this)"
                                                                    data-id="{{ $course->id }}" data-bs-toggle="tooltip"
                                                                    data-bs-placement="top" data-bs-title="Hapus Kursus"><i
                                                                        class="iconly-boldDelete"></i></button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </Tbody>
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
