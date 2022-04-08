@extends('admin.layout')
@section('page_title')
    Manage Category
@endsection

@section('content')
<h1>Manage Category</h1>
<div class="col-md-12">
    <!-- DATA TABLE -->
    <br>
    <div class="table-data__tool">
        <a href="{{url('admin/category')}}">
        <button type="button" class="btn btn-primary">Back</button>
        </a>
    </div>
    <div class="table-responsive table-responsive-data2">
        <div class="col-lg-6">

            <div class="card">
                <div class="card-body">
                    <form action="{{route('category.manage_category_process')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="category_name" class="control-label mb-1">Category Name</label>
                            <input id="category_name"  value='{{$category_name}}' name="category_name" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                            @error('category_name')
                            <div class="alert alert-danger" role="alert">
                                {{'$message'}}
                              </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category_slug" class="control-label mb-1"> Category Slug</label>
                            <input id="category_slug" value='{{$category_slug}}' name="category_slug" type="text" class="form-control" aria-required="true" aria-invalid="false" required>
                            @error('category_slug')
                            <div class="alert alert-danger" role="alert">
                                {{'Same Slug'}}
                              </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="status" class="control-label mb-1"> Status</label>
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
