<?php
include "koneksi.php";
$msg = "";
$css_class = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $profileImageName = time() . '_' . $_FILES['profileImage']['name'];
    $ID_Gambar = $_POST['ID_Gambar'];
    $Gambar_Lama = $_POST['Gambar_Lama'];

    $target = 'img/' . $profileImageName;

    if(move_uploaded_file($_FILES['profileImage']['tmp_name'],$target)){

        if($Gambar_Lama==!null){
            unlink('img/'.$Gambar_Lama);
        }
        $sql = mysqli_query($konek, "UPDATE gambar SET Profil_Image = '$profileImageName' WHERE ID_Gambar = '$ID_Gambar'");
    
    }
    echo "
    <script>
    document.location.href = 'profil.php';
    </script>
    ";

    
}
