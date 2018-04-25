    @extends('layouts.admin')

    @section('title','Quản lí bài viết')
    @section('section')
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Bài viết</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
              <thead>
                <tr>
                  <th>Tiêu đề</th>
                  <th>Tác giả</th>
                  <th>Thời gian</th>
                  <th> 
          <a href="{{route('post.create')}}" class="btn btn-xs btn-success">Create</a>
        </th>
                </tr>
                </thead>
                <tbody>
                 @foreach ($posts as $element)
        <tr>
          <td><a href="{{route('post.update', ['id' => $element->id])}}">{{$element->title}}</a></td>
          @if($element->user_create != null)
                  <td>{{ $element->user_create->name }}</td>
                  @else
                  <td></td>
                  @endif
          <td>{{ $element->created_at }}</td>
          <td>
            <a href="{{route('post.remove', ['id' => $element->id])}}" class="btn btn-xs btn-danger">Remove</a>
          </td>
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

    @endsection