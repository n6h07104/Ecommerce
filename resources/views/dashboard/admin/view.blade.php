@extends('dashboard.style.main')

@section('content')
@if(Session::has('ms-admin'))
<div class="alert alert-primary" role="alert">
    {{ session("ms-admin") }}
  </div>
@endif
@if (Auth::guard('admin')->user()->can('add.user'))
<a href="{{ route('admin.create') }}" class="btn btn-primary">Add User </a>
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
                  <th>email</th>
                  <th>Gender</th>
                  <th> privilege</th>
                  <th> Edite/Delete</th>
                </tr>
              </thead>
              <tbody>
                @foreach ( $data as $key=>$val )
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>{{ $val->name }}</td>
                    <td>{{ $val->email }}</td>
                    <td>{{ $val->gender==1?"male":"famale" }}</td>
                    <td>
                      {{ $val->priv==300?"owner":"" }}
                      {{ $val->priv==200?"admin":"" }}
                      {{ $val->priv==100?"supervisor":"" }}
                  </td>
              <td>
                @if (Auth::guard('admin')->user()->can('update.user'))
                  <a href="{{ route('admin.show',$val->id) }}" class="btn btn-primary ds-block">edite</a>
                @endif
                @if (Auth::guard('admin')->user()->can('delete.user'))

                <form action="{{ route('admin.destroy',$val->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">delete</button>
                </form>
                @endif
              </td>

                  </tr>

                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
