@extends('main')

@section('title','Surat Ketetapan Retribusi Daerah')

@section('breadcrumb')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <button type="button" name="age" id="age" data-toggle="modal" data-target="#modalForm" class="btn btn-warning">Tambah Data SKRD</button>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Kembali</a></li>
            <li class="breadcrumb-item active">SKRD</li>
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
              <h3 class="card-title">Surat Ketetapan Retribusi Daerah</h3>
            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover" >
                <thead>
                <tr>
                  <th>No</th>
                  <th>No. SKR</th>
                  <th>Bulan</th>
                  <th>Tahun</th>
                  <th>No. SPTRD</th>
                  <th>Uraian</th>
                  <th>Jumlah</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($skrd as $ker)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>
                            {{-- str_pad(,5,STR_PAD_LEFT) --}}
                            {{str_pad($ker->Nomor_SKPRD,5,'0',STR_PAD_LEFT)}}
                        </td>
                        {{-- <td>{{$ker->Nomor_SKPRD}}</td> --}}
                        <td>{{$ker->Bulan}}</td>
                        <td>{{$ker->Tahun}}</td>
                        {{--<td>{{$ker->Nomor_SPTPD}}</td>--}}
                        <td>{{str_pad($ker->Nomor_SPTPD,5,'0',STR_PAD_LEFT)}}</td>
                        <td>{{$ker->KeteranganPajak}}</td>
                        <td>{{$ker->JumlahPajak}}</td>
                        <td>
                            <a href="{{URL::to('skr_cetak/'.$ker->Nomor_SKPRD)}}" target="_blank" rel="noopener noreferrer"><button type="button" class="btn btn-primary" name=""> <i class="fa fa-print"></i></button></a>
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
            <!-- Modal Header -->
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
                <form action="{{url('TambahSkrd')}}" method="post">
                  {{ csrf_field() }}
                    <div class="form-group">
                        <label>No. SPTRD</label>
                        <input type="text" name="noid" id="noid" class="form-control validate" placeholder="No SPTRD " >
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Nama Wajib Pajak</label>
                          <input type="text" name="NamaWP" id="namawp" class="form-control validate" placeholder="Wajib Pajak " readonly>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Tanggal Terbit SPTRD</label>
                          <input type="text"  name="TanggalTerbit" id="TanggalTerbit" class="form-control validate" placeholder=" " readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Tanggal Entri SKRD</label>
                          <input value=<?php $tgl=date('Y-m-d');echo $tgl;?> type="text" name="TanggalEntri" id="TanggalEntri" class="form-control" placeholder="" readonly>
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Jumlah Pajak</label>
                          <input type="text" name="JumlahPajak" id="JumlahPajak" class="form-control validate" placeholder="Jumlah Pajak" readonly>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Masa 1</label>
                          <input type="text" name="masa1" id="masa1" class="form-control" placeholder="Masa 1" >
                        </div>
                      </div>
                      <div class="col-sm-6">
                        <div class="form-group">
                          <label>Masa 2</label>
                          <input type="text" name="masa2" id="masa2" class="form-control" placeholder="Masa 2">
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="inputname">Data Entri</label>
                      <input value={{ Auth::user()->name }} name="DataEntri" id="DataEntri" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                      <label>Keterangan</label>
                      <textarea class="form-control" name="KeteranganPajak" id="KeteranganPajak" rows="3" placeholder="Keterangan" ></textarea>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" class="btn btn-primary submitBtn" onclick="submitContactForm()">Tambah</button>
                  </div>
                </form>
        </div>
    </div>
</div>
  </div>
</div>
<!-- Datatable -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>

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
        //         buttons : [
        //             {extend:'copy'},
        //             {extend:'csv'},
        //             {extend: 'pdf', title:'Data_SPTPRD'},
        //             {extend: 'excel', title: 'Data_SPTPRD'},
        //             {extend:'print',title: 'Data_SPTPRD'},
        // ]

        "columns" : [
            {
                "data": 'No'
            },
            {
                "data": 'Nomor_SKPRD'
            },
            {
                "data": 'Bulan'
            },
            {
                "data": 'Tahun'
            },
            {
                "data": 'Nomor_SPTPD'
            },
            {
                "data": 'Uraian'
            },
            {
                "data": 'Jumlah',
                // "render": $.fn.dataTable.render.number('.', ',', 0, 'Rp. ')
                "render": $.fn.dataTable.render.number('.', ',', 0, '')
            },
            {
                "data": 'Aksi'
            },
        ]
    });
  });

  $('#noid').keyup(function() {
			var querysptrd= $(this).val();
			if (querysptrd != '') {
				var _token = $('input[name="_token"]').val();
				$.ajax({
					url: "{{url('/RetribusiController/jsptrd')}}",
					method: "POST",
					data: {
						querysptrd: querysptrd,
						_token: _token
					},
					success: function(data) {
						var _data = data.split(";", 4);
						$('#namawp').val(_data[0]);
						$('#TanggalTerbit').val(_data[1]);
            $('#JumlahPajak').val(_data[2]);
            $('#KeteranganPajak').val(_data[3]);

					}
				});
			}
		});

</script>
@endsection

