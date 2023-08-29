<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.0.18/dist/sweetalert2.min.js"></script>
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
                    <form method="POST" action="{{ route('mobil_store') }}" enctype="multipart/form-data" id="myFormm">
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
                                <button type="submit" class="btn btn-primary" id="success">
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
@include('sweetalert::alert')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#myFormm').on('submit', function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'apakah kamu yakin?',
            text: "kamu ingin membahkan buku!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'yaa , tambahkan!'
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire(
                    'Success',
                    'kamu berhasil menambahkan buku.',
                    'success'
                ).then(() => {
                    // Perform form submission here
                    // For demonstration purposes, let's just log the submission
                    $(this).unbind('submit').submit();
                });
            }
        });
    });
});
</script>
@endsection

</body>
</html>