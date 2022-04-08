@extends('admin.layout')
@section('page_title')
    Manage Cupen
@endsection

@section('content')
<h1>Manage Cupen</h1>
<div class="col-md-12">
    <!-- DATA TABLE -->
    <br>
    <div class="table-data__tool">
        <a href="{{url('admin/cupen')}}">
        <button type="button" class="btn btn-primary">Back</button>
        </a>
    </div>
    <div class="table-responsive table-responsive-data2">
        <div class="col-lg-6">

            <div class="card">
                <div class="card-body">
                    <form action="{{route('cupen.manage_cupen_process')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="title" class="control-label mb-1">Title</label>
                            <input id="title"  value='{{$title}}' name="title" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                            @error('title')
                            <div class="alert alert-danger" role="alert">
                                {{'$message'}}
                              </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="code" class="control-label mb-1"> Code</label>
                            <input id="code" value='{{$code}}' name="code" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                            @error('code')
                            <div class="alert alert-danger" role="alert">
                                {{'Same Slug'}}
                              </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="value" class="control-label mb-1"> Value</label>
                            <input id="value" value='{{$value}}' name="value" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                            @error('value')
                            <div class="alert alert-danger" role="alert">
                                {{'Same Slug'}}
                              </div>
                            @enderror
                        </div>
                        <div>
                            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                                Submit
                            </button>
                        </div>
                        <input type="hidden" name="id" value="{{$id}}"/>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- END DATA TABLE -->
</div>

@endsection
