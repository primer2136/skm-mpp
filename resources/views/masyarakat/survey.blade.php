<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Formulir Data</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('landing/css/survey.css') }}">
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar">
    <div class="a">
      <a class="navbar-brand" href="#">SURVEY KEPUASAN MASYARAKAT</a>
    </div>
  </nav>

  <div class="container">
    <form action="{{ route('layanan.pertanyaan', ['nomor' => $nomor]) }}" method="get">>
      <h2>DATA RESPONDEN</h2>

      <label for="nama">Nama:</label>
      <input type="text" id="nama" name="nama">

      <div class="double-column">
        <label for="tahun-lahir">Tahun Lahir:</label>
        <input class="asd" type="number" id="tahun-lahir" name="tahun-lahir" min="1900" max="2024">
        
        <label for="jenis-kelamin">Jenis Kelamin:</label>
        <select id="jenis-kelamin" name="jenis-kelamin">
          <option value="pria">Pria</option>
          <option value="wanita">Wanita</option>
        </select>
      </div><br>

      <div class="double-column">
        <label for="nomor-antrian">Nomor Antrian:</label>
        <input class="asd" type="text" id="nomor-antrian" name="nomor-antrian">

        <label for="pendidikan">Riwayat Pendidikan:</label>
        <select id="pendidikan" name="pendidikan">
          <option value="sd">SD</option>
          <option value="smp">SMP</option>
          <option value="sma">SMA</option>
          <option value="perguruan-tinggi">Perguruan Tinggi</option>
        </select>
      </div>
      <label for="kerjaan">Pekerjaan:</label>
      <select id="kerjaan" name="kerjaan">
        <option value="pegawai">Pegawai</option>
        <option value="pelajar">Pelajar</option>
        <option value="wirausaha">Wirausaha</option>
        <option value="lainnya">Lainnya</option>
      </select><br><br>

      <input type="submit" value="lanjutkan">
    </form>
  </div>

  <script>
    function validateForm() {
      var inputYear = document.getElementById("tahun-lahir").value;
      var currentYear = new Date().getFullYear();

      if (inputYear < 1900 || inputYear > currentYear) {
        alert("Tahun lahir harus di antara 1900 dan " + currentYear);
        return false;
      }

      return true;
    }
  </script>

</body>
</html>