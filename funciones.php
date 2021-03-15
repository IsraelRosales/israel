<?php
class funciones {

	public function Write($nombre,$texto) {
		$file = "textos_almacenados/".$nombre.".txt"; 
		$fp = fopen($file, "w"); //se crea el archivo
		fwrite($fp, $texto); // aqui esta escribiendo en el archivo lo que el usuario coloco en textarea
		fclose($fp);//siempre se tiene que cerrar el archivo
	}

	public function VerificarTexto($a) {
		return preg_match("/^[0-9\p{L}_-]+$/i", $a );
	}

	public function CrearArchivo(){
		if(isset($_POST['nombre']) && isset($_POST['texto'])){
			$nombre = $_POST['nombre'];
			$texto = $_POST['texto'];
			//abrimos sesiones para que no se elimine el texto si hay un error
			$_SESSION['nombre'] = $nombre;
			$_SESSION['texto'] = $texto;
			//verificamos si los campos estan vacios
			if(!empty($nombre) && !empty($texto)){
				if($this->VerificarTexto($nombre)){
					//Si el archivo no existe, se crea el archivo 
					if(!file_exists("textos_almacenados/".$nombre.".txt")){ 
						$this->Write($nombre, $texto); // función que crea el archivo.txt
						$_SESSION['alert_archivo'] = "El archivo ".$nombre.".txt se ha creado correctamente"; // mensaje de que todo fue exitoso
						$_SESSION['type_alert_archivo'] = "alert-success";
						header("LOCATION: ". PATH ."/index.php?action=mostrar");
						unset($_SESSION['nombre']);
						unset($_SESSION['texto']);
						exit;
					//No puede crearse un archivo con el mismo nombre
					}else{$_SESSION['alert_archivo_crear'] = "Ya existe un archivo llamado ".$nombre.".txt";}	
				//No se pueden colocar caracteres especiales, ni acentos, ni espacios
				}else{$_SESSION['alert_archivo_crear'] = "El nombre del archivo no puede contener caracteres especiales, ni acentos, ni espacios. El texto puede contener letras, números, guión bajo y guiones";}	
			// No pueden haber campos vacios
			}else{$_SESSION['alert_archivo_crear'] = "Por favor rellena todos los campos";}
		}
		// Redireccionamos si hay error
		$_SESSION['type_alert_archivo_crear'] = "alert-danger";
		header("LOCATION: ". PATH ."./index.php");
		exit;	
	}

	public function BorrarArchivo($nombre) {
		$ruta = "textos_almacenados/".$nombre."";
		if(file_exists($ruta)){
			unlink($ruta);
			$_SESSION['alert_archivo'] = "Archivo eliminado correctamente";
			$_SESSION['type_alert_archivo'] = "alert-success";
			header("LOCATION: ". PATH ."./index.php?action=mostrar");
			exit;	
		}else{
			$_SESSION['alert_archivo'] = "El archivo que intentas borrar no existe";
			$_SESSION['type_alert_archivo'] = "alert-danger";
			header("LOCATION: ". PATH ."./index.php?action=mostrar");
			exit;	
		}
	}

	public function MostrarArchivos (){
		$dir = 'textos_almacenados/';
		$ruta = 'editar_archivo.php';
		$dh  = opendir($dir);
		$count = 0;
		while (false !== ($archivo = readdir($dh))) {
			$ext = substr($archivo, strrpos($archivo, '.') + 1);
			if ($archivo != "." && $archivo != "..") {
				if(in_array($ext, array("txt")))
					echo '
							<tr>
							<th scope="row">'.($count+1).'</th>
							<td>'.$archivo.'</td>
							<td>
								<a onclick="MostrarModal(\''.$archivo.'\',\''.$ruta.'\')" class="btn btn-datatable btn-icon btn-transparent-dark"><i class="fas fa-edit"></i></a>
								<a href="'.PATH.'/borrar_archivo.php?nombre='.$archivo.'" class="btn btn-datatable btn-icon btn-transparent-dark"><i class="fas fa-trash"></i></a>
							</td>
							</tr>        
					';
				$count++;
			}
		}
		closedir($dh);
		if ($count == 0){
			echo "<caption class='text-center'>No hay archivos disponibles</caption>";
		}
	}

	public function LeerArchivo($nombre) {
		$file = "textos_almacenados/".$nombre."";
		return file_get_contents($file);
	}

	public function Alert($a, $b){
		if($a=="error"){
			echo '
			<div class="alert alert-danger" role="alert">
			'.$b.'    
			</div>
			';
		}
		return;
	}

	public function EditarArchivo($nombre, $nombre_nuevo, $texto) {
		$nombre_archivo = explode(".", $nombre);
		//$this->Alert("error", "marico el que lo lea");
		if(!empty($nombre_nuevo) && !empty($texto)){
			if($nombre_archivo[0] === $nombre_nuevo){
				$this->Write($nombre_archivo[0], $texto); // función que edita el archivo.txt
				$_SESSION['alert_archivo'] = "El archivo ".$nombre_archivo[0].".txt se ha editado correctamente"; // mensaje de que todo fue exitoso
				$_SESSION['type_alert_archivo'] = "alert-success";
				echo "
				<script type=\"text/javascript\">
					location.href = '". PATH ."/index.php?action=mostrar';
				</script>
				";
			}else{
				if($this->VerificarTexto($nombre_nuevo)){
					//Si el archivo no existe, se crea el archivo 
					if(!file_exists("textos_almacenados/".$nombre_nuevo.".txt")){ 
						$this->Write($nombre_archivo[0], $texto); // función que edita el archivo.txt
						rename("textos_almacenados/".$nombre_archivo[0].".txt", "textos_almacenados/".$nombre_nuevo.".txt");
						$_SESSION['alert_archivo'] = "El archivo ".$nombre_nuevo.".txt (anteriormente ".$nombre_archivo[0].".txt) se ha editado correctamente"; // mensaje de que todo fue exitoso
						$_SESSION['type_alert_archivo'] = "alert-success";
						echo "
						<script type=\"text/javascript\">
							location.href = '". PATH ."/index.php?action=mostrar';
						</script>
						";						
					}else{$this->Alert("error", "Ya existe un archivo llamado ".$nombre_nuevo.".txt");}
				}else{$this->Alert("error", "El nombre del archivo no puede contener caracteres especiales, ni acentos, ni espacios. El texto puede contener letras, números, guión bajo y guiones");}				
			}
		}else{$this->Alert("error", "Por favor rellena todos los campos");}
		return;
	}

