
<?php
//Guardar un archivo en mi root folder

if(isset($_POST['submit'])){
    $file = $_FILES['file'];
    $fileCount = count($file['name']);

    for ($i=0; $i<$fileCount; $i++){
    $file = $_FILES['file'];[$i]; //_FILES es una supervariable global q me trae los datos del archivo
    $fileName = $_FILES['file']['name'][$i];
    $fileTmpName = $_FILES['file']['tmp_name'][$i];
    $fileSize = $_FILES['file']['size'][$i];
    $fileError = $_FILES['file']['error'][$i];
    $fileTyle = $_FILES['file']['type'][$i];
    
    $fileExt = explode('.', $fileName );
    $fileActualExt = strtolower(end($fileExt)); //para chequear la q la extension sea lo que yo quiero
    $fileJustName = strtolower($fileExt[0]); // para traerme el nombre del archivo real

    $allowed = array('xls', 'xlsx');//solo permite excels

        if (in_array($fileActualExt, $allowed )){               //si la extension es lo que yo quiero
            if($fileError === 0){               //si no tenemos errores al subir el archivo
                if($fileSize < 10000000){         //si es menor a ese tamaño
                    //TODO: aagregar un case, dependiendo el usuario, en que carpeta se van a guardar los excel
                    $fileNameNew = $fileJustName.".".$fileActualExt;

                    $fileDestination = 'uploads/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination );
                    header("Location: index.html?uploadsuccess");
                } else{
                    echo '<p style="text-align: center; margin-top:100px;"><span style="font-size: 40px; font-family: verdana,palatino; color: #003366;" >Tu archivo es muy grande</span></p> </br>;';
                    
                    header("refresh:1.5;index.html?muygrande");
                }
            }else {
                echo '<p style="text-align: center; margin-top:100px;"><span style="font-size: 40px; font-family: verdana,palatino; color: #003366;" >Hay un error al subir el archivo.</span></p> </br>;';
                
                header("refresh:1.5;index.html?error");

            }

        } else{
            echo '<p  style="text-align: center; margin-top:100px;"><span style="font-size: 40px; font-family: verdana,palatino; color: #003366;" >No se pueden subir archivos de este tipo</span></p> </br>;';
            
            header("refresh:1.5;index.html?noesearchivo");
            
        }
    }
}