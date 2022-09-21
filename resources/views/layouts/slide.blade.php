<h4>Posts</h4>
<div class="list-group">
    <a href="{{ route('home') }}" class="list-group-item list-group-item-action">Home</a>
    <a href="{{ route('test') }}" class="list-group-item list-group-item-action">Test</a>
    <a href="{{ route('photos.index') }}" class="list-group-item list-group-item-action">Photos</a>
</div>

<h4 class="mt-4">Manage Post</h4>
<div class="list-group">
    <a href="{{ route('post.index') }}" class="list-group-item list-group-item-action">Post List</a>
    <a href="{{ route('post.create') }}" class="list-group-item list-group-item-action">Create Post</a>
</div>

<h4 class="mt-4">Manage Category</h4>
<div class="list-group">
    <a href="{{ route('category.index') }}" class="list-group-item list-group-item-action">Category List</a>
    <a href="{{ route('category.create') }}" class="list-group-item list-group-item-action">Create Category</a>
</div>

@admin
    <h4 class="mt-4">Manage User</h4>
    <div class="list-group">
        <a href="{{ route('user.index') }}" class="list-group-item list-group-item-action">User List</a>
    </div>
@endadmin