<?php

namespace App\Http\Controllers;

use App\Models\size;
use Illuminate\Http\Request;

class SizeController extends Controller
{
    public function index(){
        $result['date']=size::all();
        return view ('admin.size',$result);
    }
    public function manage_size(Request $request,  $id=''){
        if($id>0){
            $arr=size::where(['id'=>$id])->get();

            $result['size']=$arr['0']->size;
            $result['status']=$arr['0']->status;
            $result['id']=$arr['0']->id;
        }
        else{
            $result['size']='';
            $result['status']='';
            $result['id']='';

        }
        return view ('admin.manage_size', $result);
    }
    public function manage_size_process(Request $request){

        // return $request->post();
        // $request->validate([
        //     'category_name'=>'required',
        //     'category_slug'=>'required|unique:categories',
        // ]);


        if($request->post('id')>0){
            $model=size::find($request->post('id'));
            $msg="Size Update";
        }else{
            $model=new size();
            $msg="Size Insert";

        }

        $model->size=$request->post('size');
        $model->status=$request->post('status');

        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/size');

    }

    public function delete(Request $request ,$id){
        $model=size::find($id);
        $model->delete();
        $request->session()->flash('message','Size Delete');
        return redirect('admin/size');
    }
}
