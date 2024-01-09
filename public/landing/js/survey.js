let currentQuestion = 1;

function nextQuestion(questionNumber) {
  document.getElementById(`question${currentQuestion}`).style.display = 'none';
  currentQuestion = questionNumber + 1;
  if (currentQuestion <= 3) {
    document.getElementById(`question${currentQuestion}`).style.display = 'block';
  } else {
    // Jika pertanyaan terakhir telah selesai, bisa melakukan sesuatu (misalnya, menampilkan pesan terima kasih)
    alert('Terima kasih telah menjawab semua pertanyaan!');
    // Atau bisa redirect ke halaman lain
    // window.location.href = 'halaman-terima-kasih.html';
  }
}
