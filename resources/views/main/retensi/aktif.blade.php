@extends('template.master')

@section('page-title', 'Retensi')
@section('page-sub-title', 'aktif')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card bg-info mb-3 card-outline text-white card-info" style="opacity: 0.8;">
            <div class="card-body">
                <div class="row">
                    <div class="col-6">
                        Retensi aktif adalah pasien yang kunjungan terakhir tidak lebih dari 2 tahun terakhir
                    </div>
                    <div class="col-6 text-right">
                        <i class="fa fa-times fa-1x" style="cursor: pointer"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        Data Pasien
                    </div>
                    {{-- @can('petugas')
                    <div class="col-6 d-flex align-items-center">
                        <div class="m-auto"></div>
                        <button type="button" class="btn btn-outline-primary btn-add">
                            <i class="nav-icon i-Pen-2 font-weight-bold"></i> Tambah
                        </button>
                    </div>
                    @endcan --}}
                </div>
            </div>
            <div class="card-body">
                <table class="table table-hover table-striped" id="tableData">
                    <thead>
                        <th>No</th>
                        <th>Nama Pasien</th>
                        <th>Nomor Rekam Medis</th>
                        <th>Status</th>
                    </thead>
                    <tbody>
                        @foreach ($retensi as $retensi)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$retensi->nama}}</td>
                            <td>{{$retensi->nomor_rm}}</td>
                            <td>
                                <span class="badge {{$retensi->is_active == true ? 'badge-primary' : 'badge-danger'}}">{{$retensi->is_active == true ? 'Aktif' : 'Tidak aktif'}}</span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
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

    $('.fa-times').click(function() {
        $('.card-info').remove()
    });
    </script>
@endpush
