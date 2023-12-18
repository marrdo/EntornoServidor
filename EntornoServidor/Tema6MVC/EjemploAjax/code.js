var xhttp = new XMLHttpRequest();
xhttp.onreadystatechange = function () {
  if (this.readyState == 4 && this.status == 200) {
    // Typical action to be performed when the document is ready:
    document.getElementById("cambiable").innerHTML = xhttp.responseText;
  }
};
xhttp.open(
  "GET",
  "http://localhost/EntornoServidor/EntornoServidor/Tema6MVC/EjemploAjax/fragmento.php",
  true
);
xhttp.send();
