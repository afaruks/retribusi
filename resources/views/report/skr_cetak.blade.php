<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
  <script src="http://103.76.175.175:81/epajak/assets/pegawai/js/jquery.min.js"></script>
  <script src="http://103.76.175.175:81/epajak/assets/pegawai/bootstrap/js/bootstrap.min.js"></script>

<script type="text/javascript">
function printDiv(divName)
{
var printContents = document.getElementById(divName).innerHTML;
var originalContents = document.body.innerHTML;
document.body.innerHTML = printContents;
window.print();
document.body.innerHTML = originalContents;
}
</script>

<style>

hr {
    display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 1px;
}


div.absolute {

    top: 5px;
    right: 10000px;
    position: absolute;

}


    body {
        height: 842px;
        width: 700px;
        position: absolute;
        left: 0px;
        /* to centre page on screen*/

    }

.parent {
  position: relative;
  top: 0;
  left: 0;
}
.image1 {
  position: relative;
  top: 0;
  left: 0;
}
.image2 {
  position: absolute;
  top: 8px;
  left: 520px;
}



</style>

</head>

<div id="printableArea">

<body>

{{-- TODO snub 050721 10:24 layout masih berantakan --}}
<div class="parent">
    {{-- <img class="image1" src="{{asset('public/template/assets/logo.jpg')}}"" width="12%" height="80" align="left">--}}
    <img class="image1" src="{{asset('public/template/assets/Logo Kabupaten Situbondo alpha.png')}}"" width="23%" height="53%" align="left">
<h5 align="center"><b>PEMERINTAH KABUPATEN SITUBONDO</b></h5>
{{-- <h6 align="center"><b>Badan Pendapatan Pengelolaan Keuangan dan Aset Daerah</b></h6> --}}
<h6 align="center"><b>{{$header['opd']}}</b></h6>
<h6 align="center"><b>{!! nl2br($header['alamat']) !!}</b></h6>
    {{--<h6 align="center"><b>Telp.(0338)671916</b></h6>--}}
    <h6 align="center"><b></b></h6>
{{-- <img class="image1" src="http://103.76.175.175:81/epajak/assets/logofull.jpg" width="100%" height="121" align="center"> --}}
{{-- <img class="image2" src="http://103.76.175.175:81/epajak/con_menuutama/gambar/00259"> --}}
</div>
<br>
<h5 align="center"><b>SURAT KETETAPAN RETRIBUSI DAERAH (SKR-DAERAH)</b></h4>
  <table border="0">
    <tbody>

    <tr>
        <td>NOP</td>
        <td>: </td>
        <td>35120999{{$skr_cetak[0]->tahun}}9{{str_pad($skr_cetak[0]->Nomor_SKPRD,5,'0',STR_PAD_LEFT)}}</td>
    </tr>
      <tr>
        <td>Masa</td>
        <td>:</td>
        <td>{{date('d/m/Y', strtotime($skr_cetak[0]->masa1))}} s/d {{date('d/m/Y', strtotime($skr_cetak[0]->masa2))}}</td>
      </tr>
      <tr>
        <td>Bulan/Tahun</td>
        <td>:</td>
        <td>{{$skr_cetak[0]->Bulan}} / {{$skr_cetak[0]->tahun}} </td>
      </tr>
      <tr>
        <td>No. Berkas</td>
        <td>:</td>
        <td>{{str_pad($skr_cetak[0]->Nomor_SKPRD,5,'0',STR_PAD_LEFT)}}/431.302.2.3/{{$skr_cetak[0]->tahun}}</td>
      </tr>
      <tr>
        <td>Wajib Pajak</td>
        <td>:</td>
        <td>({{$skr_cetak[0]->NPWPD}}) {{$skr_cetak[0]->NamaWP}}</td>
      </tr>
      <tr>
        <td>Alamat</td>
        <td>:</td>
        <td>{{$skr_cetak[0]->AlamatWP}}</td>
      </tr>
    </tbody>

  </table>
  <table border="1" width="100%">
    <thead>
      <tr>
        <th align="center" width="20%">Kode Rekening</th>
        <th align="center" width="60%">Uraian Pajak Daerah</th>
        <th align="center" width="20%">Jumlah (Rp)</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td align="center">{{$skr_cetak[0]->RekeningInduk}}</td>
        <td><font size="2">{{$skr_cetak[0]->KeteranganPajak}}</font></td>
        <td align="center">{{Number_format($skr_cetak[0]->JumlahPajak)}}</td>
      </tr>
      <tr>
        <td></td>
        <td><b>Jumlah ketetapan pokok pajak</b></td>
        <td align="center"><b>{{Number_format($skr_cetak[0]->JumlahPajak)}}</b></td>
      </tr>
      <tr>
        <td></td>
        <td><b>Jumlah Keseluruhan</b></td>
        <td align="center"><b>{{Number_format($skr_cetak[0]->JumlahPajak)}}</b></td>
      </tr>
      <tr>
        <td colspan="3"><font size="2">Dengan Huruf :  {{strtoupper(Terbilang::make($skr_cetak[0]->JumlahPajak). ' RUPIAH')}}</font></td>

      </tr>

    </tbody>
  </table>
  <h5><b><u>PERHATIAN :</u></b></h5>
  <ol>
    <li><font size="2">Apabila SKR-Daerah ini tidak atau kurang dibayar lewat waktu paling lama 30 hari setelah SKP-Daerah diterbitkan atau (tanggal jatuh tempo) dikenakan sanksi administrasi berupa bunga sebesar 2% per bulan.</font></li>
  </ol>
<table border="0" width="100%">
    <tbody>
      <tr>
          <th width="30%"></th>
          <th width="70%"></th>
      </tr>
        <tr>
          <td align="center"></td>
          <td align="center">Situbondo, <?php $tgl=date('d-m-Y');echo $tgl;?> <!-- Reza -->
        </tr>
        <tr>
          <td></td>
          {{--<td align="center">a.n Kepala Badan Pendapatan, Pengelolaan Keuangan dan Aset Daerah</td>--}}
        <td align="center">a.n Kepala {{$header['opd']}}</td>
        </tr>
        <tr>
          <td></td>
          {{--<td align="center">Kepala Bidang Pendataan dan Penetapan Pajak</td>--}}
          <td align="center">{!! nl2br($header['kepalaBidang']) !!}</td>
        </tr>
        <!-- <tr>
          <td></td>
          <td align="center">dan Retribusi Daerah</td>
        </tr> -->
        <tr>
          <td><br></td>
          <td></td>
        </tr>
        <tr>
          <td><br></td>
          <td></td>
        </tr>
        <tr>
          <td align="center"><u><b></b></u></td>
    {{--<td align="center"><u><b>NAMA KEPALA</b></u></td>--}}
    <td align="center"><u><b>{{$header['namaKepala']}}</b></u></td>
        </tr>
        <tr>
          <td align="center"></td>
        <td align="center">NIP. {{$header['nip']}}</td>
        </tr>
    </tbody>
</table>
<hr>
<table border="0" width="100%">
    <tbody>
      <tr>
          <th width="50%"></th>
          <th width="50%"></th>
      </tr>

        <tr>
          <td><b><font size="2"><u>TANDA TERIMA</u></b></font></td>
          <td align="center"><font size="2">Situbondo, <?php $tgl=date('d-m-Y');echo $tgl;?></font></td> <!-- Reza -->
        </tr>
        <tr>
          <td>
            <table border="0">
              <tbody>
                <tr>
                  <td><font size="2">No. Berkas</font></td>
                  <td><font size="2">:</font></td>
                  <td><font size="2">{{str_pad($skr_cetak[0]->Nomor_SKPRD,5,'0',STR_PAD_LEFT)}}</font></td>
                </tr>
              </tbody>
            </table>
          </td>
          <td align="center"><font size="2">Yang menerima,</font></td>
        </tr>
        <tr>
          <td>
            <table border="0">
              <tbody>
                <tr>
                  <td><font size="2">Nama WP</font></td>
                  <td><font size="2">:</font></td>
                  <td><font size="2"> {{$skr_cetak[0]->NamaWP}}</font></td>
                </tr>
              </tbody>
            </table>
          </td>
          <td></td>
        </tr>
        <tr>
          <td>
            <table border="0">
              <tbody>
                <tr>
                  <td><font size="2">NPWPD</font></td>
                  <td><font size="2">:</font></td>
                  <td><font size="2"> {{$skr_cetak[0]->NPWPD}}</font></td>
                </tr>
              </tbody>
            </table>
          </td>
          <td></td>
        </tr>
        <tr>
          <td>
            <table border="0">
              <tbody>
                <tr>
                  <td><font size="2">Alamat</font></td>
                  <td><font size="2">:</font></td>
                  <td><font size="2"> {{$skr_cetak[0]->AlamatWP}}</font></td>
                </tr>
              </tbody>
            </table>
          </td>
          <td align="center"><font size="2">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</font></td>
        </tr>

    </tbody>
</table>


</body>

</div>
<button type="button" class="btn btn-primary" onclick="printDiv('printableArea')" >Cetak SKR</button>
<br>
</html>
