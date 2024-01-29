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
        <form id="formPertanyaan" style="display: block;"method="post"
            action="{{ route('layanan.survey.submitjawaban', ['id_tenant' => $layananData['nomor'], 'id_responden' => $responden->id]) }}">
            @csrf
            <h2 id="judul" style="display: flex; justify-content: space-between; position: relative;">PERTANYAAN
                <p id="hitung"
                    style="text-align: right; margin: 0; font-size: 14px; position: absolute; bottom: 0; right: 0;">1
                    dari <?php echo count($pertanyaans); ?></p>
            </h2>
            <div id="garis" class="garis-horizontal"></div>
            @foreach ($pertanyaans as $index => $pertanyaan)
                <div class="question" id="U{{ $index + 1 }}" style="display: block;">
                    <p>{{ $pertanyaan->pertanyaan }}</p>
                    @for ($i = 1; $i <= 4; $i++)
                        <label class="radio-label" for="jawaban{{ $pertanyaan->id_pertanyaan }}_{{ $i }}">
                            <input type="radio" id="jawaban{{ $pertanyaan->id_pertanyaan }}_{{ $i }}"
                                name="{{ $pertanyaan->id_pertanyaan }}" value="{{ $i }}"
                                Bobot="{{ $i }}">
                            <span>{{ $pertanyaan->{'jawaban' . $i} }}</span>
                        </label>
                    @endfor

                    <br><br><br>
                    <?php if ($index > 0): ?>
                    <button class="btn-back" type="button"
                        onclick="kembaliKePertanyaanSebelumnya('U<?php echo $index + 1; ?>', 'U<?php echo $index; ?>')">Kembali</button>
                    <?php endif; ?>
                    <button class="btn-next" type="button" onclick="<?php echo $index === count($pertanyaans) - 1 ? 'tampilkanPertanyaanTerakhir()' : 'tampilkanPertanyaanSelanjutnya(\'U' . ($index + 1) . '\', \'U' . ($index + 2) . '\')'; ?>">
                        Selanjutnya
                    </button>
                </div>
                <?php @endforeach; ?>
                <div class="question" id="kritik_saran" style="display: block;">
                    <label for="saran"><strong>SARAN:</strong></label>
                    <textarea id="saran" rows="4" cols="50"></textarea><br><br><br>
                    <button class="btn-back" type="button"
                        onclick="kembaliKePertanyaanSebelumnya('kritik_saran', 'U<?php echo count($pertanyaans); ?>')">Kembali</button>
                    <button class="btn-next" type="button" onclick="submitSurvey()">Kirim Survey</button>
                </div>
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



        var nomorPertanyaanAktif = 1;

        function updateNomorPertanyaan() {
            var judulPertanyaan = document.getElementById('hitung');
            judulPertanyaan.textContent = nomorPertanyaanAktif + " dari <?php echo count($pertanyaans); ?>";
        }

        function tampilkanPertanyaanSelanjutnya(currentQuestionId, nextQuestionId) {
            var currentQuestion = document.getElementById(currentQuestionId);
            var nextQuestion = document.getElementById(nextQuestionId);

            if (currentQuestion && nextQuestion) {
                if (validatePilihan(currentQuestion)) {
                    currentQuestion.style.display = 'none';
                    nomorPertanyaanAktif++;
                    updateNomorPertanyaan();
                    if (nextQuestionId === 'kritik_saran') {
                        tampilkanPertanyaanTerakhir();
                    } else {
                        nextQuestion.style.display = 'block'; // Tampilkan pertanyaan selanjutnya
                    }
                } else {
                    Swal.fire("Peringatan", "Pilih salah satu opsi sebelum melanjutkan.", "warning");
                }
            }
        }

        function tampilkanPertanyaanTerakhir(currentQuestionId, nextQuestionId) {
            var currentQuestion = document.getElementById('kritik_saran');
            var previousQuestion = document.getElementById('U' + (<?php echo count($pertanyaans); ?>));

            if (currentQuestion && previousQuestion) {
                if (validatePilihan(previousQuestion)) {
                    previousQuestion.style.display = 'none';
                    currentQuestion.style.display = 'block';
                    document.getElementById('judul').style.display = 'none';
                    document.getElementById('garis').style.display = 'none';
                } else {
                    Swal.fire("Peringatan", "Pilih salah satu opsi sebelum melanjutkan.", "warning");
                }
            }
        }

        function validatePilihan(question) {
            var radioButtons = question.querySelectorAll('input[type="radio"]');
            for (var i = 0; i < radioButtons.length; i++) {
                if (radioButtons[i].checked) {
                    return true;
                }
            }
            return false;
        }

        function kembaliKePertanyaanSebelumnya(currentQuestionId, previousQuestionId) {
            var currentQuestion = document.getElementById(currentQuestionId);
            var previousQuestion = document.getElementById(previousQuestionId);
            document.getElementById('judul').style.display = 'block';
            document.getElementById('garis').style.display = 'block';

            if (currentQuestion && previousQuestion) {
                currentQuestion.style.display = 'none';
                previousQuestion.style.display = 'block';
                nomorPertanyaanAktif--;
                updateNomorPertanyaan();
            }
        }

        function submitSurvey() {
            var saran = document.getElementById("saran");
            var formPertanyaan = document.getElementById("formPertanyaan");

            if (validateForm()) {
                Swal.fire({
                    icon: 'success',
                    title: 'Survei Berhasil Dikirim',
                    text: 'Terima kasih telah mengisi survei.',
                    timer: 3000,
                    timerProgressBar: true,
                    showConfirmButton: false  
                }).then(() => {
                    formPertanyaan.submit();
                    formPertanyaan.reset();
                    saran.value = '';
                });
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal Mengirim Survei',
                    text: 'Mohon lengkapi formulir dengan benar sebelum mengirim survei.',
                    timer: 3000,
                    timerProgressBar: true,
                    showConfirmButton: false
                }).then(() => {
                    saran.value = '';
                    window.location.href = '/';
                });
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
