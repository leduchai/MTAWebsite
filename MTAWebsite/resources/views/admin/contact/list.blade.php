    @extends('layouts.admin')

    @section('title','Quản lí danh mục')
    @section('section')
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Danh mục sản phẩm </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>STT</th>
                  <th>Tên</th>
                  <th>Địa chỉ</th>
                  <th>SĐt</th>
                  <th>Email</th>
                  <th>Nội Dung</th>
                  <th>#</th>
                  
                </tr>
                </thead>
                <tbody>
                  @foreach ($model as $element)
                <tr>
                  <td>{{++$loop->index}}</td>
                  <td>{{$element->name}}
                    <td>{{$element->address}}
                      <td>{{$element->phone}}
                        <td>{{$element->email}}
                          <td>{{$element->content}}
                  </td>
                  <td>
            <a href="{{route('contact.remove', ['id' => $element->id])}}" class="btn btn-xs btn-danger">Xóa</a></td>
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