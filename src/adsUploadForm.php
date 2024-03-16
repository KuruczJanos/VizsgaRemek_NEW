
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../styles/adsUploadStyle.css"> -->
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/source.scss">
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lora:ital@1&display=swap" rel="stylesheet">
</head> -->
<body>
    <h1 class="text-center mt-3">Hirdetés felöltése</h1>
    <div class="container col-md-8 border">
        <div class="container">
            <form action="../includes/adsUploadOK.php" method="POST" enctype="multipart/form-data">
                    <label for="UpStoreName" class="m-auto">Üzlet neve</label>
                    <input type="text" placeholder="Üzlet neve" id="UpStoreName" name="UpStoreName" class="form-control mb-3" required="">
                    <label for="UpStoreType">Üzlet tipusa</label>
                    <Select class="form-control" id="UpStoreType" name="UpStoreType">
                        <option value="Fodrász">Fodrász</option>
                        <option value="Kozmetikus">Kozmetikus</option>
                        <option value="Szempillás">Szempillás</option>
                        <option value="Sminkes">Sminkes</option>
                    </Select>
                    <label for="UpStoreAddress" class="m-auto">Cím</label>
                    <input type="text" placeholder="Cím" id="UpStoreAddress" name="UpStoreAddress" class="form-control mb-3" required="">
                    <label for="UpStoreEmail" class="m-auto">E-mail cím</label>
                    <input type="email" placeholder="Email cím" id="UpStoreEmail" name="UpStoreEmail" class="form-control mb-3" required="">
                    <label for="UpStoreMobile" class="m-auto">Telefon</label>
                    <input type="text" placeholder="Telefonszám" id="UpStoreMobile" name="UpStoreMobile" class="form-control mb-3" required="">
                    <label for="UpStoreDescription" class="m-auto">Leírás</label>
                    <input type="text" placeholder="Leírás" id="UpStoreDescription" name="UpStoreDescription" class="form-control mb-3" required="">
                    <label for="FileToUpload" class="m-auto">Kép feltöltés</label><br>
                    <input type="file" class=""  name="FileToUpload" id="FileToUpload"><br>
                    <input type="submit" class="btn btn-primary mt-3" name="submit" value="Hirdetés feltöltése"><br><br>
            </form>
        </div>
    </div>
</body>
</html>