<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Ticket - <?= $data[0]->student_name ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>
  
  <style>
    body {
      background-color: rgb(9, 23, 66);
      color: white;
      background-image: url('<?php echo base_url(); ?>/assets/img/logomlinlst.png');
      background-repeat: no-repeat;
      background-position: center;
      background-attachment: fixed;
      background-size: 500px;
      min-height: 100vh;
      padding-top: 2rem;
      padding-bottom: 2rem;
    }

    .ticket-card {
      background: rgba(255, 255, 255, 0.95);
      color: #333;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 15px 35px rgba(0,0,0,0.3);
      max-width: 850px;
      margin: auto;
    }

    .ticket-header {
      background-color: #f8f9fa;
      border-bottom: 2px dashed #ddd;
      padding: 20px 40px;
    }

    .ticket-body {
      padding: 30px 40px;
    }

    .label-text {
      text-transform: uppercase;
      font-size: 0.75rem;
      letter-spacing: 1px;
      color: #777;
      margin-bottom: 2px;
    }

    .info-text {
      font-weight: 700;
      color: rgb(9, 23, 66);
      margin-bottom: 15px;
    }

    #qrcode {
      background: white;
      padding: 10px;
      border: 1px solid #eee;
      display: inline-block;
      border-radius: 10px;
    }

    .btn-download {
      background-color: #ffc107;
      border: none;
      color: #000;
      font-weight: 600;
      transition: all 0.3s;
    }

    .btn-download:hover {
      background-color: #e0a800;
      transform: translateY(-2px);
    }

    @media (max-width: 768px) {
      .ticket-header, .ticket-body { padding: 20px; }
      .text-end-md { text-align: left !important; }
    }
  </style>
</head>

<body>

<div class="container">
  <!-- Action Buttons -->
  <div class="text-center mb-4 no-print">
    <button class="btn btn-download px-4 py-2 shadow-sm" onclick="downloadTicket()">
       Download Ticket as Image
    </button>
  </div>

  <div id="capture-area" class="ticket-card">
    <!-- Header -->
    <div class="ticket-header">
      <div class="row align-items-center">
        <div class="col-6">
          <img src="<?php echo base_url(); ?>/assets/img/logotiket.png" style="max-height:60px">
        </div>
        <div class="col-6 text-end text-end-md">
          <h2 class="fw-bold mb-0" style="color: rgb(9, 23, 66);">E-TICKET</h2>
          <small class="text-muted">#TCKT-<?= $data[0]->student_id ?></small>
        </div>
      </div>
    </div>

    <!-- Body -->
    <div class="ticket-body">
      <div class="row">
        <div class="col-md-12 mb-4">
          <div class="alert alert-warning py-2 text-center" style="font-size: 0.85rem; border: none; border-radius: 10px;">
            <strong>ENTRY REQUIREMENT:</strong> PLEASE HAVE THIS BARCODE READY FOR SCANNING AT THE ENTRANCE
          </div>
        </div>
      </div>

      <div class="row">
        <!-- Event Details -->
        <div class="col-md-7">
          <div class="mb-3">
            <p class="label-text">Event Title</p>
            <h5 class="info-text">My Little Island School - Kindergarten Graduation Reception</h5>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <p class="label-text">Date & Time</p>
              <p class="info-text">Thursday, June 11 2026<br>08:30 WIB - 13.30 WIB</p>
            </div>
            <div class="col-sm-6">
              <p class="label-text">Venue</p>
              <p class="info-text">Atria Hotel Ballroom<br>2nd Floor</p>
            </div>
          </div>

          <hr class="my-4" style="opacity: 0.1;">

          <div class="row">
            <div class="col-sm-6">
              <p class="label-text">Graduate's Name</p>
              <p class="info-text fs-5 text-primary"><?= $data[0]->student_name ?></p>
            </div>
            <div class="col-sm-3 col-6">
              <p class="label-text">Table</p>
              <p class="info-text fs-5"><?= $data[0]->meja ?></p>
            </div>
            <div class="col-sm-3 col-6">
              <p class="label-text">Additional</p>
              <p class="info-text fs-5"><?= $data[0]->add2 ?></p>
            </div>
          </div>
        </div>

        <!-- QR Code Section -->
        <div class="col-md-5 text-center d-flex flex-column align-items-center justify-content-center" style="border-left: 1px solid #eee;">
          <p class="label-text mb-2">Scan Here</p>
          <div id="qrcode"></div>
          <p class="mt-3 fw-bold text-muted" style="letter-spacing: 2px;">TCKT-<?= $data[0]->student_id ?></p>
        </div>
      </div>

      <!-- Footer Note -->
      <div class="row mt-4">
        <div class="col-12">
          <div class="p-3 bg-light rounded-3 text-center">
            <p class="mb-0 text-muted small">
              <strong>Note:</strong> Kindly arrive 30 minutes before the event starts. Thank you for your cooperation.
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js"></script>

<script type="text/javascript">
  $(document).ready(function () {
    var elText = "<?= $data[0]->student_id ?>";
    var qrcode = new QRCode(document.getElementById("qrcode"), {
      text: elText,
      width: 180,
      height: 180,
      colorDark : "#091742",
      colorLight : "#ffffff",
      correctLevel : QRCode.CorrectLevel.H
    });
  });

  function downloadTicket() {
    const btn = document.querySelector('.btn-download');
    btn.innerHTML = 'Generating...';
    
    html2canvas(document.querySelector("#capture-area"), {
      scale: 2, // Higher quality
      backgroundColor: null
    }).then(canvas => {
      const link = document.createElement('a');
      link.download = 'Ticket-<?= $data[0]->student_name ?>.png';
      link.href = canvas.toDataURL("image/png");
      link.click();
      btn.innerHTML = 'Download Ticket as Image';
    });
  }
</script>

</body>
</html>