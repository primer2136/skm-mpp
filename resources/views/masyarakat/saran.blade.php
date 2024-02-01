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
        <form id="formSaran" method="post"
            action="{{ route('layanan.survey.submitsaran', ['id_tenant' => $layananData['nomor'], 'id_responden' => session('id_responden')]) }}">
            @csrf
            <div class="question" id="kritik_saran" style="display: block;">
                <label for="saran"><strong>SARAN:</strong></label>
                <textarea id="saran" name="saran" rows="4" cols="50"></textarea><br><br><br>
                {{-- <button class="btn-back" type="button" onclick="kembaliKeHalamanSebelumnya()">Kembali</button> --}}
                <button class="btn-next" type="button" onclick="submitSurvey()">Kirim Survey</button>
            </div>
        </form>
    </div>

    <!-- SWEETALERT -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        var surveySubmitted = false;

        function submitSurvey() {
            var formSaran = document.getElementById("formSaran");
            var saran = document.getElementById("saran").value.trim();

            // Konfirmasi pengiriman survei
            Swal.fire({
                icon: 'question',
                title: 'Konfirmasi',
                text: 'Apakah Anda yakin ingin mengirim survei?',
                showCancelButton: true,
                confirmButtonText: 'Ya, Kirim',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Mengirim survei tanpa memeriksa saran
                    Swal.fire({
                        icon: 'success',
                        title: 'Survei Berhasil Dikirim',
                        text: 'Terima kasih telah mengisi survei.',
                        timer: 3000,
                        timerProgressBar: true,
                        showConfirmButton: false
                    }).then(() => {
                        surveySubmitted = true;
                        // Membersihkan riwayat perambanan
                        window.history.replaceState({}, document.title, "/");
                        // Mengarahkan kembali ke halaman home
                        window.location.href = "/";
                        formSaran.submit();
                    });
                }
            });
        }

        function kembaliKeHalamanSebelumnya() {
            window.history.back(); // Kembali ke halaman sebelumnya dalam riwayat peramban
        }
    </script>


</body>

</html>
