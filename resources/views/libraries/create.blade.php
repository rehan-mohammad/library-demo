
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
@endif

<form method="post" action="{{ route('libraries.store') }}">
    <div>
        @csrf
        <label for="name">Library Name:</label>
        <input type="text" id="name" name="name"/>
    </div>
    <button type="submit" class="btn btn-primary">Add Library</button>
</form>
