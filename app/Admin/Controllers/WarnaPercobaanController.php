<?php

namespace App\Admin\Controllers;
// namespace App\Http\Controllers;
namespace App\Admin\Actions\Post;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Encore\Admin\Controllers\Dashboard;
use Encore\Admin\Layout\Column;
use Encore\Admin\Layout\Content;
use Encore\Admin\Layout\Row;
use App\Models\Satuan;
use App\Models\Warna;
use DataTables;
use Illuminate\Support\MessageBag;
use Encore\Admin\Actions\Action;

class WarnaController extends Controller
{
    /**
     * @var string
     */
    protected $view = 'admin::widgets.alert';

    /**
     * 
     * @var array
     * 
     */
    protected $arr_status = [
        	[ 'id' => 't', 'nama' => 'Aktif'],
        	[ 'id' => 'f', 'nama' => 'Tidak Aktif'],
    ];

    public function index(Content $content)
    {
        return $content
            ->title('Warna')
            ->description('List')
            ->breadcrumb(['text' => 'Warna'])
            ->row(view('master/v_warna'));
            // ->body('tes');
            // ->row(function (Row $row) {

            //     $row->column(4, function (Column $column) {
            //         $column->append(Dashboard::environment());
            //     });

            //     $row->column(4, function (Column $column) {
            //         $column->append(Dashboard::extensions());
            //     });

            //     $row->column(4, function (Column $column) {
            //         $column->append(Dashboard::dependencies());
            //     });
            // });
    }

    public function add(Content $content)
    {
        $data['satuan'] = Satuan::get();
        $data['status'] = $this->arr_status;
        return $content
            ->title('Warna')
            ->description($this->description['create'] ?? trans('admin.create'))
            ->body(view('master/v_warna_add',$data));
    }
    

    public function loadJson(Request $request)
    {
        $warnas = Warna::latest()->get();

        if ($request->ajax()) {
             return Datatables::of($warnas)
                    
                    ->editColumn('created_at', function ($warnas){
                        //change over here
                        return date('Y-m-d H:i:s', strtotime($warnas->created_at) );
                    })->make(true);
                    
        }
        // dd($warnas);
        // return view('master/v_warna', compact('warnas'));
    }

      /**
     * @return array
     */
    protected function variables()
    {
        $this->class("alert alert-info alert-dismissable");

        return [
            'title'      => 'danger',
            'content'    => 'tess',
            'icon'       => 'ban',
            'attributes' => '',
        ];
    }
    
    public function store(Request $request)
    {
        echo 'ini st';
        $tes = [
            'title'      => 'success',
            'content'    => 'aa',
            'icon'       => 'aa',
            'attributes' => 'bb',
        ];
        // return $request->back('warna/create')->with('success','tess');
        // return $request->session()->flash('success','Registration Succesfull!! Please Login');
        $data['message']='tes';
        // $request->compact($data);
        // return redirect('/warna/create')->with($data);;
        // return view($this->view, $this->variables());
          $error = new MessageBag([
                'title'   => 'title...',
                'message' => 'message....',
            ]);

           return $this->response()->success('Success!');
    }

    
}
