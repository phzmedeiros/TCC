<?php
session_start();

$_SESSION['usuarioSenha'];

if (!isset($_SESSION["usuarioSenha"])) {

	header("Location: frm_logar.html");

	exit;
} else {

?>
<!-- equipes_cadastradas.php -->
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Equipes Cadastradas</title>
  <link rel="icon" href="../../public/img/mainicon.png" type="image/x-icon" />
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

  /* barra de pesquisa */
  .search {
    position: relative;
    width: 400px;
    margin: 0 10px;
    box-shadow: 0 7px 25px rgba(0, 0, 0, 0.158);
    border-radius: 25px;
    border: none;
  }
  .search label {
    position: relative;
    width: 100%;
  }
  .search label input {
    width: 100%;
    height: 40px;
    border-radius: 40px;
    padding: 5px 20px;
    outline: none;
    border: none;
  }
  .search form {
    display: flex;
    align-items: center;
  }
  .search input[type="text"] {
    flex: 1;
  }
  .search button {
    background-color: transparent;
    /* Cor de fundo do botão */
    color: black;
    /* Cor do texto do botão */
    border: none;
    border-radius: 40px;
    height: 40px;
    padding: 0 15px;
    /* Ajuste o preenchimento conforme necessário */
    cursor: pointer;
  }
  .search button ion-icon {
    position: relative;
    padding-top: 6px;
    font-size: 1.5em;
    color: #383b43;
  }

  /* botão de ação multipla */
  .btn-novo-voluntario {
    background-color: var(--blue);
    color: #fff;
    border-radius: 25px;
    padding: 0.5rem 1rem;
    text-decoration: none;
    font-size: 1rem;
    font-weight: bold;
    display: flex;
    align-items: center;
    justify-content: justify;
    margin-right: 15px;
    box-shadow: 0 7px 25px rgba(0, 0, 0, 0.158);
  }
  .btn-novo-voluntario:hover {
    background-color: #2f3237;
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
  }

  /* main-content layout do conteudo, ex: tabela */
  .content {
    display: flex;
    flex-direction: column;
    height: 100%;
    width: 100%;
  }
  .main-content {
    flex: 1;
    width: 100%;
    height: 100%;
    overflow: visible;
    padding: 20px;
  }

  /* design tabela */
  .table {
    background-color: var(--blue);
    border-radius: 25px;
    padding: 20px;
    color: var(--blue);
    box-shadow: 0 7px 25px rgba(0, 0, 0, 0.158);
    overflow: auto;
    width: 100%;
    height: 100%;
  }
  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    box-shadow: 0 7px 25px rgba(0, 0, 0, 0.192);
    white-space: nowrap;
  }
  .table h2 {
    color: var(--white);
    padding-left: 10px;
  }
  table,
  th,
  tr,
  td {
    background-color: var(--white);
    border-radius: 25px;
    padding: 20px;
  }
  table {
    border-style: hidden;
  }
  table td {
    padding: auto;
    border: 2px solid var(--black2);
  }
  table th {
    padding: auto;
    border: 2px solid var(--blue);
  }

  .delete-icon-cell {
    text-align: center; /* Centraliza o conteúdo na célula */
  }

    .delete-icon-cell a {
        color: red; /* Define a cor vermelha para o ícone */
        display: inline-block; /* Permite definir largura/altura e centralizar verticalmente */
        width: 100%; /* Faz com que o link ocupe toda a largura da célula */
        height: 100%; /* Faz com que o link ocupe toda a altura da célula */
        text-decoration: none; /* Remove sublinhado padrão do link */
        font-size: 1.5rem;
    }

    ::-webkit-scrollbar {
      width: 20px;
      -webkit-transition: all 300ms;
      transition: all 300ms;
      height: 15px;
    }

    ::-webkit-scrollbar-track {
      background-color: var(--blue);
      border-radius: 25px;
    }

    ::-webkit-scrollbar-thumb {
      border-radius: 7px;
      background: white;
      box-shadow: 5px 0 0 0 transparent, -5px 0 0 0 transparent; /* Ajuste o valor do 5px conforme necessário para o espaçamento desejado */
    }
