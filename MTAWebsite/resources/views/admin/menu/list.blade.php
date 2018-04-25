    @extends('layouts.admin')

    @section('title','Quản lí danh mục')
    @section('section')
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Menu chính</h3>
            </div>
            <div class="row">
            <div class="col-md-4">
              <div class="box-body thumbnail">
                <div class="panel panel-default">
                  <div class="panel-heading" data-toggle="collapse" data-target="#demo">Liên kết tùy chỉnh <span class="pull-right-container">
                    <i class="glyphicon glyphicon-menu-down"></i>
                  </span></div>
                  <div class="panel-body collapse" id="demo">
                    <form action="{{ route('menu.save') }}" method="post">
                     <div class="form-group">
                      <input required type="text" name="title" class="form-control" placeholder="Tiêu đề">
                      </div>
                      <div class="form-group">
                        <input required type="text" name="url" class="form-control" placeholder="URL">
                      </div>
                      <div class="text-right form-group">
                        <button type="submit" class="btn btn-default">Thêm vào menu</button>
                      </div>
                    </form>
                </div>
              </div>
              <div class="panel panel-default">
                <div class="panel-heading" data-toggle="collapse" data-target="#page">Trang <span class="pull-right-container">
                  <i class="glyphicon glyphicon-menu-down"></i>
                </span></div>
                <form action="{{ route('menu.page.create') }}" method="post">
                 <div class="panel-body collapse" id="page">
                  <div class="thumbnail">
                      <ul class="listmenu">
                    @foreach($page as $page)
                  
                      <li>
                        <label class="control-label">
                          <input  class="check"  type="checkbox" name="id[]" value="{{ $page->id }}" >{{ $page->title }}
                        </label>
                      </li>
                    
                    @endforeach
                    </ul>
                  </div>
                  <div class="text-right">
                    <button type="submit" class="btn btn-default">Thêm vào menu</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="panel panel-default">
              <div class="panel-heading" data-toggle="collapse" data-target="#catepost">Danh mục bài viết <span class="pull-right-container">
                <i class="glyphicon glyphicon-menu-down"></i>
              </span></div>
              <form action="{{ route('menu.post.create') }}" method="post">
               <div class="panel-body collapse" id="catepost">
                <div class="thumbnail">
                   <ul class="listmenu">
                  @foreach($cPost as $cPost)
                 
                    <li>
                      <label class="control-label">
                        <input class="check"  type="checkbox" name="id[]" value="{{ $cPost->id }}" >{{ $cPost->title }}
                      </label>
                    </li>
                  
                  @endforeach
                  </ul>
                </div>
                <div class="text-right">
                  <button type="submit" class="btn btn-default">Thêm vào menu</button>
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
      <!-- /.box-header -->
      <div class="col-lg-8">
        <div class="box-body thumbnail">
          <table id="example2" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th>Tên</th>
                <th>Thứ tự</th>
                <th>Menu Cha</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach ($menu as $element)
              <tr>
                <td>{{$element->title}}</td>
                <td>{{$element->index}}</td>
                <td>{{$element->getParentName()}}</td>
                <td>
                  <a href="{{route('menu.update', ['id' => $element->id])}}" ><i class="glyphicon glyphicon-edit"></i></a>
                  <a href="{{route('menu.remove', ['id' => $element->id])}}" ><i class="glyphicon glyphicon-trash"></i></a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
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