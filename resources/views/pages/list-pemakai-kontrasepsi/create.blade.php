@extends('layouts.app')

@section('title', 'List Pemakai Kontrasepsi')

@section('content')
    <section class="section">
          <div class="section-header">
            <h1>List Pemakai Alat Kontrasepsi</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="{{ route('listpemakaikontrasepsi.index') }}">List Pemakai Kontrasepsi</a></div>
              <div class="breadcrumb-item">Create</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Create</h2>
            <p class="section-lead">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, sed omnis laborum libero fugit deserunt.
            </p>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    {{-- <div class="row">
                      <div class="col-6">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Nama Propinsi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($listPropinsi as $eachdata)
                                <tr>
                                  <th scope="row">{{ $no }}</th>
                                  <th scope="row">{{ $eachdata['label'] }}</th>
                                </tr>
                                @php
                                    $no++;
                                @endphp
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                      <div class="col-6">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Nama Kontrasepsi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @php
                                $no = 1;
                            @endphp
                            @foreach ($listKontrasepsi as $eachdata)
                                <tr>
                                  <th scope="row">{{ $no }}</th>
                                  <th scope="row">{{ $eachdata['label'] }}</th>
                                </tr>
                                @php
                                    $no++;
                                @endphp
                            @endforeach
                          </tbody>
                        </table>
                      </div>
                    </div> --}}
                    <form action="{{ route('listpemakaikontrasepsi.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <div class="form-group">
                                  <label>Propinsi</label>
                                  <select class="form-control" name="propinsi">
                                    <option value="" selected>-</option>
                                    @foreach ($listPropinsi as $eachdata)
                                      <option value="{{ $eachdata['value'] }}">{{ $eachdata['label'] }}</option>
                                    @endforeach
                                  </select>
                                </div>
                                @foreach ($errors->get('propinsi') as $error)
                                    <div class="invalid-feedback">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                  <label>Kontrasepsi</label>
                                  <select class="form-control" name="kontrasepsi">
                                    <option value="" selected>-</option>
                                    @foreach ($listKontrasepsi as $eachdata)
                                      <option value="{{ $eachdata['value'] }}">{{ $eachdata['label'] }}</option>
                                    @endforeach
                                  </select>
                                </div>
                                @foreach ($errors->get('kontrasepsi') as $error)
                                    <div class="invalid-feedback">
                                        {{ $error }}
                                    </div>
                                @endforeach
                            </div>
                            <div class="form-group mb-0">
                                <label>Jumlah Pemakai</label>
                                <div class="input-group">
                                    <input type="text" class="form-control @error('jumlah_pemakai') is-invalid @enderror" name="jumlah_pemakai" value="{{ old('jumlah_pemakai') }}">
                                    @foreach ($errors->get('jumlah_pemakai') as $error)
                                        <div class="invalid-feedback">
                                            {{ $error }}
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection