@extends('layouts.app')


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
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Data Kategori Buku</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Data Kategori Buku</li>
                </ol>
            </nav>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('categories.create') }}" class="btn btn-primary float-end ">Tambah Kategori</a>
            </div>
            {{-- @include('generals._validation') --}}
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
                                            <th>NAMA</th>
                                            <th>DESKRIPSI </th>
                                            <th>TERAKHIR DISIMPAN</th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($categories as $category)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $category->name }}</td>
                                                <td>{{ $category->description }}</td>
                                                <td>{{ $category->updated_at }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <button
                                                            class="btn
                                                                btn-sm btn-info"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Detail">
                                                            <i class="iconly-boldShow"></i></button>
                                                        <a href="" class="btn btn-sm btn-success"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Edit Materi"><i class="iconly-boldEdit"></i></a>

                                                        <form id="delete-{{ $category->id }}"
                                                            action="{{ route('categories.delete', $category->id) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-sm btn-danger"
                                                                onclick="alertConfirm(this)" data-id="{{ $category->id }}"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                data-bs-title="Hapus Materi"> <i
                                                                    class="iconly-boldDelete"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                    <tfoot>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
