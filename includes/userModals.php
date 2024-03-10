<!-- MODALS -->
<div class="modal fade" id="ProfileUpdateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h1 class="modal-title fs-5" id="exampleModalLabel">
        <?php echo 'Üdv ' .$_SESSION['UserFullName'].' !';  ?>
      </h1>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
    <img src="<?php echo $_SESSION['UserPhoto']?>" width="150" height="150" class="d-inline-block align-top" alt=""><b>
    <label for="img"><h1>Profil kép<br>módosítása</h1></label>
    <div class="form-group" ></div>
    <form name="UpdateUserForm" action="../includes/userProfileUpdate.php" method="POST" enctype="multipart/form-data" autocomplete="off">
    <br>
    <label for="file">Kép feltöltése</label><br>
    <input type="file" name="UserPhotoUpload" id="UserPhotoUpload" class="form-control mt-3"><br>
    <label for="text">Új telefonszám</label>
    <input type="tel" placeholder="Új telefonszám" id="UpdateUserMobile" name="UpdateUserMobile" class="form-control mt-3" value=""><br>
    <label for="password">Jelszó megadása</label>
    <input type="password" placeholder="Jelszó" id="UpdateUserPassword" name="UpdateUserPassword"  placeholder="" class="form-control mt-3" autocomplete="off" value="">
    <input type="password" placeholder="Jelszó megerősítése" id="UpdateUserRePassword" name="UpdateUserRePassword"  placeholder="" class="form-control mt-3" autocomplete="off" value="">
    <br>
    <input type="submit" class="btn btn-primary mt-3" name="UpdateButton" value="Mentés">
    <br><br>
    
    </form>
    </div>
      <!-- <form name="UpdateUserForm" action="updateuserprofile.php" method="POST">
        Mobiltelefonszám ellenőrzés hozzáadása kell még
        <input type="tel" placeholder="Telefonszám" id="UpdateUserMobile" name="UpdateUserMobile" class="form-control mt-3" minlength = 11>
        <input type="password" placeholder="Jelszó" id="UpdateUserPassword" name="UpdateUserPassword" class="form-control mt-3" >
        <input type="password" placeholder="Jelszó megerősítése" id="UpdateUserRePassword" name="UpdateUserRePassword" class="form-control mt-3">
        <br>
        <input type="submit" class="btn btn-primary mt-3" name="UpdateButton" value="Mentés">
        <br><br>
      </form> -->
    </div>
    <div class="modal-footer"> </div>
  </div>
</div>
</div>