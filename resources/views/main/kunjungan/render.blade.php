<div class="col-12">
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    Data Kunjungan
                </div>
                @can('petugas')
                <div class="col-6 d-flex align-items-center">
                    <div class="m-auto"></div>
                    <button type="button" class="btn btn-outline-primary btn-add">
                        <i class="nav-icon i-Pen-2 font-weight-bold"></i> Tambah
                    </button>
                </div>
                @endcan
            </div>
        </div>
        <div class="card-body">
            <table class="table table-hover table-striped" id="tableData">
                <thead>
                    <th>No</th>
                    <th>Nama Pasien</th>
                    <th>Nomor Rekam Medis</th>
                    <th>Tanggal Kunjungan</th>
                    <th>Diagnosa</th>
                    <th>Layanan</th>
                    <th>Jaminan</th>
                    @can('petugas')
                    <th>Aksi</th>
                    @endcan
                </thead>
                <tbody>
                    @foreach ($kunjungan as $kunjungan)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$kunjungan->pasien->nama}}</td>
                        <td>{{$kunjungan->pasien->nomor_rm}}</td>
                        <td>{{date_format(date_create($kunjungan->tanggal_kunjungan), 'd-m-Y')}}</td>
                        <td>{{$kunjungan->diagnosa}}</td>
                        <td>{{$kunjungan->layanan}}</td>
                        <td>{{$kunjungan->jaminan}}</td>
                        @can('petugas')
                        <td>
                            <button class="btn btn-edit btn-default" data-id="{{$kunjungan->id}}">
                                <i class="fa fa-eye text-success mr-2 pointer" ></i> Edit
                            </button>
                        </td>
                        @endcan
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    var table = $('#tableData').DataTable({
        language: {
            paginate: {
                previous: "Previous",
                next: "Next"
            },
            info: "Showing _START_ to _END_ from _TOTAL_ data",
            infoEmpty: "Showing 0 to 0 from 0 data",
            lengthMenu: "Showing _MENU_ data",
            search: "Search:",
            emptyTable: "Data doesn't exists",
            zeroRecords: "Data doesn't match",
            loadingRecords: "Loading..",
            processing: "Processing...",
            infoFiltered: "(filtered from _MAX_ total data)"
        },
        lengthMenu: [
            [5, 10, 15, 20, -1],
            [5, 10, 15, 20, "All"]
        ],
        order: [[0, 'desc']],
        "rowCallback": function(row, data, index) {
            // Set the row number as the first cell in each row
            $('td:eq(0)', row).html(index + 1);
        }
    });

    // Update row numbers when the table is sorted
    table.on('order.dt search.dt', function() {
        table.column(0, { search: 'applied', order: 'applied' }).nodes().each(function(cell, i) {
            cell.innerHTML = i + 1;
        });
    }).draw();
</script>
