<?php
                    foreach ($notificationesHoy as $notif):
                      if (!empty($notif['id_notificacion'])):
                        $busquedaNotif = [];
                        if($myNombreRol=="Superusuario"){
                          $busquedaNotif1 = $this->notificacion->BuscarClasesPorNotificacion($notif);
                          $busquedaNotif2 = $this->notificacion->BuscarClasesPorNotificacionProfesor($notif, $_SESSION['cuenta_persona']['cedula']);
                          $busquedaNotif3 = $this->notificacion->BuscarClasesPorNotificacionTutor($notif, $_SESSION['cuenta_persona']['cedula']);
                          $number = 0;
                          foreach ($busquedaNotif1 as $key) {
                            if(!empty($key['id_notificacion'])){
                              $busquedaNotif[$number] = $key;
                              $busquedaNotif[$number] += ['id_notificacion2'=>$key['id_notificacion']];
                              $busquedaNotif[$number] += ["lista"=>"general"];
                              $busquedaNotif[$number] += ["visto"=>'visto_superusuario'];
                              $number++;
                            }
                          }
                          foreach ($busquedaNotif2 as $key) {
                            if(!empty($key['id_notificacion'])){
                              $busquedaNotif[$number] = $key;
                              $busquedaNotif[$number] += ['id_notificacion2'=>$key['id_notificacion']];
                              $busquedaNotif[$number] += ["lista"=>"profesor"];
                              $busquedaNotif[$number] += ["visto"=>'visto_profesores'];
                              $number++;
                            }
                          }
                          foreach ($busquedaNotif3 as $key) {
                            if(!empty($key['id_notificacion'])){
                              $busquedaNotifAux = $this->notificacion->BuscarClasesPorNotificacionTutor($notif, $_SESSION['cuenta_persona']['cedula'], true);
                              $key['id_notificacion2'] = $busquedaNotifAux[0]['id_notificacion'];
                              $key['fecha_notificacion'] = $busquedaNotifAux[0]['fecha_notificacion'];
                              $key['hora_notificacion'] = $busquedaNotifAux[0]['hora_notificacion'];
                              $key['visto_alumnos'] = $busquedaNotifAux[0]['visto_alumnos'];
                              $key['visto_profesores'] = $busquedaNotifAux[0]['visto_profesores'];
                              $key['visto_admin'] = $busquedaNotifAux[0]['visto_admin'];
                              $key['visto_superusuario'] = $busquedaNotifAux[0]['visto_superusuario'];
                              $busquedaNotif[$number] = $key;
                              $busquedaNotif[$number] += ["lista"=>"tutor"];
                              $busquedaNotif[$number] += ["visto"=>'visto_profesores'];
                              $number++;
                            }
                          }
                          // echo count($busquedaNotif);
                        }
                        if($myNombreRol=="Administrador"){
                          $busquedaNotif1 = $this->notificacion->BuscarClasesPorNotificacion($notif);
                          $busquedaNotif2 = $this->notificacion->BuscarClasesPorNotificacionProfesor($notif, $_SESSION['cuenta_persona']['cedula']);
                          $busquedaNotif3 = $this->notificacion->BuscarClasesPorNotificacionTutor($notif, $_SESSION['cuenta_persona']['cedula']);
                          $number = 0;
                          foreach ($busquedaNotif1 as $key) {
                            if(!empty($key['id_notificacion'])){
                              $busquedaNotif[$number] = $key;
                              $busquedaNotif[$number] += ['id_notificacion2'=>$key['id_notificacion']];
                              $busquedaNotif[$number] += ["lista"=>"general"];
                              $busquedaNotif[$number] += ["visto"=>'visto_admin'];
                              $number++;
                            }
                          }
                          foreach ($busquedaNotif2 as $key) {
                            if(!empty($key['id_notificacion'])){
                              $busquedaNotif[$number] = $key;
                              $busquedaNotif[$number] += ['id_notificacion2'=>$key['id_notificacion']];
                              $busquedaNotif[$number] += ["lista"=>"profesor"];
                              $busquedaNotif[$number] += ["visto"=>'visto_profesores'];
                              $number++;
                            }
                          }
                          foreach ($busquedaNotif3 as $key) {
                            if(!empty($key['id_notificacion'])){
                              $busquedaNotifAux = $this->notificacion->BuscarClasesPorNotificacionTutor($notif, $_SESSION['cuenta_persona']['cedula'], true);
                              $key['id_notificacion2'] = $busquedaNotifAux[0]['id_notificacion'];
                              $key['fecha_notificacion'] = $busquedaNotifAux[0]['fecha_notificacion'];
                              $key['hora_notificacion'] = $busquedaNotifAux[0]['hora_notificacion'];
                              $key['visto_alumnos'] = $busquedaNotifAux[0]['visto_alumnos'];
                              $key['visto_profesores'] = $busquedaNotifAux[0]['visto_profesores'];
                              $key['visto_admin'] = $busquedaNotifAux[0]['visto_admin'];
                              $key['visto_superusuario'] = $busquedaNotifAux[0]['visto_superusuario'];
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
                          $number = 0;
                          foreach ($busquedaNotif2 as $key) {
                            if(!empty($key['id_notificacion'])){
                              $busquedaNotif[$number] = $key;
                              $busquedaNotif[$number] += ['id_notificacion2'=>$key['id_notificacion']];
                              $busquedaNotif[$number] += ["lista"=>"profesor"];
                              $busquedaNotif[$number] += ["visto"=>'visto_profesores'];
                              $number++;
                            }
                          }
                          foreach ($busquedaNotif3 as $key) {
                            if(!empty($key['id_notificacion'])){
                              $busquedaNotifAux = $this->notificacion->BuscarClasesPorNotificacionTutor($notif, $_SESSION['cuenta_persona']['cedula'], true);
                              $key['id_notificacion2'] = $busquedaNotifAux[0]['id_notificacion'];
                              $key['fecha_notificacion'] = $busquedaNotifAux[0]['fecha_notificacion'];
                              $key['hora_notificacion'] = $busquedaNotifAux[0]['hora_notificacion'];
                              $key['visto_alumnos'] = $busquedaNotifAux[0]['visto_alumnos'];
                              $key['visto_profesores'] = $busquedaNotifAux[0]['visto_profesores'];
                              $key['visto_admin'] = $busquedaNotifAux[0]['visto_admin'];
                              $key['visto_superusuario'] = $busquedaNotifAux[0]['visto_superusuario'];
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
                              // echo $busquedaNotifAux[0]['id_notificacion'];
                              // $key['id_notificacion'] = $busquedaNotifAux[0]['id_notificacion'];
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
                        foreach ($busquedaNotif as $notif2):
                          if(!empty($notif2['id_notificacion'])):
                            if($notif['id_notificacion']==$notif2['id_notificacion']):
                              $busquedaNotif2 = $this->notificacion->BuscarClasesPorNotificacionNotas($notif2);
                              $subidaNotasNotif = 0;
                              foreach ($busquedaNotif2 as $notif3):
                                if(!empty($notif3['cod_seccion'])):
                                  if($notif3['id_clase']==$notif2['id_clase'] && $notif3['id_clase']==$notif['id_tabla']){
                                    $subidaNotasNotif=1;
                                  }
                                endif;
                              endforeach;

                    $urlnota = $this->encriptar("Notas");
?>  
                    <li <?php if($notif2[$notif2['visto']]==0){ ?> style="background:#CCC" <?php } ?> >
                      <span style="width:100%;display:block;padding:5px 5px 5px 5px;border-bottom:1px solid #FFF;">
                        <form action="<?=$urlnota;?>" class='formNotificaciones<?=$notif2['id_notificacion'].$notif2['lista'].$notif2['visto']; ?>' method="post">
                          
                        <a class='lanzarNotificacion' style="color:#222" id="<?=$notif2['id_notificacion'].$notif2['lista'].$notif2['visto']; ?>">
                          <input type="hidden" name="id_notificacion2" value="<?=$notif2['id_notificacion2']; ?>">
                          <input type="hidden" name="lista" value="<?=$notif2['lista']; ?>">
                          <input type="hidden" name="visto" value="<?=$notif2['visto']; ?>">
                          <small>
                          <?php 
                            if($subidaNotasNotif==1 && $notif2['lista']=="general"){
                              echo "<small style='font-size:0.8em;float:right'>".$this->notificacion->arreglarFecha($notif2['fecha_notificacion'])." ".$notif2['hora_notificacion']."</small>";
                              echo "<i class='fa fa-upload text-green'></i>";
                              if($notif2[$vistoGeneral]==0){ echo "<i>"; }
                              echo "<b> Notas subidas</b><br>Las notas del saber complementario <b>".$notif2['nombreSC']."</b> de la <b>sección ".$notif2['nombre_seccion']."</b> de <b>trayecto ".$notif2['trayecto_seccion']."</b> fueron cargadas con exito.";
                              if($notif2[$vistoGeneral]==0){ echo "</i>"; }
                            }
                            if($subidaNotasNotif==0 && $notif2['lista']=="general"){
                              echo " <small style='font-size:0.8em;float:right'>".$this->notificacion->arreglarFecha($notif2['fecha_notificacion'])."</small>";
                              echo "<i class='fa fa-download text-red'></i>";
                              if($notif2[$vistoGeneral]==0){ echo "<i>"; }
                              echo "<b> Notas no subidas</b><br>Las notas del saber complementario <b>".$notif2['nombreSC']."</b> de la <b>sección ".$notif2['nombre_seccion']."</b> de <b>trayecto ".$notif2['trayecto_seccion']."</b> no han sido subidas.";

                              $justoAhora = date("Y-m-d", time());
                              $last = new DateTime($notif2['fecha_cierre']);
                              $now = new DateTime($justoAhora);
                              $next = new DateTime($notif2['fecha_cierre']);
                              $days_last = $last->diff($now);
                              $days_next = $now->diff($next);
                              if($justoAhora >= $notif2['fecha_cierre']){
                                echo "<br>El <b>período ".$notif2['year_periodo']."-".$notif2['nombre_periodo']." cerró</b> hace <b>".$days_last->format('%a')."</b> dias.";
                              }
                              if($justoAhora <= $notif2['fecha_cierre']){
                                echo "<br>El <b>período ".$notif2['year_periodo']."-".$notif2['nombre_periodo']." cierra</b> dentro de <b>".$days_next->format('%a')."</b> dias.";
                              }

                              if($notif2[$vistoGeneral]==0){ echo "</i>"; }
                            }
                            if($subidaNotasNotif==1 && $notif2['lista']=="profesor"){
                              echo " <small style='font-size:0.8em;float:right'>".$this->notificacion->arreglarFecha($notif2['fecha_notificacion'])." ".$notif2['hora_notificacion']."</small>";
                              echo "<i class='fa fa-upload text-green'></i>";
                              if($notif2[$notif2['visto']]==0){ echo "<i>"; }
                              echo "<b> Ya subio sus notas</b><br><b>Profesor/a ".$notif2['nombre_profesor']."</b> las notas del saber complementario <b>".$notif2['nombreSC']."</b> de la <b>sección ".$notif2['nombre_seccion']."</b> de <b>trayecto ".$notif2['trayecto_seccion']."</b> fueron cargadas con exito.";
                              if($notif2[$notif2['visto']]==0){ echo "</i>"; }
                            }
                            if($subidaNotasNotif==0 && $notif2['lista']=="profesor"){
                              echo " <small style='font-size:0.8em;float:right'>".$this->notificacion->arreglarFecha($notif2['fecha_notificacion'])."</small>";
                              echo "<i class='fa fa-download text-red'></i>";
                              if($notif2[$notif2['visto']]==0){ echo "<i>"; }
                              echo "<b> No ha subido notas</b><br><b>Profesor/a ".$notif2['nombre_profesor']."</b> las notas del saber complementario <b>".$notif2['nombreSC']."</b> de la <b>sección ".$notif2['nombre_seccion']."</b> de <b>trayecto ".$notif2['trayecto_seccion']."</b> no han sido subidas.";

                              $justoAhora = date("Y-m-d", time());
                              $last = new DateTime($notif2['fecha_cierre']);
                              $now = new DateTime($justoAhora);
                              $next = new DateTime($notif2['fecha_cierre']);
                              $days_last = $last->diff($now);
                              $days_next = $now->diff($next);
                              if($justoAhora >= $notif2['fecha_cierre']){
                                echo "<br>El <b>período ".$notif2['year_periodo']."-".$notif2['nombre_periodo']." cerró</b> hace <b>".$days_last->format('%a')."</b> dias.";
                              }
                              if($justoAhora <= $notif2['fecha_cierre']){
                                echo "<br>El <b>período ".$notif2['year_periodo']."-".$notif2['nombre_periodo']." cierra</b> dentro de <b>".$days_next->format('%a')."</b> dias.";
                              }
                              echo " Por favor suba las notas cuanto antes. ";
                              if($notif2[$notif2['visto']]==0){ echo "</i>"; }
                            }
                            if($subidaNotasNotif==1 && $notif2['lista']=="tutor"){
                              echo " <small style='font-size:0.8em;float:right'>".$this->notificacion->arreglarFecha($notif2['fecha_notificacion'])." ".$notif2['hora_notificacion']."</small>";
                              echo "<i class='fa fa-upload text-green'></i>";
                              if($notif2[$notif2['visto']]==0){ echo "<i>"; }
                              echo "<b> Ya se subieron las Notas</b><br><b>Tutor/a de proyecto ".$notif2['nombre_profesor']."</b> las notas del saber complementario <b>".$notif2['nombreSC']."</b> de la <b>sección ".$notif2['nombre_seccion']."</b> de <b>trayecto ".$notif2['trayecto_seccion']."</b> del grupo de proyecto <b>".$notif2['titulo_proyecto']."</b> fueron cargadas con exito.";
                              if($notif2[$notif2['visto']]==0){ echo "</i>"; }
                            }
                            if($subidaNotasNotif==1 && $notif2['lista']=="alumno"){
                              echo " <small style='font-size:0.8em;float:right'>".$this->notificacion->arreglarFecha($notif2['fecha_notificacion'])." ".$notif2['hora_notificacion']."</small>";
                              echo "<i class='fa fa-upload text-green'></i>";
                              if($notif2[$notif2['visto']]==0){ echo "<i>"; }
                              echo "<b> Ya se subieron las Notas</b><br><b>Alumno/a ".$notif2['nombre_alumno']."</b> las notas del saber complementario <b>".$notif2['nombreSC']."</b> de la <b>sección ".$notif2['nombre_seccion']."</b> de <b>trayecto ".$notif2['trayecto_seccion']."</b> fueron cargadas con exito.";
                              if($notif2[$notif2['visto']]==0){ echo "</i>"; }
                            }

                          ?>
                          </small>
                        </a>

                        </form>
                      </span>
                    </li>

                  <?php
                            endif;
                          endif;
                        endforeach;
                      endif;
                    endforeach;
                  ?>