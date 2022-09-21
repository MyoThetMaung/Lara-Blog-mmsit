@extends('layouts.app')

@section('content')
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="ms-3">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">User</li>
    </ol>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>User List</h4>
                    <hr>
                    <div class="d-flex justify-content-between">
                        <div>
                            @if(request('keyword'))
                                <span>Search By: {{ request('keyword') }}</span>
                                <a href="{{ route('user.index') }}"><i class="fa-solid fa-trash"></i></a>
                            @endif
                        </div>
                        <div class="">
                            <form action="{{ route('user.index') }}" method="GET">
                                @csrf
                                <div class="input-group">
                                    <input type="text" class="form-control" name="keyword">
                                    <button class="btn btn-secondary">Search</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Control</th>
                                <th>Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                        <div class="d-flex justify-content-spacebetween">
                                        <a href="{{ route('user.show',$user->id) }}" class="btn btn-sm btn-success me-1"><i class="fa-solid fa-circle-info"></i></a>
                                        @can('update',$user)
                                            <a href="{{ route('user.edit',$user->id) }}" class="btn btn-sm btn-warning me-1"><i class="fa-solid fa-pen-to-square"></i></a>
                                        @endcan
                                        @can('delete',$user)
                                            <form action="{{ route('user.destroy',$user->id) }}" method="user">
                                                @csrf
                                                @method('delete')
                                                <button type='submit' class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                                            </form>
                                        @endcan
                                        </div>
                                    </td>
                                    <td>
                                        <p>{{ $user->created_at->format('d M Y') }}</p>
                                        <p>{{ $user->updated_at->format('H:i:s') }}</p>
                                    </td>
                                </tr>
                            @empty
                                
                            @endforelse
                        </tbody>
                    </table>
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection