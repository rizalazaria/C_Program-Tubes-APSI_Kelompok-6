<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\Session\Session;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function dashboard()
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
        $jumlahlomba = DB::table('lomba')
            ->count();
        $jumlahbeasiswa = DB::table('beasiswa')
            ->count();
        $jumlahloker = DB::table('loker')
            ->count();
        $data = [
            'title' => 'Selamat Datang Di',
            'jumlahlomba' => $jumlahlomba,
            'jumlahbeasiswa' => $jumlahbeasiswa,
            'jumlahloker' => $jumlahloker,
        ];
        // dd($jumlahlomba);
        return view('admin/dashboard', $data);
    }

    // Loker
    public function lokerdaftar()
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
        $data['title'] = 'Loker';
        $data['loker'] = DB::table('loker')->orderBy('idloker', 'DESC')->get();
        // dd($data);
        return view('admin/lokerdaftar', $data);
    }

    public function lokertambah()
    {
        $data = [
            'title' => 'Tambah Loker'
        ];
        return view('admin/lokertambah', $data);
    }

    public function lokertambahsimpan(Request $request)
    {
        $judul = $request->input('judul');
        $deskripsi = $request->input('deskripsi');
        $tanggal = $request->input('tanggal');
        $tanggalbataspendaftaran = $request->input('tanggalbataspendaftaran');
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,png',
        ]);
        $datainsert = [
            'judul' => $judul,
            'deskripsi' => $deskripsi,
            'tanggal' => $tanggal,
            'tanggalbataspendaftaran' => $tanggalbataspendaftaran,
        ];
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->hashName();
            $request->file('foto')->move(('foto'), $foto);
            $datainsert['foto'] = $foto;
        }
        DB::table('loker')->insert($datainsert);
        session()->flash('success', 'Berhasil menambahkan data!');
        return redirect('panel/lokerdaftar');
    }

    public function lokeredit($id)
    {
        $loker = DB::table('loker')->where('idloker', $id)->first();
        $data = [
            'title' => 'Edit Arsip',
            'loker' => $loker,
        ];
        return view('admin/lokeredit', $data);
    }

    public function lokereditsimpan(Request $request, $id)
    {
        $judul = $request->input('judul');
        $deskripsi = $request->input('deskripsi');
        $tanggal = $request->input('tanggal');
        $tanggalbataspendaftaran = $request->input('tanggalbataspendaftaran');

        $filedidatabase = DB::table('loker')->where('idloker', $id)->select('foto')->first()->foto;

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required',
            'tanggalbataspendaftaran' => 'required',
        ]);
        $dataupdate = [
            'judul' => $judul,
            'deskripsi' => $deskripsi,
            'tanggal' => $tanggal,
            'tanggalbataspendaftaran' => $tanggalbataspendaftaran,
        ];
        DB::table('loker')->where('idloker', $id)->update($dataupdate);
        if ($request->hasFile('foto')) {
            $file = $request->file('foto')->hashName();

            $newname = $request->file('foto')->hashName();
            if ($filedidatabase && file_exists('foto/' . $filedidatabase)) {
                unlink('foto/' . $filedidatabase);
            }
            $request->file('foto')->move(('foto'), $file);
            $dataupdate['foto'] = $newname;
            DB::table('loker')->where('idloker', $id)->update($dataupdate);
        }
        session()->flash('success', 'Data berhasil diedit!');
        return redirect('panel/lokerdaftar');
    }

    public function lokerhapus($id)
    {
        $filedidatabase = DB::table('loker')->where('idloker', $id)->select('foto')->first()->foto ?? [];
        DB::table('loker')->where('idloker', $id)->delete();
        if ($filedidatabase && file_exists('foto/' . $filedidatabase)) {
            unlink('foto/' . $filedidatabase);
        }
        session()->flash('success', 'Berhasil menghapus data!');
        return back();
    }

    // Beasiswa
    public function beasiswadaftar()
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
        $data['title'] = 'Beasiswa';
        $data['beasiswa'] = DB::table('beasiswa')->orderBy('idbeasiswa', 'DESC')->get();
        // dd($data);
        return view('admin/beasiswadaftar', $data);
    }

    public function beasiswatambah()
    {
        $data = [
            'title' => 'Tambah Beasiswa'
        ];
        return view('admin/beasiswatambah', $data);
    }

    public function beasiswatambahsimpan(Request $request)
    {
        $judul = $request->input('judul');
        $deskripsi = $request->input('deskripsi');
        $tanggal = $request->input('tanggal');
        $tanggalbataspendaftaran = $request->input('tanggalbataspendaftaran');
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,png',
        ]);
        $datainsert = [
            'judul' => $judul,
            'deskripsi' => $deskripsi,
            'tanggal' => $tanggal,
            'tanggalbataspendaftaran' => $tanggalbataspendaftaran,
        ];
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->hashName();
            $request->file('foto')->move(('beasiswa'), $foto);
            $datainsert['foto'] = $foto;
        }
        DB::table('beasiswa')->insert($datainsert);
        session()->flash('success', 'Berhasil menambahkan data!');
        return redirect('panel/beasiswadaftar');
    }

    public function beasiswaedit($id)
    {
        $beasiswa = DB::table('beasiswa')->where('idbeasiswa', $id)->first();
        $data = [
            'title' => 'Edit Beasiswa',
            'beasiswa' => $beasiswa,
        ];
        return view('admin/beasiswaedit', $data);
    }

    public function beasiswaeditsimpan(Request $request, $id)
    {
        $judul = $request->input('judul');
        $deskripsi = $request->input('deskripsi');
        $tanggal = $request->input('tanggal');
        $tanggalbataspendaftaran = $request->input('tanggalbataspendaftaran');

        $filedidatabase = DB::table('beasiswa')->where('idbeasiswa', $id)->select('foto')->first()->foto ?? [];

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required',
            'tanggalbataspendaftaran' => 'required',
        ]);
        $dataupdate = [
            'judul' => $judul,
            'deskripsi' => $deskripsi,
            'tanggal' => $tanggal,
            'tanggalbataspendaftaran' => $tanggalbataspendaftaran,
        ];
        DB::table('beasiswa')->where('idbeasiswa', $id)->update($dataupdate);
        if ($request->hasFile('foto')) {
            $file = $request->file('foto')->hashName();

            $newname = $request->file('foto')->hashName();
            if ($filedidatabase && file_exists('beasiswa/' . $filedidatabase)) {
                unlink('beasiswa/' . $filedidatabase);
            }
            $request->file('foto')->move(('beasiswa'), $file);
            $dataupdate['foto'] = $newname;
            DB::table('beasiswa')->where('idbeasiswa', $id)->update($dataupdate);
        }
        session()->flash('success', 'Data berhasil diedit!');
        return redirect('panel/beasiswadaftar');
    }

    public function beasiswahapus($id)
    {
        $filedidatabase = DB::table('beasiswa')->where('idbeasiswa', $id)->select('foto')->first()->foto ?? [];
        DB::table('beasiswa')->where('idbeasiswa', $id)->delete();
        if ($filedidatabase && file_exists('beasiswa/' . $filedidatabase)) {
            unlink('beasiswa/' . $filedidatabase);
        }
        session()->flash('success', 'Berhasil menghapus data!');
        return back();
    }

    // Lomba
    public function lombadaftar()
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
        $data['title'] = 'Lomba';
        $data['lomba'] = DB::table('lomba')->orderBy('idlomba', 'DESC')->get();
        // dd($data);
        return view('admin/lombadaftar', $data);
    }

    public function lombatambah()
    {
        $data = [
            'title' => 'Tambah Lomba'
        ];
        return view('admin/lombatambah', $data);
    }

    public function lombatambahsimpan(Request $request)
    {
        $judul = $request->input('judul');
        $deskripsi = $request->input('deskripsi');
        $tanggal = $request->input('tanggal');
        $tanggalbataspendaftaran = $request->input('tanggalbataspendaftaran');
        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required',
            'foto' => 'required|mimes:jpg,jpeg,png',
        ]);
        $datainsert = [
            'judul' => $judul,
            'deskripsi' => $deskripsi,
            'tanggal' => $tanggal,
            'tanggalbataspendaftaran' => $tanggalbataspendaftaran,
        ];
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto')->hashName();
            $request->file('foto')->move(('lomba'), $foto);
            $datainsert['foto'] = $foto;
        }
        DB::table('lomba')->insert($datainsert);
        session()->flash('success', 'Berhasil menambahkan data!');
        return redirect('panel/lombadaftar');
    }

    public function lombaedit($id)
    {
        $lomba = DB::table('lomba')->where('idlomba', $id)->first();
        $data = [
            'title' => 'Edit lomba',
            'lomba' => $lomba,
        ];
        return view('admin/lombaedit', $data);
    }

    public function lombaeditsimpan(Request $request, $id)
    {
        $judul = $request->input('judul');
        $deskripsi = $request->input('deskripsi');
        $tanggal = $request->input('tanggal');
        $tanggalbataspendaftaran = $request->input('tanggalbataspendaftaran');

        $filedidatabase = DB::table('lomba')->where('idlomba', $id)->select('foto')->first()->foto ?? [];

        $request->validate([
            'judul' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required',
            'tanggalbataspendaftaran' => 'required',
        ]);
        $dataupdate = [
            'judul' => $judul,
            'deskripsi' => $deskripsi,
            'tanggal' => $tanggal,
            'tanggalbataspendaftaran' => $tanggalbataspendaftaran,
        ];
        DB::table('lomba')->where('idlomba', $id)->update($dataupdate);
        if ($request->hasFile('foto')) {
            $file = $request->file('foto')->hashName();

            $newname = $request->file('foto')->hashName();
            if ($filedidatabase && file_exists('lomba/' . $filedidatabase)) {
                unlink('lomba/' . $filedidatabase);
            }
            $request->file('foto')->move(('lomba'), $file);
            $dataupdate['foto'] = $newname;
            DB::table('lomba')->where('idlomba', $id)->update($dataupdate);
        }
        session()->flash('success', 'Data berhasil diedit!');
        return redirect('panel/lombadaftar');
    }

    public function lombahapus($id)
    {
        $filedidatabase = DB::table('lomba')->where('idlomba', $id)->select('foto')->first()->foto ?? [];
        DB::table('lomba')->where('idlomba', $id)->delete();
        if ($filedidatabase && file_exists('lomba/' . $filedidatabase)) {
            unlink('lomba/' . $filedidatabase);
        }
        session()->flash('success', 'Berhasil menghapus data!');
        return back();
    }

    public function ceklogin()
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
    }

    // Profil
    public function profil()
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
        $id = session('users')->idusers;
        $row = DB::table('users')->where('idusers', $id)->first();
        $data = [
            'title' => 'Profil',
            'row' => $row,
        ];
        return view('admin/profil', $data);
    }
    public function profiledit()
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
        $id = session('users')->idusers;
        $row = DB::table('users')->where('idusers', $id)->first();
        $data = [
            'title' => 'Edit Profile',
            'row' => $row,
        ];
        return view('admin/profiledit', $data);
    }
    public function profileditsimpan(Request $request)
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
        $id = session('users')->idusers;
        $data = [
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        DB::table('users')->where('idusers', $id)->update($data);
        session()->flash('success', 'Data berhasil diedit!');
        return redirect('panel/profil');
    }
    public function login()
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
        $data = [
            'title' => 'Login',
        ];
        return view('login', $data);
    }
    public function logincek(Request $request)
    {
        if (empty(session('users'))) {
            session()->flash('error', 'Harap login terlebih dahulu');
            return redirect('loginakun');
        }
        $email = $request->input('email');
        $password = $request->input('password');
        $akun = DB::table('users')
            ->where('email', $email)
            ->where('password', $password)
            ->first();
        if ($akun) {
            session(['users' => $akun]);
            return redirect('panel/dashboard')->with('success', 'Login berhasil');
        } else {
            return redirect()->back()->with('success', 'Anda gagal login, Email atau password salah');
        }
    }
    public function logout()
    {
        session()->flush();
        return redirect('/loginakun');
    }
}
