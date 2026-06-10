<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Ticket | Kindergarten Graduation</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <style>
    body {
      background: radial-gradient(circle at center, rgb(14, 33, 92) 0%, rgb(6, 15, 41) 100%);
      color: #ffffff;
      font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
      min-height: 100vh;
      display: flex;
      align-items: center;
      padding: 20px 0;
      margin: 0;
    }

    /* Luxury Ticket Container */
    .ticket-card {
      position: relative;
      background: rgba(10, 22, 61, 0.9);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 20px;
      box-shadow: 0 20px 50px rgba(0, 0, 0, 0.6);
      padding: 20px; 
      overflow: hidden;
    }

    /* Background Watermark Inside the Ticket */
    .ticket-watermark {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 280px;
      height: 280px;
      background-image: url('<?php echo base_url(); ?>/assets/img/logomlinlst.png');
      background-repeat: no-repeat;
      background-position: center;
      background-size: contain;
      opacity: 0.25; 
      pointer-events: none;
      z-index: 0;
    }

    /* Content wrapper to stay above watermark */
    .ticket-content {
      position: relative;
      z-index: 1;
    }

    /* Authentic Ticket Side Cutouts */
    .ticket-card::before,
    .ticket-card::after {
      content: '';
      position: absolute;
      top: 50%;
      width: 30px;
      height: 30px;
      background: rgb(6, 15, 41); 
      border-radius: 50%;
      transform: translateY(-50%);
      z-index: 2;
      display: none; 
    }
    .ticket-card::before { left: -15px; border-right: 1px solid rgba(255, 255, 255, 0.1); }
    .ticket-card::after { right: -15px; border-left: 1px solid rgba(255, 255, 255, 0.1); }

    /* Typography Details */
    .text-label {
      color: #94a3b8;
      font-size: 0.75rem;
      text-transform: uppercase;
      letter-spacing: 2px;
      margin-bottom: 2px;
      font-weight: 500;
    }

    .info-value {
      font-weight: 600;
      font-size: 1rem;
      margin-bottom: 18px;
      color: #ffffff;
    }

    /* Highlighted Student Name */
    .student-highlight {
      color: #f59e0b; 
      font-size: 1.25rem;
      font-weight: 700;
      letter-spacing: 0.5px;
    }

    /* Top Instruction Banner */
    .scan-notice {
      background: rgba(255, 255, 255, 0.04);
      border: 1px solid rgba(255, 255, 255, 0.08);
      padding: 10px;
      border-radius: 8px;
      font-size: 0.75rem;
      letter-spacing: 1px;
      color: #cbd5e1;
    }

    /* Clean QR Code Framing */
    .qr-container {
  background: #ffffff;
  padding: 12px;
  border-radius: 14px;
  display: inline-block;
  box-shadow: 0 10px 30px rgba(0,0,0,.3);
}

#qrcode {
  background: #ffffff;
  display: inline-block;
}

#qrcode canvas,
#qrcode img {
  display: block;
}
    
    .qr-container img {
      max-width: 100%;
      height: auto !important; 
    }

    .ticket-id {
      letter-spacing: 2px;
      font-size: 1rem;
      color: #38bdf8; 
      margin-top: 10px;
    }

    /* Elegant Perforated Divider Line */
    .ticket-perforation {
      border-top: 2px dashed rgba(255, 255, 255, 0.15);
      margin: 20px 0;
      position: relative;
    }

    /* Tablet and Desktop Enhancements */
    @media (min-width: 768px) {
      body {
        padding: 40px 0;
      }
      .ticket-card {
        padding: 45px;
      }
      .ticket-card::before, .ticket-card::after {
        display: block; 
      }
      .ticket-watermark {
        width: 450px;
        height: 450px;
        opacity: 0.4;
      }
      .text-label {
        font-size: 0.8rem;
      }
      .info-value {
        font-size: 1.1rem;
        margin-bottom: 22px;
      }
      .student-highlight {
        font-size: 1.4rem;
      }
      .scan-notice {
        font-size: 0.8rem;
        letter-spacing: 1.5px;
      }
      .qr-divider {
        border-left: 1px solid rgba(255, 255, 255, 0.08);
      }
    }
  </style>
