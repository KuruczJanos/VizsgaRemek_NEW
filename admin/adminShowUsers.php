<?php
  
    echo '
        <div class="col d-flex">
            <div class="card-deck ">
                <img src="' . $row["UserPhoto"] . '" class="card-img-top" alt="..." style="width: 25rem;"  >
                <div class="card-body">
                    <h5 class="card-title">Felhasználó Azonositó: ' . $row["UserAz"] . '</h5>
                    <p class="card-text">
                        Felhasználó neve: '. $row["UserName"] .'<br>
                        Teljes neve: '. $row["UserFullName"] .'<br>
                        Jelszava: '. $row["UserPassword"] .'<br>
                        Email cime: '. $row["UserEmail"] .'<br>
                        Telefonszáma: '. $row["UserMobile"] .'<br>
                        Profil tipusa: '. $row["Type"] .'<br>
                        Helyreállitási kód: '. $row["ResetCode"] .'<br>
                    </p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">Regisztráció dátuma</small><br>
                    <a href="#" class="btn btn-primary mt-2">Módositás</a>
                    <a href="#" class="btn btn-primary mt-2">Törlés</a>
                    <a href="#" class="btn btn-primary mt-2">Üzenet</a>
                </div>
            </div>
        </div>';

?>