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
                        <th>Kode Produk</th>
                        <th>Nama Produk</th>
                        <th>Tgldibuat</th>
                        <th>Satuan1</th>
                        <th>Satuan2</th>
                        <th>Status</th>
                        <th></th>
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
                    ajax: "{{ route('produk.loadJson') }}",
                    columns: [
                        { data: 'kode_produk', name: 'kode_produk' },
                        { data: 'nama_produk', name: 'nama_produk' },
                        { data: 'created_at',  name: 'created_at' },
                        { data: 'satuan1',  name: 'satuan1' },
                        { data: 'satuan2',  name: 'satuan2' },
                        { data: 'status_produk',  name: 'status_produk' },
                        { data: 'action',  name: 'action' },

                    ]
                });
            });
</script>
