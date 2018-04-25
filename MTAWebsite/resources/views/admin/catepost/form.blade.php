      @extends('layouts.admin')

    @section('title','Category Manager')
    @section('section')
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="col-md-9 col-xs-12">
            <form action="{{route('cate.post.save')}}" method="post" novalidate enctype="multipart/form-data">
              <input type="hidden" id="model_id" name="id" value="{{$model->id}}">
              <input type="hidden" id="entity_type" name="entity_type" value="{{$modelSlug->entity_type}}">
              <div class="row group">
                  <div class="control-label col-md-3 col-sm-3 col-xs-12 text-right">
                   <label for="title">Title</label>
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                 <input id="title" type="text" value="{{old('title', $model->title)}}" name="title" class="form-control" placeholder="Title">
        @if (count($errors) > 0)
          <span class="text-danger">{{$errors->first('title')}}</span>
        @endif
                </div>
              </div>
              <div class="row group">
                  <div class="control-label col-md-3 col-sm-3 col-xs-12 text-right">
                    <label for="slug-url">Slug Url</label>
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                  <input id="slug-url" type="text" 
          value="{{old('slug', $modelSlug->slug)}}" name="slug" class="form-control" placeholder="Slug url">
        @if (count($errors) > 0)
          <span class="text-danger">{{$errors->first('slug')}}</span>
        @endif
                </div>
              </div>
              <div class="row group">
                <div class="control-label col-md-3 col-sm-3 col-xs-12 text-right">
                  <label for="cate-parent">Parent Category</label>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <select name="parent_id" class="form-control">
                        <option value="0">None</option>
                        @foreach ($listCate as $key => $value)
                        @php
                            $key = str_replace("x", "", $key);
                            $selected = $model->parent_id == $key ? "selected" : null;
                        @endphp
                        <option value="{{$key}}" {{$selected}}>{{$value}}</option>
                        @endforeach
                   </select>
                </div>
              </div>
              <div class="row group">
                  <div class="control-label col-md-3 col-sm-3 col-xs-12 text-right">
                    <label for="Seotitle">Seo Title</label>
                  </div>
                  <div class="col-md-9 col-sm-9 col-xs-12">
                  <input id="seo_title" type="text" 
                      value="{{old('seo_title', $model->seo_title)}}" name="seo_title" class="form-control" >
                    @if (count($errors) > 0)
                      <span class="text-danger">{{$errors->first('seo_title')}}</span>
                    @endif
                </div>
              </div>
                  <div class="row group">
                    <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                      <button type="submit" class="btn btn-success">Submit</button>
                    <a href="{{route('cate.post.list')}}" class="btn btn-warning">Cancel</a>
                  </div>
                  </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    @endsection
    @section('js')
     <script type="text/javascript">
       $(document).ready(function(){
      $('#title').on('keyup change', function(){
        title = $(this).val();
        if(title == ""){
          $('#slug-url').val('');
          return false;
        }
        $.ajax({
          url: "{{ route('slug.generate.category') }}", 
          type: 'GET',
          data: {title: title},
          dataType: 'JSON',
          success: function(rp){
            console.log(rp);
            $('#slug-url').val(rp.data);
          }
        });
      });
    });
     </script>
    @endsection