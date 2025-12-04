<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Checkout</title>

<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;600&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

<style>
    body {
        margin: 0;
        background: #ffffff;
        font-family: 'Poppins', sans-serif;
    }
    h1, h2 { font-family: 'Playfair Display', serif; letter-spacing: 1px; }

    .container {
        max-width: 1300px;
        margin: 40px auto;
        display: grid;
        grid-template-columns: 420px 1fr;
        gap: 40px;
        padding: 0 20px;
    }

    .product-image img { width: 100%; border-radius: 4px; }
    .price { font-size: 28px; font-weight: 600; margin-top: 10px; }

    /* ======================== */
    /*      CSS SELECTABLE      */
    /* ======================== */

    input[type="radio"] { display: none; }

    /* SIZE */
    .size-label {
        padding: 7px 15px;
        border: 1px solid #b8b7b7;
        border-radius: 6px;
        background: #fff;
        cursor: pointer;
        font-size: 16px;
        transition: 0.2s;
        margin-right: 5px;
        display: inline-block;
    }
    input[type="radio"]:checked + .size-label {
        background: #eee;
        border-color: #000;
        font-weight: 600;
    }

    /* PAYMENT */
    .payment-label {
        padding: 10px 18px;
        background: #f5f5f5;
        border: 1px solid #bbb;
        border-radius: 6px;
        cursor: pointer;
        display: inline-block;
        margin-right: 8px;
        margin-top: 10px;
    }
    input[type="radio"]:checked + .payment-label {
        background: #e8e8e8;
        border-color: #000;
        font-weight: 600;
    }

    /* SHIPPING */
    .shipping-label {
        border: 1px solid #d0d0d0;
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 15px;
        cursor: pointer;
        display: block;
    }
    input[type="radio"]:checked + .shipping-label {
        border-color: #8c6e6f;
        background: #faf3f3;
    }

    input[type="text"], input[type="tel"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #c9c9c9;
        border-radius: 6px;
        font-size: 14px;
    }

    .checkout-btn {
        width: 180px;
        background: #4C72B0;
        color: white;
        font-weight: 600;
        border: none;
        padding: 12px;
        border-radius: 8px;
        cursor: pointer;
        font-size: 16px;
        margin-top: 10px;
    }

    .endbut{
        margin-top:35;
    }
    

</style>
</head>
<body>

@include('layouts.navbar')

@php
    $subtotal = $produk->harga;
    $shippingCost = 0;
    $total = $subtotal + $shippingCost;
    $sizes = [37, 38, 39, 40];
@endphp

<div class="container">

    <!-- LEFT -->
    <div>
        <h1 style="font-size:26px; margin-bottom:20px;">{{ $produk->nama_produk }}</h1>

        <div class="product-image">
            <img src="{{ asset('storage/' . $produk->foto) }}"
                    class="product-image"
                    alt="{{ $produk->nama_produk }}">
        </div>

        <div style="color:gold; margin-top:10px; font-size:20px;">★★★★☆</div>

        <div class="price">
            Rp {{ number_format($produk->harga,0,',','.') }}
        </div>

        <p style="margin-top:18px; font-size:15px;">Ukuran:</p>

        @foreach($sizes as $s)
            <input type="radio" id="size{{ $s }}" name="size">
            <label class="size-label" for="size{{ $s }}">{{ $s }}</label>
        @endforeach
    </div>

    <!-- RIGHT -->
    <div>
        <div class="summary-box">
            <h2 style="font-size:18px; text-align:center;">RINGKASAN PEMBAYARAN</h2>

            <table>
                <tr>
                    <td>Subtotal</td>
                    <td style="text-align:right;">Rp {{ number_format($subtotal,0,',','.') }}</td>
                </tr>
                <tr>
                    <td>Pengiriman</td>
                    <td style="text-align:right;">GRATIS</td>
                </tr>
                <tr><td colspan="2"><hr></td></tr>
                <tr>
                    <td style="font-weight:600;">Jumlah</td>
                    <td style="text-align:right; font-size:18px; font-weight:700;">
                        Rp {{ number_format($total,0,',','.') }}
                    </td>
                </tr>
            </table>

            <p style="margin-top:15px; font-weight:600;">Pembayaran Melalui</p>

            <input type="radio" id="pay1" name="payment" checked>
            <label class="payment-label" for="pay1">Virtual Account</label>

            <input type="radio" id="pay2" name="payment">
            <label class="payment-label" for="pay2">Go-Pay</label>

            <input type="radio" id="pay3" name="payment">
            <label class="payment-label" for="pay3">Kartu Kredit</label>

            <input type="radio" id="pay4" name="payment">
            <label class="payment-label" for="pay4">Shopee Pay</label>
        </div>

        <h3 style="font-size:17px;">METODE PENGIRIMAN</h3>

        <input type="radio" id="ship1" name="ship" checked>
        <label class="shipping-label" for="ship1">
            <strong>STANDAR</strong>
            <span style="float:right; color:#7b5557;">GRATIS</span>
            <p style="font-size:12px;">Pengiriman 3-5 hari kerja.</p>
        </label>

        <input type="radio" id="ship2" name="ship">
        <label class="shipping-label" for="ship2">
            <strong>PENGAMBILAN DI TOKO</strong>
            <span style="float:right; font-weight:600;">GRATIS</span>
            <p style="font-size:12px;">Siap diambil dalam 2–4 hari kerja.</p>
        </label>

        <p style="font-size:12px; margin-top:25px;">*bagian ini wajib di isi</p>

        <form>
            <div style="display:flex; gap:10px;">
                <input type="text" placeholder="First Name *">
                <input type="text" placeholder="Last Name *">
            </div>

            <input type="text" placeholder="Alamat *" style="margin-top:12px;">

            <div style="display:flex; gap:10px; margin-top:12px;">
                <input type="text" placeholder="Kode Pos *">
                <div style="display:flex; align-items:center; width:100%;">
                    <span style="padding:10px; background:#eee; border:1px solid #ccc;">+62</span>
                    <input type="tel" placeholder="No Kontak *" style="border-left:none;">
                </div>
            </div>

            <button class="endbut" type="button" onclick="showPopup()" 
                style="padding:12px 20px; border:none; background:#5c2222; color:#fff; border-radius:8px; cursor:pointer;">
                Checkout
            </button>

        </form>

    </div>

</div>

<!-- POPUP -->
<div id="popup"
     style="
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: #eac6a5;
        padding: 25px 35px;
        border-radius: 10px;
        font-size: 18px;
        font-weight: 600;
        text-align:center;
        display:none;
        box-shadow: 0 5px 20px rgba(0,0,0,0.2);
     ">
    Pembayaran anda telah selesai <br> Thank you
</div>

<script>
    function showPopup() {
        const popup = document.getElementById("popup");
        popup.style.display = "block";

        // auto close 2 detik
        setTimeout(() => {
            popup.style.display = "none";
        }, 2000);
    }
</script>


</body>
</html>
