@extends('main')

@section('title','Surat Pemberitahuan Retribusi Daerah')

@section('breadcrumb')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <button type="button" name="age" id="age" data-toggle="modal" data-target="#modalForm" class="btn btn-warning">Tambah Data SPTRD</button>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Kembali</a></li>
            <li class="breadcrumb-item active">SPTRD</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
@endsection
@section('content')
<section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Surat Pemberitahuan Retribusi Daerah</h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover" >
                <thead>
                <tr>
                  <th>No</th>
                  <th>SPTRD</th>
                  <th>Tanggal Entri</th>
                  <th>Nama Pajak</th>
                  <th>Wajib Pajak</th>
                  <th>Jumlah Pajak</th>
                  <th>Status Verifikasi</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($sptrd as $item)
                  <tr>
                    <td>{{$loop->iteration}}</td>

                    <td>{{str_pad($item->NoID,5,'0',STR_PAD_LEFT)}}</td>
                    <td>{{$item->TanggalTerbit}}</td>
                    <td>{{$item->NamaPajak}}</td>
                    <td>{{$item->NamaWP}}</td>
                    <td>{{$item->JumlahPajak}}</td>
                    <td>@if($item->Verifikasi >0)<div class="badge badge-success">Terverifikasi</div>
                      @else
                      <div class="badge badge-danger">Belum Verifikasi</div>
                      @endif</td>
                    <td>

                      <a onclick="return confirm('Anda Yakin Verifikasi SPTRD ini...?')" href="{{URL::to('verifikasi/'.$item->NoID)}}">
                      <button type="button" class="btn btn-warning btn-sm" name=""> <i class="fa fa-check"></i></button></a>
                      <a href="{{URL::to('sptrd_cetak/'.$item->NoID)}}" target="_blank" rel="noopener noreferrer"><button type="button" class="btn btn-white btn-sm" name=""> <i class="fa fa-print"></i></button></a>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              {{-- <a href="{{url('/export')}}" class="btn btn-success my-3" target="_blank">EXPORT EXCEL</a> --}}
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
  <div class="modal fade" id="modalForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
              <h3 class="card-title"><strong>Tambah Data Baru</strong></h3>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
            </div>
            <!-- Modal Body -->
            <div class="modal-body" >
                <p class="statusMsg"></p>
                <form action="{{url('TambahSptrd')}}" method="post">
                  {{ csrf_field() }}
                    <div class="form-group">
                        <label for="inputName">Jenis Pajak</label>
                        <select name="JenisPajak" id="JenisPajak" class="form-control select2" style="width: 100%;">
                          <option selected="selected">Pilih Jenis Pajak</option>
                          {{-- <option value="4.1.1.01">Retribusi Pelayanan Kesehatan</option>
                          <option value="4.1.1.02">Retribusi Pelayanan Persampahan</option>
                          <option value="4.1.1.03">Retribusi Pelayanan Parkir di Tepi Jalan Umum</option>
                          <option value="4.1.1.04">Retribusi Pelayanan Pasar</option>
                          <option value="4.1.1.07">Retribusi Pengujian Kendaraan Bermoto</option>
                          <option value="4.1.1.05.01">Retribusi Pelayanan Tera/ Tera Ulang</option>
                          <option value="4.1.1.08">Retribusi Pemakaian Kekayaan Daerah</option>
                          <option value="4.1.1.11">Retribusi Tempat Pelelangan Ikan</option>
                          <option value="4.1.2.02">Retribusi Terminal</option>
                          <option value="4.1.2.02">Retribusi Tempat Khusus Parkir</option>
                          <option value="4.1.2.02">Retribusi Pelayanan Kelabuhan</option>
                          <option value="4.1.2.02">Retribusi Penjualan Produksi Hasil Usaha</option>
                          <option value="4.1.2.02">Retribusi Rumah Potong Hewan</option> --}}
                          <option value="4.1.2.03">Retribusi Perizinan tertentu</option>
                        </select>

                    </div>
                    <div class="form-group">
                        <label for="inputName">Obyek Pajak</label>
                        <select name="NamaPajak" id="NamaPajak" class="form-control select2" style="width: 100%;">
                          <option selected="selected">Pilih Obyek Pajak</option>
                          <option value="Retribusi Izin Mendirikan Bangunan">Retribusi Izin Mendirikan Bangunan</option>
                          <option value="Retribusi Pemberian Izin Trayek kepada Orang Pribadi">Retribusi Pemberian Izin Trayek kepada Orang Pribadi</option>
                          <option value="Retribusi Pemberian Izin Usaha Perikanan kepada Orang Pribadi">Retribusi Pemberian Izin Usaha Perikanan kepada Orang Pribadi</option>
                        </select>

                    </div>
                    <div class="form-group">

                      <select name="JumlahPajak" id="JumlahPajak" class="form-control select2" style="width: 100%;">
                        <option selected="selected">Pilih Obyek Pajak Ijin Trayek</option>
                        <option value="30000">Bus Kapasitas Penumpang < 8 </option>
                        <option value="50000">Bus Kapasitas Penumpang 9 s/d 15</option>
                        <option value="55000">Bus Kapasitas Penumpang 16 s/d 25</option>
                        <option value="10000">Izin Trayek Izidentil Kapasitas < 8</option>
                        <option value="10000">Izin Trayek Izidentil Kapasitas 9 s/d 15</option>
                        <option value="25000">Izin Trayek Izidentil Kapasitas 16 s/d 25</option>
                        <option value="24000">Izin Trayek Izidentil Kapasitas > 25</option>
                      </select>
                  </div>
                  <div class="form-group">
                      <select name="JumlahPajak1" id="JumlahPajak1" class="form-control select2" style="width: 100%;">
                        <option selected="selected">Pilih Obyek Pajak Izin Perikanan</option>
                        <option value="25000">Perikanan Tangkap-Perahu Motor Tempel-Pancing</option>
                        <option value="25000">Perikanan Tangkap-Perahu Motor Tempel-Gillnet/Trammel Net</option>
                        <option value="50000">Perikanan Tangkap-Perahu Motor Tempel-Payang</option>
                        <option value="75000">Perikanan Tangkap-Perahu Motor Tempel-Cantrang</option>
                        <option value="75000">Perikanan Tangkap-Perahu Motor Tempel-Purse Seine</option>
                        <option value="50000">Perikanan Tangkap-Perahu Motor Dalam-Pancing</option>
                        <option value="50000">Perikanan Tangkap-Perahu Motor Dalam-Gillnet/Trammel Net</option>
                        <option value="100000">Perikanan Tangkap-Perahu Motor Dalam-Payang</option>
                        <option value="150000">Perikanan Tangkap-Perahu Motor Dalam-Cantrang</option>
                        <option value="150000">Perikanan Tangkap-Perahu Motor Dalam-Purse Seine</option>
                        <option value="50000">Perikanan Budidaya-Budidaya Air Tawar-Kolam (2,1 s/d 5,0 ha)</option>
                        <option value="100000">Perikanan Budidaya-Budidaya Air Tawar-Kolam (5,1 ha keatas)</option>
                        <option value="50000">Perikanan Budidaya-Budidaya Air Tawar-Pembenihan Ikan/Udang ( 0,76 s/d 1,5 ha)</option>
                        <option value="100000">Perikanan Budidaya-Budidaya Air Tawar-Pembenihan Ikan/Udang ( 1,6 ha keatas)</option>
                        <option value="200000">Perikanan Budidaya-Budidaya Air Payau-Tambak Ikan/Udang ( 5,1 s/d 10 ha)</option>
                        <option value="300000">Perikanan Budidaya-Budidaya Air Payau-Tambak Ikan/Udang ( 10,1 ha keatas)</option>
                        <option value="200000">Perikanan Budidaya-Budidaya Air Payau-Hatchery Ikan/Udang ( 0,6  s/d 10 ha)</option>
                        <option value="300000">Perikanan Budidaya-Budidaya Air Payau-Hatchery Ikan/Udang ( 1,1 ha keatas)</option>
                        <option value="50000">Perikanan Budidaya-Budidaya Air Laut-Rumput Laut ( 5.001 s/d 10.000 m2)</option>
                        <option value="100000">Perikanan Budidaya-Budidaya Air Laut-Rumput Laut ( 10.001 m2 keatas)</option>
                        <option value="100000">Perikanan Budidaya-Budidaya Air Laut-Keramba Jaring ( 450 s/d 1000 m3)</option>
                        <option value="200000">Perikanan Budidaya-Budidaya Air Laut-Keramba Jaring ( 1.001 m3 keatas)</option>
                      </select>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>NPWPD</label>
                          <input type="text" name="NPWPD" id="npwpd" class="form-control validate">

                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Nama WP</label>
                          <input type="text" name="NamaWP" id="namawp"  class="form-control validate" readonly>

                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Tanggal Terbit</label>

                          <input type="text" name="TanggalTerbit" id="TanggalTerbit" class="form-control"  placeholder="Tahun-Bulan-Hari">

                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Tanggal Entri</label>
                          <input value=<?php $tgl=date('Y-m-d');echo $tgl;?> name="TanggalEntri" id="TanggalEntri" type="text" class="form-control"  readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label >Nilai Pajak</label>
                          <input type="text"   name="JumlahPajak2" id="JumlahPajak2" class="form-control" placeholder="Nilai Pajak" disabled>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Satuan</label>
                          <select class="form-control select2" style="width: 100%;">
                            <option value="Bulan">Bulan</option>
                            <option value="Tahun">Tahun</option>
                            <option value="Hari">Hari</option>
                          </select>

                        </div>
                      </div>
                    </div>
                    <!-- input states -->
                    <div class="form-group">
                      <label >Data Entri</label>
                      <input value={{ Auth::user()->name }} name="DataEntri" id="DataEntri" max="30" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Keterangan</label>
                      <textarea class="form-control" name="KeteranganPajak" value="{{old ('KeteranganPajak')}}" sid="KeteranganPajak" rows="3" placeholder=" Isi Keterangan"></textarea>

                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary submitBtn"  name="action" onclick="submitContactForm()">Tambah</button>
                  </div>
                </form>
            </div>

            <!-- Modal Footer -->

        </div>
    </div>
