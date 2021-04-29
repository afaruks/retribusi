@extends('main')

@section('title','Laporan SKR Lunas')

@section('breadcrumb')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
      
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/')}}">Kembali</a></li>
            <li class="breadcrumb-item active">Laporan SKR Lunas</li>
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
              <h3 class="card-title">Laporan SKR Lunas</h3>
            </div>
            
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example2" class="table table-bordered table-hover" >
                <thead>
                <tr>
                  <th>No. SPT</th>
                  <th>No. SKR</th>
                  <th>Tanggal Entri</th>
                  <th>Nama WP</th>
                  <th>uraian</th>
                  <th>Ketetapan</th>
                  <th>Masa 1</th>
                  <th>Masa 2</th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($lun as $item)
                  <tr>
                    <td>{{$item->NoID}}</td>
                    <td>{{$item->Nomor_SKPRD}}</td>
                    <td>{{$item->TanggalEntri}}</td>
                    <td>{{$item->NamaWP}}</td>
                    <td>{{$item->KeteranganPajak}}</td>
                    <td>{{$item->JumlahPajak}}</td>
                    <td>{{$item->masa1}}</td>
                    <td>{{$item->masa2}}</td>
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
</div>
<!-- Datatable -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>s

<script>
  $(function () {
    $('#example2').DataTable({
      "paging": true,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": true,
      "responsive": true,
      "dom": '"<\'row\'<\'col-sm-12 col-md-6\'l><\'col-sm-12 col-md-6\'f>>" +\n"<\'row\'<\'col-sm-12\'tr>>" +\n"<\'row\'<\'col-sm-12 col-md-5\'i><\'col-sm-12 col-md-7\'p>>" +\n"<\'row\'<\'col-sm-12 col-md-6\'B>>",',
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
    });
  });

</script>
@endsection
    
