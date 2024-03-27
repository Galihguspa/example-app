<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Edit </h3>
        <div class="btn-group pull-right" style="margin-right: 5px">
            <a href="/produk" class="btn btn-sm btn-default" title="List"><i class="fa fa-list"></i><span class="hidden-xs">&nbsp;List</span></a>
        </div>
    </div>
    <!-- /.box-header -->
    <form action="http://10.10.0.22:8000/auth/users" method="post" class="form-horizontal model-form-65e821d664ea9"accept-charset="UTF-8" enctype="multipart/form-data" pjax-container="">

        <div class="box-body">

            <div class="fields-group">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="kode_produk" class="col-sm-2 asterisk control-label">Kode Produk</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                <input type="text" id="kode_produk" name="kode_produk" value="{{ $produk->kode_produk }}" class="form-control kode_produk" placeholder="Input Kode Produk">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama_produk" class="col-sm-2 asterisk control-label">Nama Produk</label>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                <input type="text" id="nama_produk" name="nama_produk" value="{{ $produk->nama_produk }}" class="form-control nama_produk" placeholder="Input Nama Produk">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="satuan1" class="col-sm-2 asterisk control-label">Satuan1</label>
                        <div class="col-sm-8">
                                <select class="form-control select2" style="width: 100%;" id="satuan1" name="satuan1" >
                                    <option value=""></option>
                                     <?php $selected = ''; ?>
                                    @foreach ($satuan as $sat)
                                            <?php
                                                if($sat['short'] == $produk->satuan1 ){
                                                    $selected = 'selected';
                                                }
                                            ?>
                                                <option {{ $selected }} >{{ $sat['short'] }}</option>
                                            <?= $selected = '';?>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="satuan2" class="col-sm-2 asterisk control-label">satuan2</label>
                        <div class="col-sm-8">
                                 <select class="form-control select2" style="width: 100%;" id="satuan2" name="satuan2" >
                                    <option value=""></option>
                                     <?php $selected = ''; ?>
                                    @foreach ($satuan as $sat)
                                            <?php
                                                if($sat['short'] == $produk->satuan2 ){
                                                    $selected = 'selected';
                                                }
                                            ?>
                                                <option {{ $selected }} >{{ $sat['short'] }}</option>
                                            <?= $selected = '';?>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-sm-2  control-label">Status</label>
                        <div class="col-sm-8">
                            <select class="form-control select2" style="width: 100%;" name="status_produk" >
                                    <option value=""></option>
                                    <?php $selected = ''; ?>
                                    @foreach ($status as $sat)
                                            <?php
                                                if($sat['id'] == $produk->status_produk ){
                                                    $selected = 'selected';
                                                }
                                            ?>
                                                <option value="{{ $sat['id'] }}" {{ $selected }}>{{ $sat['nama'] }}</option>
                                            <?= $selected = '';?>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <!-- /.box-body -->

        <div class="box-footer">

            <input type="hidden" name="_token" >

            <div class="col-md-2">
            </div>

            <div class="col-md-8">

                <div class="btn-group pull-right">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>

        <!-- /.box-footer -->
    </form>
    <!-- /.box-body -->
</div>
