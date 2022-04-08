@extends('admin.layout')
@section('page_title')
    Manage Color
@endsection

@section('content')
<h1>Manage Color</h1>
<div class="col-md-12">
    <!-- DATA TABLE -->
    <br>
    <div class="table-data__tool">
        <a href="{{url('admin/color')}}">
        <button type="button" class="btn btn-primary">Back</button>
        </a>
    </div>
    <div class="table-responsive table-responsive-data2">
        <div class="col-lg-6">

            <div class="card">
                <div class="card-body">
                    <form action="{{route('color.manage_color_process')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="color" class="control-label mb-1">Color Name</label>
                            <input id="color"  value='{{$color}}' name="color" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                            @error('color')
                            <div class="alert alert-danger" role="alert">
                                {{'$message'}}
                              </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="size" class="control-label mb-1">Size</label>
                            <input id="size" value='{{$size}}' name="size" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                            @error('size')
                            <div class="alert alert-danger" role="alert">
                                {{'Same Slug'}}
                              </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status" class="control-label mb-1">Status</label>
                            <input id="status" value='{{$status}}' name="status" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                            
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
