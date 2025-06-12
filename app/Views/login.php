    <?php 
    echo view('layouts/header.php');
      // echo view('layouts/sidebar.php');
    ?>
    <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>


    <!--begin::App Main-->
    <main class="app-main">
      <!--begin::App Content Header-->
      <div class="app-content-header">
        <!--begin::Container-->
        <div class="container-fluid">
          <!--begin::Row-->
          <div class="row">
            <div class="col-sm-6"><h3 class="mb-0"></h3></div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-end">
                <li class="breadcrumb-item"><a href="<?= base_url() ?>">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"></li>
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
          <h2>Graduates Guest List: Primary</h2>
          <div class="row">
            <div class="col-md-3">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title"></h3>
                  <h4><b>Class : A</b></h4>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>no</th>
                        <th>Nama</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      for ($i=0; $i < count($data1); $i++) { 
                        ?>
                        <tr>
                           <td ><?= $i+1 ?></td>
                          <td><?= $data1[$i]->student_name ?></td>
                          <td>
                            <?php if ($data1[$i]->attended == 1) {
                              ?>
                              <span class="badge bg-success">Confirmed</span>
                              <?php
                            } else{ ?>
                             <span class="badge bg-danger">Unconfirmed</span>
                             <?php
                           }
                           ?>

                         </td>
                         <tr>
                          <?php
                        }
                        ?>

                      </tbody>


                    </table>
                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title"></h3>
                    <h4><b>Class : B</b></h4>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">

                   <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>no</th>
                        <th>Nama</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      for ($i=0; $i < count($data2); $i++) { 
                        ?>
                        <tr>
                           <td ><?= $i+1 ?></td>
                          <td><?= $data2[$i]->student_name ?></td>
                          <td>
                            <?php if ($data2[$i]->attended == 1) {
                              ?>
                              <span class="badge bg-success">Confirmed</span>
                              <?php
                            } else{ ?>
                             <span class="badge bg-danger">Unconfirmed</span>
                             <?php
                           }
                           ?>

                         </td>
                         <tr>
                          <?php
                        }
                        ?>

                      </tbody>


                    </table>


                  </div>
                </div>
              </div>
              <div class="col-md-3">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title"></h3>
                    <h4><b>Class : C</b></h4>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">

                    <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th>no</th>
                        <th>Nama</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      for ($i=0; $i < count($data3); $i++) { 
                        ?>
                        <tr>
                          <td ><?= $i+1 ?></td>
                          <td><?= $data3[$i]->student_name ?></td>
                          <td>
                            <?php if ($data3[$i]->attended == 1) {
                              ?>
                              <span class="badge bg-success">Confirmed</span>
                              <?php
                            } else{ ?>
                             <span class="badge bg-danger">Unconfirmed</span>
                             <?php
                           }
                           ?>

                         </td>
                         <tr>
                          <?php
                        }
                        ?>

                      </tbody>


                    </table>


                  </div>
                </div>
              </div>


              <div class="col-md-3">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title"></h3>
                    <h4>
                      <div class="row">
                        <div class="col-md-8">
                          <input id="myInput" class="form-control" type="text">

                        </div>
                        <div class="col-md-4">
                          <a id="scan" class="btn btn-success" onclick="redirectTo()">Scan</a>
                        </div>
                      </div>
                    </h4>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">

                    <?php 
                    if (isset($logindata[0]->student_name)) {
                      ?>
                      <h5>Student Name : <?php echo $logindata[0]->student_name ?></h5>

                      <br>
                      <h3 style="text-align:center">Table Number:</h3>
                      <h1 style="text-align:center; font-size: 100px;"><?php echo $logindata[0]->meja ?></h1>
                      <?php
                    }else{
                      ?>
                      <h3 style="text-align:center"> Scan Guest </h3>
                      <?php
                    }
                    ?>


                  </div>
                </div>
              </div>
              <!-- /.card -->

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

      <script>
  const input = document.getElementById('myInput');

  function keepFocus() {
    setTimeout(() => input.focus(), 0); // delay to override blur
  }

  input.addEventListener('blur', keepFocus);
  window.onload = () => input.focus();
</script>

<script type="text/javascript">
  
  const button = document.getElementById('scan');

  input.addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
      event.preventDefault(); // optional
      button.click();
    }
  });

  function redirectTo() {
    const value = document.getElementById('myInput').value;
    const match = value;

    if (match) {
      const numberAfterS = value; // declare the variable with const or let
      console.log(numberAfterS);
      // Redirect using base_url PHP tag
      window.location.href = `<?= base_url() ?>loginlist?id=` + value;
    } else {
      alert("Please enter a valid code containing 'S' followed by a number.");
    }
  }
</script>