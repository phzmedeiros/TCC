<?php
session_start();

$_SESSION['usuarioSenha'];

if (!isset($_SESSION["usuarioSenha"])) {

	header("Location: frm_logar.html");

	exit;
} else {

	?>

<html>
<head>
	<title>Perfil Usuário </title>
  <link rel="icon" href="../../public/img/mainicon.png" type="image/x-icon" />
	<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="css/estilo_index.css">
</head>
<style>
/*Fonte utilizada*/
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap");
    /* estilos globais e reset */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: "Poppins", sans-serif;
    }
    /* definição das cores por variaveis */
    :root {
      --blue: #383b43;
      --white: #fff;
      --grey: #f5f5f5;
      --black1: #222;
      --black2: #999;
    }

    body {
      min-height: 100vh;
      overflow-x: hidden;
    }

    .container {
      position: relative;
      width: 100%;
    }

    /* barra de navegação lateral */
    .navigation {
      position: fixed;
      width: 300px;
      height: 100%;
      background: var(--blue);
      border-left: 10px solid var(--blue);
      transition: 0.5s;
      overflow: hidden;
    }
    .navigation.active {
      width: 80px;
    }
    .navigation ul {
      padding-top: 80%;
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
    }
    .navigation ul li {
      position: relative;
      width: 100%;
      list-style: none;
      border-top-left-radius: 30px;
      border-bottom-left-radius: 30px;
    }
    .navigation ul li:hover,
    .navigation ul li.hovered {
      background: var(--white);
    }
    .navigation ul li a {
      position: relative;
      display: block;
      width: 100%;
      display: flex;
      text-decoration: none;
      color: var(--white);
    }
    .navigation ul li:hover a,
    .navigation ul li.hovered a {
      color: var(--blue);
    }
    .navigation ul li a .icon {
      position: relative;
      display: list-item;
      min-width: 60px;
      height: 60px;
      line-height: 75px;
      text-align: center;
    }
    .navigation ul li a .icon ion-icon {
      font-size: 1.75rem;
    }
    .navigation ul li a .title {
      position: relative;
      display: block;
      padding: 0 10px;
      height: 60px;
      line-height: 60px;
      text-align: center;
      white-space: nowrap;
    }
    .navigation ul li:hover a::before,
    .navigation ul li.hovered a::before {
      content: "";
      position: absolute;
      right: 0;
      top: -50px;
      width: 50px;
      height: 50px;
      background: transparent;
      border-radius: 50%;
      box-shadow: 35px 35px 0 10px var(--white);
      pointer-events: none;
    }
    .navigation ul li:hover a::after,
    .navigation ul li.hovered a::after {
      content: "";
      position: absolute;
      right: 0;
      bottom: -50px;
      width: 50px;
      height: 50px;
      background: transparent;
      border-radius: 50%;
      box-shadow: 35px -35px 0 10px var(--white);
      pointer-events: none;
    }
    /* imagem aaano */
    .imglogo {
      position: absolute;
      width: 100%;
      display: flex;
      justify-content: center;
      align-items: center;
      top: 0;
      padding-top: 10%;
      padding-right: 10%;
      min-width: 200px;
    }
    .imglogo.hidden {
      display: none;
    }

	/* conteudo principal - topbar, cards e content */
	.main {
      position: absolute;
      width: calc(100% - 300px);
      left: 300px;
      min-height: 100vh;
      background: var(--white);
      transition: 0.5s;
    }
    .main.active {
      width: calc(100% - 80px);
      left: 80px;
    }

    /* parte da barra de pesquisa, toggle e adicionar */
    .topbar {
      margin-top: 10px;
      width: 100%;
      height: 60px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 0 10px;
    }

    /* botão da sidebar */
    .toggle {
      position: relative;
      width: 60px;
      height: 60px;
      display: flex;
      justify-content: center;
      align-items: center;
      font-size: 2.5rem;
      cursor: pointer;
      color: var(--blue);
    }

	@media (max-width: 991px) {
      /* barra lateral - sidebar */
      .navigation {
        left: -300px;
      }
      .navigation.active {
        width: 300px;
        left: 0;
      }

      /* conteudo principal */
      .main {
        width: 100%;
        left: 0;
      }
      .main.active {
        left: 300px;
      }

      /* grid dos cards */
      .cardBox {
        grid-template-columns: repeat(2, 1fr);
      }
    }

    @media (max-width: 480px) {
      /* barra lateral - sidebar */
      .navigation {
        width: 100%;
        left: -100%;
        z-index: 1000;
      }
      .navigation.active {
        width: 100%;
        left: 0;
      }

      /* botão de ação da sidebar */
      .toggle {
        z-index: 1001;
      }
      .main.active .toggle {
        position: fixed;
        right: 0;
        left: initial;
        color: var(--white);
      }

      /* grid dos cards */
      .cardBox{
        grid-template-columns: repeat(1,1fr);
      }
    }

    /* main-content layout do conteudo, ex: tabela */
    .content {
      display: flex;
      flex-direction: column;
      height: 100vh;
    }
    .main-content {
      flex: 1;
      overflow: visible;
      padding: 20px; /* Ajuste o espaçamento conforme necessário */
    }

    /* cards */
    .cardBox {
      position: relative;
      width: 100%;
      padding: 20px;
      display: grid;
      grid-template-columns: repeat(4,1fr);
      grid-gap: 30px;
    }
    .cardBox .card{
      position: relative;
      background: var(--white);
      padding: 30px;
      border-radius: 20px;
      display: flex;
      justify-content: space-between;
      cursor: pointer;
      box-shadow: 0 7px 25px rgba(0, 0, 0, 0.158);
    }
    .cardBox .card .numbers
    {
      position: relative;
      font-weight: 500;
      font-size: 2.5em;
      color: var(--blue);
    }
    .cardBox .card .cardName{
      color: var(--black2);
      font-size: 1.1em;
      margin-top: 5px;
    }
    .cardBox .card .iconBx
    {
      font-size: 3.5em;
      color: var(--black2);
    }
    .cardBox .card:hover{
      background: var(--blue);
    }
    .cardBox .card:hover .numbers,
    .cardBox .card:hover .cardName,
    .cardBox .card:hover .iconBx{
      color: var(--white);
    }
    .navigation .logout {
   position: absolute;
   bottom: 50px; /* ou qualquer outra distância que você preferir do fundo */
   left: 45%;
   transform: translateX(-50%);
   text-align: center;
   
}
.navigation .logout a {
    color: #fff; /* Cor do texto (branco) */
    transition: color 0.3s ease; /* Transição suave para a cor do texto */
    display: flex;
    align-items: center; /* Centralizar verticalmente */
    margin-top: 40px;
}

