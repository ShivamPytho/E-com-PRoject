@extends('admin.layout')
@section('page_title')
    Category
@endsection

@section('content')

<h1>Category</h1>
<div class="col-md-12">
    <!-- DATA TABLE -->
    <br>
    <div class="table-data__tool">
        {{session('message')}}

        <a href="{{url('category/manage_category')}}">
        <button type="button" class="btn btn-primary">Add Category</button>
        </a>
    </div>
    <div class="table-responsive table-responsive-data2">
        <table class="table table-borderless table-data3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($date as $list)
                <tr>
                    <td>{{$list->id}}</td>
                    <td>{{$list->category_name}}</td>
                    <td>{{$list->category_slug}}</td>
                    <td>{{$list->status}}</td>
                    <td>
                        <a href="{{url('admin/category/delete/')}}/{{$list->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                        <a href="{{url('/category/manage_category/')}}/{{$list->id}}"><button type="button" class="btn btn-success">Edit</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- END DATA TABLE -->
</div>

@endsection
