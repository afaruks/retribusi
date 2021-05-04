<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Redirect;

class RetribusiController extends Controller
{
    public function sptrd_view()
    {
        $query = "SELECT
        a.NoID,
        a.TanggalTerbit,
        a.NamaPajak,
        a.NamaWP,
        a.JumlahPajak,
        a.Verifikasi
    FROM
        sptpd a
    WHERE
        a.JenisPajak IN (
            '4.1.2.01',
        '4.1.2.02',
        '4.1.2.03')";
        $sptrd = DB::connection('mysql')
            ->select(DB::raw($query));

        // return ($kel);
        return view('sptrd', compact('sptrd'));
    }

    public function skrd_view()
    {
        /* TODO snub on Tue 04 May 2021 09:41:53 : ini punya DPMPTSP */
        $query = "SELECT
        a.Nomor_SKPRD,
        a.Bulan,
        a.Tahun,
        a.Nomor_SPTPD,
        b.KeteranganPajak,
        b.JumlahPajak
    FROM
        skp a
        LEFT JOIN sptpd b ON a.Nomor_SPTPD = b.NoID
    WHERE
        b.JenisPajak IN ( '4.1.2.01', '4.1.2.02', '4.1.2.03' )";

        $skrd = DB::connection('mysql')
            ->select(DB::raw($query));

        // return ($kel);
        /* dd($skrd); */
        return view('skrd', compact('skrd'));
    }
    public function Csptrd(request $request)
    {
        $ambilmaxsptrd = DB::table('sptpd')->max('NoID');
        $insertId = str_pad($ambilmaxsptrd + 1, 5, "0", STR_PAD_LEFT);
        $bulan = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
         );
        $ID = "0000000";
        $Verifikasi ="0";
        $Aktif="1";
        $Lunas="0";
        $RuasJalan=null;
        // $ObyekPajak=null;
        $Luas=null;
        $Lebar=null;
        $Lama=null;
        $Jumlah=null;
        $BatasWaktu=null;
        $Sisi=null;
        $NoSPTLama ="";
        $TotalNilai_SebelumPajak="0";
        $Verifikator="";
        $TanggalVerifikasi=null;

        if ($request->input('NamaPajak') == "Retribusi Izin Mendirikan Bangunan") {
            $JumlahPajak= $request->input('JumlahPajak2');
            $ObyekPajak="93";
        } elseif ($request->input('NamaPajak') == "Retribusi Pemberian Izin Trayek kepada Orang Pribadi") {
            $JumlahPajak= $request->input('JumlahPajak');
            $ObyekPajak="94";
        } elseif ($request->input('NamaPajak') == "Retribusi Pemberian Izin Usaha Perikanan kepada Orang Pribadi") {
            $JumlahPajak= $request->input('JumlahPajak1');
            $ObyekPajak="95";
        }

        $this->validate($request, [

            'JenisPajak' => 'required',
            'NamaPajak' => 'required',
            'TanggalTerbit' => 'required',
            'KeteranganPajak' => 'required',
            'JumlahPajak' => 'required',
            'JumlahPajak1' => 'required',
            'JumlahPajak2' => 'required',
        ]);
       $data = DB::table('sptpd')->insert([
            'NoID' => $insertId,
            'ID' => $ID,
            'JenisPajak' => $request->input('JenisPajak'),
            'NamaPajak' => $request->input('NamaPajak'),
            'TanggalTerbit' => $request->input('TanggalTerbit'),
            'Bulan' => $bulan[date('m')],
            'Tahun' => date('Y'),
            'NPWPD' => $request->input('NPWPD'),
            'NamaWP' => $request->input('NamaWP'),
            'DataEntri' => $request->input('DataEntri'),
            'TanggalEntri' =>$request->input('TanggalEntri'),
            'Verifikasi' => $Verifikasi,
            'Aktif' => $Aktif,
            'Lunas' => $Lunas,
            'KeteranganPajak' => $request->input('KeteranganPajak'),
            'RuasJalan' => $RuasJalan,
            'ObyekPajak' =>$ObyekPajak,
            'Luas' => $Luas,
            'Lebar' => $Lebar,
            'Lama' => $Lama,
            'Jumlah' => $Jumlah,
            'BatasWaktu' => $BatasWaktu,
            'Sisi' => $Sisi,
            'TotalNilai_SebelumPajak' => $TotalNilai_SebelumPajak,
            'JumlahPajak' => $JumlahPajak,
            'Verifikator' => $Verifikator,
            'TanggalVerifikasi' => $TanggalVerifikasi,
            'NoSPTLama' => $NoSPTLama,

        ]);
        // echo $data;

