@extends('dashboard.style.main')

@section('content')
@if(Session::has('ms-admin'))
<div class="alert alert-primary" role="alert">
    {{ session("ms-admin") }}
  </div>
@endif
@if (Auth::guard('admin')->user()->can('add.product'))

<a href="{{ route('product.create') }}" class="btn btn-primary">Add Product </a>
@endif
<div class="row">
    <div class="col-12 grid-margin">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Recent Tickets</h4>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th> id</th>
                  <th>name</th>
                  <th>price</th>
                  <th>sale</th>
                  <th> count</th>
                  <th> category</th>
                  <th> images</th>
                  <th> Edite/Delete</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($data as $key=>$val )
                <tr>
                  <td>{{ ++$key }}</td>
                  <td>{{ $val->name }}</td>
                  <td>{{ $val->price }}</td>
                  <td>{{ $val->sale}}</td>
                  <td> {{ $val->count }}</td>
                  <td> {{ $val->category }}</td>
                  <td>
                    @foreach ($val->images as $img )
                    <img src="{{ asset('storage/images/'.$img['file']) }}" style="height: 80px;">
                    @endforeach
                  </td>
            <td>
                @if (Auth::guard('admin')->user()->can("update.product"))

                <a href="{{ route('product.show',$val->id) }}" class="btn btn-primary">edite</a>
                @endif

                @if (Auth::guard('admin')->user()->can("delete.product"))
                <form action="{{ route('product.destroy',$val->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">delete</button>
                </form>
                @endif

            </td>

                </tr>

                @empty

                 @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
