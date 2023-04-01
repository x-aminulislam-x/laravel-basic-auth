@extends('products.layout')
   
@section('content')
<div class="row mt-5">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2 class="text-center">Edit Product</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
        </div>
    </div>
</div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <div class="w-80 mt-5">
        <form action="{{ route('products.update',$product->id) }}" method="POST">
            @csrf
            @method('PUT')
    
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12  mt-3">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text" name="name" class="form-control" placeholder="Name">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12  mt-3">
                    <div class="form-group">
                        <strong>Detail:</strong>
                        <textarea class="form-control" style="height:150px" name="detail" placeholder="Detail"></textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-3">
                        <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection