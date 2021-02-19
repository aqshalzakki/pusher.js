<?= $this->extend('app') ?>

<?= $this->section('content') ?>
<div class="container-fluid">
  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard Pegawai</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
  </div>

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-12 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center mb-2">
            <button data-toggle="modal" data-target="#createPegawaiModal" class="btn btn-sm btn-success"> + Tambah Data Baru</button>
          </div>

          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <table class="table table-sm table-hover">
                <thead>
                  <tr>
                    <th>Nama</th>
                    <th>Umur</th>
                    <th>Gaji</th>
                  </tr>
                </thead>
                <tbody id="pegawaiTbody">
                  <?php foreach ($pegawai as $p): ?>
                    <tr>
                      <td><?= $p['pegawai_name'] ?></td>    
                      <td><?= $p['pegawai_age'] ?></td>    
                      <td><?= $p['pegawai_salary'] ?></td>    
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="createPegawaiModal" tabindex="-1" role="dialog" aria-labelledby="createPegawaiModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form onsubmit="event.preventDefault(); createNewPegawai(this)" action="/pegawai" method="post">
        <div class="modal-header">
          <h5 class="modal-title" id="createPegawaiModalLabel">Tambah Data Pegawai</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-12 form-group">
              <label for="namaPegawai">Nama : </label>
              <input required id="namaPegawai" name="pegawai_name" type="text" class="form-control"></input>
            </div>
            <div class="col-12 form-group">
              <label for="`umur`">Umur : </label>
              <input required id="umur" name="pegawai_age" type="text" class="form-control"></input>
            </div>
            <div class="col-12 form-group">
              <label for="`gaji`">Gaji : </label>
              <input id="`gaji`" name="pegawai_salary" type="text" class="form-control"></input>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Tambah</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  const handleNewPegawai = newPegawai => {
    const pegawaiTbody = document.getElementById('pegawaiTbody')
    pegawaiTbody.insertAdjacentHTML('beforeend', `
      <tr>
        <td>${newPegawai.pegawai_name}</td>    
        <td>${newPegawai.pegawai_age}</td>    
        <td>${newPegawai.pegawai_salary}</td> 
      </tr>
    `)
  }

  // Enable pusher logging - don't include this in production
  Pusher.logToConsole = true;

  const pusher = new Pusher('4aca30d96f3a6a714e91', {
    cluster: 'ap1'
  });

  const channel = pusher.subscribe('pegawai-channel');
  channel.bind('new-pegawai', handleNewPegawai);

  const createNewPegawai = form => {
    const formData = new FormData(form)

    axios.post(form.action, formData)
  }
</script>
<?= $this->endSection() ?>