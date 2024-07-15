<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeliveBoo</title>
</head>
<body>
    <header style="background-color: #1F2D3A; color: white; padding: 20px; width: 100%;">
        <h1 style="color: #758C20; padding-left: 20px; padding">DeliveBoo</h1>
    </header>
<h1 style="padding-left: 20px;">Ordine effettuato, ecco un riepilogo:</h1>

@if($lead->order->orderProducts)
    <h2 style="padding-left: 20px;">Dettagli di acquisto</h2>
    @foreach($lead->order->orderProducts as $product)
    <div style="width: 300px; background-color: #faf0e6; padding: 10px; margin-left: 20px">
        <p>Prodotto: {{ $product->product_name }}</p>
        <p>Quantità: {{ $product->quantity }}</p>
        <p>Prezzo unitario: {{ $product->unit_price }} €</p>
    </div>
    @endforeach
@endif
<p style="padding-left: 20px;"><strong>Prezzo totale: {{ $lead->order->total_price }} €</strong></p>

<h2 style="padding-left: 20px;">Dettagli cliente</h2>
<div style="width: 300px; background-color: #faf0e6; padding: 10px; margin-left: 20px">
    <p>Nome: {{ $lead->order->customer_name }}</p>
    <p>Cognome: {{ $lead->order->customer_surname }}</p>
    <p>Email: {{ $lead->order->customer_email }}</p>
    <p>Numero di telefono: {{ $lead->order->customer_phone }}</p>
    <p>Indirizzo di consegna: {{ $lead->order->customer_address }}</p>
</div>
<!-- <footer style="background-color: #1F2D3A; color: white; padding: 20px; width: 100%;">
<div >
        <h5 style="text-align: center">Contatti</h5>
        <small style="text-align: center">Email: <a href="info@deliveboo.com">info@deliveboo.com</a></small><br>
        <small style="text-align: center">Tel: +39 123456789</small>
      </div>
      <div class="footer-section">
        <h3 style="text-align: center">Seguici anche su</h3>
        <div><i class="fa-brands fa-facebook"></i> | <i class="fa-brands fa-tiktok"></i> | <i class="fa-brands fa-instagram"></i></div>
      </div>
</footer> -->
</body>
</html>


