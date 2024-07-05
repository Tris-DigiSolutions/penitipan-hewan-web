<!DOCTYPE html>
<html lang="en">

<head>
    <title>Terms and Conditions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            padding: 20px;
            margin: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        h2 {
            color: #333;
        }

        p {
            color: #666;
        }

        .btn-back {
            display: block;
            width: 100px;
            margin: 20px auto;
            padding: 10px;
            text-align: center;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            cursor: pointer;
            outline: none
        }

        .btn-back:hover {
            background-color: #45a049;
        }
    </style>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</head>

<body>

    <div class="container">
        <h1>Terms and Conditions</h1>

        <div class="form-group">
            <label><i class="fas fa-clipboard-check"></i> Persetujuan dan Ketentuan</label>
            <div class="form-check">
                <ul class="mt-2">
                    <li>Hewan dalam kondisi sehat dan tidak menular</li>
                    <li>Hewan tidak memiliki perilaku agresif</li>
                    <li>Pemilik bertanggung jawab atas kerusakan yang ditimbulkan hewan</li>
                    <li>Penitipan hewan berhak menolak hewan yang tidak sesuai dengan syarat dan ketentuan</li>
                </ul>
            </div>
        </div>
        <div class="form-group">
            <label><i class="fas fa-lightbulb"></i> Tips:</label>
            <ul>
                <li>Baca dengan cermat syarat dan ketentuan penitipan hewan sebelum mengisi formulir.</li>
                <li>Pastikan semua informasi yang Anda berikan akurat dan lengkap.</li>
                <li>Tanyakan kepada penitipan hewan jika Anda memiliki pertanyaan atau keraguan.</li>
            </ul>
        </div>

        <button class="btn-back" onclick="goBack()">Back</button>
    </div>

</body>

</html>