</head>
<body>

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10 col-xl-9">
        
        <div class="ticket-card">
          
          <div class="ticket-watermark"></div>
          
          <div class="ticket-content">
            
            <div class="row align-items-center mb-4">
              <div class="col-6 text-start">
                <img src="<?php echo base_url(); ?>/assets/img/logotiket.png" style="max-height: 50px; width: auto;" alt="Logo">
              </div>
              <div class="col-6 text-end">
                <h3 class="fw-bold m-0" style="letter-spacing: 2px; color: #38bdf8;">E-TICKET</h3>
              </div>
            </div>

            <div class="row mb-4">
              <div class="col-12">
                <div class="scan-notice text-center text-uppercase">
                  Please have this barcode ready on your device to present for scanning
                </div>
              </div>
            </div>
            
            <div class="row pt-2 align-items-center">
              
              <div class="col-md-7 pe-md-4">
                
                <div>
                  <div class="text-label">Event Title</div>
                  <div class="info-value text-wrap">My Little Island School - Kindergarten Graduation Reception 2026</div>
                </div>

                <div>
                  <div class="text-label">Event Date and Time</div>
                  <div class="info-value text-white">Thursday, June 11th, 2026 <br><span class="fw-normal" style="font-size:0.95rem;">08:30 WIB - 13:30 WIB</span></div>
                </div>

                <div>
                  <div class="text-label">Venue</div>
                  <div class="info-value">Atria Hotel Ballroom, 2nd floor</div>
                </div>

                <div>
                  <div class="text-label">Graduate's Name</div>
                  <div class="info-value student-highlight"><?= htmlspecialchars($data[0]->student_name) ?></div>
                </div>

                <div class="row">
                  <div class="col-6">
                    <div class="text-label">Table Number</div>
                    <div class="info-value" style="font-size: 1.2rem; color: #38bdf8;"><?= htmlspecialchars($data[0]->meja) ?></div>
                  </div>
                  <div class="col-6">
                    <div class="text-label">Additional Ticket</div>
                    <div class="info-value text-white" style="font-size: 1.2rem;"><?= htmlspecialchars($data[0]->add2) ?></div>
                  </div>
                </div>

              </div>

              <div class="col-md-5 text-center d-flex flex-column align-items-center justify-content-center mt-4 mt-md-0 pt-4 pt-md-0 qr-divider">
                
                <div class="text-label mb-3">Scan Barcode</div>
                
                <div class="qr-container mb-2">
                  <div id="qrcode"></div>
                </div>
                
                <div class="ticket-id fw-bold">TCKT-<?= htmlspecialchars($data[0]->student_id) ?></div>
              </div>

            </div>

            <div class="ticket-perforation"></div>

            <div class="row">
              <div class="col-12 text-center">
                <p class="m-0 text-muted" style="font-size: 0.8rem; letter-spacing: 0.5px;">
                  <strong class="text-white">Note: Kindly arrive 30 minutes before the event starts. Thank you.</strong>
                </p>
              </div>
            </div>

          </div> </div> </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  <script src="<?php echo base_url(); ?>assets/js/qrcode.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>

  <script type="text/javascript">
$(document).ready(function () {

    var elText = "<?= htmlspecialchars($data[0]->student_id, ENT_QUOTES) ?>";

    new QRCode(document.getElementById("qrcode"), {
        text: elText,
        width: 180,
        height: 180,
        colorDark: "#0a163d",
        colorLight: "#ffffff",
        correctLevel: QRCode.CorrectLevel.H
    });

    setTimeout(function () {

        const qrWrapper = document.getElementById("qrcode");
        const oldCanvas = qrWrapper.querySelector("canvas");

        if (!oldCanvas) return;

        const quietZone = 20;

        const newCanvas = document.createElement("canvas");
        newCanvas.width = oldCanvas.width + quietZone * 2;
        newCanvas.height = oldCanvas.height + quietZone * 2;

        const ctx = newCanvas.getContext("2d");

        ctx.fillStyle = "#ffffff";
        ctx.fillRect(0, 0, newCanvas.width, newCanvas.height);

        ctx.drawImage(oldCanvas, quietZone, quietZone);

        qrWrapper.innerHTML = "";
        qrWrapper.appendChild(newCanvas);

    }, 150);

});
</script>
</body>
</html>