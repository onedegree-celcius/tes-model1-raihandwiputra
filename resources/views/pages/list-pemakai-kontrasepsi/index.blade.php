@extends('layouts.app')

@section('title', 'List Pemakai Kontrasepsi')

@section('content')
    <section class="section">
          <div class="section-header">
            <h1>List Pemakai Alat Kontrasepsi</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="{{ route('listpemakaikontrasepsi.index') }}">List Pemakai Kontrasepsi</a></div>
              <div class="breadcrumb-item">All List Pemakai Kontrasepsi</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Data</h2>
            <p class="section-lead">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum, sed omnis laborum libero fugit deserunt.
            </p>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <a href="{{ route('listpemakaikontrasepsi.create') }}" class="btn btn-primary mb-3 ml-auto">Create</a>
                    <a href="{{ route('listpemakaikontrasepsi.export') }}" class="btn btn-info mb-3 ml-auto">Export</a>
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Nama Propinsi</th>
                          <th scope="col">Nama Kontrasepsi</th>
                          <th scope="col">Jumlah Pemakai</th>
                        </tr>
                      </thead>
                      <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $eachdata)
                            <tr>
                              <th scope="row">{{ $no }}</th>
                              <th scope="row">{{ $eachdata->propinsi->nama_propinsi }}</th>
                              <th scope="row">{{ $eachdata->kontrasepsi->nama_kontrasepsi }}</th>
                              <th scope="row">{{ $eachdata['jumlah_pemakai'] }}</th>
                            </tr>
                            @php
                                $no++;
                            @endphp
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
@endsection