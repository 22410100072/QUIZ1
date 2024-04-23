<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="kuis.css">
    <title>Hitung Volume dan Luas Permukaan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            text-align: center;
            margin-top: 50px;
        }
        label {
            display: inline-block;
            width: 150px;
            text-align: left;
        }
        input[type="checkbox"] {
            display: inline-block;
            vertical-align: middle;
            margin-right: 10px;
        }
        input[type="number"] {
            width: 100px;
            padding: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        input[type="button"] {
            padding: 10px 20px;
            margin-top: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            background-color: #007bff;
            color: white;
        }
        input[type="button"]:hover {
            background-color: #0056b3;
        }
        #hasil {
            width: 200px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            text-align: center;
            margin-top: 20px;
            background-color: #f0f0f0;
        }
        #inputBalok, #inputKubus, #inputTabung {
            display: none;
        }
    </style>
</head>
<body>
    <h2>Hitung Volume dan Luas Permukaan</h2>
    <form>
        <label for="vbalok"><input type="checkbox" id="vbalok" name="volume">Volume Balok</label><br>
        <label for="vkubus"><input type="checkbox" id="vkubus" name="volume">Volume Kubus</label><br>
        <label for="vtabung"><input type="checkbox" id="vtabung" name="volume">Volume Tabung</label><br>
        <label for="lbalok"><input type="checkbox" id="lbalok" name="luas">Luas Balok</label><br>
        <label for="lkubus"><input type="checkbox" id="lkubus" name="luas">Luas Kubus</label><br>
        <label for="ltabung"><input type="checkbox" id="ltabung" name="luas">Luas Tabung</label><br><br>

        <div id="inputBalok">
            <label for="panjang">Panjang:</label>
            <input type="number" id="panjang" name="panjang"><br>
            <label for="lebar">Lebar:</label>
            <input type="number" id="lebar" name="lebar"><br>
            <label for="tinggi">Tinggi:</label>
            <input type="number" id="tinggi" name="tinggi"><br>
        </div>

        <div id="inputKubus">
            <label for="sisi">Sisi:</label>
            <input type="number" id="sisi" name="sisi"><br>
        </div>

        <div id="inputTabung">
            <label for="phi">Phi:</label>
            <input type="number" id="phi" name="phi"><br>
            <label for="jari_jari">Jari-jari:</label>
            <input type="number" id="jari_jari" name="jari_jari"><br>
            <label for="tinggi_tabung">Tinggi:</label>
            <input type="number" id="tinggi_tabung" name="tinggi_tabung"><br>
        </div>

        <input type="button" value="Hitung" onclick="hitung()"><br><br>

        <input type="text" id="hasil" name="hasil" placeholder="Hasil Perhitungan" readonly>
    </form>

    <script>
        function hitung() {
            let checkboxes_volume = document.querySelectorAll('input[name="volume"]:checked');
            let checkboxes_luas = document.querySelectorAll('input[name="luas"]:checked');

            if (checkboxes_volume.length + checkboxes_luas.length !== 1) {
                alert("Harap pilih satu jenis operasi (Volume atau Luas Permukaan) untuk perhitungan.");
                return;
            }

            let p = document.getElementById("hasil");

            if (document.getElementById('vbalok').checked) {
                let panjang = parseFloat(document.getElementById("panjang").value);
                let lebar = parseFloat(document.getElementById("lebar").value);
                let tinggi = parseFloat(document.getElementById("tinggi").value);
                let volume = panjang * lebar * tinggi;
                p.value = volume;
            } else if (document.getElementById('vkubus').checked) {
                let sisi = parseFloat(document.getElementById("sisi").value);
                let volume = sisi * sisi * sisi;
                p.value = volume;
            } else if (document.getElementById('vtabung').checked) {
                let phi = parseFloat(document.getElementById("phi").value);
                let jari_jari = parseFloat(document.getElementById("jari_jari").value);
                let tinggi_tabung = parseFloat(document.getElementById("tinggi_tabung").value);
                let volume = phi * jari_jari * jari_jari * tinggi_tabung;
                p.value = volume;
            } else if (document.getElementById('lbalok').checked) {
                let panjang = parseFloat(document.getElementById("panjang").value);
                let lebar = parseFloat(document.getElementById("lebar").value);
                let tinggi = parseFloat(document.getElementById("tinggi").value);
                let luas = 2 * ((panjang * lebar) + (panjang * tinggi) + (lebar * tinggi));
                p.value = luas;
            } else if (document.getElementById('lkubus').checked) {
                let sisi = parseFloat(document.getElementById("sisi").value);
                let luas = 6 * (sisi * sisi);
                p.value = luas;
            } else if (document.getElementById('ltabung').checked) {
                let phi = parseFloat(document.getElementById("phi").value);
                let jari_jari = parseFloat(document.getElementById("jari_jari").value);
                let tinggi_tabung = parseFloat(document.getElementById("tinggi_tabung").value);
                let luas_permukaan_tabung = 2 * phi * jari_jari * (jari_jari + tinggi_tabung);
                p.value = luas_permukaan_tabung;
            } else {
                p.value = "Silakan centang Volume atau Luas Permukaan untuk Balok, Kubus, atau Tabung.";
            }
        }

        document.getElementById("vbalok").addEventListener("change", function() {
            document.getElementById("inputBalok").style.display = this.checked ? "block" : "none";
        });

        document.getElementById("vkubus").addEventListener("change", function() {
            document.getElementById("inputKubus").style.display = this.checked ? "block" : "none";
        });

        document.getElementById("vtabung").addEventListener("change", function() {
            document.getElementById("inputTabung").style.display = this.checked ? "block" : "none";
        });

        document.getElementById("lbalok").addEventListener("change", function() {
            document.getElementById("inputBalok").style.display = this.checked ? "block" : "none";
        });

        document.getElementById("lkubus").addEventListener("change", function() {
            document.getElementById("inputKubus").style.display = this.checked ? "block" : "none";
        });

        document.getElementById("ltabung").addEventListener("change", function() {
            document.getElementById("inputTabung").style.display = this.checked ? "block" : "none";
        });
    </script>
</body>
</html>
