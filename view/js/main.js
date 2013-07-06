var xhr = new XMLHttpRequest();
xhr.open('POST', 'http://localhost/financeDoctrine/controller/accountController.php', true);
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

xhr.onreadystatechange = function(){
	console.log(xhr.readyState);
	if(xhr.readyState==4){
		console.log(xhr.responseText);

	}
}

xhr.send("op=list");

