<?php

namespace App\Admin\Controllers;

use App\Models\Produk;
use App\Models\Jeniskain;
use App\Models\Kategori;
use App\Models\Satuan;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ProdukController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Produk';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Produk());

        $grid->column('kode_produk', __('Kode produk'))->sortable();
        $grid->column('created_at', __('Tanggal dibuat'))->display(function ($time) {
            return date("Y-m-d H:i:s", strtotime($time));
        })->sortable();
        $grid->column('nama_produk', __('Nama produk'))->sortable();
        $grid->column('lebar', __('Lebar'))->sortable();
        $grid->column('satuan_lebar', __('Satuan lebar'))->sortable();
        $grid->column('satuan1', __('Satuan1'))->sortable();
        $grid->column('satuan2', __('Satuan2'))->sortable();
        $grid->column('id_kategori', __('Kategori'))->display(function ($id_kategori) {
            return Kategori::find($id_kategori)->nama_kategori;
        })->sortable();
        $grid->column('id_jenis_kain', __('Jenis kain'))->display(function ($id_jenis_kain) {
            return Jeniskain::find($id_jenis_kain)->nama_jenis_kain;
        })->sortable();
        $grid->column('status_aktif', __('Status aktif'))->using([1 => 'Aktif', 0 => 'Tidak Aktif']);

        $grid->filter(function($filter){
            // Remove the default id filter
            $filter->disableIdFilter();
            // Add a column filter
            $filter->like('nama_produk', 'Nama Produk');
            $filter->equal('id_kategori', 'Kategori')->select(Kategori::All()
                    ->pluck('nama_kategori', 'id'));
            $filter->equal('id_jenis_kain', 'Jenis Kain')->select(Jeniskain::All()
                    ->pluck('nama_jenis_kain', 'id'));
            $filter->equal('status_aktif', 'Status Aktif')->select([
                1 => 'Aktif',
                0 => 'Tidak Aktif',
            ]);
        });

        $grid->model()->orderBy('created_at','desc');

        $grid->actions(function (Grid\Displayers\Actions $actions) {
            $actions->disableView();
        });
        
        // disable btn new, export selector column
        $grid->disableColumnSelector();
        // $grid->disableExport();

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Produk::findOrFail($id));

        $show->field('kode_produk', __('Kode produk'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('nama_produk', __('Nama produk'));
        $show->field('lebar', __('Lebar'));
        $show->field('satuan_lebar', __('Satuan lebar'));
        $show->field('satuan1', __('Satuan1'));
        $show->field('satuan2', __('Satuan2'));
        $show->field('id_kategori', __('Id kategori'));
        $show->field('id_jenis_kain', __('Id jenis kain'));
        $show->field('status_aktif', __('Status aktif'));
        $show->field('keterangan', __('Keterangan'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Produk());

        $form->hidden('kode_produk', __('Kode produk'))->readonly();
        $form->text('nama_produk', __('Nama produk'))
                ->creationRules(["required","unique:produk"])
                ->updateRules(["required","unique:produk,nama_produk,{{id}}"]);
        $form->text('lebar', __('Lebar'));
        $form->select('satuan_lebar', __('Satuan Lebar'))->options(Satuan::orderBy('short', 'asc')->get()
                ->pluck('short','short'));
        $form->select('satuan1', __('Satuan1'))->options(Satuan::orderBy('short', 'asc')->get()
                ->pluck('short','short'))
                ->rules('required')->default('Kg');
        $form->select('satuan2', __('Satuan2'))->options(Satuan::orderBy('short', 'asc')->get()
                ->pluck('short','short'));
        $form->select('id_kategori', __('Kategori'))->options(Kategori::all()
                ->pluck('nama_kategori','id'))
                ->rules('required');
        $form->select('id_jenis_kain', __('Jenis Kain'))->options(Jeniskain::all()
                ->pluck('nama_jenis_kain','id'))
                ->rules('required');
        $form->select('status_aktif', __('Status aktif'))->options([
            1 => 'Aktif',
            2 => 'Tidak Aktif',
        ])->rules('required')->default(1);
        $form->textarea('keterangan', __('Keterangan'));

       $form->saving(function (Form $form) {
            // throws an exception
            // dd(Produk::get_kode_produk());
            $form->kode_produk = Produk::get_kode_produk();            
        });

        $form->tools(function (Form\Tools $tools) { 
            // Disable btn.view
            $tools->disableView();
        });

        $form->footer(function ($footer) {
            // disable `View` checkbox
            $footer->disableViewCheck();
            // disable `Continue editing` checkbox
            $footer->disableEditingCheck();
            // disable `Continue Creating` checkbox
            $footer->disableCreatingCheck();

        }); 

        return $form;
    }
}
