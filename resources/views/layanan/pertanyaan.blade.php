<!-- Tampilan halaman pertanyaan -->
<h1>Pertanyaan</h1>
<p>{{ $pertanyaan->pertanyaan }}</p>
<form action="{{ route('layanan.simpan') }}" method="POST">
    @csrf
    <input type="hidden" name="layanan_id" value="{{ $pertanyaan->layanan_id }}">
    <input type="hidden" name="pertanyaan_id" value="{{ $pertanyaan->id }}">
    <input type="hidden" name="halaman" value="{{ $halaman }}">
    <input type="text" name="jawaban">
    <button type="submit">Simpan</button>
</form>
