@extends('admin.layout')
@section(' page_title')
Manage Product
@endsection
@section('content')
@if ($id>0)
{{$image_required=""}}
@else
{{$image_required="required"}}
@endif
<h1>Manage Product</h1>
<div class="col-md-12">
    <!-- DATA TABLE -->
    <br>
    <div class="table-data__tool">
        <a href="{{url('admin/product')}}">
            <button type="button" class="btn btn-primary">Back</button>
        </a>
    </div>
    <div class="table-responsive table-responsive-data2">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route('product.manage_product_process')}}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name" class="control-label mb-1">name</label>
                            <input id="name" value='{{$name}}' name="name" type="text" class="form-control"
                                aria-required="true" aria-invalid="false" required>
                            @error('name')
                            <div class="alert alert-danger" role="alert">
                                {{'$message'}}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="file" class="control-label mb-1"> image</label>
                            <input {{$image_required}} id="image" value='{{$image}}' name="image" type="file"
                                class="form-control" aria-required="true" aria-invalid="false">
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="class col-md-4">
                                    <label for="category_id" class="control-label mb-1"> Category</label>
                                    <select name="category_id" id="category_id" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false" required>
                                        <option value="">Select Category</option>
                                        @foreach ($category as $list )
                                        @if ($category_id == $list->id)
                                        <Option selected value="{{$list->id}}">
                                            @else
                                        <Option value="{{$list->id}}">
                                            @endif
                                            {{$list->category_name}}
                                        </Option>
                                        @endforeach
                                    </select>
                                    {{-- <input id="slug" value='{{$slug}}' name="slug"> --}}
                                </div>
                                <div class="class col-md-4">
                                    <label for="slug" class="control-label mb-1"> Slug</label>
                                    <input id="slug" value='{{$slug}}' name="slug" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false" required>
                                </div>
                                <div class="class col-md-4">
                                    <label for="brand" class="control-label mb-1">Brand</label>
                                    <input id="brand" value='{{$brand}}' name="brand" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="class col-md-4">
                                    <label for="model" class="control-label mb-1"> Model</label>
                                    <input id="model" value='{{$model}}' name="model" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false" required>
                                </div>
                                <div class="class col-md-4">
                                    <label for="short_dec" class="control-label mb-1"> Short Desc</label>
                                    <input id="short_dec" value='{{$short_dec}}' name="short_dec" type="text"
                                        class="form-control" aria-required="true" aria-invalid="false" required>
                                </div>
                                <div class="class col-md-4">
                                    <label for="desc" class="control-label mb-1">Desc</label>
                                    <input id="desc" value='{{$desc}}' name="desc" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="technical_specfication" class="control-label mb-1">Technical
                                Specfication</label>
                            <input id="technical_specfication" value='{{$technical_specfication}}'
                                name="technical_specfication" type="text" class="form-control" aria-required="true"
                                aria-invalid="false" required>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="class col-md-4">
                                    <label for="user" class="control-label mb-1"> User</label>
                                    <input id="user" value='{{$user}}' name="user" type="text" class="form-control"
                                        aria-required="true" aria-invalid="false" required>
                                </div>
                                <div class="class col-md-4">
                                    <label for="warranty" class="control-label mb-1"> Warranty</label>
                                    <input id="warranty" value='{{$warranty}}' name="warranty" type="text"
                                        class="form-control" aria-required="true" aria-invalid="false" required>
                                </div>
                                <div class="class col-md-4">
                                    <label for="status" class="control-label mb-1">Status</label>
                                    <input id="status" value='{{$status}}' name="status" type="text"
                                        class="form-control" aria-required="true" aria-invalid="false" required>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <h2>Product Attribute</h2>
        <br>
        <div class="col-lg-12" id="product_attr_box">
            <div class="card" id="product_attr_1">
                <div class="card-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="class col-md-2">
                                <label for="color_id" class="control-label mb-1"> Color</label>
                                <select name="color_id[]" id="color_id" type="text" class="form-control"
                                    aria-required="true" aria-invalid="false" required>
                                    <option value="">Select</option>
                                    @foreach($colors as $list)
                                    <option value="{{$list -> id}}">{{$list->color}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="class col-md-2">
                                <label for="sizes_id" class="control-label mb-1"> Sizes</label>
                                <select name="sizes_id[]" id="sizes_id" type="text" class="form-control"
                                    aria-required="true" aria-invalid="false" required>
                                    <option value="">Select</option>
                                    @foreach($sizes as $list)
                                    <option value="{{$list -> id}}">{{$list->size}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="class col-md-2">
                                <label for="sku" class="control-label mb-1"> SKU</label>
                                <input id="sku" name="sku[]" type="text" class="form-control" aria-required="true"
                                    aria-invalid="false" required>
                            </div>
                            <div class="class col-md-2">
                                <label for="mrp" class="control-label mb-1"> MRP</label>
                                <input id="mrp" name="mrp[]" type="text" class="form-control" aria-required="true"
                                    aria-invalid="false" required>
                            </div>
                            <div class="class col-md-2">
                                <label for="prices" class="control-label mb-1">Prices</label>
                                <input id="prices" name="prices[]" type="text" class="form-control" aria-required="true"
                                    aria-invalid="false" required>
                            </div>
                            <div class="class col-md-2">
                                <label for="qtr" class="control-label mb-1">qtr</label>
                                <input id="qtr" name="qtr[]" type="text" class="form-control" aria-required="true"
                                    aria-invalid="false" required>
                            </div>

                        </div>
                        <div class="row">
                            <div class="class col-md-4">
                                <label for="file" class="control-label mb-1"> image</label>
                                <input {{$image_required}} id="image_attr" name="image_attr[]" type="file"
                                    class="form-control" aria-required="true" aria-invalid="false">
                            </div>
                            <div class="class col-md-4">
                                <label for="file" class="control-label mb-1"> </label>
                                <br>
                                <button type="button" class="btn btn-primary btn-lg" onclick="add_more()"><i
                                        class="fa fa-plus">Add</i></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
            Submit
        </button>
        <input type="hidden" name="id" value="{{$id}}" />
    </div>
    </form>
    <script>
        var loop_count = 1;
        function add_more() {

            loop_count++;
            var html = '<div class="card" id="product_attr_' + loop_count + '" ><div class="card-body"><div class="form-group"><div class="row">';

            var color_id_html = jQuery('#color_id').html();
            html += '<div class="class col-md-2"><label for="color_id" class="control-label mb-1"> Color</label><select name="color_id[]" id="color_id"  class="form-control" required="">' + color_id_html + '</select></div>';

            var size_id_html = jQuery('#sizes_id').html();
            html += '<div class="class col-md-2"><label for="size_id" class="control-label mb-1"> Sizes</label><select name="sizes_id[]" id="sizes_id"  class="form-control" required="">' + size_id_html + '</select></div>';

            html += '<div class="class col-md-2"><label for="sku" class="control-label mb-1"> SKU</label><input id="sku" name="sku[]" type="text" class="form-control" aria-required="true"aria-invalid="false" required></div>';
            html += '<div class="class col-md-2"><label for="mrp" class="control-label mb-1"> MRP</label><input id="mrp" name="mrp[]" type="text" class="form-control" aria-required="true"aria-invalid="false" required></div>';
            html += '<div class="class col-md-2"><label for="qtr" class="control-label mb-1"> QTR</label><input id="qtr" name="qtr[]" type="text" class="form-control" aria-required="true"aria-invalid="false" required></div>';
            html += '<div class="class col-md-2"><label for="primage_attrices" class="control-label mb-1"> Prices</label><input id="prices" name="prices[]" type="text" class="form-control" aria-required="true"aria-invalid="false" required></div>';
            html += '<div class="class col-md-4"><label for="image_attr" class="control-label mb-1">Image</label><input id="image_attr" name="image_attr[]" type="file" class="form-control" aria-required="true"aria-invalid="false" required></div>';
            html += '<div class="class col-md-4"><label for="file" class="control-label mb-1"></label><br><button type="button" class="btn btn-danger  btn-lg" onclick=remove_more("' + loop_count + '")><i class="fa fa-plus">Remove</i></button>';

            html += '</div></div></div></div>';
            jQuery('#product_attr_box').append(html)

        }
        function remove_more(loop_count) {
            jQuery('#product_attr_' + loop_count).remove();
        }
    </script>
</div>
</div>
<!-- END DATA TABLE -->
</div>
@endsection
