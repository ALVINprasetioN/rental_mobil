<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@extends('layouts.app2')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create car') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('mobil_store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="merek" class="col-md-4 col-form-label text-md-end">{{ __('Merek') }}</label>

                            <div class="col-md-6">
                                <input id="merek" type="text" class="form-control @error('merek') is-invalid @enderror" name="merek" value="{{ old('merek') }}" required autocomplete="merek" autofocus>

                                @error('merek')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="warna" class="col-md-4 col-form-label text-md-end">{{ __('Warna') }}</label>

                            <div class="col-md-6">
                                <input id="warna" type="warna" class="form-control @error('warna') is-invalid @enderror" name="warna" value="{{ old('warna') }}" required autocomplete="warna">

                                @error('warna')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="file" class="col-md-4 col-form-label text-md-end">{{ __('Foto mobil') }}</label>

                            <div class="col-md-6">
                                <input id="file" type="file" class="form-control @error('file') is-invalid @enderror" name="file" required autocomplete="new-file">

                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" onclick="crt()"class="btn btn-primary">
                                    {{ __('Create') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
function crt(){
    const userConfirmation = confirm("Apakah Anda yakin ingin melanjutkan?");
if (userConfirmation) {
  // Pengguna memilih "OK"
  console.log("Anda memilih OK");
} else {
  // Pengguna memilih "Batal"
  console.log("Anda memilih Batal");
}
}
</script>
@endsection

</body>
</html>