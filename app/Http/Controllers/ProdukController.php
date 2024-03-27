<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Encore\Admin\Layout\Content;
use Encore\Admin\Grid;
use Encore\Admin\Form;
use DataTables;
use App\Models\Produk;
use App\Models\Satuan;
use Validator;

class ProdukController extends Controller
{
    //
    // use HasResourceActions;

    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Produk';


    /** 
     * 
     * set arra_satuan
     * @var array
     * 
    */

    protected $arr_status = [
        	[ 'id' => 't', 'nama' => 'Aktif'],
        	[ 'id' => 'f', 'nama' => 'Tidak Aktif'],
    ];

    /**
     * Set description for following 4 action pages.
     *
     * @var array
     */
    protected $description = [
        //        'index'  => 'Index',
        //        'show'   => 'Show',
        //        'edit'   => 'Edit',
        //        'create' => 'Create',
    ];
  
    /**
     * Get content title.
     *
     * @return string
     */
    protected function title()
    {
        return $this->title;
        
    }

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
            ->title($this->title())
            ->description($this->description['index'] ?? trans('admin.list'))
            ->body(view('master/v_produk'));
    }

    // public function json(){
    //     return Datatables::of(Produk::all())->make(true);
    // }

    public function loadJson(Request $request)
    {
        $produks = Produk::latest()->get();

        if ($request->ajax()) {
             return Datatables::of($produks)
                    
                    ->editColumn('created_at', function ($produks){
                        //change over here
                        return date('Y-m-d H:i:s', strtotime($produks->created_at) );
                    })
                    ->editColumn('status_produk', function ($status){
                        //change over here
                        $status_aktif = 'Tidak Aktif';
                        if($status->status_produk == 't'){
                            $status_aktif = 'Aktif';
                        }
                        return $status_aktif;
                    })
                    ->addIndexColumn()->addColumn('action', function($row){
                            $btn = '<a href="/produk/edit/'.$row->id.'" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Edit" class="edit btn btn-primary btn-sm editProduk"><i class="fa fa-edit"></i> <span class="hidden-xs">Edit</span></a>';

                            $btn = $btn.' <a href="javascript:void(0)" data-toggle="tooltip"  data-id="'.$row->id.'" data-original-title="Delete" class="btn btn-danger btn-sm deleteProdukBook"><i class="fa fa-trash"></i> <span class="hidden-xs">Delete</span></a>';
                            return $btn;
                    })->rawColumns(['action'])->make(true);
                    
        }
        return view('v_produk', compact('produks'));
    }


    /**
     * Edit interface.
     *
     * @param mixed   $id
     * @param Content $content
     *
     * @return Content
     */
    public function edit($id, Content $content)
    {
        
        $data['id']     = $id;
        $data['produk'] = Produk::firstWhere('id', $id);
        $data['satuan'] = Satuan::get();
        $data['status'] = $this->arr_status;
        return $content
            ->title($this->title())
            ->description($this->description['edit'] ?? trans('admin.edit'))
            ->body(view('master/v_produk_edit',$data));
    }


     /**
     * Edit interface.
     *
     * @param mixed   $id
     * @param Content $content
     *
     * @return Content
     */
    public function add(Content $content)
    {
        $data['satuan'] = Satuan::get();
        $data['status'] = $this->arr_status;
        return $content
            ->title($this->title())
            ->description($this->description['create'] ?? trans('admin.create'))
            ->body(view('master/v_produk_add',$data));
    }

    public function create(Request $request)
    {
     
    	$validator = Validator::make($request->all(), [
            'kode_produk'   => 'required',
            'nama_produk'   => 'required',
            'satuan1'       => 'required',
            'status_produk' => 'required',
        ]);
     
        if ($validator->passes()) {
            // return response()->route('produk/create')->json(['success'=>'success']);
            // return response()->with(['title' => 'tet', 'message' => 'success'], 200);
            return redirect()->route('produk/create')->with('warning','Something Went Wrong!');
        }
     
        // return response()->json(['error'=>$validator->errors()->all()]);
    }
    

     
}
