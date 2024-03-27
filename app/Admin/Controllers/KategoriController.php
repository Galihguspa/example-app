<?php

namespace App\Admin\Controllers;

use App\Models\Kategori;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\Box;

class KategoriController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Kategori';


    /**
     * Index interface.
     *
     * @param Content $content
     *
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->title(trans($this->title()))
            ->description(trans('admin.list'))
            ->row(function (Row $row) {
                $row->column(6, function (Column $column) {
                    $form = new \Encore\Admin\Widgets\Form();
                    $form->action(admin_url('/kategori'));
                    $form->text('nama_kategori', __('Nama Kategori'))
                            ->creationRules(['required', "unique:kategori"])
                            ->updateRules(['required', "unique:kategori,nama_kategori,{{id}}"]);
                    $form->hidden('_token')->default(csrf_token());
                    $column->append((new Box(trans('Create'), $form))->style('primary'));
                });
                $row->column(6, $this->grid()->render());
                // $row->column(6, $this->form()->render());
            });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Kategori());
    
        $grid->column('created_at', __('Tanggal dibuat'))->display(function ($time) {
            return date("Y-m-d H:i:s", strtotime($time));
        })->sortable();
        $grid->column('nama_kategori', __('Nama kategori'))->sortable();
        $grid->filter(function($filter){
        // Remove the default id filter
            $filter->disableIdFilter();
            // Add a column filter
            $filter->like('nama_kategori', 'Nama Kategori');

        });
        $grid->model()->orderBy('id','desc');

        $grid->actions(function (Grid\Displayers\Actions $actions) {
            $actions->disableView();
        });
        
        // disable btn new, export selector column
        $grid->disableCreateButton();
        $grid->disableColumnSelector();
        $grid->disableExport();

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
        $show = new Show(Kategori::findOrFail($id));

        $show->field('nama_kategori', __('Nama kategori'));
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Kategori());

        $form->text('nama_kategori', __('Nama kategori'))
                ->creationRules(['required', "unique:kategori"])
                ->updateRules(['required', "unique:kategori,nama_kategori,{{id}}"]);

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
