@extends('adminlte.master')

@section('content')
    <div class="mt-3 ml-3">
        <h1>Pertanyaan : {{$jawaban->pertanyaan}}</h1>
        <h5>{{$jawaban->isi}}</h5>
    </div>
@endsection