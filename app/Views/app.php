<?= $this->include('partials/header') ?>

<!-- Page Wrapper -->
<div id="wrapper">

  <?= $this->include('partials/sidebar') ?>

  <!-- Content Wrapper -->
  <div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

      <?= $this->include('partials/topbar') ?>

      <!-- Begin Page Content -->
      <div class="container-fluid">
        <?= $this->renderSection('content') ?>
      </div>
      <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <?= $this->include('partials/foot') ?>

  </div>
  <!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<?= $this->include('partials/footer') ?>