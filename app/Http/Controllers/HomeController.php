<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Session\Session;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index()
    {
        return view('beranda');
    }
    public function login()
    {
        $data = [
            'title' => 'Login',
        ];
        return view('login', $data);
    }
    public function logincek(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $akun = DB::table('users')
            ->where('email', $email)
            ->where('password', $password)
            ->first();
        if ($akun) {
            session(['users' => $akun]);
            return redirect('panel/dashboard')->with('success', 'Login Berhasil');
        } else {
            return redirect()->back()->with('error', 'Anda gagal login, Email atau password salah');
        }
    }
    public function daftar()
    {
        $data = [
            'title' => 'Daftar',
        ];
        return view('daftar', $data);
    }
    public function daftarsimpan(Request $request)
    {
        $nama = $request->input('nama');
        $email = $request->input('email');
        $password = $request->input('password');
        $data = [
            'nama' => $nama,
            'email' => $email,
            'password' => $password,
            'level' => 'User',
        ];
        DB::table('users')->insert($data);

        session()->flash('success', 'Daftar akun berhasil, Silahkan menuju halaman login');
        return redirect('daftar');
    }

    public function lokerdaftar()
    {
        $loker = DB::table('loker')->where('tanggalbataspendaftaran', '>=', date('Y-m-d'))->paginate(6);
        $data = [
            'title' => 'Daftar Loker',
            'loker' => $loker,
        ];
        return view('lokerdaftar', $data);
    }

    public function lokerdetail($id)
    {
        $loker = DB::table('loker')->where('idloker', $id)->first();
        $data = [
            'title' => 'Detail Loker',
            'loker' => $loker,
        ];
        return view('lokerdetail', $data);
    }

    public function beasiswadaftar()
    {
        $beasiswa = DB::table('beasiswa')->where('tanggalbataspendaftaran', '>=', date('Y-m-d'))->paginate(6);
        $data = [
            'title' => 'Daftar beasiswa',
            'beasiswa' => $beasiswa,
        ];
        return view('beasiswadaftar', $data);
    }

    public function beasiswadetail($id)
    {
        $beasiswa = DB::table('beasiswa')->where('idbeasiswa', $id)->first();
        $data = [
            'title' => 'Detail beasiswa',
            'beasiswa' => $beasiswa,
        ];
        return view('beasiswadetail', $data);
    }

    public function lombadaftar()
    {
        $lomba = DB::table('lomba')->where('tanggalbataspendaftaran', '>=', date('Y-m-d'))->paginate(6);
        $data = [
            'title' => 'Daftar lomba',
            'lomba' => $lomba,
        ];
        return view('lombadaftar', $data);
    }

    public function lombadetail($id)
    {
        $lomba = DB::table('lomba')->where('idlomba', $id)->first();
        $data = [
            'title' => 'Detail lomba',
            'lomba' => $lomba,
        ];
        return view('lombadetail', $data);
    }
}
