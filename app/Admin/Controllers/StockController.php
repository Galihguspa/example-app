<?php

namespace App\Admin\Controllers;

use App\Models\Stock;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class StockController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Stock';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Stock());

        $grid->column('id', __('Id'));
        $grid->column('created_at', __('Tanggal dibuat'))->display(function ($time) {
            return date("Y-m-d H:i:s", strtotime($time));
        })->sortable();
        $grid->column('created_at', __('Tanggal diterima'))->display(function ($time) {
            return date("Y-m-d H:i:s", strtotime($time));
        })->sortable();
        $grid->column('kode_produk', __('Kode produk'))->sortable();
        $grid->column('nama_produk', __('Nama produk'))->sortable();
        $grid->column('lot', __('Lot'))->sortable();
        $grid->column('qty', __('Qty'))->sortable();
        $grid->column('satuan1', __('Satuan1'))->sortable();
        $grid->column('lokasi', __('Lokasi'))->sortable();
        $grid->column('gramasi', __('Gramasi'))->sortable();
        $grid->column('finishing', __('Finishing'))->sortable();
        $grid->column('lebar_jadi', __('Lebar jadi'))->sortable();
        $grid->column('satuan_lebar_jadi', __('Satuan lebar jadi'))->sortable();

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
        $show = new Show(Stock::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('move_date', __('Move date'));
        $show->field('kode_produk', __('Kode produk'));
        $show->field('nama_produk', __('Nama produk'));
        $show->field('lot', __('Lot'));
        $show->field('qty', __('Qty'));
        $show->field('satuan1', __('Satuan1'));
        $show->field('qty2', __('Qty2'));
        $show->field('satuan2', __('Satuan2'));
        $show->field('lokasi', __('Lokasi'));
        $show->field('lokasi_rak', __('Lokasi rak'));
        $show->field('gramasi', __('Gramasi'));
        $show->field('finishing', __('Finishing'));
        $show->field('lebar_jadi', __('Lebar jadi'));
        $show->field('satuan_lebar_jadi', __('Satuan lebar jadi'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Stock());

        // $form->date('move_date', __('Move date'))->default(date('Y-m-d'));
        $form->text('kode_produk', __('Kode produk'))->readonly();
        $form->text('nama_produk', __('Nama produk'))->readonly();
        $form->text('lot', __('Lot'))->readonly();
        $form->decimal('qty', __('Qty'))->default(0.00)->readonly();
        $form->text('satuan1', __('Satuan1'))->readonly();
        $form->decimal('qty2', __('Qty2'))->readonly();
        $form->text('satuan2', __('Satuan2'))->readonly();
        $form->text('lokasi', __('Lokasi'))->readonly();
        $form->text('lokasi_rak', __('Lokasi rak'))->readonly();
        $form->text('gramasi', __('Gramasi'));
        $form->text('finishing', __('Finishing'));
        $form->text('lebar_jadi', __('Lebar jadi'))->readonly();
        $form->text('satuan_lebar_jadi', __('Satuan lebar jadi'))->readonly();

        $form->tools(function (Form\Tools $tools) { 
            // Disable `List` btn.view
            // $tools->disableList();
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
