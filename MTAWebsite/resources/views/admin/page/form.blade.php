    @extends('layouts.admin')
    @section('title','Quản lí bài viết')
    @section('section')
    <section class="content">
      <div class="col-md-12 wrap">
       @if(empty($model->id))
       <h2 class="entry-title text-left">
        Thêm mới trang		
      </h2>
      @else
      <h2 class="entry-title text-left">
        Chỉnh sửa trang
      </h2>
      <a href="{{ route('page.create') }}" class="btn btn-default"> Thêm trang mới</a>
      @endif
    </div>
    <form action="{{route('page.save')}}" method="post"  enctype="multipart/form-data">
     <div class="col-md-9">

      {{csrf_field()}}
      <input type="hidden" name="id" value="{{old('id', $model->id)}}">
      <input type="hidden" name="entity_type" value="{{$modelSlug->entity_type}}">
      <div class="row group">
       <div class="col-md-12 col-sm-12 col-xs-12">
        <input id="title" type="text" 
        value="{{old('title', $model->title)}}" name="title" class="form-control" placeholder="Nhập tiêu đề tại đây">
        @if (count($errors) > 0)
        <span class="text-danger">{{$errors->first('title')}}</span>
        @endif
      </div>
    </div>
    <div class="row group">
     <div class="col-md-12 col-sm-12 col-xs-12">
      <input id="slug-url" type="text" 
      value="{{old('slug', $modelSlug->slug)}}" name="slug" class="form-control" placeholder="Link">
      @if (count($errors) > 0)
      <span class="text-danger">{{$errors->first('slug')}}</span>
      @endif
    </div>
  </div>
  <div class="row group">
   <div class="col-md-12 col-sm-12 col-xs-12">
    <textarea name="content" class="form-control"  >
     {{old('content', $model->content)}}
   </textarea>
   @if (count($errors) > 0)
   <span class="text-danger">{{$errors->first('content')}}</span>
   @endif
 </div>
</div>
<div class="row group">
 <div class="col-md-12 col-sm-12 col-xs-12">
  <div class="panel panel-default">
    <div class="panel-heading" data-toggle="collapse" data-target="#nangcao">Hiện thị nâng cao</div>
    <div class="panel-body collapse" id="nangcao">
      <div class="form-group">
        <input id="seo_title" type="text" value="{{old('seo_title', $model->seo_title)}}" name="seo_title" class="form-control" placeholder="Seo Tiêu đề">
        <p class="description">Tốt cho seo bài viết này</p>
      </div>
      <div class="form-group">

        <input id="seo_content" class="form-control" name="seo_content" value="{{old('seo_content', $model->seo_content)}}" placeholder="Seo Mô tả">
        <p class="description">Tốt cho seo bài viết này</p>

      </div>
    </div>
  </div>
</div>
</div>

</div>
<div class="col-md-3">
  <div class="panel panel-default">
   <div class="panel-heading">Đăng bài viết</div>
   <div class="panel-body">
     <div class="text-right col-md-6 col-xs-6 col-sm-6">
       <a href="{{ route('page.list') }}" class="btn btn-default">Trở lại</a>
     </div>
   </div>
   <div class="panel-footer">
    @if(!empty($model->id))
    <div class="col-md-6">
     <a href="{{route('page.delete', ['id' => $model->id])}}" >Bỏ vào thùng rác</a>
   </div>
   @endif
   <div class="col-md-6 ">
     <button type="submit" class="btn btn-info">
      @if(empty($model->id))
      Đăng bài viết
      @else
      Cập nhật
      @endif
    </button>
  </div>
  <div class="clearfix"></div>
</div>
</div>
<div class="panel panel-default">
  <div class="panel-heading" data-toggle="collapse" data-target="#property">Thuộc tính trang</div>
  <div class="panel-body collapse" id="property" >
   <div class="form-group">                
    <label class="control-label" for="cate-parent">Cha</label>
    <select name="parent_id" class="form-control">
      <option value="0">--Không có trang cha--</option>
      <optgroup label="Chọn Cha">
       @foreach ($listPage as $key => $value)
       @php
       $key = str_replace("x", "", $key);
       $selected = $key==$model->parent_id ? "selected" : '';
       @endphp
       <option value="{{$key}}" {{ $selected }}>{{$value}}</option>
       @endforeach
     </optgroup>
   </select>
 </div>
 <div class="form-group">
  <label class="control-label">Giao diện</label>
  <select name="view" class="form-control" id="view">
   @php 
   $data = array(
    'client.page.template' => array('view' => 'Giao diện mặc định','images' => '#') ,
    'client.page.template1' =>array('view' => 'Giới thiệu','images'=>asset('client-assets/images/about.png')),
    'client.page.template2' => array('view' => 'Đào tạo','images'=> asset('client-assets/images/daotao.png') ),
    'client.page.template3' => array('view' => 'Tuyển sinh','images'=> asset('client-assets/images/about.png') ),
    'client.page.template4' =>array('view' => 'Ngiên cứu','images' =>asset('client-assets/images/ngiencuu.png') ),
    'client.page.template5' => array('view' => 'Hợp tác','images' =>asset('client-assets/images/hoptac.png') ),
    'client.page.template6' =>array('view' => 'Sinh Viên','images' =>  asset('client-assets/images/student.png')),
  );
  @endphp
  @foreach($data as $key=>$value)
  {
   @php 
   $selected1 = $model->view == $key ? "selected" : "";
   @endphp
   <option value="{{ $key }}" {{ $selected1 }} img ="{{ $value['images'] }}">{{ $value['view'] }}</option>
 }
 @endforeach
</select>
</div>
<div class="form-group">
  <label class="control-label">Thứ tự</label>
  <div class="row">
    <div class="col-md-6"><input type="text" name="index" value="{{ $model->index }}" class="form-control"></div>
    <div class="col-md-6"><a target="_blank" href="#" id="link">Hướng dẫn nhập</a></div>
  </div>

  <p class="description">Thứ tự xuất hiện trên trang cha</p>
</div>
<script type="text/javascript">
 $( document ).ready(function() {
      $('#view').change(function()
      {
           var img = $('#view option:selected').attr('img');
           $('#link').attr('href',img);
      });
});
</script>
</div>
</div>
<div class="panel panel-default">
  <div class="panel-heading" data-toggle="collapse" data-target="#demo">Ảnh đại diện</div>
  <div class="panel-body collapse" id="demo" >
    <input id="file" type="file" name="upload_image" accept="image/x-png,image/gif,image/jpeg" class="form-control" value="{{ $model->images }}" onchange="file_change(this)" >
    @if(isset($model->id))
    <img src="{{ asset(UPLOAD_IMAGE_PAGE.$model->images) }}" id="img" class="img-post" />
    @else
    <img  id="img" class="img-post" />
    @endif
  </div>
</div>

</div>
</form>
<div class="clearfix"></div>
</div>
</section>
@endsection
@section('js')
<script type="text/javascript">
	$(document).ready(function(){
		$('#title').on('change', function(){
			title = $(this).val();
			if(title == ""){
				$('#slug-url').val('');
				return false;
			}
			$.ajax({
				url: "{{ route('slug.generate.page') }}", 
				type: 'GET',
				data: {title: title},
				dataType: 'JSON',
				success: function(rp){

					$('#slug-url').val(rp.data);
				}
			});
			$('#seo_title').val(title);
		});
	});
</script>
@endsection