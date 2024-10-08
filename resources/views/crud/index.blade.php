@extends('crud.template')

@section('konten')

     <!-- PESAN EROR -->
     @if ($errors->any())
    <div class="pt-3">
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $item)
                <li>{{ $item }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif

    <!-- PESAN SUKSES -->
    @if (session('success'))
      <div class="pt-3">
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
      </div>
    @endif

 <!-- START DATA -->
        <div class="my-3 p-3 bg-body rounded shadow-sm">
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                  <form class="d-flex" action="{{ url('siswa')}}" method="get">
                      <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                      <button class="btn btn-secondary" type="submit">Cari</button>
                  </form>
                </div>
                
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                  <a href="{{ url('siswa/create')}}" class="btn btn-primary">+ Tambah Data</a>
                </div>


          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">No</th>
                            <th class="col-md-3">NIS</th>
                            <th class="col-md-4">Nama</th>
                            <th class="col-md-2">Jurusan</th>
                            <th class="col-md-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = $data->firstItem() ?>

                         <!-- PERULANGAN -->
                        @foreach($data as $item)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $item->nis }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->jurusan }}</td>

                                <td>
                                    <a href="{{ url('siswa/'.$item->nis.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form onsubmit="return confirm('yakin menghapus data')" class='d-inline'action="{{ url('siswa/'.$item->nis) }}" method="post">
                                        @csrf
                                        @method('Delete')
                                        <button type="submit" name="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        <?php $i++ ?>
                    </tbody>
                    {{ $data->withQueryString()->links() }}
                </table>
               </div>
          <!-- AKHIR DATA -->
@endsection