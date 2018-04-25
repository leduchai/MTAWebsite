    @extends('layouts.admin')
    @section('title','Quản lí Menu')
    @section('section')
    <section class="content">
      <h2 class="entry-title text-left">
        @if(empty($model->id))
        Thêm mới
        @else
        Cập nhật
      @endif</h2>
      <form action="{{route('menu.save')}}" method="post" novalidate enctype="multipart/form-data">
        <div class="col-md-2"></div>
        <div class="col-md-8 thumbnail">
          {{csrf_field()}}
          <input type="hidden" id="model_id" name="id" value="{{$model->id}}">
          <div class="row group">
            <div class="control-label col-md-3 col-sm-3 col-xs-12 text-right">
             <label for="title">Title</label>
           </div>
           <div class="col-md-9 col-sm-9 col-xs-12">
             <input id="title" type="text" value="{{old('title', $model->title)}}" name="title" class="form-control" placeholder="Tiêu đề">
             @if (count($errors) > 0)
             <span class="text-danger">{{$errors->first('title')}}</span>
             @endif
           </div>
         </div>
         <div class="row group">
          <div class="control-label col-md-3 col-sm-3 col-xs-12 text-right">
           <label for="index">Thứ tự</label>
         </div>
         <div class="col-md-9 col-sm-9 col-xs-12">
          <input id="index" type="text" value="{{old('index', $model->index)}}" name="index" class="form-control" placeholder="Thứ tự">
           <p class="description">Thứ tự xuất hiện trên thanh menu chính và là số nguyên</p>
           @if (count($errors) > 0)
           <span class="text-danger">{{$errors->first('index')}}</span>
           @endif
         </div>
       </div>
       <div class="row group">
        <div class="control-label col-md-3 col-sm-3 col-xs-12 text-right">
          <label for="cate-parent">Menu cha</label>
        </div>
        <div class="col-md-9 col-sm-9 col-xs-12">
          <select name="parent_id" class="form-control">
            <option value="0" >--------------</option>
            @foreach ($listMenu as $key => $value)
            @php
            $key = str_replace("x", "", $key);
            $selected = $model->parent_id == $key ? "selected" : null;
            @endphp
            <option value="{{$key}}" {{$selected}}>{{$value}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="row group">
        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
          <button type="submit" class="btn btn-success">
            @if(empty($model->id))
            Thêm mới
            @else
            Cập nhật
          @endif</button>
          <a href="{{route('menu')}}" class="btn btn-warning">Trở lại</a>
        </div>
      </div>
    </form>
  </div>
</div>
</div>
</section>
@endsection
@section('js')
@endsection