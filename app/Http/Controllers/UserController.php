<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function register()
    {
        return view("Auth/register");
    }

    public function processRegister(request $request)
    {
        $request->validate([
            "nama"             => "required",
            "alamat"           => "required",
            "phone_number"     => "required|min:10|max:12",
            "kelas"            => "required",
            "pengalaman"       => "required|nullable|string",
            "email"            => "required|unique:users",
            "nim"              => "required|unique:users|max:12",
            "password"         => "required|min:6",
            "reenter_password" => "required|same:password",
        ]);

        $data = $request->all();

        $data['password'] = bcrypt($data['password']);
        $data['level'] = 0; // Member

        $user = User::create($data);
        // dd($data);
        event(new Registered($user));

        return redirect("user/register-success/{$user->id}");
    }

    public function registerSuccess($userID)
    {
        return view("user/register_success", [
            "userID" => $userID,
        ]);
    }

    public function login()
    {
        return view("Auth/Login");
    }

    public function processLogin(Request $request)
    {
        $credentials = $request->validate([
            'nim' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (Auth::user()->type == 0) { // UNTUK MEMBER
                return redirect('user/jadwal');
            } else { // UNTUK ADMIN / 1
                return redirect('Admin/view/jadwal');
            }

        } else {
            return redirect('user/login')->withErrors("Login Gagal");
        }
    }
    public function logout()
    {
        Auth::logout();

        return redirect('user/login'); // Redirect ke halaman utama setelah logout
    }

    public function UserView() {
        // $allDataUser=User::all();
        $pgn['allDataUser']=User::all();
        return view('user.anggota', $pgn);
    }
}