.navigation .logout a .icon {
    margin-right: 5px; /* Espaçamento entre o ícone e o texto */
}

.navigation .logout a:hover {
    color: #ccc; /* Cor do texto no hover (cinza claro) */
}
.navigation .line-decoration {
    height: 1px; /* Altura da linha */
    width: 30px;
    background-color: #ccc; /* Cor da linha */
    margin: 10px 0; /* Espaçamento acima e abaixo da linha */
}
</style>
<body>
	<div class="container">
      <!-- side-bar -->
     	<div class="navigation">
			<!-- logo aaano -->
			<div class="imglogo centralize">
			<img src="../../public/img/imglogo.png" />
			</div>
			<!-- lista das páginas -->
			<ul>
			<li>
				<a href="perfil_usuario.php">
				<span class="icon"><ion-icon name="paw"></ion-icon></span>
				<span class="title">Principal</span>
				</a>
			</li>

			<li>
				<a href="usuarios_cadastrados.php">
				<span class="icon"><ion-icon name="contacts"></ion-icon></ion-icon></span>
				<span class="title">Voluntários</span>
				</a>
			</li>

			<li>
				<a href="equipes_cadastradas.php">
				<span class="icon"><ion-icon name="people"></ion-icon></span>
				<span class="title">Equipes</span>
				</a>
			</li>

			<li>
				<a href="adotantes_cadastrados.php">
				<span class="icon"
					><ion-icon name="close-circle"></ion-icon
				></span>
				<span class="title">Bloqueados</span>
				</a>
			</li>

			<li>
				<a href="termos_aceitos.php">
				<span class="icon"
					><ion-icon name="hand"></ion-icon></span>
				<span class="title">Adesões</span>
				</a>
			</li>
			</ul>
      <div class="logout">
        <div class="line-decoration"></div>
        <a href="logout.php">
          <span class="icon"><ion-icon name="log-out"></ion-icon></span>
          <span class="title">Logout</span>
        </a>
      </div>
		</div>
		<!--main contendo a topbar e os cards-->
		<div class="main">
			<!-- parte de cima - toggle e botões de mudanças e etc -->
			<div class="topbar">
				<!-- botão toggle para reduzir e aumentar a side-bar -->
				<div class="toggle">
					<ion-icon name="reorder"></ion-icon>
				</div>
			</div>
      <?php
