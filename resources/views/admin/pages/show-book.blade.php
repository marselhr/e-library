@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <a href="{{ route('book.index') }}" class="btn btn-secondary">
                Kembali</a>
            <h3>Detail Buku</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item" aria-current="page"><a href="{{ route('book.index') }}">Data Buku</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><span
                            class="text-truncate line-clamp-2">Detail</span></li>
                </ol>
            </nav>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h3 class="">{{ $book->title }}</h3>
            </div>
            <div class="card-body">
                <div class="row mb-md-5">
                    <div class="col-12 col-md-6">
                        <h5>Data Pengunggah</h5>
                        <table>
                            <tr>
                                <td>Nama</td>
                                <td class="mx-3">:</td>
                                <td>{{ $book->user->name }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td class="mx-3">:</td>
                                <td>{{ $book->user->email }}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="col-12 col-md-6">
                        <h5>Detail Lainnya</h5>
                        <table>
                            <tr>
                                <td>Kategori</td>
                                <td class="mx-3">:</td>
                                <td>{{ $book->category->name ?? 'Tidak Ada' }}</td>
                            </tr>
                            <tr>
                                <td>Jumlah</td>
                                <td class="mx-3">:</td>
                                <td>{{ $book->quantity }} buah</td>
                            </tr>
                        </table>
                    </div>

                </div>
                <div class="row">
                    <div class="col-12 col-md-6">
                        <h5>Sampul <span class="text-muted">(Gambar)</span></h5>

                        <div class="col-6">
                            <img src="{{ asset('uploads/book-cover/' . $book->cover) }}" alt="" class="img-fluid">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <h5>File <span class="text-muted">(PDF)</span></h5>
                        <iframe src="{{ asset('uploads/book-file/' . $book->file) }}" align="top" height="620"
                            width="100%" frameborder="0" scrolling="auto"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
