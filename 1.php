<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php 

if ($_POST['Submit'] == "Submit") {
    $tiperumah    = $_POST['tiperumah'];
    $lamakredit            = $_POST['lamakredit'];

$dp = 20/100;
$dd = $dp* $tiperumah;
$sisa = $tiperumah-$dd;
$lama = $sisa/$lamakredit;

echo  "harga:". $tiperumah ;
echo "<br>";
echo  "Uang Muka:". $dd ;
echo "<br>";
echo "Sisa : ". $sisa;
echo "<br>";
echo "lama Kredit : ". $lamakredit ." bulan";
echo "<br>";
echo "Angsuran : ". $lama;

}
?>

    <form action="<?php $PHP_SELF ?>" method="POST">
    <select name="tiperumah" id="">
    <option value="-">- Pilih Tipe -
                    <option value="120000000">Rose 120.000.000
                    <option value="300000000">Gold 300.000.000
                    <option value="360000000">Platinum 360.000.000
</select>
<select name="lamakredit" id="">
    <option value="-">- Pilih Tipe -
                    <option value="12">12 Bulan
                    <option value="18">18 Bulan
                    <option value="24">24 Bulan
</select>

<input type="submit" name="Submit" value="Submit">   
    </form>
</body>
</html>


