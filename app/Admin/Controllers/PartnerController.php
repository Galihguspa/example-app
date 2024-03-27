<?php

namespace App\Admin\Controllers;

use Illuminate\Http\Request;
use App\Models\Partner;
use App\Models\wilayah\Provinsi;
use App\Models\wilayah\Kabupaten;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Illuminate\Support\Facades\DB;


class PartnerController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Partner';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Partner());
        
        $grid->column('name', __('Nama'))->sortable();
        $grid->column('created_at', __('Tanggal dibuat'))->display(function ($time) {
            return date("Y-m-d H:i:s", strtotime($time));
        })->sortable();
        $grid->column('street', __('Jalan'))->sortable();
        $grid->column('id_city', __('Kota'))->display(function ($id_city) {
            return Kabupaten::find($id_city)->name;
        })->sortable();
        $grid->column('id_province', __('Provinsi'))->display(function ($id_province) {
            return Provinsi::find($id_province)->name;
        })->sortable();
        $grid->column('phone', __('Phone'))->sortable();
        $grid->column('customer', __('Pelanggan'))->sortable();
        $grid->column('supplier', __('Pemasok'))->sortable();

        $grid->filter(function($filter){
            // Remove the default id filter
            $filter->disableIdFilter();
            // Add a column filter
            $filter->like('name', 'Nama');
            $filter->like('street', 'Jalan');
            $filter->like('id',);
            $filter->equal('id_province', 'Pronvinsi')->select(Provinsi::paginate(10)
                    ->pluck('name', 'id'));
            $filter->equal('id_city', 'Kota')->select(Kabupaten::paginate(10)
                    ->pluck('name', 'id'));
        });

        $grid->model()->orderBy('id','asc');

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
        $show = new Show(Partner::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('name', __('Name'));
        $show->field('street', __('Street'));
        $show->field('id_city', __('Id city'));
        $show->field('id_province', __('Id province'));
        $show->field('code_pos', __('Code pos'));
        $show->field('phone', __('Phone'));
        $show->field('email', __('Email'));
        $show->field('note', __('Note'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Partner());

        $form->text('name', __('Nama'))->rules('required');
        // $form->text('id_province', __('Provinsi'));
        $form->select('id_province', __('Provinsi'))->options(Provinsi::all()
                    ->pluck('name', 'id'))
                ->loads(['id_city'], [ '/partner/kabupaten_select'])->rules('required');
        $form->select('id_city', __('Kota'))->rules('required')->value(request('id_city'));
        $form->textarea('street', __('Street'))->rules('required');
        $form->text('code_pos', __('Kode Pos'));
        $form->mobile('phone', __('No Hp'));
        $form->email('email', __('Email'));
        $form->textarea('note', __('Keterangan'));
        // $form->checkbox('customer', __('Pelanggan'))->options([1 => 'Yes']);
        // $form->checkbox('supplier', __('Pemasok'))->options([1 => 'Yes']);
        
        $form->tools(function (Form\Tools $tools) { 
            // Disable `List` btn.view
            // $tools->disableList();
            $tools->disableView();
        });

        $form->saving(function (Form $form) {
            // throws an exception
            dd($form->supplier);
            // $form->kode_produk = Produk::get_kode_produk();            
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

    public function kabupaten_select(Request $request)
    {
        $provinceId  = $request->get('q');
        // $kabupaten = Kabupaten::where('provinsi_id',$kabupatenId)->get()->pluck('name', 'id');
        // $kabupaten = Kabupaten::all()->pluck('name', 'id');
        // $department = Department::where('id', '!=', $employee->department)->get()->pluck('name', 'id');
        return Kabupaten::where('provinsi_id', $provinceId)->get(['id', DB::raw('name as text')]);
    }
}
