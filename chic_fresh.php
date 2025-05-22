<?php
session_start();
if(!isset($_SESSION['usuario'])){
    echo '
        <script>
            alert("Por favor debes iniciar sesión");
        </script>
    ';
    header("Location: index.php");
    session_destroy();
    die();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Chic Fresh - Moda Juvenil</title>
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500;700&display=swap" rel="stylesheet">
  <script src="https://kit.fontawesome.com/a2e0a1b6b2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    :root {
      --baby-blue: #d0f0fd;
      --blue-accent: #aee0f8;
      --text-dark: #2d2d2d;
      --btn-blue: #51b4e6;
      --hover-blue: #87dcff;
    }
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'Quicksand', sans-serif;
    }
    body {
      background-color: var(--baby-blue);
      color: var(--text-dark);
    }
    .promo-banner {
      background-color: #e6005c;
      color: white;
      text-align: center;
      padding: 12px 20px;
      font-size: 16px;
      font-weight: 600;
      animation: fadeIn 1s ease-in-out;
    }
    .topbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      background-color: var(--blue-accent);
      padding: 12px 24px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      position: sticky;
      top: 0;
      z-index: 999;
      flex-wrap: wrap;
    }
    .logo {
      display: flex;
      align-items: center;
      font-size: 24px;
      font-weight: 700;
      color: #fff;
      gap: 10px;
    }
    .menu {
      position: relative;
    }
    .menu-button {
      background-color: transparent;
      border: 2px solid #fff;
      color: #fff;
      border-radius: 50px;
      padding: 8px 18px;
      cursor: pointer;
      font-weight: 600;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .dropdown {
      position: absolute;
      top: 120%;
      left: 0;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
      display: none;
      flex-direction: column;
      width: 180px;
      animation: fadeIn 0.3s ease-in-out;
    }
    .dropdown a {
      padding: 10px 15px;
      color: #333;
      text-decoration: none;
    }
    .dropdown a:hover {
      background-color: #e0f4ff;
    }
    .menu:hover .dropdown {
      display: flex;
    }
    .search-bar {
      flex: 1;
      display: flex;
      margin: 10px;
      background-color: #fff;
      border-radius: 50px;
      overflow: hidden;
      min-width: 200px;
    }
    .search-bar input {
      border: none;
      padding: 10px 16px;
      font-size: 16px;
      flex: 1;
    }
    .search-bar button {
      background-color: #4682b4;
      border: none;
      color: #fff;
      padding: 0 20px;
      cursor: pointer;
    }
    .actions {
      display: flex;
      align-items: center;
      gap: 20px;
    }
    .actions i {
      font-size: 22px;
      color: #fff;
      cursor: pointer;
      position: relative;
    }
    .badge {
      position: absolute;
      top: -6px;
      right: -8px;
      background-color: #ff5c5c;
      color: #fff;
      font-size: 12px;
      border-radius: 50%;
      padding: 2px 6px;
    }
    .login {
      color: #fff;
      cursor: pointer;
      font-weight: 600;
    }
    .seccion {
      padding: 40px 20px;
      animation: slideUp 1s ease;
    }
    .seccion h2 {
      font-size: 28px;
      margin-bottom: 20px;
      text-align: center;
    }
    .productos {
      display: flex;
      gap: 20px;
      justify-content: center;
      flex-wrap: wrap;
    }
    .producto {
      background: #fff;
      padding: 15px;
      border-radius: 16px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
      width: 250px;
      transition: transform 0.3s ease;
      text-align: center;
    }
    .producto:hover {
      transform: translateY(-10px);
      box-shadow: 0 0 20px 4px #87dcff;
      cursor: pointer;
    }
    .producto img {
      width: 100%;
      border-radius: 12px;
    }
    .producto h3 {
      margin-top: 12px;
      font-size: 18px;
    }
    .producto-enlace {
      text-decoration: none;
      color: inherit;
    }
    .ofertas-del-mes {
      max-width: 1000px;
      margin: 40px auto;
      padding: 20px;
      text-align: center;
    }
    .swiper {
      width: 100%;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
    .swiper-slide img {
      width: 100%;
      height: auto;
      display: block;
    }
    .swiper-button-next, .swiper-button-prev {
      color: #000;
    }
    .swiper-pagination-bullet-active {
      background: #000;
    }
    .redes-sociales {
      text-align: center;
      padding: 40px 20px;
      background-color: var(--blue-accent);
      color: #fff;
      animation: fadeIn 1s ease-in-out;
    }
    .redes-sociales h2 {
      font-size: 26px;
      margin-bottom: 20px;
    }
    .iconos-redes {
      display: flex;
      justify-content: center;
      gap: 20px;
      flex-wrap: wrap;
    }
    .iconos-redes a {
      font-size: 28px;
      color: #fff;
      transition: transform 0.3s ease, color 0.3s ease;
    }
    .iconos-redes a:hover {
      transform: scale(1.2);
      color: #87dcff;
    }
    .footer {
      background-color: var(--blue-accent);
      color: #fff;
      text-align: center;
      padding: 20px;
      margin-top: 40px;
    }
    @keyframes slideUp {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }
    @keyframes fadeIn {
      from {opacity: 0;}
      to {opacity: 1;}
    }
    #glow-cursor {
      position: fixed;
      top: 0;
      left: 0;
      width: 20px;
      height: 20px;
      pointer-events: none;
      border-radius: 50%;
      background: radial-gradient(circle, #87dcff 20%, transparent 60%);
      box-shadow: 0 0 12px #87dcff, 0 0 24px #87dcff;
      transform: translate(-50%, -50%);
      z-index: 10000;
      mix-blend-mode: screen;
      transition: transform 0.1s ease;
    }
    @media (max-width: 768px) {
      .productos {
        flex-direction: column;
        align-items: center;
      }
      .topbar {
        flex-direction: column;
        gap: 10px;
      }
    }
    .whatsapp-float {
      position: fixed;
      bottom: 20px;
      right: 80px;
      z-index: 999;
      background-color: #ffffff;
      border-radius: 50%;
      padding: 12px;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
      transition: transform 0.2s ease, box-shadow 0.2s ease;
    }
    .whatsapp-float:hover {
      transform: scale(1.1);
    }
  </style>
</head>
<body>

<div class="promo-banner">🎉 ¡30% de descuento en tu primera compra! Oferta termina en <span id="countdown"></span></div>

<div class="topbar">
  <div class="logo"><i class="fas fa-store"></i> Chic Fresh</div>
  <div class="menu">
    <div class="dropdown">
      <a href="#">Tops</a>
      <a href="#">Pantalones</a>
      <a href="#">Chaquetas</a>
    </div>
  </div>
  <div class="search-bar">
    <input type="text" placeholder="Buscar en Chic Fresh" />
    <button><i class="fas fa-search"></i></button>
  </div>
  <div class="actions">
    <a class="login" href="index.php">Hola, Inicia sesión</a>
    <i class="fas fa-heart"></i>
    <i class="fas fa-shopping-cart"><span class="badge">0</span></i>
  </div>
</div>



<section class="seccion" id="tendencias">
  <h2>Tendencias Juveniles</h2>
  <div class="productos">
    <a href="looks_escolares.php" class="producto-enlace"><div class="producto"><img src="assets/images/modelo1.jpeg"><h3>#Looks Escolares</h3></div></a>
    <a href="ropa_fiesta.php" class="producto-enlace"><div class="producto"><img src="assets/images/modelo3.jpeg"><h3>#Ropa de Fiesta</h3></div></a>
    <a href="ropa_casual.php" class="producto-enlace"><div class="producto"><img src="assets/images/modelo2.jpeg"><h3>#Ropa Casual</h3></div></a>
  </div>
</section>

<section class="ofertas-del-mes">
  <h2>Ofertas del Mes</h2>
  <div class="swiper mySwiper">
    <div class="swiper-wrapper">
      <div class="swiper-slide"><img src="assets/images/f1.jpeg"></div>
      <div class="swiper-slide"><img src="assets/images/f2.jpeg"></div>
      <div class="swiper-slide"><img src="assets/images/f3.jpeg"></div>
    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
  </div>
</section>

<footer class="footer">
  &copy; 2025 Chic Fresh - Moda Juvenil. Todos los derechos reservados.
</footer>

<!-- Glow Cursor -->
<div id="glow-cursor"></div>

<!-- WhatsApp Float -->
<a href="https://wa.me/907939697" class="whatsapp-float" target="_blank" title="¡Chatea con nosotros!">
  <img src="https://img.icons8.com/color/48/000000/whatsapp--v1.png" alt="WhatsApp">
</a>

<!-- Chat Bot -->
<div id="chat-bot" style="position: fixed; bottom: 20px; right: 20px; z-index: 9999;">
  <button onclick="toggleChat()" style="background: #aee0f8; border: none; border-radius: 50%; width: 60px; height: 60px; box-shadow: 0 4px 10px rgba(0,0,0,0.2); cursor: pointer;">
    <img src="https://cdn-icons-png.flaticon.com/512/4712/4712109.png" alt="Chat Bot" style="width: 60%; height: 60%;">
  </button>
  <div id="chat-box" style="display: none; position: absolute; bottom: 70px; right: 0; width: 300px; background: white; border-radius: 16px; box-shadow: 0 4px 16px rgba(0,0,0,0.2); overflow: hidden;">
    <div style="background: #51b4e6; padding: 10px; color: white; font-weight: bold;">Asistente Chic Fresh</div>
    <div style="padding: 10px; font-size: 14px; color: #333;">Hola 👋 ¿En qué puedo ayudarte hoy?</div>
  </div>
</div>


<section class="redes-sociales">
  <h2>Síguenos en redes</h2>
  <div class="iconos-redes">
    <a href="https://www.instagram.com/chic_fresth/profilecard/?igsh=cXJqOHNneThydzZw" target="_blank"><i class="fab fa-instagram"></i></a>
    <a href="https://www.facebook.com/profile.php?id=61576598849723" target="_blank"><i class="fab fa-facebook-f"></i></a>
    <a href="https://www.tiktok.com/@tucuenta" target="_blank"><i class="fab fa-tiktok"></i></a>
    <a href="https://twitter.com/tucuenta" target="_blank"><i class="fab fa-x-twitter"></i></a>
    <a href="https://wa.me/907939697" target="_blank"><i class="fab fa-whatsapp"></i></a>
  </div>
</section>



<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
  const swiper = new Swiper(".mySwiper", {
    loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });

  document.addEventListener('mousemove', (e) => {
    const cursor = document.getElementById('glow-cursor');
    cursor.style.top = e.clientY + 'px';
    cursor.style.left = e.clientX + 'px';
  });

  function toggleChat() {
    const box = document.getElementById('chat-box');
    box.style.display = box.style.display === 'none' ? 'block' : 'none';
  }
</script>

</body>
</html>