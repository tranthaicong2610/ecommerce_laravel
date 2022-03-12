@extends('layouts.admin')

@section('create_category')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit Category</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('category.index') }}"> Back</a>
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
<form action="{{route('category.update',$category->id)}}" method="post">
    @csrf @method('PUT')
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" value='{{$category->name}}' name='name' class="form-control" placeholder="input name">
        @error('name')
        <small class="help-block">{{$message}}</small>
        @enderror
    </div>
    <div class="form-group">
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
        <div class="form-group">
            <label for="">Prioty</label>
            <input type="number" value="{{$category->prioty}}" name="prioty" class="form-control" placeholder="input prioty" id="">
            @error('prioty') -->
            <small class="help-block">{{$message}}</small>
            @enderror
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Save Data</button>
</form>
@stop()
