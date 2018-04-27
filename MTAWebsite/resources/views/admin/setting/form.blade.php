    @extends('layouts.admin')

    @section('title','Quản lí trang')
    @section('section')
    <section class="content">
    	
        <div class="col-md-2"></div>
      <div class="col-md-8 thumbnail">
            <form action="{{route('setting.save')}}" method="post" novalidate enctype="multipart/form-data">
				{{csrf_field()}}
				<input type="hidden" name="id" value="{{old('id', $model->id)}}">
				<div class="row group">

				    <div class="control-label col-md-3 col-sm-3 col-xs-12 text-right">
				    	<label for="title">logo</label>
				    </div>
				    <div class="col-md-9 col-sm-9 col-xs-12">
						<input id="logo" type="file" 
							value="{{old('logo', $model->logo)}}" name="img_logo" class="form-control" placeholder="Logo">
					</div>
				</div>
				<div class="row group">

				    <div class="control-label col-md-3 col-sm-3 col-xs-12 text-right">
				    	<label for="title">Slogan</label>
				    </div>
				    <div class="col-md-9 col-sm-9 col-xs-12">
						<input id="slogan" type="text" 
							value="{{old('slogan', $model->slogan)}}" name="slogan" class="form-control" placeholder="Slogan">
						@if (count($errors) > 0)
							<span class="text-danger">{{$errors->first('slogan')}}</span>
						@endif
					</div>
				</div>
				<div class="row group">
					<div class="control-label col-md-3 col-sm-3 col-xs-12 text-right">
						<label for="description">Description</label>
					</div>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<input id="description" type="text" 
							value="{{old('description', $model->description)}}" name="description" class="form-control" placeholder="Description">
						@if (count($errors) > 0)
							<span class="text-danger">{{$errors->first('description')}}</span>
						@endif
					</div>
				</div>
				<div class="row group">
					<div class="control-label col-md-3 col-sm-3 col-xs-12 text-right">
						<label for="description">Phone</label>
					</div>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<input id="description" type="text" 
							value="{{old('phone', $model->phone)}}" name="phone" class="form-control" placeholder="Phone">
						@if (count($errors) > 0)
							<span class="text-danger">{{$errors->first('phone')}}</span>
						@endif
					</div>
				</div>
				<div class="row group">
					<div class="control-label col-md-3 col-sm-3 col-xs-12 text-right">
						<label for="description">email</label>
					</div>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<input id="description" type="email" 
							value="{{old('email', $model->email)}}" name="email" class="form-control" placeholder="Email">
						@if (count($errors) > 0)
							<span class="text-danger">{{$errors->first('email')}}</span>
						@endif
					</div>
				</div>
				<div class="row group">
					<div class="control-label col-md-3 col-sm-3 col-xs-12 text-right">
						<label for="description">Address</label>
					</div>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<input id="address" type="text" 
							value="{{old('address', $model->address)}}" name="address" class="form-control" placeholder="Address">
						@if (count($errors) > 0)
							<span class="text-danger">{{$errors->first('address')}}</span>
						@endif
					</div>
				</div>
				<div class="row group">
					<div class="control-label col-md-3 col-sm-3 col-xs-12 text-right">
						<label for="description">Facebook</label>
					</div>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<input id="facebook" type="text" 
							value="{{old('facebook', $model->facebook)}}" name="facebook" class="form-control" placeholder="Facebook">
						@if (count($errors) > 0)
							<span class="text-danger">{{$errors->first('facebook')}}</span>
						@endif
					</div>
				</div>
				<div class="row group">
					<div class="control-label col-md-3 col-sm-3 col-xs-12 text-right">
						<label for="description">Skype</label>
					</div>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<input id="skype" type="text" 
							value="{{old('skype', $model->skype)}}" name="skype" class="form-control" placeholder="Skype">
						@if (count($errors) > 0)
							<span class="text-danger">{{$errors->first('skype')}}</span>
						@endif
					</div>
				</div>
				<div class="row group">
					<div class="control-label col-md-3 col-sm-3 col-xs-12 text-right">
					     <label for="footer">Footer</label>
					</div>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<textarea name="footer" class="form-control"  >
							{{old('footer', $model->footer)}}
						</textarea>
						@if (count($errors) > 0)
						<span class="text-danger">{{$errors->first('footer')}}</span>
						@endif
					</div>
					
				</div>
				<div class="row group">
					<div class="control-label col-md-3 col-sm-3 col-xs-12 text-right">
					     <label for="map">Map</label>
					</div>
					<div class="col-md-9 col-sm-9 col-xs-12">
						<textarea name="map" class="form-control"  >
							{{old('map', $model->map)}}
						</textarea>
						@if (count($errors) > 0)
						<span class="text-danger">{{$errors->first('map')}}</span>
						@endif
					</div>
					
				</div>
			    <div class="row group text-center">
					<button type="submit" class="btn btn-success">
                    @if(empty($model->id))
                      Thêm mới
                      @else
                     Cập nhật
                      @endif
					</button>
					<a href="{{route('page.list')}}" class="btn btn-warning">Trở lại</a>
				</div>		
		</form>
    
        </div>
      </div>
    </section>
    @endsection
    @section('js')
     
    @endsection