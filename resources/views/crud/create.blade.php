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


    <!-- START FORM -->
    <form action='{{ url('siswa') }}' method='post'>
        @csrf
        <div class="my-3 p-3 bg-body rounded shadow-sm">
        <a href='{{ url('siswa')}}' class="btn btn-secondary"><< kembali</a>
            <div class="mb-3 row">
                <label for="nis" class="col-sm-2 col-form-label">NIS</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name='nis' value="{{session('nis')}}" id="nis">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama' value="{{ session('nama') }}" id="nama">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='jurusan' value="{{ session('jurusan') }}" id="jurusan">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jurusan" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-10"><button type="submit" class="btn btn-primary" name="submit">SIMPAN</button></div>
            </div>
          </form>
        </div>
        <!-- AKHIR FORM -->
@endsection