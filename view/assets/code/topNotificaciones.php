<?php 
			$unMinuto = 60;
			$unaHora = $unMinuto * 60;
			$unDia = $unaHora * 24;
			$unaSemana = $unDia * 7;
			$unaQuincena = $unDia * 15;
			$unMes = $unDia * 30;
			$unTrimestre = $unMes * 3;
			$unSemestre = $unMes * 6;
			$unAnio = $unMes * 12;
			$hace15 = date('Y-m-d', time() - $unAnio *3);
			$hoy = date('Y-m-d');
			$dentro15 = date('Y-m-d', time() + $unAnio *3);

			$dataNotificacionInicial['inicio'] = $hace15;
			$dataNotificacionInicial['hoy'] = $hoy;
			$dataNotificacionInicial['final'] = $dentro15;
			$myNombreRol = $_SESSION['cuenta_usuario']['nombre_rol'];
			$cantidadNoVistas=0;
			$vistoGeneral = "";
			if($myNombreRol=="Superusuario"){
				$notificationesHoy = $this->notificacion->ConsultarNotificacionClasesListas($dataNotificacionInicial, $myNombreRol);
				foreach ($notificationesHoy as $notif){
					if (!empty($notif['id_notificacion'])){
						// if($notif['visto_superusuario']==0){
							$vistoGeneral = "visto_superusuario";
							// $cantidadNoVistas++;
						// }    
					}
				}
			}
            if($myNombreRol=="Administrador"){
                $notificationesHoy = $this->notificacion->ConsultarNotificacionClasesListas($dataNotificacionInicial, $myNombreRol);
                foreach ($notificationesHoy as $notif){
                  if (!empty($notif['id_notificacion'])){
                    // if($notif['visto_admin']==0){
                      $vistoGeneral = "visto_admin";
                      // $cantidadNoVistas++;
                    // }    
                  }
                }
            }
            if($myNombreRol=="Profesores"){
                $notificationesHoy = $this->notificacion->ConsultarNotificacionClasesListas($dataNotificacionInicial, $myNombreRol);
                foreach ($notificationesHoy as $notif){
                  if (!empty($notif['id_notificacion'])){
                    // if($notif['visto_profesores']==0){
                      $vistoGeneral = "visto_profesores";
                      // $cantidadNoVistas++;
                    // }    
                  }
                }
            }
            if($myNombreRol=="Alumnos"){
                $notificationesHoy = $this->notificacion->ConsultarNotificacionClasesListas($dataNotificacionInicial, $myNombreRol);
                foreach ($notificationesHoy as $notif){
                  if (!empty($notif['id_notificacion'])){
                    // if($notif['visto_alumnos']==0){
                      $vistoGeneral = "visto_alumnos";
                      // $cantidadNoVistas++;
                    // }    
                  }
                }
            }
            $busquedaNotif = [];
            $number = 0;
            foreach ($notificationesHoy as $notif){
                if (!empty($notif['id_notificacion'])){
                  if($myNombreRol=="Superusuario"){
                    $busquedaNotif1 = $this->notificacion->BuscarClasesPorNotificacion($notif);
                    $busquedaNotif2 = $this->notificacion->BuscarClasesPorNotificacionProfesor($notif, $_SESSION['cuenta_persona']['cedula']);
                    $busquedaNotif3 = $this->notificacion->BuscarClasesPorNotificacionTutor($notif, $_SESSION['cuenta_persona']['cedula']);
                    foreach ($busquedaNotif1 as $key) {
                      if(!empty($key['id_notificacion'])){
                        $busquedaNotif[$number] = $key;
                        $busquedaNotif[$number] += ["lista"=>"general"];
                        $busquedaNotif[$number] += ["visto"=>'visto_superusuario'];
                        $number++;
                      }
                    }
                    foreach ($busquedaNotif2 as $key) {
                      if(!empty($key['id_notificacion'])){
                        $busquedaNotif[$number] = $key;
                        $busquedaNotif[$number] += ["lista"=>"profesor"];
                        $busquedaNotif[$number] += ["visto"=>'visto_profesores'];
                        $number++;
                      }
                    }
                    foreach ($busquedaNotif3 as $key) {
                      if(!empty($key['id_notificacion'])){
                        // echo "<b>".$number."</b>";
                        $busquedaNotif[$number] = $key;
                        $busquedaNotif[$number] += ["lista"=>"tutor"];
                        $busquedaNotif[$number] += ["visto"=>'visto_profesores'];
                        $number++;
                      }
                    }
                  }
                  if($myNombreRol=="Administrador"){
                    $busquedaNotif1 = $this->notificacion->BuscarClasesPorNotificacion($notif);
                    $busquedaNotif2 = $this->notificacion->BuscarClasesPorNotificacionProfesor($notif, $_SESSION['cuenta_persona']['cedula']);
                    $busquedaNotif3 = $this->notificacion->BuscarClasesPorNotificacionTutor($notif, $_SESSION['cuenta_persona']['cedula']);
                    foreach ($busquedaNotif1 as $key) {
                      if(!empty($key['id_notificacion'])){
                        $busquedaNotif[$number] = $key;
                        $busquedaNotif[$number] += ["lista"=>"general"];
                        $busquedaNotif[$number] += ["visto"=>'visto_admin'];
                        $number++;
                      }
                    }
                    foreach ($busquedaNotif2 as $key) {
                      if(!empty($key['id_notificacion'])){
                        $busquedaNotif[$number] = $key;
                        $busquedaNotif[$number] += ["lista"=>"profesor"];
                        $busquedaNotif[$number] += ["visto"=>'visto_profesores'];
                        $number++;
                      }
                    }
                    foreach ($busquedaNotif3 as $key) {
                      if(!empty($key['id_notificacion'])){
                        $busquedaNotifAux = $this->notificacion->BuscarClasesPorNotificacionTutor($notif, $_SESSION['cuenta_persona']['cedula'], true);
                        // $key['id_notificacion'] = $busquedaNotifAux[0]['id_notificacion'];
                        $key['fecha_notificacion'] = $busquedaNotifAux[0]['fecha_notificacion'];
                        $key['hora_notificacion'] = $busquedaNotifAux[0]['hora_notificacion'];
                        $key['visto_alumnos'] = $busquedaNotifAux[0]['visto_alumnos'];
                        $key['visto_profesores'] = $busquedaNotifAux[0]['visto_profesores'];
                        $key['visto_admin'] = $busquedaNotifAux[0]['visto_admin'];
                        $key['visto_superusuario'] = $busquedaNotifAux[0]['visto_superusuario'];
                        // echo "<b>".$number."</b>";
                        $busquedaNotif[$number] = $key;
                        $busquedaNotif[$number] += ["lista"=>"tutor"];
                        $busquedaNotif[$number] += ["visto"=>'visto_profesores'];
                        $number++;
                      }
                    }
                  }
                  if($myNombreRol=="Profesores"){
                    $busquedaNotif2 = $this->notificacion->BuscarClasesPorNotificacionProfesor($notif, $_SESSION['cuenta_persona']['cedula']);
                    $busquedaNotif3 = $this->notificacion->BuscarClasesPorNotificacionTutor($notif, $_SESSION['cuenta_persona']['cedula']);
                    foreach ($busquedaNotif2 as $key) {
                      if(!empty($key['id_notificacion'])){
                        $busquedaNotif[$number] = $key;
                        $busquedaNotif[$number] += ["lista"=>"profesor"];
                        $busquedaNotif[$number] += ["visto"=>'visto_profesores'];
                        $number++;
                      }
                    }
                    foreach ($busquedaNotif3 as $key) {
                      if(!empty($key['id_notificacion'])){
                        $busquedaNotifAux = $this->notificacion->BuscarClasesPorNotificacionTutor($notif, $_SESSION['cuenta_persona']['cedula'], true);
                        // $key['id_notificacion'] = $busquedaNotifAux[0]['id_notificacion'];
                        $key['fecha_notificacion'] = $busquedaNotifAux[0]['fecha_notificacion'];
                        $key['hora_notificacion'] = $busquedaNotifAux[0]['hora_notificacion'];
                        $key['visto_alumnos'] = $busquedaNotifAux[0]['visto_alumnos'];
                        $key['visto_profesores'] = $busquedaNotifAux[0]['visto_profesores'];
                        $key['visto_admin'] = $busquedaNotifAux[0]['visto_admin'];
                        $key['visto_superusuario'] = $busquedaNotifAux[0]['visto_superusuario'];
                        // echo "<b>".$number."</b>";
                        $busquedaNotif[$number] = $key;
                        $busquedaNotif[$number] += ["lista"=>"tutor"];
                        $busquedaNotif[$number] += ["visto"=>'visto_profesores'];
                        $number++;
                      }
                    }
                  }
                  if($myNombreRol=="Alumnos"){
                    $busquedaNotif4 = $this->notificacion->BuscarClasesPorNotificacionAlumno($notif, $_SESSION['cuenta_persona']['cedula']);

                    foreach ($busquedaNotif4 as $key) {
                      if(!empty($key['id_notificacion'])){
                        $busquedaNotifAux = $this->notificacion->BuscarClasesPorNotificacionAlumno($key, $_SESSION['cuenta_persona']['cedula'], true);
                        $key['id_notificacion2'] = $busquedaNotifAux[0]['id_notificacion'];
                        $key['fecha_notificacion'] = $busquedaNotifAux[0]['fecha_notificacion'];
                        $key['hora_notificacion'] = $busquedaNotifAux[0]['hora_notificacion'];
                        $key['visto_alumnos'] = $busquedaNotifAux[0]['visto_alumnos'];
                        $key['visto_profesores'] = $busquedaNotifAux[0]['visto_profesores'];
                        $key['visto_admin'] = $busquedaNotifAux[0]['visto_admin'];
                        $key['visto_superusuario'] = $busquedaNotifAux[0]['visto_superusuario'];
                        $busquedaNotif[$number] = $key;
                        $busquedaNotif[$number] += ["lista"=>"alumno"];
                        $busquedaNotif[$number] += ["visto"=>'visto_alumnos'];
                        $number++;
                      }
                    }
                  }
                }
            }
            // echo count($busquedaNotif);
            $cantidadNotificaciones = count($busquedaNotif);
            foreach ($busquedaNotif as $key) {
                if(!empty($key['id_notificacion'])){
                  if($key['lista'] == "general" && $key[$vistoGeneral]==0){
                    $cantidadNoVistas++;
                  }
                  if($key['lista'] == "profesor" && $key['visto_profesores']==0){
                    $cantidadNoVistas++;
                  }
                  if($key['lista'] == "tutor" && $key['visto_profesores']==0){
                    $cantidadNoVistas++;
                  }
                  if($key['lista'] == "alumno" && $key['visto_alumnos']==0){
                    $cantidadNoVistas++;
                  }
                }
            }



?>