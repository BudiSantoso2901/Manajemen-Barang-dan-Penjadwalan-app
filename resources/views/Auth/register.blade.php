<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <title>Register</title>
</head>

<body>
    <div class="register-lands">
        <div class="div">
            <div class="overlap-group">
                <form method="POST" action="{{ url('user/process-register') }}">
                    @csrf
                    <div class="text-wrapper-2">Register</div>

                    <input type="text" class="input-field" placeholder="Enter your NIM" id="nim"
                        name="nim">
                    <div class="text-wrapper-3">NIM</div>

                    <input type="password" class="input-field-2" placeholder="Enter your Password" id="password"
                        name="password">
                    <div class="text-wrapper-4">Password</div>

                    <input type="password" class="input-field-9" placeholder="Reenter your Password"
                        id="reenter_password" name="reenter_password">
                    <div class="text-wrapper-11">Reenter Password</div>

                    <input type="text" class="input-field-3" placeholder="Enter your Nama" id="nama"
                        name="nama">
                    <div class="text-wrapper-5">Nama</div>

                    <input type="text" class="input-field-5" placeholder="Enter your Jurusan/Kelas" id="kelas"
                        name="kelas">
                    <div class="text-wrapper-7">Jurusan/Kelas</div>

                    <input type="text" class="input-field-6" placeholder="Enter your Alamat" id="alamat"
                        name="alamat">
                    <div class="text-wrapper-8">Alamat</div>

                    <input type="email" class="input-field-7" placeholder="Enter your Email" id="email"
                        name="email">
                    <div class="text-wrapper-9">Email</div>

                    <input type="text" class="input-field-8" placeholder="Enter your No.HP/WA" id="phone_number"
                        name="phone_number">
                    <div class="text-wrapper-10">No.HP/WA</div>

                    <textarea type="textarea" class="input-field-4" placeholder="Enter your Pengalaman Sebelumnya" id="pengalaman"
                        name="pengalaman"></textarea>
                    <div class="text-wrapper-6">Pengalaman Sebelumnya</div>

                    <div class="button">
                        <button type="submit" >Register</button>

                    </div>
                    <div class="signin-link">
                        Sudah Punya Akun? <a href="{{ url('user/login') }}">Sign In</a>
                      </div>
                </form>

            </div>
            <img class="mcp-logo" src="{{ asset('images/medcen2.jpg') }}" al />
        </div>
    </div>
</body>

</html>
