<div class="container mt-5">
    <h2>Edit Data Karyawan</h2>
    <form action="{{ route('karyawan.update', 1) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Nama Karyawan</label>
            <input type="text" name="nama" class="form-control" value="Contoh Nama" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Jabatan</label>
            <input type="text" name="jabatan" class="form-control" value="Kasir" required>
        </div>
        <button type="submit" class="btn btn-primary">Update Data</button>
        <a href="{{ route('karyawan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>