<?php
function get_total_all_records()
{
 include('db.php');
 $statement = $connection->prepare("select u.datum as datum, u.trajanje_ugovora as trajanje, k.korisnicko_ime as korisnik, p.naziv_paketa as paket, mt.naziv as telefon from ugovor u join korsinik k on u.korisnik_id=k.korisnik_id join model_telefona mt on mt.model_id=u.model_id join paket p on p.paket_id=u.paket_id");
 $statement->execute();
 $result = $statement->fetchAll();
 return $statement->rowCount();
}
?>