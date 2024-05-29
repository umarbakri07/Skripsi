@extends('admin.partials.main')
@section('title', 'Admin/Bibit')
@section('content_admin')
    <div class="container-fluid pt-4 px-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Tabel Data Anggur</h6>
                <div class="table-responsive">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <a href="/bibit/create" type="button" class="btn btn-primary">
                            Tambah
                        </a>
                        <form class="form-inline">
                            <div class="form-group mx-4">
                                <input class="form-control border-0" type="search" placeholder="Search" id="searchInput"
                                    name="search">
                            </div>
                        </form>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Anggur</th>
                                <th scope="col">Nama Latin</th>
                                <th scope="col">Karakteristik</th>
                                <th scope="col">Waktu Berbuah</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bibits as $index => $bibit)
                                <tr>
                                    <td>{{ $index + $bibits->firstItem() }}</td>
                                    <td>{{ $bibit->nama_anggur }}</td>
                                    <td>{{ $bibit->nama_latin }}</td>
                                    <td>{{ $bibit->karakteristik }}</td>
                                    <td>{{ $bibit->waktu_berbuah }}</td>
                                    <td>
                                        <img src="{{ asset('gambar/' . $bibit->gambar) }}" width="50" height="50">
                                    </td>
                                    <td>
                                        <form action="/bibit/{{ $bibit->id }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                onclick="return confirm('Yakin {{ $bibit->nama_anggur }} Dihapus? ');"
                                                class="btn btn-square btn-danger m-2">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <a href="/bibit/{{ $bibit->id }}/edit" type="button"
                                                class="btn btn-square btn-warning m-2">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="/bibit/{{ $bibit->id }}" type="button"
                                                class="btn btn-square btn-success m-2">
                                                <i class="fa fa-qrcode"></i>
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $bibits->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
