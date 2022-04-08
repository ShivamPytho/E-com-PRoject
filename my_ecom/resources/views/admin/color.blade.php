@extends('admin.layout')
@section('page_title')
Color
@endsection

@section('content')

<h1>Color</h1>
<div class="col-md-12">
    <!-- DATA TABLE -->
    <br>
    <div class="table-data__tool">
        {{session('message')}}

        <a href="{{url('color/manage_color')}}">
        <button type="button" class="btn btn-primary">Add Color</button>
        </a>
    </div>
    <div class="table-responsive table-responsive-data2">
        <table class="table table-borderless table-data3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Color</th>
                    <th>Size</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($date as $list)
                <tr>
                    <td>{{$list->id}}</td>
                    <td>{{$list->color}}</td>
                    <td>{{$list->size}}</td>
                    <td>{{$list->status}}</td>
                    <td>
                        <a href="{{url('admin/color/delete/')}}/{{$list->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                        <a href="{{url('/color/manage_color/')}}/{{$list->id}}"><button type="button" class="btn btn-success">Edit</button></a>
                    </td>
                </tr>
                @endforeach   
            </tbody>
        </table>
    </div>
    <!-- END DATA TABLE -->
</div>

@endsection
