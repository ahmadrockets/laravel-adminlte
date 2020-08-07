@extends('adminlte.master')

@section('content')
    <div class="mt-3 ml-3">
        <h1>{{$pertanyaan->judul}}</h1>
        <h5>{{$pertanyaan->isi}}</h5>
    </div>
@endsection