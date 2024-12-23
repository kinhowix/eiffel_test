<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/stylenew.css">
    <link rel="icon" href="./imagens/favicon.ico" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet" />
    <title>Óticas Paris Sul</title>
</head>
<script src="./path/to/banner.js"></script>

<style>
@font-face {
    font-family: 'Sling';
    src:url('Sling.ttf.woff') format('woff'),
        url('Sling.ttf.svg#Sling') format('svg'),
        url('Sling.ttf.eot'),
        url('Sling.ttf.eot?#iefix') format('embedded-opentype'); 
    }
           /* Estilizo do aviso de cookies aqui */
        .cookie-notice {
            bottom: -20px;
            left: 0;
            width: 100%;
            background-color: #333;
            color: #fff;
            padding: 10px;
            margin-bottom: 20px;
            text-align: center;
        }

</style>

    <header>
        <div class="principal">
            <h1 class="barra">Teste</h1>
       
            <img class='logo-paris' src="./imagens/Logo_fonte_azul.png">
        
          <h1 class="barra-inferior">Óticas Paris Sul</h1>
        </div>
        <div class="menu_inicial">            
                <a href="marcas.html">Marcas</a>
               <a href="contatos.html">Contato</a>
                <a href="onde.php">Encontre seu Pedido</a>
            
        </div>
            </header>

            <body>

            <div class="banner">
            <div class="banner-images">
    <?php
    // Conexão com o banco de dados (substitua as credenciais conforme necessário)
    include "./conexoes/configconn.php";

    // Query para selecionar todas as imagens da tabela imagens_banner
    $sql = "SELECT * FROM imagens_banner";
    $result = $conn->query($sql);

    // Arrays para armazenar imagens e seus dados
    $images = [];
    $image_paths = [];
    
    // Se houver imagens no banco de dados, armazena em um array
    if ($result->num_rows > 0) {
        // Loop através de cada imagem e armazena no array
        while($row = $result->fetch_assoc()) {
            $images[] = $row;
            $image_paths[] = $row["caminho"];
        }
    } else {
        echo "Não há imagens para exibir.";
    }

    // Fecha a conexão com o banco de dados
    $conn->close();

    // Verifica se há imagens
    if (count($images) > 0) {
        // Adiciona a última imagem duplicada no início
        $last_image = end($images);
        echo '<img src="' . $last_image["caminho"] . '" alt="' . $last_image["nome"] . '" class="duplicate">';
        
        // Exibe todas as imagens reais
        foreach ($images as $image) {
            echo '<img src="' . $image["caminho"] . '" alt="' . $image["nome"] . '">';
        }

        // Adiciona a primeira imagem duplicada no final
        $first_image = reset($images);
        echo '<img src="' . $first_image["caminho"] . '" alt="' . $first_image["nome"] . '" class="duplicate">';
    }
    ?>
</div>
  
    <button class="prev">&#10094;</button>
    <button class="next">&#10095;</button>
</div>
            



                <script>
    const bannerImages = document.querySelector('.banner-images');
    const prevButton = document.querySelector('.prev');
    const nextButton = document.querySelector('.next');
    let counter = 0; // Começamos do zero, pois as imagens serão indexadas a partir de 0

    // Obtenha todas as imagens do banner
    const images = document.querySelectorAll('.banner-images img');

    nextButton.addEventListener('click', () => {
        if (counter >= images.length - 1) return; // Verifica se já está na última imagem
        counter++;
        showImage(counter);
    });

    prevButton.addEventListener('click', () => {
        if (counter <= 0) return; // Verifica se já está na primeira imagem
        counter--;
        showImage(counter);
    });

    // Função para mostrar a imagem de acordo com o contador
    function showImage(index) {
        bannerImages.style.transform = `translateX(${-index * 100}%)`;
    }


</script>   
      

     </body>

     <div class="container-content">
      <h1 class="text">Acompanhe aqui o seu Pedido!</h1>
      <a class="clique-btn" href="onde.php">Clique Aqui!</a>
    </div>
  </div>

<footer>

<div class="footer">

<ul>
    <li><a href="nossa_historia.html">Nossa história</a></li>
    <li><a href="#">Onde a mágica acontece</a></li>
    <li><a href="login_lojas.php">Empresas Parceiras</a></li>
    <li><a href="login.php">Área Restrita</a></li>
    
</ul>
</div>

</footer>

<div class="cookie-notice">
    Este site utiliza cookies para melhorar a sua experiência. Ao continuar navegando, você concorda com o uso de cookies.
    <button id="accept-cookies">Aceitar</button>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const acceptCookiesButton = document.getElementById("accept-cookies");

        acceptCookiesButton.addEventListener("click", function() {
            // Define um cookie para registrar que o usuário aceitou os cookies
            document.cookie = "cookies_accepted=true; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/";

            // Esconde o aviso de cookies
            const cookieNotice = document.querySelector(".cookie-notice");
            cookieNotice.style.display = "none";
        });
    });
</script>

</html>