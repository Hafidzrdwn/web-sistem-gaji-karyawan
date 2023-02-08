<?php

namespace App\Http\Controllers;

use App\Models\Bonus;
use App\Models\Jabatan;
use App\Models\Karyawan;
use App\Models\Pelanggaran;
use App\Models\Tunjangan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $jabatan = Jabatan::all()->count();
        $karyawan = Karyawan::all()->count();
        $bonus = Bonus::all()->count();
        $pelanggaran = Pelanggaran::all()->count();
        $tunjangan = Tunjangan::all()->count();

        $kelompoks = array(
            [
                'nama' => "Abyaz Prince M",
                'absen' => "01"
            ],
            [
                'nama' => "Achmad Naufal F",
                'absen' => "04"
            ],
            [
                'nama' => "Ahmad Zakki S",
                'absen' => "08"
            ],
            [
                'nama' => "Alan Nadia Bella Sahira",
                'absen' => "09"
            ],
            [
                'nama' => "Bima Wahyu Luckyta",
                'absen' => "18"
            ],
            [
                'nama' => "Deefvely Yustezio A",
                'absen' => "20"
            ],
            [
                'nama' => "Dewangga Bintang N",
                'absen' => "21"
            ],
            [
                'nama' => "Dharma Eka S",
                'absen' => "23"
            ],
            [
                'nama' => "Diva Egalyta P.A",
                'absen' => "25"
            ],
            [
                'nama' => "Hafidz Ridwan C",
                'absen' => "31"
            ],
            [
                'nama' => "Herwan Ramadhani",
                'absen' => "33"
            ]
        );

        return view('dashboard', compact('jabatan', 'karyawan', 'bonus', 'pelanggaran', 'tunjangan', 'kelompoks'));
    }
}
