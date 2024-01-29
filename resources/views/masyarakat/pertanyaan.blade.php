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

        <form id="formPertanyaan" method="post"
        action="{{ route('layanan.survey.pertanyaan', ['id_tenant' => $layananData['nomor']] , 'id_responden' => session('id_responden')]) }}">
            @csrf
            <h2 id="judul" style="display: flex; justify-content: space-between; position: relative;">PERTANYAAN
                <p id="hitung"
                    style="text-align: right; margin: 0; font-size: 14px; position: absolute; bottom: 0; right: 0;">1
                    dari <?php echo count($pertanyaans); ?></p>
            </h2>
            <div id="garis" class="garis-horizontal"></div>
            <?php foreach ($pertanyaans as $index => $pertanyaan): ?>
            <input type="hidden" name="id_responden" value="{{ session('id_responden') }}">
            <div class="question" id="question_<?php echo $index + 1; ?>">
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

    <!-- SWEETALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        function tampilkanPertanyaan() {
            if (validateForm()) {
                document.getElementById('formPertanyaan').style.display = 'block';
                document.getElementById('question_1').style.display = 'block';
            }
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
            var previousQuestion = document.getElementById('question_' + (<?php echo count($pertanyaans); ?>));

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
                nomorPertanyaanAktif--;
                updateNomorPertanyaan();
            }
        }

        function submitSurvey() {
            var saran = document.getElementById("saran");
            var formPertanyaan = document.getElementById("formPertanyaan");

            if (validatePilihan(question)) {
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
                    formSurvey.reset();
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
