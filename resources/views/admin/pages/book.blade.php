@extends('layouts.app', ['title' => 'Daftar Buku'])


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
            <h3>Data Buku</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">Data Buku</li>
                </ol>
            </nav>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">

                <a href="{{ route('book.create') }}" class="btn btn-sm btn-primary float-end ">Tambah Buku</a>
                @if ($books->count() > 0)
                    <a href="{{ route('books.export') }}" class="btn btn-sm btn-success ">Export</a>
                @endif
            </div>
            {{-- @include('generals._validation') --}}
            <div class="card-body">
                <div class="table-responsive">
                    <div id="table1_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">

                        <div class="row dt-row">
                            <div class="col-12 col-sm-2">
                                <p class="fw-medium">Filter Kategori:</p>
                                <form action="{{ route('book.index') }}" class="d-inline" method="GET">
                                    @foreach ($categories as $item)
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="category[]" value="{{ $item->slug }}"
                                                class="form-check-input form-check-primary" id="select{{ $item->id }}"
                                                @if (request()->has('category') && in_array($item->slug, request()->input('category'))) checked @endif>
                                            <label class="form-check-label"
                                                for="select{{ $item->id }}">{{ $item->name }}</label>
                                        </div>
                                    @endforeach
                                    <hr>
                                    <button type="submit" class="float-end btn btn-sm btn-primary">Terapkan</button>
                                    <a href="{{ route('book.index') }}"
                                        class="btn btn-sm float-end btn-secondary">Reset</a>
                                </form>
                            </div>
                            <div class="col-sm-10 col-12">
                                <table class="table dataTable no-footer" id="datatable" aria-describedby="table1_info">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>SAMPUL</th>
                                            <th>JUDUL </th>
                                            <th>DESKRIPSI</th>
                                            <th>KATEGORI</th>
                                            <th>JUMLAH </th>
                                            <th>AKSI</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($books as $book)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    <img src="{{ asset('uploads/book-cover/' . $book->cover) }}"
                                                        alt="{{ $book->slug }}" class="img-fluid" width="100"
                                                        height="200" />
                                                </td>
                                                <td>{{ $book->title }}</td>
                                                <td class="word-wrap">{{ $book->description }}</span>
                                                </td>
                                                <td>{{ $book->category->name ?? 'Tidak Ada' }}</td>
                                                <td>{{ $book->quantity }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('books.show', $book->slug) }}"
                                                            class="btn
                                                                btn-sm btn-info"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"
                                                            data-bs-title="Detail">
                                                            <i class="iconly-boldShow"></i></a>
                                                        <a href="{{ route('books.edit', $book->slug) }}"
                                                            class="btn btn-sm btn-success" data-bs-toggle="tooltip"
                                                            data-bs-placement="top" data-bs-title="Edit Buku"><i
                                                                class="iconly-boldEdit"></i></a>

                                                        <form id="delete-{{ $book->id }}" class="btn btn-sm btn-danger"
                                                            action="{{ route('books.delete', $book->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a class="text-white" role="button"
                                                                onclick="alertConfirm(this)" data-id="{{ $book->id }}"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                data-bs-title="Hapus Buku"> <i
                                                                    class="iconly-boldDelete"></i></a>
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
