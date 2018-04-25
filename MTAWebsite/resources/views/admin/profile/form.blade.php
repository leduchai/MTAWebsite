    @extends('layouts.admin')

    @section('title','User Manager')
    @section('section')
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="col-md-9 col-xs-12">
            <form action="{{route('profile.save')}}" method="post" novalidate enctype="multipart/form-data">
              <div class="row text-primary"><h3>Personal Options</h3></div>
              <div class="row group">
                  <div class="control-label col-md-3 col-sm-3 col-xs-12 text-left">
                    <label for="name">Name</label>
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input id="fullname" type="text" value="{{old('name', $user->name)}}" name="name" class="form-control" placeholder="Ex: Nguyen Van A">
                    @if (count($errors) > 0)
                      <span class="text-danger">{{$errors->first('name')}}</span>
                    @endif
                </div>
              </div>  
              <div class="row group">
                  <div class="control-label col-md-3 col-sm-3 col-xs-12 text-left">
                    <label for="avatar">Avatar</label>
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="file" name="avatar" id="avatar" class="form-control">
                    @if (count($errors) > 0)
                      <span class="text-danger">{{$errors->first('avatar')}}</span>
                    @endif
                  </div>
              </div> 
              <div class="row text-primary"><h3>Account Management</h3></div>
              <div class="row group">
                  <div class="control-label col-md-3 col-sm-3 col-xs-12 text-left">
                    <label for="email">Username</label>
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control" readonly>
                    @if (count($errors) > 0)
                      <span class="text-danger">{{$errors->first('email')}}</span>
                    @endif
                  </div>
              </div>
              <div class="row group">
                  <div class="control-label col-md-3 col-sm-3 col-xs-12 text-left">
                    <label for="email">New password</label>
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                    <input type="password" name="new_password" id="new_password" class="form-control">
                    @if (count($errors) > 0)
                      <span class="text-danger">{{$errors->first('new_password')}}</span>
                    @endif
                  </div>
              </div>
                  <div class="row group">
                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                      <button type="submit" class="btn btn-success">
                        @if(empty($model->id))
                      Thêm mới
                      @else
                     Cập nhật
                      @endif</button>
                    <a href="{{route('user.list')}}" class="btn btn-warning">Trở lại</a>
                  </div>
                  </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    @endsection
    @section('js')

    @endsection