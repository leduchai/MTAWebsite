    @extends('layouts.admin')

    @section('title','Hợp tác')
    @section('section')
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Hợp tác</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Hình Ảnh</th>
                  <th>Tiêu đề</th>
                  <th>Link</th>
                  <th><a href="{{route('contract.create')}}" class="btn btn-xs btn-success">Thêm</a></th>
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
                  <a href="{{route('contract.update', ['id' => $element->id])}}" ><i class="glyphicon glyphicon-edit"></i></a>
                  <a href="{{route('contract.remove', ['id' => $element->id])}}" ><i class="glyphicon glyphicon-trash"></i></a></td>
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