@extends('admin.partials.main')
@section('title', 'Admin/Bibit')
@section('content_admin')
    <div class="container-fluid pt-4 px-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Tabel Artikel</h6>
                <div class="table-responsive">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <a href="/artikel/create" type="button" class="btn btn-primary">
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
                                <th scope="col">Artikel Anggur</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Gambar</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($artikels as $index => $artikel)
                                <tr>
                                    <td>{{ $index + $artikels->firstItem() }}</td>
                                    <td>{{ Str::limit(strip_tags($artikel->artikel_anggur), 10) }}</td>
                                    <td>{!! Str::limit(strip_tags($artikel->keterangan), 10) !!}</td>
                                    <td>
                                        <img src="{{ asset('foto/' . $artikel->foto) }}" width="50" height="50">
                                    </td>
                                    <td>
                                        <form action="/artikel/{{ $artikel->id }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                onclick="return confirm('Yakin {{ $artikel->artikel_anggur }} Dihapus? ');"
                                                class="btn btn-square btn-danger m-2">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <a href="/artikel/{{ $artikel->id }}/edit" type="button"
                                                class="btn btn-square btn-warning m-2">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $artikels->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
