<h3>Edit User</h3>

<form action="{{ route('user.update', $dataedituser->user_id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nama :</label>
    <input type="text" name="nama" value="{{ $dataedituser->nama }}" required>
    <br>

    <label>Email :</label>
    <input type="email" name="email" value="{{ $dataedituser->email }}" required>
    <br>

    <label>Password :</label>
    <input type="password" name="password">
    <br>

    <label>Role :</label>
    <select name="role" required>
        <option value="">Pilih Role</option>

        <option value="admin"
            {{ $dataedituser->role == 'admin' ? 'selected' : '' }}>
            Admin
        </option>

        <option value="manajer"
            {{ $dataedituser->role == 'manajer' ? 'selected' : '' }}>
            Manajer
        </option>

        <option value="petugas"
            {{ $dataedituser->role == 'petugas' ? 'selected' : '' }}>
            Petugas
        </option>

        <option value="pegawai"
            {{ $dataedituser->role == 'pegawai' ? 'selected' : '' }}>
            Pegawai
        </option>
    </select>

    <br>

    <button type="submit">Update</button>
</form>