<div class="col-lg-4">
    <ul class="list-group">
        <li class="list-group-item">
             <a href="{{ route('home') }}">Home</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('categories') }}">Categories</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('tags') }}">Tags</a>
        </li>
        @if(Auth::user() -> admin)
        <li class="list-group-item">
            <a href="{{ route('users') }}">Users</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('users.create') }}">Create New User</a>
        </li>
        @endif
        <li class="list-group-item">
            <a href="{{ route('users.profile') }}">My Profile</a>
        </li>
       <li class="list-group-item">
            <a href="{{ route('tags.create') }}">Create New Tag</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('posts') }}">All Posts</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('posts.create') }}">Create New Post</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('posts.trashed') }}">All Trashed Posts</a>
        </li>
        <li class="list-group-item">
            <a href="{{ route('categories.create') }}">Create New Category</a>
        </li>
        @if(Auth::user() -> admin)
        <li class="list-group-item">
            <a href="{{ route('settings') }}">Settings</a>
        </li>
        @endif
    </ul>
</div>