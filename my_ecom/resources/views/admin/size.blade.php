@extends('admin.layout')
@section('page_title')
Size
@endsection

@section('content')

<h1>Size</h1>
<div class="col-md-12">
    <!-- DATA TABLE -->
    <br>
    <div class="table-data__tool">
        {{session('message')}}

        <a href="{{url('size/manage_size')}}">
        <button type="button" class="btn btn-primary">Add Size</button>
        </a>
    </div>
    <div class="table-responsive table-responsive-data2">
        <table class="table table-borderless table-data3">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Size</th>
                    <th>Status</th>

                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($date as $list)
                <tr>
                    <td>{{$list->id}}</td>
                    <td>{{$list->size}}</td>
                    <td>{{$list->status}}</td>
                    {{-- @if({{$list->status}}='1')
                        <td>
                        <button type="button" class="btn btn-danger">Active</button>
                        </td>
                    @else
                        <td>
                        <button type="button" class="btn btn-danger">Deactive</button>
                        </td>
                    @endif --}}

                    <td>
                        <a href="{{url('admin/size/delete/')}}/{{$list->id}}"><button type="button" class="btn btn-danger">Delete</button></a>
                        <a href="{{url('/size/manage_size/')}}/{{$list->id}}"><button type="button" class="btn btn-success">Edit</button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- END DATA TABLE -->
</div>

@endsection
