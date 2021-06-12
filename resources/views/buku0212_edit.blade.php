<form action="{{ url('buku0212/' . $buku0212->id) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="patch">
    Id: <input type="text" name="id" value="{{ $buku0212->id }}"><br>
    Nama Pasien: <input type="text" name="judul" value="{{ $buku0212->judul }}"><br>
    Alamat: <input type="text" name="tahun_terbit" value="{{ $buku0212->tahun_terbit }}"><br>
    <button type="submit">Simpan</button>
</form>