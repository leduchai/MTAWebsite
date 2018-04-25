      @extends('layouts.admin')

    @section('title','Quản lí Banner')
    @section('section')
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="col-md-9 col-xs-12">
            <form action="{{route('banner.save')}}" method="post" novalidate enctype="multipart/form-data">
              <input type="hidden" id="model_id" name="id" value="{{$model->id}}">
              <div class="row group">
                  <div class="control-label col-md-3 col-sm-3 col-xs-12 text-right">      
                    <label for="image">Image</label>
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                        @if($model->id >0)
                        <img width="200" src="{{ asset('uploads/'.$model->images) }}">
                        @endif
                        <input type="file" name="upload_image" class="form-control" >
                         @if (count($errors) > 0)
                            <span class="text-danger">{{$errors->first('upload_image')}}</span>
                         @endif
                  </div>
              </div>
              <div class="row group">
                <div class="control-label col-md-3 col-sm-3 col-xs-12 text-right">
                  <label for="cate-parent">Vị trí</label>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <select name="location" class="form-control">
                        <option value="0">Chọn vị trí</option>
                        <option value="logo">logo</option>
                        <option value="top-banner">top-banner</option>
                        <option value="home bottom">home bottom</option>
                        
                       
                        <option value="left-banner">left-banner</option>
                        <option value="slider">slider</option>
                   </select>
                    @if (count($errors) > 0)
                    <span class="text-danger">{{$errors->first('location')}}</span>
                  @endif
                </div>
              </div>
              <div class="row group">
                  <div class="control-label col-md-3 col-sm-3 col-xs-12 text-right">
                   <label for="title">Title</label>
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                 <input id="title" type="text" value="{{old('title', $model->title)}}" name="title" class="form-control" placeholder="Title">
                
                </div>
              </div>
              <div class="row group">
                  <div class="control-label col-md-3 col-sm-3 col-xs-12 text-right">
                    <label for="url">Link</label>
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                  <input id="url" type="text" 
                  value="{{old('url', $model->url)}}" name="url" class="form-control" placeholder="Link">
                @if (count($errors) > 0)
                  <span class="text-danger">{{$errors->first('url')}}</span>
                @endif
                </div>
              </div>
              <div class="row group">
                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                      <button type="submit" class="btn btn-success">Submit</button>
                    <a href="{{route('banner.list')}}" class="btn btn-warning">Cancel</a>
                  </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    @endsection
