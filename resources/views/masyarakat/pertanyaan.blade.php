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
        <form action="#">
            <h2>DATA RESPONDEN</h2>

            const surveyJson = {
            pages: [{
            elements: [{
            name: "satisfaction-score",
            title: "How would you describe your experience with our product?",
            type: "radiogroup",
            choices: [
            { value: 5, text: "Fully satisfying" },
            { value: 4, text: "Generally satisfying" },
            { value: 3, text: "Neutral" },
            { value: 2, text: "Rather unsatisfying" },
            { value: 1, text: "Not satisfying at all" }
            ],
            isRequired: true
            }]
            }, {
            elements: [{
            name: "what-would-make-you-more-satisfied",
            title: "What can we do to make your experience more satisfying?",
            type: "comment",
            }, {
            name: "nps-score",
            title: "On a scale of zero to ten, how likely are you to recommend our product to a friend or colleague?",
            type: "rating",
            rateMin: 0,
            rateMax: 10
            }],
            }, {
            elements: [{
            name: "how-can-we-improve",
            title: "In your opinion, how could we improve our product?",
            type: "comment"
            }],
            }, {
            elements: [{
            name: "disappointing-experience",
            title: "Please let us know why you had such a disappointing experience with our product",
            type: "comment"
            }],
            }]
            };

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
