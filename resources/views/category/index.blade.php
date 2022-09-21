@extends('layouts.app')

@section('content')
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="ms-3">
    <ol class="breadcrumb">
        <li class="breadcrumb-item active" aria-current="page">Category</li>
    </ol>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4>Category List</h4>
                    <hr>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Owner</th>
                                <th>Control</th>
                                <th>Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->title }} <br> <span class="badge text-bg-success">{{ $category->slug }}</td>
                                    <td>{{ $category->user->name }}</td>
                                    <td>
                                        <div class="d-flex justify-content-spacebetween">
                                            @can('update',$category)
                                            <a href="{{ route('category.edit',$category->id) }}" class="btn btn-sm btn-warning me-1"><i class="fa-solid fa-pen-to-square"></i></a>
                                            @endcan
                                            @can('update',$category)
                                            <form action="{{ route('category.destroy',$category->id) }}" method="POST">
                                                @csrf
                                                @method('delete')
                                                <button type='submit' class="btn btn-sm btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                                            </form>
                                            @endcan
                                        </div>
                                    </td>
                                    <td>
                                        <p>{{ $category->created_at->format('d M Y') }}</p>
                                        <p>{{ $category->updated_at->format('H:i:s') }}</p>
                                    </td>
                                </tr>
                                @empty
                                    <p>No data available</p>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</div>



@endsection