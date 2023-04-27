
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div><br />
@endif

<form method="post" action="{{ route('libraries.update', $library->id ) }}">
    <div>
        @csrf
        @method('PATCH')
        <label for="name">Library Name:</label>
        <input type="text" id="name" name="name" value="{{ $library->name }}"/>
    </div>
    <button type="submit" class="btn btn-primary">Update Library</button>
</form>
