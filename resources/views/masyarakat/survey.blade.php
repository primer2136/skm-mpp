<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Isi Survei</title>
    <link rel="shortcut icon" href="https://mpp.cimahikota.go.id/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11">
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
        <form id="formSurvey" method="post"
            action="{{ route('layanan.survey.submit', ['id_tenant' => $layananData['nomor']]) }}">
            @csrf
            <h2>DATA RESPONDEN</h2>

            <div class="garis-horizontal"></div>
            <label for="nama">Nama :</label>
            <input type="text" id="nama" name="nama">

            <div class="double-column">
                <label for="tahun-lahir">Tahun Lahir :</label>
                <input class="asd" type="number" id="tahun-lahir" name="tahun-lahir" min="1900" max="2024">

                <label for="jenis-kelamin">Jenis Kelamin :</label>
                <select id="jenis-kelamin" name="jenis-kelamin">
                    <option value="" disabled selected>-- Pilih --</option>
                    <option value="pria">Pria</option>
                    <option value="wanita">Wanita</option>
                </select>
            </div><br>

            <div class="double-column">
                <label for="nomor-antrian">Nomor Antrian :</label>
                <input class="asd" type="text" id="nomor-antrian" name="nomor-antrian">

                <label for="pendidikan">Riwayat Pendidikan :</label>
                <select id="pendidikan" name="pendidikan">
                    <option value="" disabled selected> -- Pilih --</option>
                    <option value="Tidak tamat">Tidak Tamat</option>
                    <option value="sd">SD</option>
                    <option value="smp">SMP</option>
                    <option value="sma">SMA</option>
                    <option value="Tamat D3">Tamat D3</option>
                    <option value="Tamat D4/S1">Tamat D4/S1</option>
                    <option value="Tamat S2">Tamat S2</option>
                    <option value="Tamat S3">Tamat S3</option>
                </select>
            </div>
            <label for="kerjaan">Pekerjaan :</label>
            <select id="kerjaan" name="kerjaan">
                <option value="" disabled selected>-- Pilih --</option>
                <option value="pegawai Negeri">Pegawai Negeri</option>
                <option value="pegawai Swasta">Pegawai Swasta</option>
                <option value="mahasiswa">Mahasiswa</option>
                <option value="pelajar">Pelajar</option>
                <option value="wiraswasta/pengusaha">Wiraswasta/Pengusaha</option>
                <option value="lainnya">Lainnya</option>
            </select><br><br>
            <button class="btn-back" type="button" onclick="goback()">Kembali</button>
            <button class="btn-next" type="button" onclick="submitResponden()">Lanjutkan</button>
        </form>
    </div>

    <!-- SWEETALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        function validateForm() {
            var inputNama = document.getElementById("nama").value;
            var inputYear = document.getElementById("tahun-lahir").value;
            var inputJenisKelamin = document.getElementById("jenis-kelamin").value;
            var inputNomorAntrian = document.getElementById("nomor-antrian").value;
            var inputKerjaan = document.getElementById("kerjaan").value;
            var inputPendidikan = document.getElementById("pendidikan").value;
            var currentYear = new Date().getFullYear();

            if (inputNama.trim() === "" &&
                inputYear.trim() === "" &&
                inputJenisKelamin.trim() === "" &&
                inputNomorAntrian.trim() === "" &&
                inputPendidikan.trim() === "" &&
                inputKerjaan.trim() === "") {
                Swal.fire("Peringatan", "Data harap dilengkapi", "warning");
                return false;
            }

            if (inputNama.trim() === "") {
                Swal.fire("Peringatan", "Nama harus diisi", "warning");
                return false;
            }

            if (inputYear < 1900 || inputYear > currentYear) {
                Swal.fire("Peringatan", "Tahun lahir harus di antara 1900 dan " + currentYear, "warning");
                return false;
            }

            if (inputJenisKelamin === "") {
                Swal.fire("Peringatan", "Jenis kelamin harus dipilih", "warning");
                return false;
            }

            if (inputNomorAntrian.trim() === "") {
                Swal.fire("Peringatan", "Nomor antrian harus diisi", "warning");
                return false;
            }

            if (inputNomorAntrian.length > 10) {
                Swal.fire(
                    "Error",
                    "Nomor antrian tidak valid",
                    "warning"
                );
                return false;
            }

            if (inputPendidikan === "") {
                Swal.fire("Peringatan", "Riwayat pendidikan harus dipilih", "warning");
                return false;
            }

            if (inputKerjaan === "") {
                Swal.fire("Peringatan", "Pekerjaan harus dipilih", "warning");
                return false;
            }
            return true;
        }

        function submitResponden() {
            var formSurvey = document.getElementById("formSurvey");

            if (validateForm()) {
                // Membersihkan riwayat perambanan
                window.history.replaceState({}, document.title, "/");
                // Mengarahkan kembali ke halaman home
                window.location.href = "/";
                formSurvey.submit();
                formSurvey.reset();
            }
        }

        function goback() {
            var formSurvey = document.getElementById('formSurvey');
            var formPertanyaan = document.getElementById('formPertanyaan');

            if (formSurvey.style.display === 'none') {
                // Jika sedang menampilkan pertanyaan, kembali ke formulir survei
                formSurvey.style.display = 'block';
                formPertanyaan.style.display = 'none';
            } else {
                // Jika sedang menampilkan formulir survei, kembali ke halaman sebelumnya
                window.history.back();
            }
        }
    </script>


</body>

</html>
