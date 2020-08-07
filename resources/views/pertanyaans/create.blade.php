@extends('adminlte.master')

@section('content')
    <div class="mt-3 ml-3">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Create Pertanyaan</h3>
            </div>
            <form role="form" action="/pertanyaan" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" value="{{old('judul','')}}" name="judul" id="judul" placeholder="Judul" required>
                    </div>
                    @error('judul')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="isi">Isi</label>
                        <input type="text" class="form-control" value="{{old('isi','')}}" name="isi" id="isi" placeholder="Isi" required>
                    </div>
                    @error('isi')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection