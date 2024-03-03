<!DOCTYPE html>
<html lang="hu">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
        <link rel="stylesheet" href="../styles/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Lora:ital@1&display=swap" rel="stylesheet">
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->


</head>
<body>
        <div class="container col border m-10">
                <h1 class="text-center mt-4">Feltöltött hirdetéseim</h1>
                        <?php
                        include ('connect.php');
                        // Adatok lekérése az adatbázisból
                        $UserAz = $_SESSION["UserAz"];
                        $stmt = $conn->prepare("SELECT * FROM ads WHERE UserAz = ?");
                        $stmt->bind_param("s", $UserAz);
                        $stmt->execute();
                        $result = $stmt->get_result();

                        // Ellenőrizd, hogy van-e eredmény
                        if ($result->num_rows > 0) {
                        echo "<div class='table-responsive'>";
                        echo "<table class='table'>";
                        echo "<thead class='thead-dark'>
                                <tr>
                                <th scope='col'>Üzlet neve </th>
                                <th scope='col'>Email </th>
                                <th scope='col'>Telefonszám </th>
                                <th scope='col'>Szolgáltatás </th>
                                <th scope='col'>Település</th>
                                <th scope='col'>Leirás</th>
                                <th scope='col'>Kép</th>
                                <th scope='col'>-------</th>
                                <th scope='col'>-------</th>
                                </tr>
                        </thead>";
                        // Adatok megjelenítése táblázatban
                        while($row = $result->fetch_assoc()) {
                                echo "<tbody>";
                                echo "<tr>";
                                // echo "<td>" . $row["AdAz"] . "</td>";
                                echo "<td scope='row'>" . $row["StoreName"] . "</td>";
                                echo "<td scope='row'>" . $row["StoreEmail"] . "</td>";
                                echo "<td scope='row'>" . $row["StoreMobile"] . "</td>";
                                echo "<td scope='row'>" . $row["ServiceType"] . "</td>";
                                echo "<td scope='row'>" . $row["StoreAddress"] . "</td>";
                                echo "<td scope='row'>" . $row["StoreDescription"] . "</td>";
                                echo "<td scope='row'><img src='" . $row["StoreImageURL"] . "' alt='Store Image' width='200' height='200'></td>";
                                echo "<td scope='row'><button type='button' class='btn btn-secondary' data-toggle='modal' data-target='#modifyModal'>
                                                        Módosítás
                                                        </button>
                                                        <div class='modal fade' id='modifyModal' tabindex='-1' role='dialog' aria-labelledby='modifyModalLabel' aria-hidden='true'>
                                                        <div class='modal-dialog' role='document'>
                                                                <div class='modal-content'>
                                                                <div class='modal-header'>
                                                                <h5 class='modal-title' id='modifyModalLabel'>Hirdetés módosítása</h5>
                                                                <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                                    <span aria-hidden='true'>&times;</span>
                                                                </button>
                                                                </div>
                                                                <div class='modal-body'>
                                                                <!-- Form for modification here -->
                                                                <form action='adsUserModify.php' method='post' enctype='multipart/form-data'>
                                                                <!-- Form fields for modification -->
                                                                <div class='form-group'>
                                                                        <label for='storeName'>Üzlet neve</label>
                                                                        <input type='hidden' name='adModifyId' value='" . $row['AdAz'] . "'>
                                                                        <input type='text' class='form-control' id='storeName' name='storeName' placeholder=" .$row['StoreName'] . ">
                                                                        <input type='email' class='form-control' id='storeEmail' name='storeEmail' placeholder=" .$row['StoreEmail'] . ">
                                                                        <input type='text' class='form-control' id='storeMobile' name='storeMobile' placeholder=" .$row['StoreMobile'] . ">
                                                                        <Select class='form-control' id='serviceType' name='serviceType'>
                                                                        <option  placeholder=".$row['ServiceType'] .">".$row['ServiceType'] ."</option>
                                                                        <option value='Szempillás'>Szempillás</option>
                                                                        <option value='Sminkes'>Sminkes</option>
                                                                        </Select>
                                                                        <input type='text' class='form-control' id='storeAddress' name='storeAddress' placeholder=" .$row['StoreAddress'] . ">
                                                                        <input type='text' class='form-control' id='storeDescription' name='storeDescription' placeholder=" .$row['StoreDescription'] . ">
                                                                        <label for='' class='m-auto' >Kép módositása</label><br>
                                                                        <input type='hidden' name='adModifyId' class='StoreImageURL' id ='StoreImageURL'  value='" . $row['StoreImageURL'] . "'>
                                                                        <img src=" . $row['StoreImageURL'] ." alt='Store Image' width='200' height='200'><br>
                                                                        <input type='file' class='newImage'  name='newImage' id='newImage'><br>
                                                                </div>
                                                                <!-- Add other form fields for modification here -->
                                                                <button type='submit' class='btn btn-primary'>Mentés</button>
                                                                </form>
                                                                </div>
                                                                
                                                                </div>
                                                        </div>
                                                        </div>
                                                        </td>";
                                // echo "<td scope='row'>" . '<form action="" method="post">
                                //                                 <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modifyModal">
                                //                                 Módosítás
                                //                                 </button>
                                //                                 </form>' . "</td>";
                                echo "<td scope='row'><form action='../includes/deleteUserAds.php' method='post'>
                                <input type='hidden' name='ad_id' value='" . $row['AdAz'] . "'>
                                <button class='btn btn-secondary' type='submit'>Törlés</button>
                                </form></td>";
                                // echo "<td scope='row'><form action="" method="post">
                                //                                 <input type="hidden" name="ad_id" value="' . $row['AdAz']; . '">
                                //                                 <button class="btn btn-secondary" type="submit">Törlés</button>
                                //                                 </form>"</td>";
                                echo "</tr>";
                                echo "</tbody>";
                        }
                        echo "</table>";
                        echo "</div>";
                        } else {
                        echo "Nincs elérhető adat.";
                        }
                        $stmt->close();
                        $conn->close();
                        ?>
        </div>  
        <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+Yo4U4r3+6G8z6XvBuv2KQOel9ZOp5Lym9+JvoV" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-AkGnakAk4EZq8vEtj0F/1pExbx1v1lBk7w+7uZ0W+COlf3mrKPrZf8wD1JFOIMxZ" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-LIt051sstqu21ndwYT7ZsZk3KL9RjH8D6Lh0N8OagCKgljK/kzOA8hjWzJ4yPGNp" crossorigin="anonymous"></script> -->
       
</body>
<!-- <script src="../scripts/userFunctions.js"></script> -->
</html>