<?php include('config.php'); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>MAST IOGURTE | Dinâmico</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Playfair+Display:wght@900&family=Poppins:wght@400;600;700&family=Courier+Prime:wght@700&display=swap');
        :root { --bg: #fdfaf5; --ink: #1a1a1a; --wa: #25d366; --red: #d63031; --beige: #EBD8B8; }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { background-color: var(--bg); color: var(--ink); font-family: 'Poppins', sans-serif; }
        .header { background: var(--beige); padding: 15px 5%; display: flex; align-items: center; justify-content: space-between; position: sticky; top: 0; z-index: 5000; border-bottom: 3px solid #000; }
        .header-left { display: flex; align-items: center; border: 2px solid #000; padding: 5px 15px; background: #fff; border-radius: 5px; }
        .logo-box { width: 45px; height: 45px; border-radius: 50%; border: 2px solid #000; margin-right: 12px; display: flex; align-items: center; justify-content: center; font-weight: 900; background: var(--bg); }
        .container { max-width: 1200px; margin: 0 auto; display: grid; grid-template-columns: 1fr 380px; gap: 40px; padding: 30px 15px 150px; }
        .section-title { font-family: 'Playfair Display', serif; font-size: 2rem; border-bottom: 5px solid #000; display: inline-block; margin: 30px 0 20px; }
        .grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px; }
        .card { background: #fff; border: 2px solid #000; padding: 15px; text-align: center; position: relative; }
        .img-box { width: 100%; aspect-ratio: 1; margin-bottom: 12px; border: 1px solid #000; overflow: hidden; }
        .img-box img { width: 100%; height: 100%; object-fit: cover; }
        .price { color: var(--red); font-weight: 900; font-size: 1.5rem; margin-bottom: 10px; }
        .add-btn { background: #000; color: #fff; border: none; padding: 10px; width: 100%; font-weight: 700; cursor: pointer; }
        .receipt { background: #fff; border: 5px solid #000; padding: 25px; font-family: 'Courier Prime', monospace; position: sticky; top: 100px; }
        .bairro-sel { width: 100%; padding: 10px; font-family: 'Courier Prime'; border: 2px solid #000; margin-bottom: 15px; font-weight: 700; }
        @media (max-width: 950px) { .container { grid-template-columns: 1fr; } .desktop-sidebar { display: none; } }
    </style>
</head>
<body>

<header class="header">
    <div class="header-left"><div class="logo-box">MAST</div><h1>MAST IOGURTE</h1></div>
</header>

<div class="container">
    <main>
        <?php foreach($urunler as $key => $kat): ?>
            <h2 class="section-title"><?php echo $kat['baslik']; ?></h2>
            <div class="grid">
                <?php foreach($kat['cesitler'] as $item): ?>
                <div class="card">
                    <div class="img-box"><img src="<?php echo $kat['resim']; ?>"></div>
                    <h3><?php echo $item['ad']; ?></h3>
                    <div class="price">R$ <?php echo number_format($item['fiyat'], 2, ',', '.'); ?></div>
                    <button class="add-btn" onclick="add('<?php echo $item['ad']; ?>', <?php echo $item['fiyat']; ?>)">ADICIONAR +</button>
                </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </main>

    <aside class="desktop-sidebar">
        <div class="receipt">
            <h2 style="text-align:center; border-bottom:2px dashed #000; padding-bottom:10px;">RECIBO</h2>
            <select class="bairro-sel" id="frete" onchange="upd()">
                <?php foreach($bolgeler as $b): ?>
                    <option value="<?php echo $b['ucret']; ?>"><?php echo $b['ad']; ?> - R$ <?php echo $b['ucret']; ?></option>
                <?php endforeach; ?>
            </select>
            <div id="lista" style="min-height:80px; margin-bottom:15px;"></div>
            <div style="border-top:3px solid #000; padding-top:15px; font-size:1.5rem; font-weight:900; display:flex; justify-content:space-between;">
                <span>TOTAL:</span><span id="total">R$ 0,00</span>
            </div>
            <button class="add-btn" style="background:var(--wa); margin-top:20px;" onclick="send()">ENVIAR WHATSAPP</button>
        </div>
    </aside>
</div>

<script>
    let cart = [];
    function add(n, p) { cart.push({n, p}); upd(); }
    function upd() {
        const list = document.getElementById('lista');
        const fee = parseFloat(document.getElementById('frete').value);
        let sub = 0; let html = "";
        cart.forEach(i => { sub += i.p; html += `<div style="display:flex;justify-content:space-between"><span>${i.n}</span><span>R$ ${i.p.toFixed(2)}</span></div>`; });
        list.innerHTML = cart.length ? html : "Vazio";
        document.getElementById('total').innerText = `R$ ${(sub + fee).toFixed(2)}`;
    }
    function send() {
        if(!cart.length) return alert("Vazio!");
        let m = "*PEDIDO MAST*%0A";
        cart.forEach(i => m += `• ${i.n}: R$ ${i.p.toFixed(2)}%0A`);
        m += `%0A💰 *TOTAL:* ${document.getElementById('total').innerText}`;
        window.open(`https://wa.me/<?php echo $whatsapp_no; ?>?text=${m}`, '_blank');
    }
</script>
</body>
</html>