</div>
</div>
<!-- Datatable -->
{{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>


<script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true,
      "responsive": true,
      // "dom": '"<\'row\'<\'col-sm-12 col-md-6\'l><\'col-sm-12 col-md-6\'f>>" +\n"<\'row\'<\'col-sm-12\'tr>>" +\n"<\'row\'<\'col-sm-12 col-md-5\'i><\'col-sm-12 col-md-7\'p>>" +\n"<\'row\'<\'col-sm-12 col-md-6\'B>>",',
                // "dom": 'Blfrtip',

                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],

    });
    $(document).ready(function(){
          $('#TanggalTerbit').datepicker({
            autoclose: true,
            format:'yyyy-mm-dd'
          });
      });

  });


  $('#npwpd').keyup(function() {
			var querynpwpd = $(this).val();
			if (querynpwpd != '') {
				var _token = $('input[name="_token"]').val();
				$.ajax({
					url: "{{url('/RetribusiController/npwpd')}}",
					method: "POST",
					data: {
						querynpwpd: querynpwpd,
						_token: _token
					},
					success: function(data) {
						var _data = data.split(";", 3);
						$('#namawp').val(_data[0]);

					}
				});
			}
		});
    $(window).load(function(){
    $("#NamaPajak").change(function() {
			console.log($("#NamaPajak option:selected").val());
			if ($("#NamaPajak option:selected").val() == 'Retribusi Izin Mendirikan Bangunan') {
				$('#JumlahPajak').prop('hidden', 'true');
        $('#JumlahPajak1').prop('hidden', 'true');
        $('#npwpd').prop('disabled', false);
        $('#JumlahPajak2').prop('disabled', false);

			} else if ($("#NamaPajak option:selected").val() == 'Retribusi Pemberian Izin Trayek kepada Orang Pribadi'){
				$('#JumlahPajak').prop('hidden', false);
        $('#JumlahPajak1').prop('hidden', 'true');
        $('#npwpd').prop('disabled', 'true');
        $('#JumlahPajak2').prop('disabled', 'true');
			} else if ($("#NamaPajak option:selected").val() == 'Retribusi Pemberian Izin Usaha Perikanan kepada Orang Pribadi'){
				$('#JumlahPajak').prop('hidden', 'true');
        $('#JumlahPajak1').prop('hidden', false);
        $('#npwpd').prop('disabled', 'true');
        $('#JumlahPajak2').prop('disabled', 'true');
      }
		});
});

</script>
@endsection

