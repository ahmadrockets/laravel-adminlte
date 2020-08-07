@extends('adminlte.master')

@section('content')
    <div class="mt-3 ml-3">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Form Edit Jawaban</h3>
            </div>
            <form role="form" action="/jawaban/{{$jawaban->id}}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="pertanyaan_id">Pertanyaan {{old('pertanyaan_id')}}</label>
                        <select id="pertanyaan_id" name="pertanyaan_id" class="form-control">
                            <option value="">-- Pilih Pertanyaan --</option>
                            @foreach ($pertanyaans as $pertanyaan)
                            @if ($pertanyaan->id==old('pertanyaan_id',$jawaban->pertanyaan_id))
                            <option selected="selected" value="{{$pertanyaan->id}}" value="{{$pertanyaan->id}}">{{$pertanyaan->judul}}</option>
                            @else
                            <option value="{{$pertanyaan->id}}" value="{{$pertanyaan->id}}">{{$pertanyaan->judul}}</option>
                            @endif
                            @endforeach
                          </select>
                    </div>
                    @error('pertanyaan_id')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="form-group">
                        <label for="isi">Isi</label>
                        <input type="text" class="form-control" value="{{old('isi',$jawaban->isi)}}" name="isi" id="isi" placeholder="Isi" required>
                    </div>
                    @error('isi')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="card-footer">
                    <a href="/jawaban" class="btn btn-default">Batal</a>
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection