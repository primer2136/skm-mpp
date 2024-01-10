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
        <form id="formSurvey">
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

            <button type="button" onclick="tampilkanPertanyaan()">Lanjutkan</button>
        </form>

        <form id="formPertanyaan" style="display: none;">
            <h2>Pertanyaan</h2>
            <div class="question" id="question_1">
                <!-- Pertanyaan 1 -->
                <p>Pertanyaan 1: Bagaimana pendapat Anda mengenai layanan yang diberikan?</p>
                <input type="radio" id="answer_1_1" name="answer_1" value="Sangat Baik">
                <label for="answer_1_1">Sangat Baik</label><br>
                <input type="radio" id="answer_1_2" name="answer_1" value="Baik">
                <label for="answer_1_2">Baik</label><br>
                <input type="radio" id="answer_1_3" name="answer_1" value="Cukup">
                <label for="answer_1_3">Cukup</label><br>
                <input type="radio" id="answer_1_4" name="answer_1" value="Buruk">
                <label for="answer_1_4">Buruk</label><br>
                <button type="button"
                    onclick="tampilkanPertanyaanSelanjutnya('question_1', 'question_2')">Selanjutnya</button>
            </div>
            <div class="question" id="question_2" style="display: none;">
                <!-- Pertanyaan 2 -->
                <p>Pertanyaan 2: Apakah Anda merasa puas dengan produk yang kami tawarkan?</p>
                <input type="radio" id="answer_2_1" name="answer_2" value="Sangat Puas">
                <label for="answer_2_1">Sangat Puas</label><br>
                <input type="radio" id="answer_2_2" name="answer_2" value="Puas">
                <label for="answer_2_2">Puas</label><br>
                <input type="radio" id="answer_2_3" name="answer_2" value="Kurang Puas">
                <label for="answer_2_3">Kurang Puas</label><br>
                <input type="radio" id="answer_2_4" name="answer_2" value="Tidak Puas">
                <label for="answer_2_4">Tidak Puas</label><br>
                <button type="button"
                    onclick="tampilkanPertanyaanSelanjutnya('question_2', 'question_3')">Selanjutnya</button>
            </div>
            <div class="question" id="question_3" style="display: none;">
                <!-- Pertanyaan 3 -->
                <p>Pertanyaan 3: Seberapa sering Anda menggunakan layanan kami?</p>
                <input type="radio" id="answer_3_1" name="answer_3" value="Setiap Hari">
                <label for="answer_3_1">Setiap Hari</label><br>
                <input type="radio" id="answer_3_2" name="answer_3" value="Beberapa Kali dalam Seminggu">
                <label for="answer_3_2">Beberapa Kali dalam Seminggu</label><br>
                <input type="radio" id="answer_3_3" name="answer_3" value="Sekali dalam Sebulan">
                <label for="answer_3_3">Sekali dalam Sebulan</label><br>
                <input type="radio" id="answer_3_4" name="answer_3" value="Jarang">
                <label for="answer_3_4">Jarang</label><br>
                <button type="button"
                    onclick="tampilkanPertanyaanSelanjutnya('question_3', 'question_4')">Selanjutnya</button>
            </div>
            <div class="question" id="question_4" style="display: none;">
                <!-- Pertanyaan 4 -->
                <p>Pertanyaan 4: Seberapa sering Anda menggunakan layanan kami?</p>
                <input type="radio" id="answer_4_1" name="answer_4" value="Setiap Hari">
                <label for="answer_4_1">Setiap Hari</label><br>
                <input type="radio" id="answer_4_2" name="answer_4" value="Beberapa Kali dalam Seminggu">
                <label for="answer_4_2">Beberapa Kali dalam Seminggu</label><br>
                <input type="radio" id="answer_4_3" name="answer_4" value="Sekali dalam Sebulan">
                <label for="answer_4_3">Sekali dalam Sebulan</label><br>
                <input type="radio" id="answer_4_4" name="answer_4" value="Jarang">
                <label for="answer_4_4">Jarang</label><br>
                <button type="button"
                    onclick="tampilkanPertanyaanSelanjutnya('question_4', 'question_5')">Selanjutnya</button>
            </div>
            <button type="button" onclick="resetPilihan()">Reset Pilihan</button>
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
    </script>


</body>

</html>
