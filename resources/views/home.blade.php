@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Hii, Wisudawan!!!') }}</h1>

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    @php
        $no = 0;
    @endphp
    <div class="row">
        @foreach ($objekSurvei as $item)
            <div class="col-md-3 mb-3">
                <div class="card shadow-sm">
                    <div class="card-body mb-0">
                        <h2 class="">{{ $item->name }}</h2>
                        <p class="small float-left mb-0">Questions :
                            {{ $question->where('objek_survei_id', $item->id)->count() }}</p>
                        @php
                            $result = number_format($rata2ObjekSurvei[$no], 2, '.', '');
                        @endphp
                        <span class="small float-right"><i class="fa fa-star text-warning"></i>&emsp13;{{ $result }} </span>
                    </div>
                </div>
            </div>
            @php
                $no++;
            @endphp
        @endforeach
    </div>
@endsection
