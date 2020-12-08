<body id="page-top">

  <!-- Topbar -->
  <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
      <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->
    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
      <div class="input-group">
        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button">
            <i class="fas fa-search fa-sm"></i>
          </button>
        </div>
      </div>
    </form>

    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

      <!-- Nav Item - Search Dropdown (Visible Only XS) -->
      <li class="nav-item dropdown no-arrow d-sm-none">
        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-search fa-fw"></i>
        </a>
        <!-- Dropdown - Messages -->
        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
          <form class="form-inline mr-auto w-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>


      <!-- cara menampilkan jumlah barang yg sudah dimasukan ke dalam keranjang dan memposisikan nama keranjang belanja di sebelah kanan-->

      <div class="navbar">
        <ul class="nav navbar-nav navbar-right">
          <li><img src="<?= 'assets/img/checklist.png'; ?> " width="30px">
            <?php
            $keranjang = 'Pesan Jasa Pekerja : ' . $this->cart->total_items() . 'item' ?></i>
            <!-- menambah link keranjang belanja -->
            <?php echo anchor('dashboard/detail_pesan', $keranjang) ?>
          </li>
        </ul>
      </div>
    </ul>


    <div class="topbar-divider d-none d-sm-block"></div>
    <!-- button login -->
    <ul class="na navbar-nav navbar-right">
      <?php if ($this->session->userdata('email')) { ?>
        <li>
          <div>Selamat Datang <?php echo $this->session->userdata('email') ?>
          </div>
        </li>
        <li class="ml-2"><?php echo anchor('auth/logout', '<i class="fas fa-sign-out-alt">Logout</i>') ?></li>
      <?php } else { ?>
        <li>
          <a href="auth/login"><i class="fas fa-sign-in-alt"> Login </i></a>
        </li>
      <?php } ?>
    </ul>


  </nav>
  <!-- End of Topbar -->

  <!-- Page Wrapper -->
  <div id="wrapper">