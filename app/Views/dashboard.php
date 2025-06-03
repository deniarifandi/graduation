    <?php 
      echo view('layouts/header.php');
      echo view('layouts/sidebar.php');
    ?>

      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Dashboard v2</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Dashboard v2</li>
                </ol>
              </div>
            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
              <div class="col-12 col-sm-6 col-md-3">
                <a href="sd">
                <div class="info-box">
                  <span class="info-box-icon text-bg-primary shadow-sm">
                    <i class="bi bi-journal-text"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text">Guest List</span>
                    <span class="info-box-number">
                      
                      <small>Total Guest: -</small>
                    </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                  </a>
                <!-- /.info-box -->
              </div>

               <div class="col-12 col-sm-6 col-md-3">
                <a href="loginlist">
                <div class="info-box">
                  <span class="info-box-icon text-bg-success shadow-sm">
                    <i class="bi bi-box-arrow-in-right"></i>
                  </span>
                  <div class="info-box-content">
                    <span class="info-box-text">Login List</span>
                    <span class="info-box-number">
                      
                      <small>Total Guest: -</small>
                    </span>
                  </div>
                  <!-- /.info-box-content -->
                </div>
                  </a>
                <!-- /.info-box -->
              </div>
            </div>
            <!-- /.row -->
            <!--begin::Row-->
           
            <!--end::Row-->
            <!--begin::Row-->
           
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->
      </main>
      <!--end::App Main-->
      <!--begin::Footer-->
     
      <?php 
        echo view('layouts/footer.php');
      ?>