// Conectar ao banco de dados (substitua com suas próprias configurações)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aaano";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Consultas SQL
$query_voluntarios = "SELECT COUNT(*) as total_voluntarios FROM usuarios";
$query_bloqueados = "SELECT COUNT(*) as total_bloqueados FROM ado_block";
$query_equipes = "SELECT COUNT(*) as total_equipes FROM equipes";
$query_termos = "SELECT COUNT(*) as total_termos FROM adesao";

// Executar as consultas
$result_voluntarios = $conn->query($query_voluntarios);
$result_bloqueados = $conn->query($query_bloqueados);
$result_equipes = $conn->query($query_equipes);
$result_termos = $conn->query($query_termos);

// Verificar se as consultas foram bem-sucedidas
if ($result_voluntarios && $result_bloqueados && $result_equipes && $result_termos) {
    // Obter os resultados como arrays associativos
    $row_voluntarios = $result_voluntarios->fetch_assoc();
    $row_bloqueados = $result_bloqueados->fetch_assoc();
    $row_equipes = $result_equipes->fetch_assoc();
    $row_termos = $result_termos->fetch_assoc();
    
    // Imprimir os resultados nos cards
    echo '<div class="cardBox">
            <div class="card">
                <div>
                    <div class="numbers">' . $row_voluntarios['total_voluntarios'] . '</div>
                    <div class="cardName">Voluntários</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="contacts"></ion-icon>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="numbers">' . $row_bloqueados['total_bloqueados'] . '</div>
                    <div class="cardName">Bloqueados</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="close-circle"></ion-icon>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="numbers">' . $row_equipes['total_equipes'] . '</div>
                    <div class="cardName">Equipes</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="people"></ion-icon>
                </div>
            </div>
            <div class="card">
                <div>
                    <div class="numbers">' . $row_termos['total_termos'] . '</div>
                    <div class="cardName">Termos</div>
                </div>
                <div class="iconBx">
                    <ion-icon name="hand"></ion-icon>
                </div>
            </div>
        </div>';
} else {
    echo "Erro na consulta: " . $conn->error;
}

// Fechar a conexão
$conn->close();
?>

<!-- framework dos icones - ionicons.com -->
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>
<!-- script sidebar -->
<script>
    //menu toggle
    let toggle = document.querySelector(".toggle");
    let navigation = document.querySelector(".navigation");
    let main = document.querySelector(".main");
    let logo = document.querySelector(".imglogo");
    //função do click no toggle
    toggle.onclick = function() {
      navigation.classList.toggle("active");
      main.classList.toggle("active");
      logo.classList.toggle("hidden");
    };

  //marca como selecionado o item da sidebar
  let list = document.querySelectorAll(".navigation li");
  function activeLink() {
    list.forEach((item) => item.classList.remove("hovered"));
    this.classList.add("hovered");
  }
  list.forEach((item) => item.addEventListener("mouseover", activeLink));
  </script>

</html>
<?php } ?>