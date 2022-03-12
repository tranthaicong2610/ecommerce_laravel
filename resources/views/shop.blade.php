@extends('layouts.site');
@section('main')
<!-- <h1>hello </h1> -->
<div class="row">
    <?php $n=9; ?>
    @for($i=0;$i<$n;$i++)
  <div class="col-md-4">
    <div class="thumbnail">
      <a href="/w3images/lights.jpg">
        <img src="https://kenh14cdn.com/thumb_w/660/2020/5/28/0-1590653959375414280410.jpg"  alt="Lights" style="width:20%">
        <div class="caption">
          <p>Lorem ipsum...</p>
        </div>
      </a>
    </div>
  </div>
  @endfor
</div>
@stop()
