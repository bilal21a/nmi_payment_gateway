<li>
    <a class="{{ request()->is('books') ? 'active' : '' }}" href="{{ route('book.user') }}">
        <i data-acorn-icon="books" class="d-inline-block"></i>
        <span class="label">Books</span>
    </a>
</li>
<li>
    <a class="{{ request()->is('category*') ? 'active' : '' }}" href="{{ route('categories.user') }}">
        <i data-acorn-icon="category" class="d-inline-block"></i>
        <span class="label">Books by Categories</span>
    </a>
</li>
<li>
    <a class="{{ request()->is('add_request') ? 'active' : '' }}" href="{{ route('requested_books.add_request') }}">
        <i data-acorn-icon="book" class="d-inline-block"></i>
        <span class="label">Request Books</span>
    </a>
</li>
<li>
    <a class="{{ request()->is('profile*') ? 'active' : '' }}" href="{{ route('profile.index') }}">
        <i data-acorn-icon="user" class="d-inline-block"></i>
        <span class="label">Profile</span>
    </a>
</li>
