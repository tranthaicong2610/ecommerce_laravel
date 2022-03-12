@extends('layouts.admin')

@section('create_category')

<div class="row">
    <div class="col-sm-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('product.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-md-9">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    <input type="text" name="name" class="form-control" placeholder="Name">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Description:</strong>

                    <textarea name="description" id="input" class="form-control" rows="3" required="required"></textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12" >
            <div class="form-group">
                <strong>Image List:</strong>
                <input type="text" name="image_list" class="form-control" placeholder="Image List">

            </div>
        </div>
        </div>
        <div class="col-md-3">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Category:</strong>

                    <select name="category_id" id="input" class="form-control" required="required">
                        @foreach($cats as $item)
                        <option value="{{$item->id}}">--{{$item->name}}--</option>
                        @endforeach
                    </select>


                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Price:</strong>
                    <input type="text" name="price" class="form-control" placeholder="Price input">

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Sale price:</strong>
                    <input type="text" name="sale_price" class="form-control" placeholder="Sale price input">

                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Image:</strong>
                    <input type="file" name="file_uploads" class="form-control" placeholder="Image input ">

                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <label for="">Status</label>
                <div class="radio">
                    <label for="">
                        <input type="radio" name="status" id="" value='1' checked>
                        Public

                    </label>
                    <label for="">
                        <input type="radio" name="status" id="" value='0' checked>
                        Private

                    </label>
                </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Prioty:</strong>
                    <input type="text" name="prioty" class="form-control" placeholder="Prioty input">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>



    </div>

</form>

@stop()
