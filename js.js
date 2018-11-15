function myFunction() {

var x = document.getElementById("myFile"); //Agarra el documento o documento que seleccionamos y lo guarda en la variable x
var txt = ""; //va a mostrar que hemos elegido


if ('files' in x) {                         //si hay un archivo en la variable x
    if (x.files.length == 0) {
        txt = "Selecciona uno o más archivos.";
    } else {
        for (var i = 0; i < x.files.length; i++) {          //el for para x.flies.length va a realizar esto por cada archivo subido
            txt += "<br><strong>" + (i + 1) + ". Archivo</strong><br>"; //i+1 me va a mostrar el numero de archivo 1, 2, 3
            var file = x.files[i];
            if ('name' in file) {                           //me trae el nombre de ese archivo que subi
                txt += "Nombre: " + file.name + "<br>";
            }
            if ('size' in file) {                         //el tamaño del archivo que subi
                txt += "Tamaño: " + file.size + " bytes <br>";
            }
        }
    }
}
else {
    if (x.value == "") {                        //si no se han subido archivos o no son soportados por el browser
        txt += "Selecciona uno o más archivos.";
    } else {
        txt += "El archivo no es soportado por el buscador!";
        txt += "<br>The path of the selected file: " + x.value; // Si el borwser no sporta el archivo subido, me va a devolver el path de ese archivo.

    }
}
document.getElementById("demo").innerHTML = txt;  //va a mostrar lo que sea que se haya formado arriba segun que cargue
}


//chequear que las extensiones sean solo las permitidas


