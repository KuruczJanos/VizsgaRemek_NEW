<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<link rel="stylesheet" href="../styles/style.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lora:ital@1&display=swap" rel="stylesheet">
<div class="container-fluid">
<?php 
    include ('header.php');
    include ('connect.php');
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["listService"])){
            // echo $_POST["listService"];
        $stmt = $conn->prepare("SELECT * FROM ads WHERE ServiceType = ? ");
        $stmt->bind_param("s", $_POST['listService']);
        $stmt->execute();
        $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                echo '<div class="table-responsive">
                        <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col">Üzlet neve </th>
                                <th scope="col">Email </th>
                                <th scope="col">Telefonszám </th>
                                <th scope="col">Szolgáltatás </th>
                                <th scope="col">Település</th>
                                <th scope="col">Leirás</th>
                                <th scope="col">Kép</th>
                                <th scope="col">-------</th>
                            </tr>
                        </thead>';
                        while($row = $result->fetch_assoc()) {
                            echo "<tbody>
                                    <tr>
                                        <td scope='row'>" . $row["StoreName"] . "</td>
                                        <td scope='row'>" . $row["StoreEmail"] . "</td>
                                        <td scope='row'>" . $row["StoreMobile"] . "</td>
                                        <td scope='row'>" . $row["ServiceType"] . "</td>
                                        <td scope='row'>" . $row["StoreAddress"] . "</td>
                                        <td scope='row'>" . $row["StoreDescription"] . "</td>
                                        <td scope='row'>
                                            <img src='" . $row["StoreImageURL"] . "' alt='Store Image' width='200' height='200'></td>
                                        <td scope='row'><button type='button' class='btn btn-secondary' data-toggle='modal' data-target='#EmailModal'>
                                            Üzenet</button>
                                                <div class='modal fade' id='EmailModal' tabindex='-1' role='dialog' aria-labelledby='EmailModalLabel' aria-hidden='true'>
                                                <div class='modal-dialog' role='document'>
                                                        <div class='modal-content'>
                                                        <div class='modal-header'>
                                                        <h5 class='modal-title' id='EmailModalLabel'>Üzenet küldése</h5>
                                                        <button type='button' class='close' data-dismiss='modal' aria-label='Close'>
                                                            <span aria-hidden='true'>&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class='modal-body'>
                                                            <form action='emailSend.php' method='post' enctype='multipart/form-data'>
                                                                <input type='hidden' name='adModifyId' value='" . $row['AdAz'] . "'>
                                                                <label for='sendEmail'>Email cimed
                                                                <input type='email' class='form-control' id='sendEmail' name='sendEmail' placeholder='example@example.com'></label><br>
                                                                <label for='message'>Üzenet tartalma
                                                                <input type='text' class='form-control' id='message' name='message' placeholder='Ide ird az üzenetet'></label><br>
                                                                <button type='submit' class='btn btn-primary'>Küldés</button>
                                                            </form>
                                                        </div>
                                                        </div>
                                    </tr>
                                    </tbody>";
                        }
                        echo "</table>";
                        echo '</div><br>';
                        } else {
                        echo "Nincs elérhető adat.";
                        }
                        $stmt->close();
                        $conn->close();
        }else{
            echo 'Ez még nem oké!!';
            
        }
    }else{
        echo 'A kérés nem POST metódus!';
    }
    
?> 
</div>
<div class="container-fluid footer">
      <?php 
          echo "<br>";
          include ('../includes/footerContainer.php');
       ?>
    </div>

<script
      src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF"
      crossorigin="anonymous"
    ></script>
    <script src="../scripts/functions.js"></script> 
