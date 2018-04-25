    @extends('layouts.admin')

    @section('title','Quản lí Trang')
    @section('section')
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
               <h2 class="entry-title text-left">Trang <a href="{{ route('page.create') }}" class="btn btn-default"> Thêm trang mới</a></h2>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
               <form action="{{ route('page.remove') }}" method="post">
              <table class="table table-bordered table-striped table-hover" id="example2">
                <thead>
                  <tr>
                    <th><input type="checkbox" id="checkall" />Tiêu đề</th>
                    <th>Thời gian</th>
                  </tr>
                </thead>
                <tbody>
                 @foreach ($page as $element)
                 <tr>
                  <td><input type="checkbox" class="idcheck"  value="{{ $element->id }}" name="id[]" /><a href="{{route('page.update', ['id' => $element->id])}}">{{$element->title}}</a></td>
                  <td>{{ $element->created_at }}</td>
                </tr>
                @endforeach 

              </tbody>
              <tfoot>
                <tr>
                  <td colspan="3">
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
  <script>
    
  </script>
  @endsection