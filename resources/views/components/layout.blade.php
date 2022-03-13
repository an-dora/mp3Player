<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $attributes['title'] ?? 'Play MP3' }}</title>
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<body>
    {{-- @include('common.mp3control') --}}
    @include('common.navbar');
    <div class="container-fluid my-3">
        <div class="row">
            <div class="col">
                {{-- Thong bao thanh cong --}}
                @if (session('success_mesg'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success_mesg') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                {{-- Thong báo loi --}}
                @if (session('error_mesg'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error_mesg') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>
        {{-- Components --}}
        {{ $slot }}
    </div>
    <script src="/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

</body>

</html>
