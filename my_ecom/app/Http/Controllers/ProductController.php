<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;     //query bulder

class ProductController extends Controller
{
    public function index(){
        $result['date']=product::all();
        return view ('admin.product',$result);
    }

    public function manage_product(Request $request,  $id=''){
        if($id>0){
            $arr=product::where(['id'=>$id])->get();

            $result['category_id']=$arr['0']->category_id;
            $result['name']=$arr['0']->name;
            $result['image']=$arr['0']->image;
            $result['slug']=$arr['0']->slug;
            $result['brand']=$arr['0']->brand;
            $result['model']=$arr['0']->model;
            $result['short_dec']=$arr['0']->short_dec;
            $result['desc']=$arr['0']->desc;
            $result['technical_specfication']=$arr['0']->technical_specfication;
            $result['warranty']=$arr['0']->warranty;
            $result['user']=$arr['0']->user;
            $result['status']=$arr['0']->status;
            $result['id']=$arr['0']->id;
        }
        else{
            $result['category_id']='';
            $result['name']='';
            $result['image']='';
            $result['slug']='';
            $result['brand']='';
            $result['model']='';
            $result['short_dec']='';
            $result['desc']='';
            $result['technical_specfication']='';
            $result['warranty']='';
            $result['user']='';
            $result['status']='';
            $result['id']='';

        }

        //array format me data feacth krna in DB
        $result['category']=DB::table('categories')->where(['status'=>1])->GET();

        $result['sizes']=DB::table('sizes')->where(['status'=>1])->GET();

        $result['colors']=DB::table('colors')->where(['status'=>1])->GET();

        // echo '<pre>';
        // print_r($result['category']);
        // die();

        return view ('admin.manage_product', $result);
    }
    public function manage_product_process(Request $request){

        echo '<pre>';
        print_r($request->post());
        die();
        if($request->post('id')>0){
            $image_validation = 'mimes:jpeg,jpg,png';

        }else{
            $image_validation = 'required|mimes:jpeg,jpg,png';

        }



        //return $request->post();
        $request->validate([
            'name'=>'required',
            'image'=>$image_validation,
            // 'category_slug'=>'required|unique:categories',
            //$request->post('id')
        ]);


        if($request->post('id')>0){
            $model=product::find($request->post('id'));
            $msg="Product Update";
        }else{
            $model=new product();
            $msg="Product Insert";
        }

        if($request->hasFile('image')){
            $image=$request->file('image');
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            $image->storeAs('/public/media',$image_name);
            $model->image=$image_name;

        }

        $model->category_id=$request->post('category_id');
        $model->name=$request->post('name');
        $model->slug=$request->post('slug');
        $model->brand=$request->post('brand');
        $model->model=$request->post('model');
        $model->short_dec=$request->post('short_dec');
        $model->desc=$request->post('desc');
        $model->technical_specfication=$request->post('technical_specfication');
        $model->warranty=$request->post('warranty');
        $model->user=$request->post('user');
        $model->status=$request->post('status');
        $model->save();

        // Products  attrubte start
        $skuattr=$request->post('sku');
        die();
        // Products  attrubte end


        $request->session()->flash('message',$msg);
        return redirect('admin/product');



    }

    public function delete(Request $request ,$id){
        $model=product::find($id);
        $model->delete();
        $request->session()->flash('message','Product Delete');
        return redirect('admin/product');
    }
}
