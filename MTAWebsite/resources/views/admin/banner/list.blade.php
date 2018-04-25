    @extends('layouts.admin')

    @section('title','Banner Manager')
    @section('section')
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Category Post</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Hình Ảnh</th>
                  <th>Vị trí</th>
                  <th>Tiêu đề</th>
                  <th>Link</th>
                  <th><a href="{{route('banner.create')}}" class="btn btn-xs btn-success">Create</a></th>
                  
                </tr>
                </thead>
                <tbody>
                  @foreach ($model as $element)
                <tr>
                  <td>{{++$loop->index}}</td>
                  <td>{{$element->images}}</td>
                  <td>{{$element->location}}</td>
                  <td>{{$element->title}}</td>
                  <td>{{$element->url}}</td>
                  <td><a href="{{route('banner.update', ['id' => $element->id])}}" class="btn btn-xs btn-info">Edit</a>
                      <a href="{{route('banner.remove', ['id' => $element->id])}}" class="btn btn-xs btn-danger">Remove</a></td>
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
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : true,   
    });
    </script>
    @endsection