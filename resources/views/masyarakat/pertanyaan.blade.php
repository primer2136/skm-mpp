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
            action="{{ route('layanan.survey.submitjawaban', ['id_tenant' => $layananData['nomor'], 'id_responden' => session('id_responden')]) }}">
            @csrf
            <h2 id="judul" style="display: flex; justify-content: space-between; position: relative;">PERTANYAAN
                <p id="hitung"
                    style="text-align: right; margin: 0; font-size: 14px; position: absolute; bottom: 0; right: 0;">1
                    dari <?php echo count($pertanyaans); ?></p>
            </h2>
            <div id="garis" class="garis-horizontal"></div>
            @foreach ($pertanyaans as $index => $pertanyaan)
                <div class="question" id="U{{ $index + 1 }}" style="display:none;">
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
                    <button class="btn-next" type="button" onclick="<?php echo $index === count($pertanyaans) - 1 ? 'submitPertanyaan()' : 'tampilkanPertanyaanSelanjutnya(\'U' . ($index + 1) . '\', \'U' . ($index + 2) . '\')'; ?>">
                        Selanjutnya
                    </button>
                </div>
            @endforeach
        </form>
    </div>

    <!-- SWEETALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        window.onload = function() {
            var questions = document.querySelectorAll('.question');
            for (var i = 1; i < questions.length; i++) {
                questions[i].style.display = 'none';
            }
            questions[0].style.display = 'block';
        };

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

        var surveySubmitted = false;

        function submitPertanyaan() {
            var formPertanyaan = document.getElementById("formPertanyaan");

            if (validatePilihan(document.getElementById('formPertanyaan'))) {
                surveySubmitted = true;
                // Membersihkan riwayat perambanan
                window.history.replaceState({}, document.title, "/");
                // Mengarahkan kembali ke halaman home
                window.location.href = "/";
                formPertanyaan.submit();
                formPertanyaan.reset();
            }
        }


        window.addEventListener('beforeunload', function(e) {
            if (!surveySubmitted) {
                e.preventDefault();

                // Lakukan pengiriman permintaan HTTP ke endpoint yang akan menghapus id_responden
                var id_responden = <?php echo session('id_responden'); ?>;
                if (id_responden) {
                    fetch('/hapus-responden/' + id_responden, {
                            method: 'DELETE',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            }
                        })
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Gagal menghapus id_responden');
                            }
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                }
            }
        });
    </script>


</body>

</html>
