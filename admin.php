<?php
$config_file = 'config.php';
include($config_file);

// ŞİFRE KONTROLÜ (Bunu değiştir!)
$admin_sifre = "mast123"; 

if (isset($_POST['guncelle'])) {
    // Burada config.php dosyasını güncelleyen sihirli bir kod hazırlayacağız
    // Şimdilik sadece sistemi kuruyoruz.
    echo "<div style='background:green;color:white;padding:10px;'>Fiyatlar Güncellendi! (Test Modu)</div>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Mast Admin</title>
    <style>
        body { font-family: sans-serif; padding: 50px; background: #eee; }
        .panel { background: #fff; padding: 20px; border: 3px solid #000; max-width: 500px; margin: auto; }
        input { width: 100%; padding: 10px; margin: 10px 0; border: 2px solid #000; }
        button { background: #000; color: #fff; padding: 15px; width: 100%; cursor: pointer; font-weight: bold; }
    </style>
</head>
<body>
    <div class="panel">
        <h2>MAST YÖNETİM PANELİ</h2>
        <form method="post">
            <p>Admin Şifresi:</p>
            <input type="password" name="sifre">
            <hr>
            <p>Yoğurt 1000ml Fiyat (R$):</p>
            <input type="text" name="y1000" value="20.00">
            <p>Arroz Doce G Fiyat (R$):</p>
            <input type="text" name="aG" value="20.00">
            <button type="submit" name="guncelle">FİYATLARI KAYDET</button>
        </form>
    </div>
</body>
</html>
