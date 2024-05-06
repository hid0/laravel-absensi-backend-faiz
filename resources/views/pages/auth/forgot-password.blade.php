@extends('layouts.auth', ['title' => 'Forgot Password'])

@push('style')
  <!-- CSS Libraries -->
@endpush

@section('main')
  <div class="card card-primary">
    <div class="card-header">
      <h4>Lupa Sandi</h4>
    </div>

    <div class="card-body">
      <p class="text-muted">Kami akan mengirim link untuk reset sandi anda!</p>
      <form method="POST">
        <div class="form-group">
          <label for="email">Email</label>
          <input id="email" type="email" class="form-control" name="email" tabindex="1" required autofocus>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
            Lupa Sandi
          </button>
        </div>
      </form>
    </div>
  </div>
@endsection

@push('scripts')
  <!-- JS Libraies -->

  <!-- Page Specific JS File -->
@endpush
