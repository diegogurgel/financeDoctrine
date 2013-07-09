var xhr = new XMLHttpRequest();
xhr.open('POST', 'http://localhost/financeDoctrine/controller/accountController.php', true);
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');



xhr.onreadystatechange = function(){
	console.log(xhr.readyState);
	if(xhr.readyState==4){
		apresentaJsonContas(JSON.parse(xhr.responseText));
	}

}
function apresentaJsonContas(json){
	console.log(json);
	var ContasTxt;
	for(var i in json){

		ContasTxt +=json[i].id+ " - "+ json[i].name + " - " +json[i].created +" - "+ json[i].modified+"<br/>";
		var corpot =  document.getElementsByTagName("body")[0];
		
	}
	corpot.innerHTML = ContasTxt;


}

xhr.send("op=list");

