<h3>Tambah user</h3>
<form action="{{ route('user.store') }}" method="POST">
    {{ csrf_field() }}

<label>Nama: </label>
<input type="text" name="nama" required>
<br>
<label>Email : </label>
<input type="email" name="email" required>
<br>
<label>Password :</label>
<input type="password" name="password" required>
<br>
<label>Role</label>
<select name="role" required>
    <option value="">Pilih Role</option>
    <option value="admin">Admin</option>
    <option value="manajer">Manajer</option>
    <option value="petugas">Petugas</option>
    <option value="pegawai">Pegawai</option>
</select>
<br>
<button type="submit">save</button>
</form>