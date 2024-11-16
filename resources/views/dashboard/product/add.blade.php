@extends('dashboard.style.main')

@section('content')
<div class="col-12 grid-margin stretch-card">
    <div class="card">
    <div class="card-body">
    <h4 class="card-title">Basic form elements</h4>
    <p class="card-description"> Basic form elements </p>
    <form class="forms-sample" action="{{ route("product.store") }}" method="post" enctype="multipart/form-data">
    @csrf
    @error('name')<div style="color:red;">{{ $message }} </div>@enderror
    <div class="form-group">
    <label for="exampleInputName1">Name</label>
    <input type="text" class="form-control" id="exampleInputName1" value="{{ old("name") }}" placeholder="Name" name="name">
    </div>
    @error('price')<div style="color:red;">{{ $message }} </div>@enderror
    <div class="form-group">
    <label for="exampleInputEmail3">price</label>
    <input type="text" class="form-control" id="exampleInputEmail3" value="{{ old("price") }}" placeholder="price" name="price">
    </div>
    @error('sale')<div style="color:red;">{{ $message }} </div>@enderror
    <div class="form-group">
    <label for="exampleInputPassword4">sale</label>
    <input type="text" class="form-control" id="exampleInputPassword4" value="{{ old("sale") }}" name="sale" placeholder="sale">
    </div>
    @error('count')<div style="color:red;">{{ $message }} </div>@enderror
    <div class="form-group">
    <label for="exampleInputPassword4">count </label>
    <input type="text" class="form-control" id="exampleInputPassword4" value="{{ old("count") }}" name="count" placeholder="count">
    </div>
    <div class="form-group">
    <label for="exampleSelectGender"></label>
    <select name="category" class="form-control" id="exampleSelectGender">
        @foreach (config('cat') as $val)
        <option value="{{ $val }}">{{ $val }}</option>

        @endforeach

    </select>
    </div>
    @error("file") <div style="color:red;">{{ $message }} </div>@enderror
    @error("file.*") <div style="color:red;">{{ $message }} </div>@enderror
    <div class="form-group">
    <label >File upload</label>
    <input type="file" name="file[]" class="fille-upload-default" multiple>
     <div  class="input-group col-xs-12">
     <input type="text" class="form-control aille-upload" disabled="" placeholder="Upload Image">
     <span>
     {{-- <button type="button" class="fille-upload-brows btn btn-gradient-primary">Upload</button>  --}}
     </span>
    </div>
    </div>






    <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
    <button class="btn btn-light">Cancel</button>
    </form>
    </div>
    </div>
    </div>
@endsection


