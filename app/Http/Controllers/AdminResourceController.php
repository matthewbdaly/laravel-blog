<?php

namespace LaravelBlog\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class AdminResourceController extends Controller
{
    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->modelName = $request->route('resource');
        $this->modelClass = config('admin.models')[$this->modelName];
        $this->model = new $this->modelClass();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = $this->model->all();
        return view('admin::resource.index', [
            'items' => $data,
            'model_name' => $this->modelName,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fields = $this->getModelAttributes();
        return view('admin::resource.create', [
            'fields' => $fields,
            'model_name' => $this->modelName,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function getModelAttributes()
    {
        $table = $this->model->getTable();
        $fields = array_values(Schema::getColumnListing($table));
        $fielddata = [];
        foreach ($fields as $field){
            try {
                $fielddata[$field] = Schema::getColumnType($table, $field);
            } catch (\Exception $e) {
                $fielddata[$field] = 'unknown';
            }
        }
        return $fielddata;
    }
}
