      @extends('layouts.admin')

    @section('title','Hợp tác')
    @section('section')
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="col-md-9 col-xs-12">
            <form action="{{route('contract.save')}}" method="post" novalidate enctype="multipart/form-data">
              <input type="hidden" id="model_id" name="id" value="{{$model->id}}">
              <div class="row group">
                  <div class="control-label col-md-3 col-sm-3 col-xs-12 text-right">      
                    <label for="image">Hình Ảnh</label>
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                        @if($model->id >0)
                        <img width="200" src="{{ asset('uploads/'.$model->images) }}">
                        @endif
                        <input required type="file" name="upload_image" class="form-control" >
                         @if (count($errors) > 0)
                            <span class="text-danger">{{$errors->first('upload_image')}}</span>
                         @endif
                  </div>
              </div>
              <div class="row group">
                  <div class="control-label col-md-3 col-sm-3 col-xs-12 text-right">
                   <label for="title">Tiêu đề</label>
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                 <input id="title" type="text" value="{{old('title', $model->title)}}" name="title" class="form-control" placeholder="Tiêu đề">
                
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
                      <button type="submit" class="btn btn-success">Gửi</button>
                    <a href="{{route('contract.list')}}" class="btn btn-warning">Trở lại</a>
                  </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    @endsection
