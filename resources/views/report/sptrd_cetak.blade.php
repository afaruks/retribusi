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

<div class="parent">
    <img class="image1" src="{{asset('public/template/assets/logo.jpg')}}"" width="12%" height="80" align="left">
<h4 align="center"><b>PEMERINTAH KABUPATEN SITUBONDO</b></h4>
<h5 align="center"><b>Badan Pendapatan Pengelolaan Keuangan dan Aset Daerah</b></h5>
<h5 align="center"><b>Jl. Pb Sudirman No.1 Situbondo</b></h5>
<h5 align="center"><b>Telp.(0338)671916</b></h5>
{{-- <img class="image1" src="http://103.76.175.175:81/epajak/assets/logofull.jpg" width="100%" height="121" align="center"> --}}
{{-- <img class="image2" src="http://103.76.175.175:81/epajak/con_menuutama/gambar/00259"> --}}
</div>
<br>
<h4 align="center"><b>SURAT PEMBERITAHUAN PAJAK DAERAH (SPTPD)</b></h4>
  <table border="0">
    <tbody>
      <tr>
        <td>Nomor Berkas</td>
        <td>:</td>
        <td>{{str_pad($sptrd_cetak[0]->NoID,5,'0',STR_PAD_LEFT)}}/431.302.2.2/2021</td>
      </tr>
      <tr>
        <td>Tanggal Terbit</td>
        <td>:</td>
        <td>{{date('d/m/Y', strtotime($sptrd_cetak[0]->TanggalTerbit))}}</td>
      </tr>     
      <tr>
        <td>Masa Pajak</td>
        <td>:</td>
        <td>{{$sptrd_cetak[0]->Bulan}} {{$sptrd_cetak[0]->tahun}}</td>
      </tr> 
      <tr>
        <td>Nomor NPWPD</td>
        <td>:</td>
        <td>{{$sptrd_cetak[0]->NPWPD}}</td>
      </tr>
      <tr>
        <td>Nama Wajib Pajak</td>
        <td>:</td>
        <td>{{$sptrd_cetak[0]->NamaWP}}</td>
      </tr>   
      <tr>
        <td>Alamat</td>
        <td>:</td>
        <td>{{$sptrd_cetak[0]->AlamatWP}}</td>
      </tr>                              
    </tbody>
  
  </table>
  <table border="1" width="100%">
    <thead>
      <tr>
        <th align="center" width="20%">Kode Rekening</th>
        <th align="center" width="60%">Uraian Pajak Daerah</th>
        <th align="center" width="20%">Jumlah (Rp)</th>
        <th align="center" width="20%">Batas Waktu</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td align="center">{{$sptrd_cetak[0]->RekeningInduk}}</td> 
        <td><font size="2">{{$sptrd_cetak[0]->KeteranganPajak}}</font></td>
        <td align="center">{{Number_format($sptrd_cetak[0]->JumlahPajak)}}</td>
        <td align="center"></td>
      </tr> 
      <tr>
        <td colspan="4"><font size="2">Dengan Huruf :  {{Terbilang::make($sptrd_cetak[0]->JumlahPajak, ' rupiah ')}}</font></td>  

      </tr>

    </tbody>
  </table>
  <li><font size="2">Apabila SKP-Daerah tidak atau kurang dibayar lewat waktu paling lama <b>30 hari setelah SKP-Daerah diterima</b> atau (tanggal jatuh tempo) dikenakan sanksi administrasi berupa bunga sebesar 2% per bulan.</font></li>
  <h5><b>KETERANGAN :</b></h5>
  <p>Demikian formulir ini diisi dengan sebenar-benarnya dan apabila terdapat ketidak benaran dalam pemenuhan kewajiban pengisian SPTPD ini, kami bersedia dikenakan sanksi sesuai Peraturan Daerah yang berlaku.</p>
  <h5><b>ALASAN KEBERATAN WAJIB PAJAK :</b></h5>
  <br>
  <br> 
  <table border="0" width="100%">
    <tbody>
      <tr>
          <th width="50%"></th>
          <th width="50%"></th>
      </tr>
        <tr>
            <td align="center">Petugas,</td>
     <!-- <td align="center">Situbondo, 22&#45;04&#45;2021 -->
     <td align="center">Situbondo,  <?php $tgl=date('d-m-Y');echo $tgl;?></td>      <!--<td align="center">Situbondo, 03-12-2018</td> --><!--Dwi UPDATE  22 jan 2017 -->
            
        <tr>
          <td></td>
          <!--<td align="center">Wajib Pajak / Kuasa</td>-->
          <td align="center">Wajib Pajak / Kuasa</td>
        </tr>
        <tr>
          <td></td>
          <td align="center"></td>
        </tr>
        <tr>
          <td><br></td>
          <td></td>
        </tr>
        <tr>
          <td><br></td>
          <td></td>
        </tr>
        <tr>
          <td align="center">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
          <td align="center">(&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;)</td>
        </tr>
        <tr>
          <td align="center"></td>
          <td align="center"></td>
        </tr>
    </tbody>
</table>
</body>
</div>
<button type="button" class="btn btn-primary" onclick="printDiv('printableArea')" >Cetak SPTRD</button>
<br>
</html>
