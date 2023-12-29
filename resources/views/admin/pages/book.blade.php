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
        // const modalEdit = new bootstrap.Modal($('#modalEdit'))
        // $('#datatable').on('click', '.action-edit', function() {
        //     const data = $(this).data()
        //     modalEdit.show()
        //     $("#myForm").attr('action', data.url_update);
        //     $.ajax({
        //         type: 'GET',
        //         url: data.url_edit,
        //         success: function(res) {
        //             $('input[name=title]').val(res.title)
        //             $('input[name=duration]').val(res.duration)
        //         }
        //     })
        // })
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
                <a href="{{ route('book.create') }}" class="btn btn-primary float-end ">Tambah Buku</a>
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

                                                        <form id="delete-{{ $book->id }}"
                                                            action="{{ route('books.delete', $book->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-sm btn-danger"
                                                                onclick="alertConfirm(this)" data-id="{{ $book->id }}"
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
