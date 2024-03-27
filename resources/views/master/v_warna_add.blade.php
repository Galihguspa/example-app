<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Create </h3>
        <div class="btn-group pull-right" style="margin-right: 5px">
            <a href="{{ admin_url('warna') }}" class="btn btn-sm btn-default" title="List"><i class="fa fa-list"></i><span class="hidden-xs">&nbsp;List</span></a>
        </div>
    </div>
    <!-- /.box-header -->
    <form action="{{ admin_url('warna/create') }}" method="post" class="form-horizontal" accept-charset="UTF-8" enctype="multipart/form-data" pjax-container="">
        
        <div class="box-body">

            <div class="fields-group">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="kode_produk" class="col-sm-2 asterisk control-label">Kode Produk</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                <input type="text" id="kode_produk" name="kode_produk"  class="form-control kode_produk" placeholder="Input Kode Produk">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="keterangan" class="col-sm-2 asterisk control-label">Keterangan</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                <input type="text" id="keterangan" name="keterangan"  class="form-control keterangan" placeholder="Input Nama Produk">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.box-body -->

        <div class="box-footer">

            <input type="text" name="_token" value="{{ csrf_token() }}">

            <div class="col-md-2">
            </div>

            <div class="col-md-8">

                <div class="btn-group pull-right">
                    <button type="submit"  class="btn btn-primary btn-submit">Submit</button>
                </div>
            </div>
        </div>

        <!-- /.box-footer -->
    </form>
    <!-- /.box-body -->
</div>


<script>
    // $(document).ready(function() {
    //     $(".btn-submit").click(function(e){
    //         e.preventDefault();
       
    //         var _token = $("input[name='_token']").val();
    //         var kode_produk = $("input[name='kode_produk']").val();
    //         var nama_produk = $("input[name='nama_produk']").val();
    //         var satuan1 = $("input[name='satuan1']").val();
    //         var satuan2 = $("input[name='satuan2']").val();
    //         var status_produk = $("input[name='status_produk']").val();
       
    //         $.ajax({
    //             url: "{{ route('produk.create') }}",
    //             type:'POST',
    //             dataType:"JSON",
    //             data: {_token:_token, kode_produk:kode_produk, nama_produk:nama_produk, satuan1:satuan1, satuan2:satuan2, status_produk:status_produk},
    //             success: function(data) {
    //                 if($.isEmptyObject(data.error)){
    //                     alert(data.success);
    //                 }else{
    //                     alert('error')
    //                 }
    //             }
    //         });
       
    //     }); 
</script>
