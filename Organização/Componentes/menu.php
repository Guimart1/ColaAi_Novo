<div class="sidebar d-flex flex-column flex-shrink-0 p-3" style="width: 280px;" id="sidebar">
  <a href="../Home/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
    <span class="fs-4" style="color: #a6a6a6;">Organização</span>
  </a>
  <hr>
  <ul class="nav nav-pills flex-column mb-auto">
    <a class="menuItems w-100 p-1 ps-2" href="../Home/" style="text-decoration: none; color: #a6a6a6;">
      <li class="d-flex align-items-center">
        <img src="../../img/Admin/icon-home.png" alt="" id="menu-icon">
        <span class="ms-2">Home</span>
      </li>
    </a>
    <a class="menuItems w-100 p-1 ps-2" href="../Eventos/" style="text-decoration: none; color: #a6a6a6;">
      <li class="d-flex align-items-center">
        <img src="../../img/Admin/icon-eventos.png" alt="" id="menu-icon">
        <span class="ms-2">Eventos</span>
      </li>
    </a>
    <!-- <a class="menuItems w-100 p-1 ps-2" href="../Publicações/" style="text-decoration: none; color: #a6a6a6;">
      <li class="d-flex align-items-center">
        <img src="../../img/Admin/icon-publicacoes.png" alt="" id="menu-icon">
        <span class="ms-2">Publicações</span>
      </li>
    </a> -->
    <a class="menuItems w-100 p-1 ps-2" data-bs-toggle="collapse" href="#collapseArquivados" role="button" aria-expanded="false" aria-controls="collapseArquivados" style="text-decoration: none; color: #a6a6a6;">
      <li class="d-flex align-items-center">
        <img src="../../img/Admin/itens-arquivados.png" alt="" id="menu-icon">
        <span class="ms-2">Itens Arquivados</span>
      </li>
    </a>
    <div class="collapse" id="collapseArquivados">
      <li class="menuItems w-100 p-1 ps-4">
        <a href="../Arquivados/eventos.php" style="text-decoration: none; color: #a6a6a6;">
          <img src="../../img/Admin/icon-eventos.png" alt="" id="menu-icon">
          <span>Eventos</span>
        </a>
      </li>
      <!-- <li class="menuItems w-100 p-1 ps-4">
        <a href="../Arquivados/publicacoes.php" style="text-decoration: none; color: #a6a6a6;">
          <img src="../../img/Admin/icon-publicacoes.png" alt="" id="menu-icon">
          <span>Publicações</span>
        </a>
      </li> -->
    </div>
    <a class="menuItems w-100 p-1 ps-2" href="../Contato/" style="text-decoration: none; color: #a6a6a6;">
      <li class="d-flex align-items-center">
        <img src="../../img/Admin/icon-suporte.png" alt="" id="menu-icon">
        <span class="ms-2">Contato</span>
      </li>
    </a>
  </ul>
  <hr>
  <div class="dropdown">
    <a href="#" class="text-white d-block link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
      <img src="../../img/Organizacao/<?= $authUserOrg['imagemOrganizacaoEvento'] ? $authUserOrg['imagemOrganizacaoEvento'] : 'userPadrao.png'; ?>" width="50" height="50" alt="" class="rounded-circle" id="icon-pfp">
    </a>
    <ul class="dropdown-menu text-small">
      <li><a class="dropdown-item" href="../Perfil/">Perfil</a></li>
      <hr class="dropdown-divider">
      <li><a class="dropdown-item" href="../logoff.php">Sair</a></li>
    </ul>
  </div>
</div>
