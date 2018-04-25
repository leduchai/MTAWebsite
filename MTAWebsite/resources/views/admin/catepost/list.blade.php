    @extends('layouts.admin')

    @section('title','Quản lí danh mục')
    @section('section')
    <section class="content">
      <div class="row">
        <div class="col-md-5">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Thêm chuyên mục</h3>
            </div>
            <div class="box-body">
              <form action="{{route('cate.post.save')}}" method="post" novalidate enctype="multipart/form-data">
                <div class="form-group">
                 <label class="control-label" for="title">Tiêu đề</label>
                 <input id="title" type="text" value="{{old('title')}}" name="title" class="form-control" placeholder="Tiêu đề">
                 @if (count($errors) > 0)
                 <span class="text-danger">{{$errors->first('title')}}</span>
                 @endif
                  <p class="description">Tên riêng sẽ hiển thị trên trang mạng của bạn.</p>
               </div>
               <div class="form-group">
                <label class="control-label" for="slug-url">Chuỗi cho đường dẫn tĩnh</label>
                <input id="slug-url" type="text" 
                value="{{old('slug')}}" name="slug" class="form-control">
                @if (count($errors) > 0)
                <span class="text-danger">{{$errors->first('slug')}}</span>
                @endif
                <p class="description">Chuỗi cho đường dẫn tĩnh là phiên bản của tên hợp chuẩn với Đường dẫn (URL). Chuỗi này bao gồm chữ cái thường, số và dấu gạch ngang (-)</p>
              </div>
              <div class="form-group">                
                <label class="control-label" for="cate-parent">Chuyên mục hiện tại</label>
                <select name="parent_id" class="form-control">
                  <option value="0">--Danh mục--</option>
                  <optgroup label="Chọn danh mục">
                   @foreach ($listCate as $key => $value)
                   @php
                   $key = str_replace("x", "", $key);
                   @endphp
                   <option value="{{$key}}" >{{$value}}</option>
                   @endforeach
                 </optgroup>
               </select>
               <p class="description">Chuyên mục khác với thẻ, bạn có thể sử dụng nhiều cấp chuyên mục. Ví dụ: Trong chuyên mục nhạc, bạn có chuyên mục con là nhạc Pop, nhạc Jazz. Việc này hoàn toàn là tùy theo ý bạn</p>
             </div>
             <div class="form-group">
                <label class="control-label" for="Seotitle">Seo Title</label>
                <input id="seo_title" type="text" 
                value="{{old('seo_title')}}" name="seo_title" class="form-control" >
                @if (count($errors) > 0)
                <span class="text-danger">{{$errors->first('seo_title')}}</span>
                @endif
            </div>
            <div class="form-group">
            
                <button type="submit" class="btn btn-success">Thêm</button>
              
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-xs-7 col-md-7">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Chuyên mục</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <form action="{{ route('cate.post.remove') }}" method="post">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th class="text-left"><input type="checkbox" id="checkall" />Tiêu đề</th>
                <th>Chuỗi cho đường dẫn tĩnh</th>
                
              </tr>
            </thead>
            <tbody>
              @foreach ($cates as $element)
              <tr>
                <td class="text-left">
                  <input type="checkbox" class="idcheck"  value="{{ $element->id }}" name="id[]" /><a href="{{route('cate.post.update', ['id' => $element->id])}}">{{$element->title}}</a></td>
                <td>{{$element->getSlug()}}</td>
              </tr>
              @endforeach
              <tfoot>
                <tr>
                  <td colspan="2">
                  <select required id="tavu">
                    <option value="0">Tác vụ</option>
                    <option value="1">Xóa</option>
                  </select>
                  <button id="FormDelete" type="submit" class="btn btn-default">Áp dụng</button>
                </td>
                </tr>
              </tfoot>
              </tbody>
            </table>
            </form>
          </div>
        </div>
      </div>
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
        url: "{{ route('slug.generate.category') }}", 
        type: 'GET',
        data: {title: title},
        dataType: 'JSON',
        success: function(rp){
          console.log(rp);
          $('#slug-url').val(rp.data);
        }
      });
    });
  });
</script>
@endsection