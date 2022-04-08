<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index(){
        $result['date']=category::all();
        return view ('admin.category',$result);
    }
    public function manage_category(Request $request,  $id=''){
        if($id>0){
            $arr=Category::where(['id'=>$id])->get();

            $result['category_name']=$arr['0']->category_name;
            $result['category_slug']=$arr['0']->category_slug;
            $result['status']=$arr['0']->status;
            $result['id']=$arr['0']->id;
        }
        else{
            $result['category_name']='';
            $result['category_slug']='';
            $result['status']='';
            $result['id']='';

        }
        return view ('admin.manage_category', $result);
    }
    public function manage_category_process(Request $request){

        // return $request->post();
        // $request->validate([
        //     'category_name'=>'required',
        //     'category_slug'=>'required|unique:categories',
        // ]);


        if($request->post('id')>0){
            $model=Category::find($request->post('id'));
            $msg="Category Update";
        }else{
            $model=new category();
            $msg="Category Insert";

        }

        $model->category_name=$request->post('category_name');
        $model->category_slug=$request->post('category_slug');
        $model->status=$request->post('status');
        $model->save();
        $request->session()->flash('message',$msg);
        return redirect('admin/category');

    }

    public function delete(Request $request ,$id){
        $model=category::find($id);
        $model->delete();
        $request->session()->flash('message','Category Delete');
        return redirect('admin/category');
    }

}
