<?php

namespace App\Http\Controllers;

use App\Models\cupen;
use Illuminate\Http\Request;

class CupenController extends Controller
{
    public function index(){
        $result['date']=cupen::all();
        return view ('admin.cupen',$result);
    }
    public function manage_cupen(Request $request,  $id=''){
        if($id>0){
            $arr=Cupen::where(['id'=>$id])->get();

            $result['title']=$arr['0']->title;
            $result['code']=$arr['0']->code;
            $result['value']=$arr['0']->value;
            $result['id']=$arr['0']->id;
        }
        else{
            $result['title']='';
            $result['code']='';
            $result['value']='';
            $result['id']='';

        }
        return view ('admin.manage_cupen', $result);
    }
    public function manage_cupen_process(Request $request){

        // return $request->post();
        // $request->validate([
        //     'category_name'=>'required',
        //     'category_slug'=>'required|unique:categories',
        // ]);


        if($request->post('id')>0){
            $model=cupen::find($request->post('id'));
            $msg="Cupen Update";
        }else{
            $model=new cupen();
            $msg="Cupen Insert";

        }

        $model->title=$request->post('title');
        $model->code=$request->post('code');
        $model->value=$request->post('value');
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/cupen');

    }

    public function delete(Request $request ,$id){
        $model=cupen::find($id);
        $model->delete();
        $request->session()->flash('message','Cupen Delete');
        return redirect('admin/cupen');
    }


}
