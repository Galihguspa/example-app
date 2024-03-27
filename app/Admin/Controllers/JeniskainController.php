<?php

namespace App\Admin\Controllers;

use App\Models\Jeniskain;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use Encore\Admin\Widgets\Box;

class JeniskainController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Jeniskain';

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
                    $form->action(admin_url('/jeniskain'));
                    $form->text('nama_jenis_kain', __('Nama jenis kain'))
                            ->creationRules(['required', "unique:jeniskain"])
                            ->updateRules(['required', "unique:jeniskain,nama_jenis_kain,{{id}}"]);
                    $form->textarea('ketarangan', __('Ketarangan'));
                    $form->hidden('_token')->default(csrf_token());
                    $column->append((new Box(trans('Create'), $form))->style('primary'));
                });
                $row->column(6, $this->grid()->render());
            });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Jeniskain());

        $grid->column('created_at', __('Tanggal dibuat'))->display(function ($time) {
            return date("Y-m-d H:i:s", strtotime($time));
        })->sortable();
        $grid->column('nama_jenis_kain', __('Nama jenis kain'))->sortable();
        $grid->column('ketarangan', __('Ketarangan'));
        $grid->filter(function($filter){
            // Remove the default id filter
            $filter->disableIdFilter();
            // Add a column filter
            $filter->like('nama_jenis_kain', 'Nama Jenis_kain');

        });
        $grid->model()->orderBy('created_at','desc');

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
        $show = new Show(Jeniskain::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));
        $show->field('nama_jenis_kain', __('Nama jenis kain'));
        $show->field('ketarangan', __('Ketarangan'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Jeniskain());

        $form->text('nama_jenis_kain', __('Nama jenis kain'))
                ->creationRules(['required', "unique:jeniskain"])
                ->updateRules(['required', "unique:jeniskain,nama_jenis_kain,{{id}}"]);
        $form->textarea('ketarangan', __('Ketarangan'));
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
