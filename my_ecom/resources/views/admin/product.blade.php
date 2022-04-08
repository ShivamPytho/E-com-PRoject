@extends('admin.layout')
@section(' selected page_title')
Product
@endsection

@section('content')

<h1>Product</h1>
<div class="col-md-12">
    <!-- DATA TABLE -->
    <br>
    <div class="table-data__tool">
        {{session('message')}}

        <a href="{{url('product/manage_product')}}">
        <button type="button" class="btn btn-primary">Add Product</button>
        </a>
    </div>
    <div class="table-responsive table-responsive-data2">
        <table class="table table-borderless table-data3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Image</th>
                    {{-- <th>Slug</th> --}}
                    {{-- <th>Brand</th> --}}
                    {{-- <th>Model</th>
                    <th>Short Dec</th>
                    <th>Desc</th>
                    <th>Tech Spec</th>
                    <th>User</th> --}}
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($date as $list)
                <tr>
                    <td>{{$list->id}}</td>
                    <td>{{$list->name}}</td>
                    <td><img src="{{asset('storage/media/'.$list->image)}}" alt="" height="50px;" width="50px;"></td>
                    {{-- <td>{{$list->slug}}</td> --}}
                    {{-- <td>{{$list->brand}}</td>
                    <td>{{$list->model}}</td>
                    <td>{{$list->short_dec}}</td>
                    <td>{{$list->desc}}</td>
                    <td>{{$list->technical_specfication}}</td>
                    <td>{{$list->user}}</td> --}}
                    <td style="color: red;">{{$list->status}}
                    </td>
                    <td>
                        <a href="{{url('admin/product/delete/')}}/{{$list->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                        <a href="{{url('/product/manage_product/')}}/{{$list->id}}"><button type="button" class="btn btn-success">Edit</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- END DATA TABLE -->
</div>

@endsection
