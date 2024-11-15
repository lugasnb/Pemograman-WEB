<form class="form-control" name="form1" method="POST" action="">
    <div class="mb-3">
        <label id="nilai" for="nilai">Nilai Akhir: </label>
        <input id="nilai" name="nilai" type="text" class="form-control" />
    </div>
    <input id="kirim" name="kirim" type="hidden" class="form-control" value="1"/>
    <button type="submit" class="btn btn-dark">Submit</button>

</form>

<?php

$nilai_akhir=0;
$mutu="";
if(isset($_POST['kirim'])=="1"){
    $nilai_akhir=$_POST['nilai'];
    if($nilai_akhir>=85) {
        $mutu = "A";
    } elseif ($nilai_akhir>=75) {
        $mutu = "B";
    } elseif ($nilai_akhir>=55) {
        $mutu = "C";
    } elseif ($nilai_akhir>=40) {
        $mutu = "D";
    } else {
        $mutu = "E";
}
}
echo("Nilai Akhir=".$nilai_akhir);
echo("<br/>");
echo("Nilai Mutu=".$mutu);
?>