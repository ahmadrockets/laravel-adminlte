@extends('adminlte.master')

@section('content')
    <div class="mt-3 ml-3">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Jawaban Table</h3>
            </div>
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h5><i class="icon fas fa-check"></i> Informasi!</h5>
                        {{session('success')}}
                    </div>
                @endif
                <a href="/jawaban/create" class="btn btn-primary mb-3">Create Jawaban</a>
                <table class="table table-bordered">
                    <thead>                  
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Pertanyaan</th>
                        <th>Jawaban</th>
                        <th style="width: 40px">Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse ($jawabans as $key => $jawaban)
                            <tr>
                                <td>{{$key + 1}}</td>
                                <td>{{ $jawaban->pertanyaan}}</td>
                                <td>{{ $jawaban->isi}}</td>
                                <td style="display: flex;">
                                    <a href="/jawaban/{{$jawaban->id}}" class="btn btn-sm btn-primary">Show</a>
                                    <a href="/jawaban/{{$jawaban->id}}/edit" class="btn btn-sm btn-default">Edit</a>
                                    <form action="/jawaban/{{$jawaban->id}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" value="Hapus" class="btn btn-danger btn-sm">
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4"><center>No Data</center></td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>    
@endsection