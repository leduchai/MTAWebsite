    @extends('layouts.admin')
    @section('cate','User')
    @section('action','List')
    @section('title','User Manager')
    @section('section')
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">

            <!-- /.box-header -->
            <div class="box-body">
              <form action="{{ route('user.role') }}" method="post">
              <table class="table table-bordered table-hover example2">
              <thead>
                <tr>
                  <th><input type="checkbox" name=""></th>
                  <th>Username</th>
                  <th>Name</th>
                  <th>Role</th>                 
                  <th>Post</th>
                 
                </tr>
                </thead>
                <tbody>
                @foreach($users as $u)
                <tr>
                  @php
                        $disabled = $u->roles->name == 'Administrator'? 'disabled': '';
                  @endphp
                  <td><input style="margin-left: 8px;" type="checkbox" name="id[]" value="{{ $u->id }}" {{ $disabled }}></td>
                  <td>{{ $u->email }}</td>
                  <td>{{ $u->name }}
                  </td>
                  <td>{{ $u->roles->role }}</td>
                  <td>#</td>
                  
                  
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th colspan="5">
                    <select name="role_id" class="btn btn-primary">
                      <option value="0">Change role to…</option>
                      @foreach($role as $r)
                      <option value="{{ $r->id }}">{{ $r->role }}</option>
                      @endforeach
                    </select>
                    <button type="submit" class="btn btn-success">Change</button>
                  </th>   
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
    $('.example2').DataTable({
      'paging'      : true,
      'lengthChange': true,
      'searching'   : true,
      'ordering'    : true,
      'info'        : false,
      'autoWidth'   : true,   
    });
</script>
    @endsection