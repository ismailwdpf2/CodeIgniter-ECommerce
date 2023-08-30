


<?= $this->extend('Layouts/ecom.php') ?>

<?= $this->section('content') ?>

<div class="container">
<form method="post" action="<?= base_url('/do-login') ?>">
 
  <div class="mb-3">
    <label for="exampleInputEmail1"  class="form-label">Email address</label>
    <input type="email" name="email" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">   
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" required class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
<br>
<?= $this->endSection() ?>