	public function CrearDirectorio() {
		if(isset($_POST['nombre'])){
			$nombre = $_POST['nombre'];
			//abrimos sesiones para que no se elimine el texto si hay un error
			$_SESSION['nombre'] = $nombre;
			//verificamos si los campos estan vacios
			if(!empty($nombre)){
				if($this->VerificarTexto($nombre)){
					//Si el archivo no existe, se crea el archivo 
					if(!file_exists("directorios_creados/".$nombre."/")){ 
						//creamos el directorio
						mkdir("directorios_creados/".$nombre."/", 0777);
						$_SESSION['alert_directorio'] = "El archivo ".$nombre." se ha creado correctamente"; // mensaje de que todo fue exitoso
						$_SESSION['type_alert_directorio'] = "alert-success";
						header("LOCATION: ". PATH ."/directorios.php?action=mostrar");
						unset($_SESSION['nombre']);
						exit;
					//No puede crearse un archivo con el mismo nombre
					}else{$_SESSION['alert_directorio_crear'] = "Ya existe un directorio llamado ".$nombre."";}	
				//No se pueden colocar caracteres especiales, ni acentos, ni espacios
				}else{$_SESSION['alert_directorio_crear'] = "El nombre del directorio no puede contener caracteres especiales, ni acentos, ni espacios. El texto puede contener letras, números, guión bajo y guiones";}	
			// No pueden haber campos vacios
			}else{$_SESSION['alert_directorio_crear'] = "Por favor rellena todos los campos";}
		}
		// Redireccionamos si hay error
		$_SESSION['type_alert_directorio_crear'] = "alert-danger";
		header("LOCATION: ". PATH ."./directorios.php");
		exit;	
	}

	public function MostrarDirectorios (){
		$dir = 'directorios_creados/';
		$ruta = 'editar_directorio.php';
		$dh  = opendir($dir);
		$count = 0;
		while (false !== ($directorio = readdir($dh))) {
			if ($directorio != "." && $directorio != "..") {
				if(is_dir($dir))
					echo '
							<tr>
							<th scope="row">'.($count+1).'</th>
							<td>'.$directorio.'</td>
							<td>
								<a onclick="MostrarModal(\''.$directorio.'\',\''.$ruta.'\')" class="btn btn-datatable btn-icon btn-transparent-dark"><i class="fas fa-edit"></i></a>
								<a href="'.PATH.'/borrar_directorio.php?nombre='.$directorio.'" class="btn btn-datatable btn-icon btn-transparent-dark"><i class="fas fa-trash"></i></a>
							</td>
							</tr>        
					';
				$count++;
			}
		}
		closedir($dh);
		if ($count == 0){
			echo "<caption class='text-center'>No hay directorios disponibles</caption>";
		}
	}

	public function BorrarDirectorio($nombre) {
		$ruta = "directorios_creados/".$nombre."/";
		if(file_exists($ruta)){
			rmdir($ruta);
			$_SESSION['alert_directorio'] = "Directorio eliminado correctamente";
			$_SESSION['type_alert_directorio'] = "alert-success";
			header("LOCATION: ". PATH ."./directorios.php?action=mostrar");
			exit;	
		}else{
			$_SESSION['alert_directorio'] = "El directorio que intentas borrar no existe";
			$_SESSION['type_alert_directorio'] = "alert-danger";
			header("LOCATION: ". PATH ."./directorios.php?action=mostrar");
			exit;	
		}
	}

	public function EditarDirectorio($nombre, $nombre_nuevo) {
		if(!empty($nombre_nuevo)){
			if($nombre == $nombre_nuevo){
				$_SESSION['alert_directorio'] = "El directorio ".$nombre." se ha editado correctamente"; // mensaje de que todo fue exitoso
				$_SESSION['type_alert_directorio'] = "alert-success";
				echo "
				<script type=\"text/javascript\">
					location.href = '". PATH ."/directorios.php?action=mostrar';
				</script>
				";
			}else{
				if($this->VerificarTexto($nombre_nuevo)){
					if(!file_exists("directorios_creados/".$nombre_nuevo."/")){ 
						rename("directorios_creados/".$nombre."/", "directorios_creados/".$nombre_nuevo."/");
						$_SESSION['alert_directorio'] = "El directorio ".$nombre_nuevo." (anteriormente ".$nombre.") se ha editado correctamente"; // mensaje de que todo fue exitoso
						$_SESSION['type_alert_directorio'] = "alert-success";
						echo "
						<script type=\"text/javascript\">
							location.href = '". PATH ."/directorios.php?action=mostrar';
						</script>
						";
					}else{$this->Alert("error", "Ya existe un directorio llamado ".$nombre_nuevo."");}
				}else{$this->Alert("error", "El nombre del directorio no puede contener caracteres especiales, ni acentos, ni espacios. El texto puede contener letras, números, guión bajo y guiones");}
			}
		}else{$this->Alert("error", "Por favor rellena todos los campos");}
		return;
	}

}
?>