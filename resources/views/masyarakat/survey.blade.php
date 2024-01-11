<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Isi Survei</title>
    <link rel="shortcut icon" href="https://mpp.cimahikota.go.id/img/favicon.png" type="image/x-icon">

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
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama">

            <div class="double-column">
                <label for="tahun-lahir">Tahun Lahir:</label>
                <input class="asd" type="number" id="tahun-lahir" name="tahun-lahir" min="1900" max="2024">

                <label for="jenis-kelamin">Jenis Kelamin:</label>
                <select id="jenis-kelamin" name="jenis-kelamin">
                    <option value="" disabled selected>Pilih</option>
                    <option value="pria">Pria</option>
                    <option value="wanita">Wanita</option>
                </select>
            </div><br>

            <div class="double-column">
                <label for="nomor-antrian">Nomor Antrian:</label>
                <input class="asd" type="text" id="nomor-antrian" name="nomor-antrian">

                <label for="pendidikan">Riwayat Pendidikan:</label>
                <select id="pendidikan" name="pendidikan">
                    <option value="" disabled selected>Pilih</option>
                    <option value="sd">SD</option>
                    <option value="smp">SMP</option>
                    <option value="sma">SMA</option>
                    <option value="perguruan-tinggi">Perguruan Tinggi</option>
                </select>
            </div>
            <label for="kerjaan">Pekerjaan:</label>
            <select id="kerjaan" name="kerjaan">
                <option value="" disabled selected>Pilih</option>
                <option value="pegawai">Pegawai</option>
                <option value="pelajar">Pelajar</option>
                <option value="wirausaha">Wirausaha</option>
                <option value="lainnya">Lainnya</option>
            </select><br><br>
            <button class="btn-back" onclick="history.back()">Kembali</button>
            <button type="button" onclick="tampilkanPertanyaan()">Lanjutkan</button>
        </form>

        <form id="formPertanyaan" style="display: none;">
            <h2 id="judul">PERTANYAAN</h2>
            <div id="garis" class="garis-horizontal"></div>
            <div class="question" id="question_1">
                <!-- Pertanyaan 1 -->
                <p>Bagaimana Kemudahan Persyaratan Pelayanan?</p>
                <label class="radio-label" for="answer_1_1"> <input type="radio" id="answer_1_1" name="answer_1"
                        value=1>
                    <span>Tidak Mudah</span>
                </label>
                <label class="radio-label" for="answer_1_2"> <input type="radio" id="answer_1_2" name="answer_1"
                        value=2>
                    <span>Kurang Mudah</span>
                </label>
                <label class="radio-label" for="answer_1_3"> <input type="radio" id="answer_1_3" name="answer_1" value=3>
                    <span>Mudah</span>
                </label>
                <label class="radio-label" for="answer_1_4"> <input type="radio" id="answer_1_4" name="answer_1" value=4>
                    <span>Sangat Mudah</span>
                </label><br><br><br>
                <button class="btn-reset" type="button" onclick="resetPilihan()">Reset Pilihan</button>
                <button type="button"
                    onclick="tampilkanPertanyaanSelanjutnya('question_1', 'question_2')">Selanjutnya</button>
            </div>
            <div class="question" id="question_2" style="display: none;">
                <!-- Pertanyaan 2 -->
                <p>Bagaimana Kemudahan Prosedur Pelayanan?</p>

                <label for="answer_2_1"> <input type="radio" id="answer_2_1" name="answer_2" value=1> Tidak
                    Mudah</label>
                <label for="answer_2_2"> <input type="radio" id="answer_2_2" name="answer_2" value=2> Kurang
                    Mudah</label>
                <label for="answer_2_3"> <input type="radio" id="answer_2_3" name="answer_2" value=3>
                    Mudah</label>
                <label for="answer_2_4"> <input type="radio" id="answer_2_4" name="answer_2" value=4> Sangat
                    Mudah</label><br><br><br>
                <button class="btn-reset" type="button" onclick="resetPilihan()">Reset Pilihan</button>
                <button class="btn-back" type="button"
                    onclick="kembaliKePertanyaanSebelumnya('question_2', 'question_1')">Kembali</button>
                <button type="button"
                    onclick="tampilkanPertanyaanSelanjutnya('question_2', 'question_3')">Selanjutnya</button>
            </div>
            <div class="question" id="question_3" style="display: none;">
                <!-- Pertanyaan 3 -->
                <p>Bagaimana Kecepatan Pelayanan?</p>
                <label for="answer_3_1"> <input type="radio" id="answer_3_1" name="answer_3" value=1> Tidak
                    Cepat</label>
                <label for="answer_3_2"> <input type="radio" id="answer_3_2" name="answer_3" value=2> Kurang
                    Cepat</label>
                <label for="answer_3_3"> <input type="radio" id="answer_3_3" name="answer_3" value=3>
                    Cepat</label>
                <label for="answer_3_4"> <input type="radio" id="answer_3_4" name="answer_3" value=4> Sangat
                    Cepat</label><br><br><br>
                <button class="btn-reset" type="button" onclick="resetPilihan()">Reset Pilihan</button>
                <button class="btn-back" type="button"
                    onclick="kembaliKePertanyaanSebelumnya('question_3', 'question_2')">Kembali</button>
                <button type="button"
                    onclick="tampilkanPertanyaanSelanjutnya('question_3', 'question_4')">Selanjutnya</button>
            </div>
            <div class="question" id="question_4" style="display: none;">
                <!-- Pertanyaan 4 -->
                <p>Apakah Pelayanan dipungut Biaya?</p>
                <label for="answer_4_1"> <input type="radio" id="answer_4_1" name="answer_4" value=1> Sangat
                    Sering</label>
                <label for="answer_4_2"> <input type="radio" id="answer_4_2" name="answer_4" value=2>
                    Sering</label>
                <label for="answer_4_3"> <input type="radio" id="answer_4_3" name="answer_4" value=3>
                    Sesekali</label>
                <label for="answer_4_4"> <input type="radio" id="answer_4_4" name="answer_4" value=4> Tidak
                    Pernah</label><br><br><br>
                <button class="btn-reset" type="button" onclick="resetPilihan()">Reset Pilihan</button>
                <button class="btn-back" type="button"
                    onclick="kembaliKePertanyaanSebelumnya('question_4', 'question_3')">Kembali</button>
                <button type="button"
                    onclick="tampilkanPertanyaanSelanjutnya('question_4', 'question_5')">Selanjutnya</button>
            </div>

            <div class="question" id="question_5" style="display: none;">
                <!-- Pertanyaan 5 -->
                <p>Bagaimana Kualitas Administratif Pelayanan?</p>
                <label for="answer_5_1"> <input type="radio" id="answer_5_1" name="answer_5" value=1> Tidak
                    Berkualitas</label>
                <label for="answer_5_2"> <input type="radio" id="answer_5_2" name="answer_5" value=2> Kurang
                    Berkualitas</label>
                <label for="answer_5_3"> <input type="radio" id="answer_5_3" name="answer_5" value=3>
                    Berkualitas</label>
                <label for="answer_5_4"> <input type="radio" id="answer_5_4" name="answer_5" value=4> Sangat
                    Berkualitas</label><br><br><br>
                <button class="btn-reset" type="button" onclick="resetPilihan()">Reset Pilihan</button>
                <button class="btn-back" type="button"
                    onclick="kembaliKePertanyaanSebelumnya('question_5', 'question_4')">Kembali</button>
                <button type="button"
                    onclick="tampilkanPertanyaanSelanjutnya('question_5', 'question_6')">Selanjutnya</button>
            </div>

            <div class="question" id="question_6" style="display: none;">
                <!-- Pertanyaan 6 -->
                <p>Bagaimana Kemampuan Petugas Memberikan Pelayanan?</p>
                <label for="answer_6_1"> <input type="radio" id="answer_6_1" name="answer_6" value=1> Tidak
                    Kompeten</label>
                <label for="answer_6_2"> <input type="radio" id="answer_6_2" name="answer_6" value=2> Kurang
                    Kompeten</label>
                <label for="answer_6_3"> <input type="radio" id="answer_6_3" name="answer_6" value=3>
                    Kompeten</label>
                <label for="answer_6_4"> <input type="radio" id="answer_6_4" name="answer_6" value=4> Sangat
                    Kompeten</label><br><br><br>
                <button class="btn-reset" type="button" onclick="resetPilihan()">Reset Pilihan</button>
                <button class="btn-back" type="button"
                    onclick="kembaliKePertanyaanSebelumnya('question_6', 'question_5')">Kembali</button>
                <button type="button"
                    onclick="tampilkanPertanyaanSelanjutnya('question_6', 'question_7')">Selanjutnya</button>
            </div>

            <div class="question" id="question_7" style="display: none;">
                <!-- Pertanyaan 7 -->
                <p>Bagaimana Perilaku Petugas Pemberi Layanan?</p>
                <label for="answer_7_1"> <input type="radio" id="answer_7_1" name="answer_7" value=1> Tidak Sopan
                    dan Ramah</label>
                <label for="answer_7_2"> <input type="radio" id="answer_7_2" name="answer_7" value=2> Kurang Sopan
                    dan Ramah</label>
                <label for="answer_7_3"> <input type="radio" id="answer_7_3" name="answer_7" value=3> Sopan dan
                    Ramah</label>
                <label for="answer_7_4"> <input type="radio" id="answer_7_4" name="answer_7" value=4> Sangat Sopan
                    dan Ramah</label><br><br><br>
                <button class="btn-reset" type="button" onclick="resetPilihan()">Reset Pilihan</button>
                <button class="btn-back" type="button"
                    onclick="kembaliKePertanyaanSebelumnya('question_7', 'question_6')">Kembali</button>
                <button type="button"
                    onclick="tampilkanPertanyaanSelanjutnya('question_7', 'question_8')">Selanjutnya</button>
            </div>

            <div class="question" id="question_8" style="display: none;">
                <!-- Pertanyaan 8 -->
                <p>Bagaimana Kualitas Sarana dan Prasarana Layanan?</p>
                <label for="answer_8_1"> <input type="radio" id="answer_8_1" name="answer_8" value=1> Tidak
                    Nyaman</label>
                <label for="answer_8_2"> <input type="radio" id="answer_8_2" name="answer_8" value=2> Cukup
                    Nyaman</label>
                <label for="answer_8_3"> <input type="radio" id="answer_8_3" name="answer_8" value=3>
                    Nyaman</label>
                <label for="answer_8_4"> <input type="radio" id="answer_8_4" name="answer_8" value=4> Sangat
                    Nyaman</label><br><br><br>
                <button class="btn-reset" type="button" onclick="resetPilihan()">Reset Pilihan</button>
                <button class="btn-back" type="button"
                    onclick="kembaliKePertanyaanSebelumnya('question_8', 'question_7')">Kembali</button>
                <button type="button"
                    onclick="tampilkanPertanyaanSelanjutnya('question_8', 'question_9')">Selanjutnya</button>
            </div>

            <div class="question" id="question_9" style="display: none;">
                <!-- Pertanyaan 9 -->
                <p>Bagaimana Kelengkapan Media Penanganan dalam Layanan? (Informasi Website, Informasi Persyaratan,
                    Instagram, Banner/Pamflet, dan Media Sosial Lainnya)</p>
                <label for="answer_9_1"> <input type="radio" id="answer_9_1" name="answer_9" value=1> Sangat Tidak
                    Lengkap</label>
                <label for="answer_9_2"> <input type="radio" id="answer_9_2" name="answer_9" value=2> Kurang
                    Lengkap</label>
                <label for="answer_9_3"> <input type="radio" id="answer_9_3" name="answer_9" value=3>
                    Lengkap</label>
                <label for="answer_9_4"> <input type="radio" id="answer_9_4" name="answer_9" value=4> Sangat
                    Lengkap</label><br><br><br>
                <button class="btn-reset" type="button" onclick="resetPilihan()">Reset Pilihan</button>
                <button class="btn-back" type="button"
                    onclick="kembaliKePertanyaanSebelumnya('question_9', 'question_8')">Kembali</button>
                <button type="button"
                    onclick="tampilkanPertanyaanTerakhir('question_9', 'kritik_saran')">Selanjutnya</button>
            </div>

            <div class="question" id="kritik_saran" style="display: none;">
                {{-- <h2>SARAN</h2> --}}
                <label for="saran"><strong>SARAN:</strong></label>
                <textarea id="saran" name="saran" rows="4" cols="50"></textarea><br><br><br>
                <button class="btn-back" type="button"
                    onclick="kembaliKePertanyaanSebelumnya('kritik_saran', 'question_9')">Kembali</button>
                <button type="button" onclick="submitSurvey()">Kirim Survey</button>
            </div>
        </form>
    </div>

    <!-- Bagian HTML untuk tampilan terima kasih -->
    <div class="question" id="terima_kasih" style="display: none;">
        <h2>Terima Kasih!</h2>
        <p>Terima kasih telah mengisi survei.</p>
        <p id="countdown">Kembali ke halaman awal dalam <span id="timer">3</span> detik.</p>
    </div>


    <script>
        function validateForm() {
            var inputNama = document.getElementById("nama").value;
            var inputYear = document.getElementById("tahun-lahir").value;
            var inputJenisKelamin = document.getElementById("jenis-kelamin").value;
            var inputNomorAntrian = document.getElementById("nomor-antrian").value;
            var inputKerjaan = document.getElementById("kerjaan").value;
            var inputPendidikan = document.getElementById("pendidikan").value;
            var currentYear = new Date().getFullYear();

            if (inputNama.trim() === "") {
                alert("Nama harus diisi");
                return false;
            }

            if (inputYear < 1900 || inputYear > currentYear) {
                alert("Tahun lahir harus di antara 1900 dan " + currentYear);
                return false;
            }

            if (inputJenisKelamin === "") {
                alert("Jenis kelamin harus dipilih");
                return false;
            }

            if (inputNomorAntrian.trim() === "") {
                alert("Nomor antrian harus diisi");
                return false;
            }


            if (inputPendidikan === "") {
                alert("Riwayat pendidikan harus dipilih");
                return false;
            }

            if (inputKerjaan === "") {
                alert("Pekerjaan harus dipilih");
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
                    nextQuestion.style.display = 'block'; // Tampilkan pertanyaan selanjutnya
                    hapusTandaBiru(currentQuestion);
                } else {
                    alert("Pilih salah satu opsi sebelum melanjutkan.");
                }
            }
        }

        function tampilkanPertanyaanTerakhir(currentQuestionId, nextQuestionId) {
            var currentQuestion = document.getElementById(currentQuestionId);
            var nextQuestion = document.getElementById(nextQuestionId);

            if (currentQuestion && nextQuestion) {
                if (validatePilihan(currentQuestion)) {
                    currentQuestion.style.display = 'none'; // Sembunyikan pertanyaan saat ini
                    nextQuestion.style.display = 'block'; // Tampilkan pertanyaan selanjutnya
                    hapusTandaBiru(currentQuestion);
                    document.getElementById('judul').style.display = 'none';
                    document.getElementById('garis').style.display = 'none';
                } else {
                    alert("Pilih salah satu opsi sebelum melanjutkan.");
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

        function hapusTandaBiru(question) {
            var radioButtons = question.querySelectorAll('input[type="radio"]');
            for (var i = 0; i < radioButtons.length; i++) {
                radioButtons[i].classList.remove('selected');
            }
        }

        // Tambahkan event listener untuk menambahkan efek tanda biru saat memilih opsi
        document.getElementById('formPertanyaan').addEventListener('change', function(event) {
            if (event.target.type === 'radio') {
                var selectedRadio = event.target;
                var question = selectedRadio.closest('.question');
                hapusTandaBiru(question);

                if (!selectedRadio.classList.contains('selected')) {
                    selectedRadio.classList.add('selected');
                } else {
                    selectedRadio.checked = false;
                }
            }
        });

        function resetPilihan() {
            var questions = document.querySelectorAll('.question');
            questions.forEach(function(question) {
                var radioButtons = question.querySelectorAll('input[type="radio"]');
                radioButtons.forEach(function(radioButton) {
                    radioButton.checked = false;
                    radioButton.classList.remove('selected');
                });
            });
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
            // ... (Proses pengiriman survei ke server atau operasi lainnya)

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
                    // Kode untuk kembali ke halaman awal atau halaman lain setelah hitungan mundur selesai
                    window.location.href = "/"; // Ganti dengan halaman awal yang sesuai
                }
            }, 1000); // Waktu pengurangan 1 detik

        }
    </script>


</body>

</html>
