$(document).ready(function () {
	$('#jsonkecamatan').DataTable({
		"processing": true,
		"serverSide": true,
		"responsive": true,
		"paging": false,
		"dom": '"<\'row\'<\'col-sm-12 col-md-6\'l><\'col-sm-12 col-md-6\'f>>" +\n"<\'row\'<\'col-sm-12\'tr>>" +\n"<\'row\'<\'col-sm-12 col-md-5\'i><\'col-sm-12 col-md-7\'p>>" +\n"<\'row\'<\'col-sm-12 col-md-6\'B>>",',
		// "dom": 'Blfrtip',
		"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
		"buttons": [
			'copy', 'csv',
			{
				extend: 'excel',
				title: 'Hamas Summary Kecamatan',
				messageTop: 'Kecamatan: {{$getKecKel[0]->nm_kecamatan}}, Tahun Pajak: {{$vthnpajakawal}} - {{$vthnpajakakhir}}, Batas Tanggal: {{$vbatastanggal}}',
				filename: function () {
					var today = new Date();
					var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
					var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
					var dateTime = date + '_' + time;
					return 'hamas_kecamatan_' + dateTime;
				},
			},
			{
				extend: 'pdf',
				title: 'Hamas Summary Kecamatan',
				messageTop: 'Kecamatan: {{$getKecKel[0]->nm_kecamatan}}, Tahun Pajak: {{$vthnpajakawal}} - {{$vthnpajakakhir}}, Batas Tanggal: {{$vbatastanggal}}',
				filename: function () {
					var today = new Date();
					var date = today.getFullYear() + '-' + (today.getMonth() + 1) + '-' + today.getDate();
					var time = today.getHours() + ":" + today.getMinutes() + ":" + today.getSeconds();
					var dateTime = date + '_' + time;
					return 'hamas_kecamatan_' + dateTime;
				},
			},
			{
				extend: 'print',
				title: 'Hamas Summary Kecamatan',
				messageTop: 'Kecamatan: {{$getKecKel[0]->nm_kecamatan}}, Tahun Pajak: {{$vthnpajakawal}} - {{$vthnpajakakhir}}, Batas Tanggal: {{$vbatastanggal}}',
			}
		],
		"ajax": {
			// TODO ambil route untuk melakukan request dari external javascript
			"url": '{{route('jsonkecamatan')}}',
			"type": 'POST',
			"data": {
				"_token": '{{csrf_token()}}',
				"kec": "{{$getKecKel[0]->kd_kecamatan}}",
				"thnpjkawal": "{{$vthnpajakawal}}",
				"thnpjkakhir": "{{$vthnpajakakhir}}",
				"btstgl": "{{$vbatastanggal}}",
			}
		},
		"columns": [
			{
				"data": 'kd_kelurahan'
			},
			{
				"data": 'nm_kelurahan'
			},
			{
				"data": 'stts',
				"render": $.fn.dataTable.render.number('.', ',', 0, '')
			},
			{
				"data": 'pokok',
				// "render": $.fn.dataTable.render.number('.', ',', 2, 'Rp. ')
				"render": $.fn.dataTable.render.number('', ',', 0, '')
			}
		]
	})
});
