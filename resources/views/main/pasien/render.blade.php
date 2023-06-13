<div class="col-12">
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-6">
                    Data Pasien
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
                    <th>Umur</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>NIK</th>
                    <th>Nomor Rekam Medis</th>
                    <th>Status</th>
                    @can('petugas')
                    <th>Aksi</th>
                    @endcan
                </thead>
                <tbody>
                    @foreach ($pasien as $pasien)
                    @php
                        $currentDate = new DateTime();
                        $date = new DateTime($pasien->tanggal_lahir);
                        $interval = $date->diff($currentDate);
                    @endphp
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$pasien->nama}}</td>
                        <td>{{$interval->y}} tahun</td>
                        <td>{{$pasien->jenis_kelamin}}</td>
                        <td>{{$pasien->alamat}}</td>
                        <td>{{$pasien->nik}}</td>
                        <td>{{$pasien->nomor_rm}}</td>
                        <td>
                            <span class="badge {{$pasien->is_active == true ? 'badge-primary' : 'badge-danger'}}">{{$pasien->is_active == true ? 'Aktif' : 'Tidak aktif'}}</span>
                        </td>
                        @can('petugas')
                        <td>
                            <button class="btn btn-edit btn-default" data-id="{{$pasien->id}}">
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
