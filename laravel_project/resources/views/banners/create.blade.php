@extends('admin.layout.app')

@section('content')
 <form action="/banners" enctype="multipart/form-data" method="POST">
            @csrf
            
                        @if(Session::has('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">�</button>
                                {{Session::get('success')}}
                            </div>
                        @elseif(Session::has('failed'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert">�</button>
                                {{Session::get('failed')}}
                            </div>
                        @endif

                        <div class="card-header">
                            <h4 class="card-title font-weight-bold"><b>Admin</b>LTE</h4>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="title"> Title <span class="text-danger"> * </span> </label>
                                    <input type="text" name="title" class="form-control" value="{{old('title')}}" />
                                    {!!$errors->first("title", "<span class='text-danger'>:message</span>")!!}
                            </div>
							 <div class="form-group">
                                <label for="description">Description <span class="text-danger"> * </span> </label>
                                    <input type="text" name="description" class="form-control" value="{{old('description')}}" />
                                    {!!$errors->first("description", "<span class='text-danger'>:message</span>")!!}
                            </div>
							 <div class="form-group">
                                <label for="image"> Upload Image <span class="text-danger"> * </span> </label>
                                    <input type="file" name="image" id="image"  class="form-control" value="{{old('image')}}" />
                                    {!!$errors->first("image", "<span class='text-danger'>:message</span>")!!}
                            </div>
							<div class="form-group">
                                <label for="status"> Status <span class="text-danger"> * </span></label>
                                   <ul>
								<li><input type="radio" class="radio" id="status" name="status" value="Active" /><label class="radio-label" for="residence1">Active</label></li>
								<li><input type="radio" class="radio" id="status" name="status" value="Inactive" /><label class="radio-label" for="residence2">Inactive</label></li>
							</ul>	
                                    {!!$errors->first("status", "<span class='text-danger'>:message</span>")!!}
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success"> Submit </button>
                        </div>
                    
               
        </form>

@endsection
