@extends('layouts.admin')
@section('main-content')
    <h1 class="h3 mb-4 text-gray-800">Edit Question {{ $quest->name }}</h1>
    @foreach ($listQ as $item)
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="card shadow-sm ">
                    <form action="{{ route('question.destroy', $item->id) }}" onsubmit="return confirm('Apakah anda yakin ingin menghapus question ini?')" method="post">
                        @csrf
                        @method('DELETE')
                        <div class="card-header bg-primary text-light">Question - {{ $loop->iteration }}
                            <span class="float-right">
                                <button class="btn btn-light btn-sm"><i class="fa fa-trash"></i></button>
                            </span>
                        </div>
                    </form>
                    <form action="{{ route('question.update', $item->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <textarea class="form-control" name="soal" id="" cols="30" rows="5">{{ $item->text }}</textarea>
                        </div>
                        <div class="card-footer">
                            <div class="row float-right">
                                <button type="submit" class="btn btn-primary btn-sm mr-2 mb-2">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
