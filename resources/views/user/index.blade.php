<h3>User </h3>
<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama</th>
            
            <th>Email</th>
            <th>Role</th>
            <th>
                <a href ="{{ route('user.create') }}">Tambah User</a>
            </th>
        </tr>
    </thead>
    <tbody>
        @foreach ($datauser as $u )
        <tr>
            <td>{{ $loop-> iteration }}</td>
            <td>{{ $u -> nama }}</td>
            <td> {{{ $u -> email }}}</td>
            <td> {{ $u -> role }}</td>
            <td>
              <form action="{{ route('user.destroy', $u -> user_id)}}" method="POST" style="display:inline">
                    {{ csrf_field() }}
                    @method('DELETE')
                    <a href="{{ route('user.edit', $u-> user_id) }}">Edit</a>
                    <button type="submit" onclick="return confirm('Hapus user ini?')">
                        Delete
                    </button>
                </form>
                </td>
        </tr>
        
        @endforeach
    </tbody>
</table>