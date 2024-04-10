<?php
    // echo '<div class="row-md-4">';
    // echo '<div class="cols-md-3" g-4>';
    echo '
            <div class="card homeCards">
                <img src="'.$row['ServiceImgURL'] .'" alt="Kép 1">
                    <div class="card-content">
                    <h3 class="d-block">
                    <form action="../includes/checkpost.php" id="listServiceForm"  name="listServiceForm" method="post" enctype="multipart/form-data">
                        <input type="submit" name="listService" class="btn btn-primary" value="'. $row["ServiceName"] .'">
                    </form>
                        </h3>
            </div><br>'
;

?>

