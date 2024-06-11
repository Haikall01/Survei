@extends('layouts.admin')
@section('main-content')
    @if ($is_active->is_active == true)
        <div class="row">
            <div class="col-md-12">
                <form action="{{ route('respond.store') }}" method="post">
                    @csrf
                    <div class="card shadow">
                        @forelse ($objekSurvei as $os)
                            <div class="row card-header text-light bg-primary m-0">
                                <div class="col-8">
                                    <h5>{{ $os->name }}</h5>
                                </div>
                                <div class="col-4">
                                    <h5>Tanggapan</h5>
                                </div>
                            </div>
                            <div class="card-body m-0 p-0">
                                @foreach ($question->where('objek_survei_id', $os->id) as $item)
                                    <div class="row border shadow-sm p-2 m-0">
                                        <div class="col-md-8">
                                            <h5>{{ $item->text }} <span class="text-danger">*</span> </h5>
                                        </div>
                                        <div class="col-md-3 border-left  border-primary">
                                            @foreach ($tanggapan as $tpn)
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio"
                                                        name="{{ $os->name . '-' . $item->id }}"
                                                        id="exampleRadios-{{ $item->id }}" value="{{ $tpn->point }}"
                                                        required>
                                                    <label class="form-check-label" for="exampleRadios-{{ $tpn->id }}">
                                                        {{ $tpn->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        @empty
                        @endforelse
                        <div class="card-footer shadow-sm border">
                            <div class="row float-right">
                                <button type="submit" class="btn btn-primary btn-sm">Kirim</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger">
                    Form Survei Kepuasn Pengguna belum dibuka!
                </div>
            </div>
        </div>
    @endif
@endsection
