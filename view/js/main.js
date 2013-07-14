

window.onload= function(){
	var btnListarContas =  document.getElementById('listarContas');
	btnListarContas.onclick = function(){
		var xhr = new XMLHttpRequest();
		xhr.open('POST', 'http://localhost/financeDoctrine/controller/accountController.php', true);
		xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

		xhr.onreadystatechange = function(){
			if(xhr.readyState==4){
				apresentaJsonContas(JSON.parse(xhr.responseText));
			}

		}
		function apresentaJsonContas(json){
			var ContasTxt='';
			var sctionContas = document.getElementById("contas");
			for(var i in json){
				conta = document.querySelector('.conta').cloneNode(true);
				conta.childNodes[1].innerHTML = json[i].id+"  "+json[i].name;
				conta.childNodes[4].innerHTML = json[i].created;
				conta.childNodes[7].innerHTML = json[i].modified;
				var corpo =  document.getElementsByTagName("body")[0];
				conta.style.display = "inline";
				corpo.appendChild(conta);

			}
			


		}

		xhr.send("op=list");


	}
}