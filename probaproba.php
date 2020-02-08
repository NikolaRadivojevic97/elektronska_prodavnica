<?php include("header.php");?>
<br><br><br><br>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	nadam se da vo radi
</body>
</html>

<script>
var name="peraperic"
var settings = {
	"async": true,
	"crossDomain": true,
	"url": "https://pozzad-email-validator.p.rapidapi.com/emailvalidator/validateEmail/"+name,
	"method": "GET",
	"headers": {
		"x-rapidapi-host": "pozzad-email-validator.p.rapidapi.com",
		"x-rapidapi-key": "e656f285e2mshe3e8064b54abcddp175138jsn0949503e37e3"
	}
}

$.ajax(settings).done(function (response) {
	if(response['isValid']==true){
		alert("tacan");
	}else{
		alert("netacan");
	}
});
</script>