        return Redirect::back()->with('success', " Berhasil Tersimpan");

}


        public function npwpd(Request $request)
    {
        if ($request->get('querynpwpd')) {
            $querynpwpd = $request->get('querynpwpd');
            $datanpwpds = DB::table('npwpd')
                ->where('npwpd', 'like', "%{$querynpwpd}%")
                ->first();
            $namawp = $datanpwpds->NamaWP;
            echo $namawp;

        }
    }
    // public function json_sptrd(request $request)
    //     {
    //         $ambilnomorsptrd = DB::table('sptpd')
    //             ->where(['NoID'=> $request->input('NoID')]);
    //         return Datatables::of($ambilnomorsptrd)->make(true);
    //     }

        public function s_sptrd(Request $request)
    {
        if ($request->get('querysptrd')) {
            $querysptrd = $request->input('querysptrd');
            $datasptrd = DB::table('sptpd')
                ->where('noid', 'like', "%$querysptrd%")
                ->first();

            $namawp = $datasptrd->NamaWP;
            $TanggalTerbit = $datasptrd->TanggalTerbit;
            $JumlahPajak = $datasptrd->JumlahPajak;
            $KeteranganPajak = $datasptrd->KeteranganPajak;
            echo $namawp . ";" . $TanggalTerbit . ";" . $JumlahPajak.";" . $KeteranganPajak;

        }
    }
    public function Verifikator($NoID){
        $tes= DB::table('sptpd')
            ->where('NoID', '=', $NoID)
            // ->where('NoID' )
            ->update(['Verifikasi' => 1,
                'TanggalVerifikasi'=> date('Y-m-d'),
                'Verifikator'=> Auth::user()->name]);

        // dd ($tes);
        return Redirect::back()->with('success');
    }

    public function Cskrd(request $request)
    {
        $ambilmaxsptrd = DB::table('skp')->max('Nomor_SKPRD');
        $insertSkprd = str_pad($ambilmaxsptrd + 1, 5, "0", STR_PAD_LEFT);
        $bulan = array(
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
         );
        $Nomor_SPTPD_Lama =null;
        $Verifikasi ="1";
        $Aktif ="1";
        $Lunas ="0";
        $Verifikator =null;
        $TanggalVerifikasi =null;
        $NoBayar ="0";
        $NominalTransfer ="0";
        $NoBayarLama ="0";
        $TglBayar =null;
        $penyetor=null;
        $Denda="0";
        $Pengesahan=null;
        $keterangan=0;
        $keteranganDataDouble=null;
        $VA=null;
        $QRIS=null;

        // $this->validate($request, [
        //     'NoID' => 'required',
        //     'ID' => 'required',
        //     'JenisPajak' => 'required',
        //     'NamaPajak' => 'required',
        //     'TanggalTerbit' => 'required',
        //     'Bulan' => 'required',
        //     'Tahun' => 'required',
        //     'NPWPD' => 'required',
        //     'NamaWP' => 'required',
        //     'DataEntri' => 'required',
        //     'TanggalEntri' => 'required',
        //     'KeteranganPajak' => 'required',
        //     'TotalNilai_SebelumPajak' => 'required',
        //     'JumlahPajak' => 'required',
        //     'Verifikator' => 'required',
        // ]);
       $data = DB::table('skp')->insert([
            'Nomor_SKPRD' => $insertSkprd,
            'Tanggal_Terbit' => date('Y-m-d'),
            'Bulan' => $bulan[date('m')],
            'Tahun' => date('Y'),
            'Nomor_SPTPD' => $request->input('noid'),
            'Nomor_SPTPD_Lama' => $Nomor_SPTPD_Lama,
            'Verifikasi' => $Verifikasi,
            'Aktif' => $Aktif,
            'Lunas' => $Lunas,
            'DataEntri' => $request->input('DataEntri'),
            'TanggalEntri' =>$request->input('TanggalEntri'),
            'Verifikator' => $Verifikator,
            'TanggalVerifikasi' => $TanggalVerifikasi,
            'NoBayar' => $NoBayar,
            'NominalTransfer' => $NominalTransfer,
            'NoBayarLama' => $NoBayarLama,
            'TglBayar' => $TglBayar,
            'Penyetor' => $penyetor,
            'Denda' => $Denda,
            'masa1' => $request->input('masa1'),
            'masa2' => $request->input('masa2'),
            'Pengesahan' => $Pengesahan,
            'keterangan' => $keterangan,
            'keteranganDataDouble' => $keteranganDataDouble,
            'VA' => $VA,
            'QRIS' => $QRIS,

        ]);
        // echo $data;

        return Redirect::back()->with('success', " Berhasil Tersimpan");
}

    /*{{{ TODO tidak dipakai
    public function cetak (){
        return view ('report.skr_cetak');
    } }}}*/

    public function skr_cetak($Nomor_SKPRD)
    {
        // $skr_cetak= DB::table('sptpd')
        //     ->leftjoin ('skp','sptpd_')
        $query = "SELECT
        a.NPWPD,
        a.NamaWP,
        b.Nomor_SKPRD,
        d.RekeningInduk,
        b.masa1,
        b.masa2,
        b.Bulan,
        b.tahun,
        a.KeteranganPajak,
        c.AlamatWP,
        a.JumlahPajak

    FROM
        sptpd a
        LEFT JOIN skp b ON a.NoID = b.Nomor_SPTPD
        LEFT JOIN npwpd c ON a.NPWPD = c.NPWPD
        LEFT JOIN tarif_dasar_pajak d ON a.obyekpajak = d.noid
        where
        b.Nomor_SKPRD = $Nomor_SKPRD";
        $skr_cetak = DB::connection('mysql')
            ->select(DB::raw($query));
        if (Auth::user()->name == "DPMPTSP"){
            $header = [
                "opd" => "vDinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu",
                "alamat" => "Jl. PB. Sudirman No. 1 Situbondo",
                /* "kepalaBidang" => nl2br("vKepala Bidang Pelayanan Terpadu\nU.b Kepala Seksi Penetapan dan Penerbitan"), */
                "kepalaBidang" => "vKepala Bidang Pelayanan Terpadu<br />U.b Kepala Seksi Penetapan dan Penerbitan",
                "namaKepala" => "RAWAT TRIMURTI",
                "nip" => "19790901 200501 2 012",
            ];
        }else{
            $header = [
                "opd" => "vBadan Pendapatan Pengelolaan Keuangan dan Aset Daerah",
                "alamat" => "Jl. PB. Sudirman No. 1 Situbondo",
                "kepalaBidang" => "vKepala Bidang Pendataan dan Penetapan Pajak dan Retribusi Daerah",
                "namaKepala" => "H. LUTFI ZAKARIA",
                "nip" => "19640227 199211 1 0001",
            ];
        }

        // dd ($skr_cetak[0]->masa1);
        /* dd(Auth::user()->name); */
        /* dd($header['opd']); */
        return view('report.skr_cetak', compact('skr_cetak', 'header'));
    }
    public function sptrd_cetak($NoID)
    {

        $query = "SELECT
        a.NPWPD,
        a.NamaWP,
        a.NoID,
        a.TanggalTerbit,
        d.RekeningInduk,
        a.Bulan,
        a.tahun,
        a.KeteranganPajak,
        c.AlamatWP,
        a.JumlahPajak

    FROM
        sptpd a
        LEFT JOIN npwpd c ON a.NPWPD = c.NPWPD
        LEFT JOIN tarif_dasar_pajak d ON a.obyekpajak = d.noid
        where
        a.NoID = $NoID";
        $sptrd_cetak = DB::connection('mysql')
            ->select(DB::raw($query));

        // dd ($sptrd_cetak[0]->NoID);
        return view('report.sptrd_Cetak', compact('sptrd_cetak'));
    }
    public function rincian_pajak (){
        $rincian = DB::select('select * from tarif_dasar_pajak');


        return view('sptrd', compact('rincian'));
    }
}
