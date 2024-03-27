<link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap.min.css">

<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Produk </h3>
         <div class="btn-group pull-right" style="margin-right: 5px">
            <a href="{{ admin_url('warna/create') }}" class="btn btn-sm btn-success" title="New"><i class="fa fa-plus"></i><span class="hidden-xs">&nbsp;New</span></a>
        </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-striped" id="table_list">
                <thead>
                    <tr>
                        {{-- <td>No.</td> --}}
                        <th>Nama Produk</th>
                        <th>Tgl.dibuat</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- /.table-responsive -->
    </div>
    <!-- /.box-body -->
</div>
<script src="https://cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap.min.js"></script>
<script>

            $(document).ready(function () {
                $('#table_list').DataTable({
                    processing: true,
                    serverSide: true,
                    // ajax: 'produk\json',
                    ajax: "{{ admin_url('warna/loadJson') }}",
                    columns: [
                        { data: 'nama_warna', name: 'nama_warna' },
                        { data: 'created_at',  name: 'created_at' },
                        { data: 'keterangan',  name: 'keterangan' },

                    ]
                });
            });
</script>
