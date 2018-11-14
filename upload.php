
<?php
//Guardar un archivo en mi root folder

if(isset($_POST['submit'])){
    var_dump($_FILES);
    $file = $_FILES['file']; //_FILES es una supervariable global q me trae los datos del archivo
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileTyle = $_FILES['file']['type'];
    
    $fileExt = explode('.', $fileName );
    $fileActualExt = strtolower(end($fileExt)); //para chequear la q la extension sea lo que yo quiero
    $fileJustName = strtolower($fileExt[0]); // para traerme el nombre del archivo real

    $allowed = array('xls', 'xlsx');//solo permite excels

//TODO: for loop para que me haga esto por cada file subido la variable _FILES me toma todos los archivos subidos?
    $fileCount = count($file);
    echo ("<script>console.log( 'Debug Objects: " . $fileCount . "' );</script>");
    for ($i=0; $i<$fileCount; $i++){
        if (in_array($fileActualExt, $allowed )){               //si la extension es lo que yo quiero
            if($fileError === 0){               //si no tenemos errores al subir el archivo
                if($fileSize < 10000000){         //si es menor a ese tamaño
                    //TODO: aagregar un case, dependiendo el usuario, en que carpeta se van a guardar los excel
                    $fileNameNew = $fileJustName.".".$fileActualExt;

                    $fileDestination = 'uploads/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination );
                    header("Location: index.html?uploadsuccess");
                } else{
                    echo "Tu archivo es muy grande.";
                }
            }else {
                echo "Hay un error al subir el archivo.";

            }

        } else{
            echo "No se pueden subir archivos de este tipo.";
        }
    }
}