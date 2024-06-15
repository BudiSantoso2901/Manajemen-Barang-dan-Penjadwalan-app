<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Media Center Poliwangi</title>
</head>

<body>
    <div class="login-pop-up">
        <div class="div">
            <div class="overlap-group">
                <div class="text-wrapper">NIM</div>
                <div class="text-wrapper-2">Password</div>
                {{-- Alert Success & Error --}}
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                        @php
                            Session::forget('success');
                        @endphp
                    </div>
                @endif
                @if (Session::has('error'))
                    <div class="alert alert-warning">
                        {{ Session::get('error') }}
                        @php
                            Session::forget('error');
                        @endphp
                    </div>
                @endif

                {{-- Menampilkan Error Form Validation --}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <b>Terjadi kesalahan saat input data</b><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ url('user/process-login') }}">
                    @csrf
                    <input type="text" class="rectangle" placeholder="Enter your NIM" id="nim" name="nim">
                    <input type="password" class="rectangle-2" placeholder="Enter your password" id="password"
                        name="password">
                    <button type="submit" class="button button-2" type="button">Login</button>
                </form>
                <div class="text-wrapper-3">Login</div>
            </div>
            <img class="mcp-logo" src="{{ asset('images/medcen2.jpg') }}" alt="logo mcp" />
        </div>
    </div>
</body>

</html>
