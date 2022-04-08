@extends('admin.layout')
@section('page_title')
cupen
@endsection

@section('content')

<h1>Cupen</h1>
<div class="col-md-12">
    <!-- DATA TABLE -->
    <br>
    <div class="table-data__tool">
        {{session('message')}}

        <a href="{{url('cupen/manage_cupen')}}">
        <button type="button" class="btn btn-primary">Add Cupen</button>
        </a>
    </div>
    <div class="table-responsive table-responsive-data2">
        <table class="table table-borderless table-data3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Code</th>
                    <th>Value</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($date as $list)
                <tr>
                    <td>{{$list->id}}</td>
                    <td>{{$list->title}}</td>
                    <td>{{$list->code}}</td>
                    <td>{{$list->value}}</td>
                    <td>
                        <a href="{{url('/cupen/manage_cupen/')}}/{{$list->id}}"><button type="button" class="btn btn-success">Edit</button></a>

                        <a href="{{url('admin/cupen/delete/')}}/{{$list->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- END DATA TABLE -->
</div>

@endsection
