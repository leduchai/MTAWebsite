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
                  <th><input type="checkbox" id="checkall" />Tiêu đề</th>
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

    @endsection