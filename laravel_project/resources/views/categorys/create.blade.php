@extends('admin.layout.app')

@section('content')
 <form action="/categorys" method="POST">
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
                                <label for="category"> category <span class="text-danger"> * </span> </label>
                                    <input type="text" name="category" class="form-control" value="{{old('category')}}" />
                                    {!!$errors->first("category", "<span class='text-danger'>:message</span>")!!}
                            </div>

							
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success"> Submit </button>
                        </div>
                    
               
        </form>

@endsection
