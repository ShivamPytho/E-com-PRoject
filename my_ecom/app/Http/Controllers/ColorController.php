<?php

namespace App\Http\Controllers;

use App\Models\color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    public function index(){
        $result['date']=color::all();
        return view ('admin.color',$result);
    }
    public function manage_color(Request $request,  $id=''){
        if($id>0){
            $arr=color::where(['id'=>$id])->get();

            $result['color']=$arr['0']->color;
            $result['size']=$arr['0']->size;
            $result['status']=$arr['0']->status;
            $result['id']=$arr['0']->id;
        }
        else{
            $result['color']='';
            $result['size']='';
            $result['status']='';
            $result['id']='';

        }
        return view ('admin.manage_color', $result);
    }
    public function manage_color_process(Request $request){

        // return $request->post();
        // $request->validate([
        //     'category_name'=>'required',
        //     'category_slug'=>'required|unique:categories',
        // ]);


        if($request->post('id')>0){
            $model=Color::find($request->post('id'));
            $msg="Color Update";
        }else{
            $model=new color();
            $msg="Color Insert";

        }

        $model->color=$request->post('color');
        $model->size=$request->post('size');
        $model->status=$request->post('status');
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/color');

    }

    public function delete(Request $request ,$id){
        $model=color::find($id);
        $model->delete();
        $request->session()->flash('message','color Delete');
        return redirect('admin/color');
    }
}
