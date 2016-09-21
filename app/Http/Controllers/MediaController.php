<?php

namespace App\Http\Controllers;

use App\Media;
use Illuminate\Http\Request;

use App\Http\Requests;

class MediaController extends Controller
{
    protected $view_dir = 'admin.media.';

    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files = Media::directory($this->request)->type($this->request)->paginate();
        return view($this->view_dir.'list_view', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->view_dir.'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function store(Request $request)
    {
        $media = new Media();

        $media->setFileAttribute($request->file('file'));
        $media->fill($request->all())->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view($this->view_dir.'show',compact('id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Media  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Media $id)
    {
        return view($this->view_dir.'edit',compact('id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Media $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Media $id)
    {
        $id->fill($request->all())->save();
        return redirect()->back()->with('message', ['type' => 'success', 'msg' => 'Successfully Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  object  Media $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Media $id)
    {
        $id->deleteFiles();
        $id->delete();
        return redirect()->action(class_basename(__CLASS__ . '@index'))->with('message', ['type' => 'danger', 'msg' => 'File Deleted']);
    }
}
