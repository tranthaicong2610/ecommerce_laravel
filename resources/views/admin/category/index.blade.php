@extends('layouts.admin')

@section('category')

<form action=""  class="form-inline" role="form">

    <div class="form-group">
        <input name="key" type="text" class="form-control" id="" placeholder="Search By Name ...">

    </div>



    <button type="submit" class="btn btn-primary">
        <i class="fas fas-search">Search</i>
    </button>
</form>
<hr>
<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Total Product</th>
            <th>Status</th>
            <th>Created Date</th>
            <th class='text-right'>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $item)

        <tr>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->products->count()}}</td>
            <td>
                @if($item['status']==0)
                <span class="badge badge-danger">Private</span>
                @else
                <span class="badge badge-success">Publish</span>

                @endif
            </td>
            <td>{{$item->created_at->format('m-d-Y')}}</td>
            <td class='text-right'>

                <a href="{{route('category.edit',$item->id)}}" class="btn btn-sm btn-success">
                    <i class="far fa-edit">&#xf044;</i>
                </a>
                <a href="{{route('category.destroy',$item->id)}}"  class="btn btn-sm btn-danger btndelete">
                    <i class="glyphicon glyphicon-remove"></i>
                </a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<form action="" method="post" id="form-delete">
    @csrf @method('DELETE')
</form>

<hr>
<div>
    {{$data->appends(request()->all())->links()}}
</div>
@stop()
@section('js')
<script>
    $('.btndelete').click(function(ev){
        ev.preventDefault();
        var _href=$(this).attr('href');
        $('form#form-delete').attr('action',_href);
        if(confirm('Bạn có chắc không ?'))
        {
            $('form#form-delete').submit();

        }
    })

</script>
@stop()
