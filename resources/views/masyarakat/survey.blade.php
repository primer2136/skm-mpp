<?php
use App\Models\Pertanyaan;

$pertanyaans = Pertanyaan::orderBy('id_pertanyaan')->get();
?>

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
        <form id="formSurvey">
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
                <option value="pegawai">Mahasiswa</option>
                <option value="pelajar">Pelajar</option>
                <option value="wiraswasta">Wiraswasta/Pengusaha</option>
                <option value="lainnya">Lainnya</option>
            </select><br><br>
            <button class="btn-back" type="button" onclick="goback()">Kembali</button>
            <button class="btn-next" type="button" onclick="tampilkanPertanyaan()">Lanjutkan</button>
        </form>

        <form id="formPertanyaan" style="display: none;">
            <h2 id="judul">PERTANYAAN</h2>
            <div id="garis" class="garis-horizontal"></div>
            <?php foreach ($pertanyaans as $index => $pertanyaan): ?>
            <div class="question" id="question_<?php echo $index + 1; ?>" style="display: none;">
                <p><?php echo $pertanyaan->pertanyaan; ?></p>
                <?php for ($i = 1; $i <= 4; $i++): ?>
                <label class="radio-label" for="answer_<?php echo $index + 1; ?>_<?php echo $i; ?>">
                    <input type="radio" id="answer_<?php echo $index + 1; ?>_<?php echo $i; ?>"
                        name="answer_<?php echo $index + 1; ?>" value="<?php echo $i; ?>">
                    <span><?php echo $pertanyaan->{'jawaban' . $i}; ?></span>
                </label>
                <?php endfor; ?>

                <br><br><br>
                <?php if ($index > 0): ?>
                <button class="btn-back" type="button"
                    onclick="kembaliKePertanyaanSebelumnya('question_<?php echo $index + 1; ?>', 'question_<?php echo $index; ?>')">Kembali</button>
                <?php endif; ?>
                <button class="btn-next" type="button" onclick="<?php echo $index === count($pertanyaans) - 1 ? 'tampilkanPertanyaanTerakhir()' : 'tampilkanPertanyaanSelanjutnya(\'question_' . ($index + 1) . '\', \'question_' . ($index + 2) . '\')'; ?>">
                    Selanjutnya
                </button>
            </div>
            <?php endforeach; ?>
            <div class="question" id="kritik_saran" style="display: none;">
                <label for="saran"><strong>SARAN:</strong></label>
                <textarea id="saran" name="saran" rows="4" cols="50"></textarea><br><br><br>
                <button class="btn-back" type="button"
                    onclick="kembaliKePertanyaanSebelumnya('kritik_saran', 'question_<?php echo count($pertanyaans); ?>')">Kembali</button>
                <button class="btn-next" type="button" onclick="submitSurvey()">Kirim Survey</button>
            </div>
        </form>

    </div>

    <!-- Bagian HTML untuk tampilan terima kasih -->
    <div class="question" id="terima_kasih" style="display: none;">
        <h2>Terima Kasih!</h2>
        <p>Terima kasih telah mengisi survei.</p>
        <p id="countdown">Kembali ke halaman awal dalam <span id="timer">3</span> detik.</p>
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
                Swal.fire("Error", "Nama harus diisi", "error");
                return false;
            }

            if (inputYear < 1900 || inputYear > currentYear) {
                Swal.fire("Error", "Tahun lahir harus di antara 1900 dan " + currentYear, "error");
                return false;
            }

            if (inputJenisKelamin === "") {
                Swal.fire("Error", "Jenis kelamin harus dipilih", "error");
                return false;
            }

            if (inputNomorAntrian.trim() === "") {
                Swal.fire("Error", "Nomor antrian harus diisi", "error");
                return false;
            }

            if (inputPendidikan === "") {
                Swal.fire("Error", "Riwayat pendidikan harus dipilih", "error");
                return false;
            }

            if (inputKerjaan === "") {
                Swal.fire("Error", "Pekerjaan harus dipilih", "error");
                return false;
            }
            return true;
        }

        function tampilkanPertanyaan() {
            if (validateForm()) {
                document.getElementById('formSurvey').style.display = 'none';
                document.getElementById('formPertanyaan').style.display = 'block';
                document.getElementById('question_1').style.display = 'block'; // Menampilkan pertanyaan pertama
            }
        }

        function tampilkanPertanyaanSelanjutnya(currentQuestionId, nextQuestionId) {
            var currentQuestion = document.getElementById(currentQuestionId);
            var nextQuestion = document.getElementById(nextQuestionId);

            if (currentQuestion && nextQuestion) {
                if (validatePilihan(currentQuestion)) {
                    currentQuestion.style.display = 'none'; // Sembunyikan pertanyaan saat ini
                    if (nextQuestionId === 'kritik_saran') {
                        tampilkanPertanyaanTerakhir();
                    } else {
                        nextQuestion.style.display = 'block'; // Tampilkan pertanyaan selanjutnya
                    }
                } else {
                    Swal.fire("Error", "Pilih salah satu opsi sebelum melanjutkan.", "error");
                }
            }
        }

        function tampilkanPertanyaanTerakhir(currentQuestionId, nextQuestionId) {
            var currentQuestion = document.getElementById('kritik_saran');
            var previousQuestion = document.getElementById('question_' + (<?php echo count($pertanyaans); ?>));

            if (currentQuestion && previousQuestion) {
                if (validatePilihan(previousQuestion)) {
                    previousQuestion.style.display = 'none';
                    currentQuestion.style.display = 'block';
                    document.getElementById('judul').style.display = 'none';
                    document.getElementById('garis').style.display = 'none';
                } else {
                    Swal.fire("Error", "Pilih salah satu opsi sebelum melanjutkan.", "error");
                }
            }
        }

        function validatePilihan(question) {
            var radioButtons = question.querySelectorAll('input[type="radio"]');
            for (var i = 0; i < radioButtons.length; i++) {
                if (radioButtons[i].checked) {
                    return true; // Setidaknya satu opsi dipilih
                }
            }
            return false; // Tidak ada opsi yang dipilih
        }

        function kembaliKePertanyaanSebelumnya(currentQuestionId, previousQuestionId) {
            var currentQuestion = document.getElementById(currentQuestionId);
            var previousQuestion = document.getElementById(previousQuestionId);
            document.getElementById('judul').style.display = 'block';
            document.getElementById('garis').style.display = 'block';

            if (currentQuestion && previousQuestion) {
                currentQuestion.style.display = 'none';
                previousQuestion.style.display = 'block';
            }
        }

        function submitSurvey() {

            // Menampilkan tanda terima kasih
            document.getElementById('kritik_saran').style.display = 'none'; // Sembunyikan bagian kritik dan saran
            document.getElementById('terima_kasih').style.display = 'block'; // Tampilkan tanda terima kasih
            document.getElementById('formPertanyaan').style.display = 'none';
            document.getElementById('formSurvey').style.display = 'none';
            document.querySelector('.container').style.display = 'none';

            // Pengaturan hitungan mundur
            var seconds = 3; // Hitungan mundur dalam detik
            var countdown = document.getElementById('timer');

            var timer = setInterval(function() {
                seconds--;
                countdown.textContent = seconds;

                if (seconds <= 0) {
                    clearInterval(timer);
                    window.location.href = "/";
                }
            }, 1000);
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
