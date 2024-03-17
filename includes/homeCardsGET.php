<?php
    include ('connect.php');

        $stmt = $conn->prepare("SELECT * FROM services");
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
                        echo '<div class="grid-container">';
                        while($row = $result->fetch_assoc()) {
                          echo '<div class="cols-md-4">';
                            include ('../includes/homeCards.php');
                            echo '</div><br>';
                        }
                        echo '</div><br>';
                        } else {
                        echo "Nincs elérhető adat.";
                        }
                        $stmt->close();
                        $conn->close();
?> 
     
     <!-- <div class="row">
          <div class="col-md-4 col-12 text-center mb-3">
            <div class="card">
              <img src="../img/content/fodrasz.jpg" class="card-img-top" alt="Fodrász" />
              <div class="card-body">
                <h5 class="card-title"> <a href="#" data-toggle="modal" data-target="#idEspresso">Fodrász</a> </h5>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-12 text-center mb-3">
            <div class="card">
              <img src="../img/content/barber.jpg" class="card-img-top" alt="Barber" />
              <div class="card-body">
                <h5 class="card-title"> <a href="/src/barber.html">Barber</a> </h5>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-12 text-center mb-3">
            <div class="card">
              <img src="../img/content/korom.jpg" class="card-img-top" alt="Manikűr" />
              <div class="card-body">
                <h5 class="card-title">Manikűr, műköröm</h5>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-12 text-center mb-3">
            <div class="card">
              <img
                src="../img/content/szempilla.jpg"
                class="card-img-top"
                alt="Szempilla építés"
              />
              <div class="card-body">
                <h5 class="card-title">Szempilla</h5>
              </div>
            </div>
          </div>

          <div class="col-md-4 col-12 text-center mb-3">
            <div class="card">
              <img src="../img/content/kozmetikus.jpg" class="card-img-top" alt="Kozmetika" />
              <div class="card-body">
                <h5 class="card-title">Kozmetikus</h5>
              </div>
            </div>
           </div>

           <div class="col-md-4 col-12 text-center mb-3">
            <div class="card">
              <img src="../img/content/smink.jpg" class="card-img-top" alt="Smink" />
              <div class="card-body">
                <h5 class="card-title">Smink</h5>
              </div>
            </div>
           </div>
          </div> -->