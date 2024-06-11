@extends('layouts.admin')
@section('main-content')
    @auth
        <div class="row justify-align-between">
            <div class="col-12">
                <h1 class="h3 float-left mb-4 text-gray-800">{{ __('List of Questions') }}</h1>
                <span class="float-right d-flex">

                    @if ($is_active->is_active == true)
                        <form action="{{ url('/dis_active', 1) }}" method="post">
                            @csrf
                            @method('PUT')

                            <button type="submit" class="btn btn-sm btn-outline-danger mr-2">Close Survei</button>
                        </form>
                    @else
                        <form action="{{ url('/is_active', 1) }}" method="post">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-sm btn-outline-success mr-2">Open Survei</button>
                        </form>
                    @endif

                    <form action="{{ url('/reset') }}" onsubmit="return confirm('apakah anda ingin menghapus semua respond?')"
                        method="post">
                        @csrf
                        <button type="submit" class="btn btn-sm btn-outline-danger mr-2">Reset</button>
                    </form>
                    <button class="btn btn-sm btn-outline-primary mr-2">Jumlah respon : {{ $respon }}</button>
                </span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @php
                    $no = 0;
                @endphp
                @forelse ($objekSurvei as $item)
                    <div class="card shadow-sm mb-3">
                        <div class="card-header justify-align-between bg-primary">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="m-0 float-left font-weight-bold text-white align-self-start">
                                        {{ $item->name }}
                                    </h4>
                                    @php
                                        $result = number_format($rata2ObjekSurvei[$no], 2, '.', '');
                                    @endphp
                                    <div class="float-right m-0">
                                        <button class="btn btn-light btn-sm"><i class="fa fa-star" style="color: orange"></i> :
                                            {{ $result }}</button>
                                        <a href="{{ route('question.edit', $item->id) }}"
                                            class="btn btn-light text-primary btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <button type="button" class="btn btn-light text-primary btn-sm" data-toggle="modal"
                                            data-target="#exampleModal-{{ $item->id }}">
                                            <i class="fa fa-plus"></i>
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal-{{ $item->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <form action="{{ route('question.store') }}" method="post">
                                                        @csrf
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Create Questions</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="hidden" name="objek_survei_id"
                                                                value="{{ $item->id }}">
                                                            <div class="form-group">
                                                                <label for="">Pertanyaan</label>
                                                                <textarea class="form-control" name="text" id="exampleFormControlTextarea1" rows="3" required></textarea>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Create</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @forelse ($question->where('objek_survei_id', $item->id) as $asq)
                                <p> {{ $loop->iteration }}.&emsp;{{ $asq->text }}</p>
                            @empty
                                <div class="alert alert-danger">Pertanyaan belum dibuat!</div>
                            @endforelse

                        </div>
                    </div>
                    @php
                        $no++;
                    @endphp
                @empty
                @endforelse
            </div>
        </div>
    @endauth
@endsection
