      @extends('layouts.admin')

      @section('title','Quản lí Khoa')
      @section('section')
      <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="col-md-9 col-xs-12">
              <form action="{{route('faculty.save')}}" method="post" novalidate enctype="multipart/form-data">
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
                   <label for="title">Tên khoa</label>
                 </div>
                 <div class="col-md-9 col-sm-9 col-xs-12">
                   <input id="title" type="text" value="{{old('title', $model->title)}}" name="title" class="form-control" placeholder="Tên khoa">

                 </div>
               </div>
               <div class="row group">
                <div class="control-label col-md-3 col-sm-3 col-xs-12 text-right">
                  <label for="title">Địa chỉ</label>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12">
                 <input id="title" type="text" value="{{old('address', $model->address)}}" name="address" class="form-control" placeholder="Đỉa chỉ">

               </div>
             </div>
             <div class="row group">
              <div class="control-label col-md-3 col-sm-3 col-xs-12 text-right">
               <label for="phone">Hotline</label>
             </div>
             <div class="col-md-9 col-sm-9 col-xs-12">
               <input id="phone" type="text" value="{{old('phone', $model->phone)}}" name="phone" class="form-control" placeholder="Hotline">
             </div>
           </div>
           <div class="row group">
            <div class="control-label col-md-3 col-sm-3 col-xs-12 text-right">
              <label for="phone">Email</label>
           </div>
           <div class="col-md-9 col-sm-9 col-xs-12">
             <input id="email" type="text" value="{{old('email', $model->email)}}" name="email" class="form-control" placeholder="Email">
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
            <a href="{{route('faculty.list')}}" class="btn btn-warning">Cancel</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
</section>
@endsection
