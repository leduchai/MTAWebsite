    @extends('layouts.admin')
    @section('cate','User')
    @section('action','Add new')
    @section('title','User Manager')
    @section('section')
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="col-md-9 col-xs-12">
            <form action="{{route('user.save')}}" method="post" novalidate enctype="multipart/form-data">
              <div class="row group">
                  <div class="control-label col-md-3 col-sm-3 col-xs-12 text-right">
                    <label for="name">Name</label>
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                  <input id="name" type="text" 
                    value="{{old('name')}}" name="name" class="form-control" placeholder="Name">
                  @if (count($errors) > 0)
                    <span class="text-danger">{{$errors->first('name')}}</span>
                  @endif
                </div>
              </div>
              <div class="row group">
                  <div class="control-label col-md-3 col-sm-3 col-xs-12 text-right">
                    <label for="email">Email</label>
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                  <input id="email" type="text" 
                    value="{{old('email')}}" name="email" class="form-control" placeholder="Email">
                  @if (count($errors) > 0)
                    <span class="text-danger">{{$errors->first('email')}}</span>
                  @endif
                </div>
              </div>
              <div class="row group">
                <div class="control-label col-md-3 col-sm-3 col-xs-12 text-right">
                  <label for="password">Password</label>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <input id="password" type="password" 
                     name="password" class="form-control" placeholder="Password">
                  @if (count($errors) > 0)
                    <span class="text-danger">{{$errors->first('password')}}</span>
                  @endif
                </div>
              </div>
              <div class="row group">
                  <div class="control-label col-md-3 col-sm-3 col-xs-12 text-right">
                  <label for="role_id">Role</label>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <select name="role_id" class="form-control">          
                  @foreach ($role as $value)            
                      <option value="{{$value->id}}" >{{$value->role}}</option>
                  @endforeach
                  </select>
                </div>
                <span class=""></span>
              </div>      
                  <div class="row group">
                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                      <button type="submit" class="btn btn-success">Submit</button>
                    <a href="{{route('user.list')}}" class="btn btn-warning">Cancel</a>
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