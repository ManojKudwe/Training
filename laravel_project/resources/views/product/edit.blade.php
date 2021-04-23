@extends('admin.layout.app')

@section('content')
  <form action="{{route('products.update',$product->id)}}" enctype="multipart/form-data" method="POST" >
            @csrf
			@method('PUT')
            
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
                                <label for="pname"> Product Name <span class="text-danger"> * </span> </label>
                                    <input type="text" name="pname" class="form-control" value="{{$product->pname}}" />
                                    {!!$errors->first("pname", "<span class='text-danger'>:message</span>")!!}
                            </div>
							 <div class="form-group">
                                <label for="price"> Product Price <span class="text-danger"> * </span> </label>
                                    <input type="number" name="price" class="form-control" value="{{$product->price}}" />
                                    {!!$errors->first("price", "<span class='text-danger'>:message</span>")!!}
                            </div>
							 <div class="form-group">
                                <label for="pimage"> Upload Image <span class="text-danger"> * </span> </label>
                                    <input type="file" name="pimage" class="form-control" value="{{old('pimage')}}" />
                                    {!!$errors->first("pimage", "<span class='text-danger'>:message</span>")!!}
                            </div>
							 <div class="form-group">
                                <label for="category">Select Category<span class="text-danger"> * </span> </label>
                                    <select name="category" id="category" class="select category">
							@foreach ($data as $category)
								<option value="{{$category->category}}"{{$productc->category == $category->category ? 'selected' : ''}}>{{$category->category}}</option>
							@endforeach
							</select> 
                                    {!!$errors->first("category", "<span class='text-danger'>:message</span>")!!}
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success"> Update </button>
                        </div>
                    
               
        </form>

@endsection
