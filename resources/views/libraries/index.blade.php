<table>
    <thead>
    <tr>
        <td>Library Name</td>
        <td colspan="2">Action</td>
    </tr>
    </thead>
    <tbody>
    @foreach($libraries as $library)
        <tr>
            <td>{{$library->name}}</td>
            <td><a href="{{ route('libraries.edit', $library->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('libraries.destroy', $library->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
