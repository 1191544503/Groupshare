<?php

namespace App\Http\Controllers;

use App\Models\Resource;
use App\Models\Team;
use Illuminate\Http\Request;
use App\Handlers\ImageUploadHandler;
use App\Handlers\ResourceUploadHandler;
use Auth;

class ResourceController extends Controller
{
    //
    public function create(Team $team){
        return view('resources.resource_form',compact('team'));
    }
    public function edit(Resource $resource){
        $this->authorize('edit',$resource);
        return view('resources.resource_form_edit',compact('resource'));
    }
    public function store(Request $request,Resource $resource,ResourceUploadHandler $uploader){
        $this->validate($request,[
            'name'=>'required|min:3|string',
            'introduce'=>'required|min:3|string'
        ]);
        $resource->name=$request->name;
        $resource->team_id=$request->team_id;
        $resource->user_id=Auth::User()->id;
        $resource->introduce=$request->introduce;
        if($request->file){
            $result = $uploader->save($request->file, 'resource_file', Auth::user()->id.'_'.$request->team_id);
            if ($result) {
                $resource->url = $result['path'];
            }
        }
        $resource->save();
        session()->flash('success','文件创建成功');
        return redirect()->route('team.show',$request->team_id);
    }

    public function uploadImage(Request $request, ImageUploadHandler $uploader)
    {
        // 初始化返回数据，默认是失败的
        $data = [
            'success'   => false,
            'msg'       => '上传失败!',
            'file_path' => ''
        ];
        // 判断是否有上传文件，并赋值给 $file
        if ($file = $request->upload_file) {
            // 保存图片到本地
            $result = $uploader->save($request->upload_file, 'resource_image', \Auth::id(), 1024);
            // 图片保存成功的话
            if ($result) {
                $data['file_path'] = $result['path'];
                $data['msg']       = "上传成功!";
                $data['success']   = true;
            }
        }
        return $data;
    }

    public function show(Resource $resource){
        return view('resources.resource_show',compact('resource'));
    }
    public function update(Request $request,Resource $resource,ResourceUploadHandler $uploader){
        $this->authorize('edit',$resource);
        $this->validate($request,[
            'name'=>'required|min:3|string',
            'introduce'=>'required|min:3|string'
        ]);
        $resource->name=$request->name;
        $resource->team_id=$request->team_id;
        $resource->user_id=Auth::User()->id;
        $resource->introduce=$request->introduce;
        if($request->file){
            $result = $uploader->save($request->file, 'resource_file', Auth::user()->id.'_'.$request->team_id);
            if ($result) {
                $resource->url = $result['path'];
            }
        }
        $resource->save();
        return redirect()->route('team.show',$request->team_id)->with('success','文件更新成功');;
    }
    public function destroy(Resource $resource){
        $this->authorize('destroy',$resource);
        $resource->delete();
        return redirect()->back()->with('success','文章成功删除');
    }
}
