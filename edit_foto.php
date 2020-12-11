<?php $menu = ''; ?>
<?php include 'header.php';  
include 'process_form.php';?>
<style>
#profileDisplay {
  display: block;
  width: 100%;
  margin: 10px auto;
  border-radius: 20px
}
</style>
<div class="main-content">
    <div class="container-fluid">
        
        <div class="row">
            <div class="col-md-4 container">
                <div class="card">
                    <div class="card-body">

                        <form action="process_form.php" method="post" enctype="multipart/form-data">

                            <h3 class="text-center">Edit Profile</h3>

                            <?php if (!empty($msg)) : ?>
                                <div class="alert <?= $css_class; ?>">
                                    <?= $msg; ?>
                                </div>
                            <?php endif; ?>

                            <div class="form-group text-center">
                                <?php if($df['Profil_Image']==null){ ?>
                                        <img src="img/download.png" onclick="triggerClick()" id="profileDisplay">
                                <?php }else { ?>
                                        <img src="img/<?= $df['Profil_Image'] ?>" onclick="triggerClick()" id="profileDisplay">
                                <?php } ?>
                                <label for="profileImage">Profile Image</label>
                                <input type="hidden" name="Gambar_Lama" value="<?= $_GET['Profil_Image']; ?>">
                                <input type="hidden" name="ID_Gambar" value="<?= $_GET['ID_Gambar']; ?>">
                                <input type="file" name="profileImage" onchange="displayImage(this)" id="profileImage" style="display:none;">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="save-user" class="btn btn-primary btn-block">Save User</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
<script>
function triggerClick() {
    document.querySelector('#profileImage').click();
}

function displayImage(e) {
    if (e.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
}
</script>