</style>

<body>
  <!-- toda a página -->
  <div class="container">
    <!-- side-bar -->
    <div class="navigation">
      <!-- logo aaano -->
      <div class="imglogo centralize">
        <img src="../../public/img/imglogo.png" />
      </div>
      <!-- lista das páginas -->
      <ul>
        <!-- principal -->
        <li>
          <a href="perfil_usuario.php">
            <span class="icon"><ion-icon name="paw"></ion-icon></span>
            <span class="title">Principal</span>
          </a>
        </li>
        <!-- voluntarios -->
        <li>
          <a href="usuarios_cadastrados.php">
            <span class="icon"><ion-icon name="contacts"></ion-icon></ion-icon></span>
            <span class="title">Voluntários</span>
          </a>
        </li>
        <!-- equipes -->
        <li>
          <a href="equipes_cadastradas.php">
            <span class="icon"><ion-icon name="people"></ion-icon></span>
            <span class="title">Equipes</span>
          </a>
        </li>
        <!-- adotantes bloqueados -->
        <li>
          <a href="adotantes_cadastrados.php">
            <span class="icon"><ion-icon name="close-circle"></ion-icon></span>
            <span class="title">Bloqueados</span>
          </a>
        </li>
        <!-- tudo que engloba adesão e termos -->
        <li>
          <a href="termos_aceitos.php">
            <span class="icon"><ion-icon name="hand"></ion-icon></span>
            <span class="title">Adesões</span>
          </a>
        </li>
      </ul>
    </div>
    <!--main contendo a topbar e os cards-->
    <div class="main">
      <!-- parte de cima - toggle e botões de mudanças e etc -->
      <div class="topbar">
        <!-- botão toggle para reduzir e aumentar a side-bar -->
        <div class="toggle">
          <ion-icon name="reorder"></ion-icon>
        </div>
        <!-- botão de adc voluntario, pode ser alterado sendo excluido em paginas que não é necessario -->
        <a href="frm_cadastro_equipes.html" class="btn-novo-voluntario">
          <ion-icon name="add-circle"></ion-icon>
          Criar Equipe
        </a>
      </div>
      <div class="main-content">
        <div class="table">
          <h2>Equipes</h2>
          <!-- Adicione suas tabelas ou outros conteúdos aqui -->
          <table>
            <tr>
              <th>Codigo da equipe</th>
              <th>Nome da Equipe</th>
              <th>Nome do Líder</th>
              <th>Voluntários</th>
              <th>Ações</th>
            </tr>
            <?php
            require_once '../Model/crud.php';
            $crud = new crud();
            $equipes = $crud->selecionar_Todas_Equipes();
            foreach ($equipes as $equipe) {
              echo "<tr>";
              echo "<td>{$equipe['id']}</td>";
              echo "<td>{$equipe['nome_da_equipe']}</td>";
              echo "<td>{$equipe['nome_do_voluntario_lider']}</td>";
              echo "<td>";
              echo "Nome do Líder: {$equipe['nome_do_voluntario_lider']}<br>";
              for ($i = 1; $i <= 20; $i++) {
                // Check if the key exists in the array
                if (isset($equipe["nome_do_voluntario_" . $i])) {
                    $voluntarioNome = $equipe["nome_do_voluntario_" . $i];
                    if (!empty($voluntarioNome)) {
                        echo "Nome do " . ($i + 1) . "&ordm; Voluntário: $voluntarioNome<br>";
                    }}
              }
              echo "";
              echo "<td class='delete-icon-cell'><a href='excluir_equipes.php?id={$equipe['id']}'><ion-icon name='trash'></ion-icon></a></td>";
              echo "</td>";
              echo "</tr>";
            }
            ?>
          </table>
        </div>
      </div>
    </div>
  </div>
<!-- framework dos icones - ionicons.com -->
<script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</body>
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