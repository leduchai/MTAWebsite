    @extends('layouts.admin')
    @section('title','Quản lí bài viết')
    @section('section')
    <section class="content">
        <div class="col-md-12 wrap">
           @if(empty($model->id))
           <h2 class="entry-title text-left">
              Thêm mới bài viết 		
          </h2>
          @else
          <h2 class="entry-title text-left">
              Chỉnh sửa bài viết
          </h2>
          <a href="{{ route('post.create') }}" class="btn btn-default">Viết bài mới</a>
          @endif
      </div>
      <form action="{{route('post.save')}}" method="post"  enctype="multipart/form-data">
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
        <div class="text-left col-md-6 col-xs-6 col-sm-6">
           <button value="0" name="subject" formtarget="_blank" class="btn btn-default">Xem trước</button>
       </div>
       <div class="text-right col-md-6 col-xs-6 col-sm-6">
           <a href="{{ route('post.list') }}" class="btn btn-default">Trở lại</a>
       </div>
   </div>
   <div class="panel-footer">
    @if(!empty($model->id))
    <div class="col-md-6">
       <a href="{{route('post.remove', ['id' => $model->id])}}" >Bỏ vào thùng rác</a>
   </div>
   @endif
   <div class="col-md-6 ">
       <button type="submit" class="btn btn-info" value="1" name="subject">
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
 <div class="panel-heading">Chuyên mục</div>
 <div class="panel-body">
    <div id="prd_group_id">
       @foreach ($listCate as $key => $value)
       @php
      $key = str_replace("x", "", $key);
      $checked = $model->category_id == $key ? 'checked' : '';
      @endphp
        <input type="radio" name="category_id" value="{{ $key }}" {{ $checked }}> {{ $value }}<br>
      @endforeach
      @php 
        $checked1 = $model->top == "on" ? 'checked' : '';
      @endphp
      <input type="checkbox" name="top" {{ $checked1 }}> Nổi bật<br>
  </div>
  <a href="javascript:void(0);" data-toggle="modal" data-target="#myModal" style="text-decoration: underline;">Thêm chuyên mục</a>
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Thêm chuyên mục</h4>
        </div>
        <div class="modal-body">
            <div class="row form-horizontal">
               <div class="col-md-12">
                  <div class="form-group">
                     <div class="col-md-4 text-right">
                        <label>Tên danh mục</label>
                    </div>
                    <div class="col-md-8">
                        <input type="text" id="prd_group_name" class="form-control"
                        placeholder="Nhập tên danh mục.">
                        <input id="prd_group_url" type="hidden" value="{{old('slugdm')}}" name="slugdm"  class="form-control">
                    </div>
                </div>
                <div class="form-group">
                 <div class="col-md-4 text-right">
                    <label>Danh mục cấp cha</label>
                </div>
                <div class="col-md-8">
                    <select id="parentid" class="form-control">
                       <option value="0">--Danh mục--</option>
                       <optgroup label="Chọn danh mục">
                          @foreach ($listCate as $key => $value)
                          @php
                          $key = str_replace("x", "", $key);
                          @endphp
                          <option value="{{ $key }}">{{ $value }}</option>
                          @endforeach
                      </optgroup>
                  </select>
              </div>
          </div>
          <div class="form-group">
             <div class="col-md-8 col-md-offset-4">
                <button type="button" class="btn btn-primary"
                onclick="cms_create_group(1);"><i
                class="fa fa-check"></i> Lưu
            </button>
        </div>
    </div>
</div>
</div>
<div class="clearfix"></div>
<div class="clearfix"></div>
</div>
<div class="modal-footer">
 <button type="button" class="btn btn-default btn-close" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="panel panel-default">
    <div class="panel-heading" >
        <div class="row">
            <div class="col-md-9 text-left">
                Import
            </div>
            <div class="col-md-3" style="padding: 0px;" id="dm">
              @php 
              $checked1 = $model->status == "on" ? "checked" : "";
              @endphp 
              <input id="toggle-one" {{ $checked1 }} type="checkbox" name="status">
              <script>
                  $(function() {
                    $('#toggle-one').bootstrapToggle();
                })
            </script>
        </div>
    </div>
</div>
<div class="panel-body" id="import">
    <input type="file" name="upload_file"  class="form-control" >
    <p class="description">Chọn file pdf,word,exel... để hiển thị</p>
</div>
</div>
<div class="panel panel-default">
  <div class="panel-heading" data-toggle="collapse" data-target="#demo">Ảnh đại diện</div>
  <div class="panel-body collapse" id="demo" >
    <input id="file" type="file" name="upload_image" accept="image/x-png,image/gif,image/jpeg" class="form-control" value="{{ $model->images }}" onchange="file_change(this)" >
    <p class="description">Chọn ảnh đại diện cho bài viết</p>
    @if(isset($model->id))
        <img src="{{ asset(UPLOAD_IMAGE_POST.$model->images) }}" id="img" class="img-post" />
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
				url: "{{ route('slug.generate.post') }}", 
				type: 'GET',
				data: {title: title},
				dataType: 'JSON',
				success: function(rp){

					$('#slug-url').val(rp.data);
				}
			});
			$('#seo_title').val(title);
		});
		$('#prd_group_name').on('change', function(){
			title = $(this).val();
			if(title == ""){
				$('#prd_group_url').val('');
				return false;
			}
			$.ajax({
				url: "{{ route('slug.generate.category') }}", 
				type: 'GET',
				data: {title: title},
				dataType: 'JSON',
				success: function(rp){
					$('#prd_group_url').val(rp.data);
				}
			});
		});
	});
	function cms_create_group($cont) {
		var prd_group_name = $.trim($('#prd_group_name').val());
		var parentid = $('#parentid').val();
		var slug = $('#prd_group_url').val();
		if (prd_group_name.length == 0) {
			alert('Nhập tên danh mục');
		} else {
			$.ajax({
				url: "{{ route('category.create') }}", 
				type: 'POST',
				data: {title:prd_group_name,parent_id:parentid,slug:slug},
				dataType: 'JSON',
				success: function(rp){
          if(rp.data != '1')
          {
            $('#prd_group_id').append('<input type="radio" name="category_id" value="'+rp.data.id+'">'+rp.data.title+'<br>');
            $('.ajax-success-ct').html('Tạo danh mục thành công').parent().fadeIn().delay(1000).fadeOut('slow');
            $('#prd_group_name').val('');
            $('#parentid').val('');
            if ($cont == 1)
              $('.btn-close').trigger('click');
          }
          else
          {
            $('.ajax-error-ct').html('Tạo danh mục không thành công vui lòng thử lại').parent().fadeIn().delay(1000).fadeOut('slow');
          }
				}
			});
		}
	}
</script>
@endsection