    @extends('layouts.admin')

    @section('title','Quản lí bài viết')
    @section('section')
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
             <h2 class="entry-title text-left">Bài viết <a href="{{ route('post.create') }}" class="btn btn-default"> Thêm bài viết mới</a></h2>
           </div>
           <!-- /.box-header -->
           <div class="box-body">
            <form action="{{ route('post.remove') }}" method="post">
              <table id="example2" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th><input type="checkbox" class="checkall" />Tiêu đề</th>
                    <th>Tác giả</th>
                    <th>Thời gian</th>
                    <th> 
                    </th>
                  </tr>
                </thead>
                <tbody>
                 @foreach ($posts as $element)
                 <tr>
                  <td>    <input type="checkbox" class="idcheck"  value="{{ $element->id }}" name="id[]" /><a href="{{route('post.update', ['id' => $element->id])}}">{{$element->title}}</a></td>
                  @if($element->user_create != null)
                  <td>{{ $element->user_create->name }}</td>
                  @else
                  <td></td>
                  @endif
                  <td>{{ $element->created_at }}</td>
                </tr>
                @endforeach 
              </tbody>
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
            </table>
          </form>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
@endsection
@section('js')
<script type="text/javascript">
  $('.checkall').click(function () {
  if (this.checked) {
    var checkbox = $('.idcheck');
    for (var i = 0; i < checkbox.length; i++) {
      checkbox[i].checked = true;
    }
  }
  else {
    var checkbox = $('.idcheck');
    for (var i = 0; i < checkbox.length; i++) {
      checkbox[i].checked = false;
    }
  }
});
$("#FormDelete").click(function (event) {
  var tacvu = $('#tavu').val();
  if(tacvu==0)
  {
    event.preventDefault();
    return false;
  }
  else
  {
    var x = confirm("Bạn có muốn xóa tất cả các mục được chọn không?");
    if(x)
    {
      var checkbox = $('.idcheck');
      var result = "";
                    // Lặp qua từng checkbox để lấy giá trị
                    for (var i = 0; i < checkbox.length; i++) {
                      if (checkbox[i].checked === true) {
                        result += ' [' + checkbox[i].value + ']';
                      }
                    }
                    if (result != "")
                    {
                      return true;
                    }
                    else
                    {
                      alert("Bạn chưa chọn mục để xóa");
                      return false;
                    }
                    if (x) {
                      return true;
                    }
                    else {

                      event.preventDefault();
                      return false;
                    }
                }
                else
                {
                  event.preventDefault();
                  return false;
                }
                
            }

        });
</script>
@endsection