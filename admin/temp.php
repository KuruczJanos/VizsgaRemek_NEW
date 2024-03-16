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

                                                                        <input type='hidden' name='adModifyId' value='" . $row['AdAz'] . "'>
                                                                        <label for='storeName'>Üzlet neve
                                                                        <input type='text' class='form-control' id='". "storeName" . $row['AdAz']. "' name='storeName' placeholder=" .$row['StoreName'] . "></label><br>
                                                                        <label for='storeEmail'>Email cim
                                                                        <input type='email' class='form-control' id='". "storeEmail" . $row['AdAz']. "' name='storeEmail' placeholder='E-mail' value=" . (isset($_POST['storeEmail']) ? $_POST['storeEmail'] : '') . "></label><br>
                                                                        <label for='storeMobile'>Telefonszám
                                                                        <input type='text' class='form-control' id='". "storeMobile" . $row['AdAz']. "' name='storeMobile' placeholder=" .$row['StoreMobile'] . "></label><br>
                                                                        <label for='serviceType'>Szolgáltatás
                                                                        <Select class='form-control' id='". "serviceType" . $row['AdAz']. "' name='serviceType'>
                                                                        <option  placeholder=".$row['ServiceType'] .">".$row['ServiceType'] ."</option>
                                                                        <option value='Szempillás'>Szempillás</option>
                                                                        <option value='Sminkes'>Sminkes</option>
                                                                        </Select></label><br>
                                                                        <label for='storeAddress'>Cim
                                                                        <input type='text' class='form-control' id='". "storeAddress" . $row['AdAz']. "' name='storeAddress' placeholder=" .$row['StoreAddress'] . "></label><br>
                                                                        <label for='storeDescription'>Leirás
                                                                        <input type='text' class='form-control' id='". "storeDescription" . $row['AdAz']. "' name='storeDescription' placeholder=" .$row['StoreDescription'] . "></label><br>
                                                                        <p>Kép módositása</p>
                                                                        <input type='hidden' name='adModifyIdImg' class='StoreImageURL' id ='". "storeImageURL" . $row['AdAz']. "'  value='" . $row['StoreImageURL'] . "'>
                                                                        <img src=" . $row['StoreImageURL'] ." alt='Store Image' width='200' height='200'><br>
                                                                        <input type='file' class='newImage'  name='newImage' id='". "newImage" . $row['AdAz']. "'><br>
                                                                
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
                                echo "<td scope='row'><form action='../admin/adminDeleteAds.php' method='post'>
                                <input type='hidden' name='ad_id' value='" . $row['AdAz'] . "'>
                                <button class='btn btn-secondary' type='submit'>Törlés</button>
                                </form></td>";
                                // echo "<td scope='row'><form action="" method="post">
                                //                                 <input type="hidden" name="ad_id" value="' . $row['AdAz']; . '">
                                //                                 <button class="btn btn-secondary" type="submit">Törlés</button>
                                //                                 </form>"</td>";
                                echo "</tr>";
                                echo "</tbody>";

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