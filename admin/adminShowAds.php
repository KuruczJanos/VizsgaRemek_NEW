<?php
  
    echo '
        <div class="col d-flex">
            <div class="card-deck ">
                <img src="' . $row["StoreImageURL"] . '" class="card-img-top" alt="..." style="width: 25rem;"  >
                <div class="card-body">
                    <h5 class="card-title">' . $row["StoreName"] . '</h5>
                    <p class="card-text">
                        '. $row["StoreEmail"] .'<br>
                        '. $row["StoreMobile"] .'<br>
                        '. $row["StoreAddress"] .'<br>
                        '. $row["StoreDescription"] .'<br>
                    </p>
                </div>
                <div class="card-footer">
                    <small class="text-muted">'. $row["LastModifyDate"] .'</small><br>
                    <a href="#" class="btn btn-primary mt-2">Módositás</a>
                    <a href="#" class="btn btn-primary mt-2">Törlés</a>
                    <a href="#" class="btn btn-primary mt-2">Üzenet</a>
                </div>
            </div>
        </div>';

?>
