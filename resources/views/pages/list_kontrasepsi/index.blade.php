@extends('layouts.app')

@section('title', 'List Kontrasepsi')

@section('content')
    <section class="section">
          <div class="section-header">
            <h1>List Kontrasepsi</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="{{ route('dashboard') }}">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="{{ route('listkontrasepsi.index') }}">List Kontrasepsi</a></div>
              <div class="breadcrumb-item">All List Kontrasepsi</div>
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
                        @foreach ($data as $eachdata)
                            <tr>
                              <th scope="row">{{ $no }}</th>
                              <td>{{ $eachdata['nama_kontrasepsi'] }}</td>
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