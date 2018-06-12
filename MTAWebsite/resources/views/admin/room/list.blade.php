    @extends('layouts.admin')

    @section('title','Quản lí Phòng')
    @section('section')
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Quản lí phòng</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Hình Ảnh</th>
                  <th>Tên</th>
                  <th>Link</th>
                  <th><a href="{{route('faculty.create',['type'=>'room'])}}" class="btn btn-xs btn-success">Thêm mới</a></th>
                </tr>
                </thead>
                <tbody>
                  @foreach ($model as $element)
                <tr>
                  <td>{{++$loop->index}}</td>
                  <td>{{$element->images}}</td>
                  <td>{{$element->title}}</td>
                  <td>{{$element->url}}</td>
                  <td>
                  <a href="{{route('faculty.update', ['type'=>'room','id' => $element->id])}}" ><i class="glyphicon glyphicon-edit"></i></a>
                  <a href="{{route('faculty.remove', ['type'=>'room','id' => $element->id])}}" ><i class="glyphicon glyphicon-trash"></i></a></td>
                </tr>
                  @endforeach
                </tbody>
              </table>
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