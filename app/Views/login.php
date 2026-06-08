<?php 
echo view('layouts/header.php');
// echo view('layouts/sidebar.php');
?>
<link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500;700;800&family=Public+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
<script src="https://cdn.jsdelivr.net/npm/html2canvas@1.4.1/dist/html2canvas.min.js"></script>

<style>
  /* Base Architecture */
  body {
    font-family: 'Public Sans', sans-serif;
    background-color: #f1f5f9;
  }
  .mono-text {
    font-family: 'JetBrains Mono', monospace;
  }
  .dashboard-title {
    font-weight: 800;
    color: #0f172a;
    letter-spacing: -0.5px;
  }
  
  /* Strong Line Card Definition */
  .brutal-card {
    background: #ffffff;
    border: 2px solid #0f172a;
    border-radius: 12px;
    overflow: hidden;
    transition: transform 0.15s ease;
  }
  
  /* Left Border Accents per Class Column */
  .accent-line-a { border-left: 8px solid #3b82f6 !important; }
  .accent-line-b { border-left: 8px solid #10b981 !important; }
  .accent-line-c1 { border-left: 8px solid #f59e0b !important; }
  .accent-line-c2 { border-left: 8px solid #8b5cf6 !important; }
  .accent-line-scan { border-left: 8px solid #0f172a !important; }

  .card-brutal-header {
    background: #ffffff;
    border-bottom: 2px solid #0f172a;
    padding: 14px 16px;
  }
  .class-badge {
    font-family: 'JetBrains Mono', monospace;
    font-weight: 800;
    font-size: 0.85rem;
    color: #0f172a;
    background: #f8fafc;
    border: 1.5px solid #0f172a;
    padding: 4px 8px;
    border-radius: 6px;
  }

  /* High Contrast Structured Tables */
  .table-brutal {
    margin-bottom: 0;
  }
  .table-brutal th {
    font-family: 'JetBrains Mono', monospace;
    font-size: 0.75rem;
    text-transform: uppercase;
    font-weight: 700;
    color: #475569;
    background: #f8fafc;
    border-bottom: 2px solid #0f172a;
    border-right: 1px solid #e2e8f0;
    padding: 10px 12px;
  }
  .table-brutal th:last-child { border-right: none; }
  .table-brutal td {
    font-size: 0.85rem;
    color: #0f172a;
    padding: 10px 12px;
    border-bottom: 1px solid #e2e8f0;
    border-right: 1px solid #e2e8f0;
    vertical-align: middle;
  }
  .table-brutal td:last-child { border-right: none; }
  .table-brutal tr:last-child td { border-bottom: none; }

  /* Sharp Geometric Status Tags */
  .status-tag {
    font-family: 'JetBrains Mono', monospace;
    font-weight: 700;
    font-size: 0.7rem;
    text-transform: uppercase;
    padding: 4px 8px;
    border-radius: 4px;
    border: 1.5px solid #0f172a;
    display: inline-block;
  }
  .status-confirmed { background-color: #bbf7d0; color: #166534; }
  .status-unconfirmed { background-color: #fecaca; color: #991b1b; }

  /* Interactive Scan Controller UI */
  .scan-input-box {
    border: 2px solid #0f172a;
    border-radius: 8px;
    font-family: 'JetBrains Mono', monospace;
    font-weight: 600;
    padding: 10px 12px;
  }
  .scan-input-box:focus {
    border-color: #0f172a;
    box-shadow: 0 0 0 3px rgba(15, 23, 42, 0.15);
  }
  .btn-brutal-action {
    background: #0f172a;
    color: #ffffff;
    font-weight: 700;
    border: 2px solid #0f172a;
    border-radius: 8px;
    padding: 10px;
    transition: all 0.1s ease;
  }
  .btn-brutal-action:hover {
    background: #1e293b;
    color: #ffffff;
  }
  
  .big-table-card {
    border: 2px solid #0f172a;
    background: #f8fafc;
    border-radius: 8px;
    padding: 15px;
  }
  .giant-number {
    font-family: 'JetBrains Mono', monospace;
    font-weight: 800;
    font-size: 6.5rem;
    line-height: 1;
    color: #0f172a;
    letter-spacing: -2px;
  }
</style>

<main class="app-main py-4">
  <div class="container-fluid px-4">
    
    <div class="row align-items-center mb-4 pb-2 border-bottom border-2 border-dark">
      <div class="col-sm-6">
        <h2 class="dashboard-title m-0">Graduates Guest List: Primary</h2>
      </div>
      <div class="col-sm-6 text-sm-end mt-2 mt-sm-0">
        <nav aria-label="breadcrumb" class="d-inline-block">
          <ol class="breadcrumb m-0 small bg-white p-2 px-3 border border-2 border-dark rounded-3">
            <li class="breadcrumb-item"><a href="<?= base_url() ?>" class="text-decoration-none text-dark fw-semibold">Home</a></li>
            <li class="breadcrumb-item active text-muted" aria-current="page">Live Log</li>
          </ol>
        </nav>
      </div>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 row-cols-xxl-5 g-4">
      
      <?php
      // Unified layout blueprint map matrix
      $groups = [
          ['title' => 'Class : A', 'accent' => 'accent-line-a',  'data' => $data1],
          ['title' => 'Class : B', 'accent' => 'accent-line-b',  'data' => $data2],
          ['title' => 'Class : C', 'accent' => 'accent-line-c1', 'data' => $data3],
          ['title' => 'Class : D', 'accent' => 'accent-line-c2', 'data' => $data4], // Handled matching original markup names
      ];
      
      foreach ($groups as $group): 
      ?>
        <div class="col">
          <div class="card brutal-card h-100 <?= $group['accent'] ?>">
            <div class="card-header card-brutal-header">
              <span class="class-badge"><?= $group['title'] ?></span>
            </div>
            <div class="card-body p-0">
              <div class="table-responsive">
                <table class="table table-brutal align-middle">
                  <thead>
                    <tr>
                      <th style="width: 25%">Guest ID</th>
                      <th style="width: 45%">Nama</th>
                      <th style="width: 15%">Meja</th>
                      <th style="width: 15%" class="text-center">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if(empty($group['data'])): ?>
                      <tr>
                        <td colspan="4" class="text-center py-4 text-muted mono-text small">No Entries Found</td>
                      </tr>
                    <?php else: ?>
                      <?php foreach ($group['data'] as $row): ?>
                        <tr>
                          <td class="mono-text fw-bold text-secondary">#<?= $row->student_id ?></td>
                          <td class="fw-bold"><?= esc(strlen($row->student_name) > 20 ? substr($row->student_name, 0, 20) . '...' : $row->student_name) ?></td>
                          <td class="mono-text fw-bold"><?= $row->meja ?></td>
                          <td class="text-center">
                            <?php if ($row->attended == 1): ?>
                              <span class="status-tag status-confirmed">Confirmed</span>
                            <?php else: ?>
                              <span class="status-tag status-unconfirmed">Unconfirmed</span>
                            <?php endif; ?>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

      <div class="col">
        <div class="card brutal-card accent-line-scan h-100 p-3 d-flex flex-column justify-content-between">
          
          <div>
            <div class="d-flex justify-content-between align-items-center mb-3">
              <span class="mono-text fw-bold text-uppercase small" style="letter-spacing: 0.5px;">[ Input Terminal ]</span>
              <span class="badge bg-danger border border-dark rounded-circle p-1"><span class="visually-hidden">Live</span></span>
            </div>
            <div class="row g-2">
              <div class="col-8">
                <input id="myInput" class="form-control scan-input-box form-control-sm" type="text" placeholder="Awaiting Input pass...">
              </div>
              <div class="col-4">
                <button id="scan" class="btn btn-brutal-action btn-sm w-100" onclick="redirectTo()">Scan</button>
              </div>
            </div>
          </div>

          <div class="my-auto py-3 text-center">
            <?php if (isset($logindata[0]->student_name)): ?>
              <div class="text-start p-2">
                <span class="mono-text text-muted small d-block mb-1">DATA MATCH FOUND:</span>
                <div class="p-2 border border-2 border-dark rounded bg-light mb-3">
                  <h6 class="fw-bold m-0 text-dark"><?= esc($logindata[0]->student_name) ?></h6>
                </div>
                
                <div class="big-table-card text-center">
                  <span class="mono-text text-muted small d-block mb-1">ASSIGNED TABLE</span>
                  <div class="giant-number"><?= esc($logindata[0]->meja) ?></div>
                </div>
              </div>
            <?php else: ?>
              <div class="py-4 border border-2 border-dashed border-secondary rounded bg-light">
                <i class="bi bi-person-bounding-box display-6 text-dark mb-2 d-block"></i>
                <span class="mono-text small text-dark fw-bold uppercase">Scan Guest Pass</span>
                <p class="text-muted small m-0 mt-1 px-3">System is locked on auto-focus mode. Ready for scanner signal.</p>
              </div>
            <?php endif; ?>
          </div>

          <div class="pt-2 border-top border-2 border-dark text-center bg-light m-n3 p-2 mt-auto">
            <span class="mono-text small fw-bold text-dark" style="font-size: 0.7rem;"><i class="bi bi-shield-check me-1"></i> LINE SECURE DIRECT ROUTING</span>
          </div>

        </div>
      </div>

    </div> </div>
</main>

<?php echo view('layouts/footer.php'); ?>

<style>
@media (min-width: 1400px) {
  .row-cols-xxl-5 > * {
    flex: 0 0 auto;
    width: 20%;
  }
}
</style>

<script>
  const input = document.getElementById('myInput');

  function keepFocus() {
    setTimeout(() => input.focus(), 0);
  }

  input.addEventListener('blur', keepFocus);
  window.onload = () => input.focus();

  input.addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
      event.preventDefault();
      document.getElementById('scan').click();
    }
  });

  function redirectTo() {
    const value = input.value.trim();
    if (value) {
      window.location.href = `<?= base_url() ?>loginlist?id=` + encodeURIComponent(value);
    } else {
      alert("Validation Error: Empty barcode or text payload processed.");
    }
  }
</script>