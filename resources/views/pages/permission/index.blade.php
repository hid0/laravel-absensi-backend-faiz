@extends('layouts.app', ['title' => 'Permission Employee Data'])

@push('style')
  <!-- CSS Libraries -->
  {{-- <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}"> --}}
@endpush

@section('main')
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Permission Data</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
          <div class="breadcrumb-item"><a href="#">Permission</a></div>
          <div class="breadcrumb-item">All Data</div>
        </div>
      </div>
      <div class="section-body">
        <div class="row">
          <div class="col-12">
            @include('layouts.alert')
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Permission Data</h4>
              </div>
              <div class="card-body">
                <div class="clearfix mb-3"></div>
                <div class="table-responsive">
                  <table class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Reason</th>
                        <th scope="col">Image</th>
                        <th scope="col">Is Approve</th>
                        <th scope="col">#</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($permissions as $data)
                        <tr>
                          <td>{{ $data->user->name }}</td>
                          <td>{{ $data->date_permission }}</td>
                          <td> {{ $data->reason }}</td>
                          <td><img width="50" class="rounded" src="{{ $data->image }}" alt=""></td>
                          <td>
                            {!! $data->is_approve == 'true'
                                ? '<a href="#" class="badge badge-success">Disetujui</a>'
                                : '<a href="#" class="badge badge-danger">Belum Disetujui</a>' !!}
                          </td>
                          <td>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
                <div class="float-right">
                  {{ $permissions->withQueryString()->links() }}
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection

@push('scripts')
  <!-- JS Libraies -->
  {{-- <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script> --}}
  <!-- Page Specific JS File -->
@endpush
