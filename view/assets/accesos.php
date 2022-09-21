<?php 
  $amAlumnos = 0;
  $amAlumnosR = 0;
  $amAlumnosC = 0;
  $amAlumnosE = 0;
  $amAlumnosB = 0;
  foreach ($_SESSION['accesos_usuario'] as $access) {
    if(!empty($access['id_accesos'])){
      if($access['nombre_modulo'] == "Alumnos"){
        $amAlumnos = 1;
        if($access['nombre_permiso'] == "Agregar"){$amAlumnosR = 1;}
        if($access['nombre_permiso'] == "Consultar"){$amAlumnosC = 1;}
        if($access['nombre_permiso'] == "Modificar"){$amAlumnosE = 1;}
        if($access['nombre_permiso'] == "Eliminar"){$amAlumnosB = 1;}
      }
    }
  }


  $amProfesores = 0;
  $amProfesoresR = 0;
  $amProfesoresC = 0;
  $amProfesoresE = 0;
  $amProfesoresB = 0;
  foreach ($_SESSION['accesos_usuario'] as $access) {
    if(!empty($access['id_accesos'])){
      if($access['nombre_modulo'] == "Profesores"){
        $amProfesores = 1;
        if($access['nombre_permiso'] == "Agregar"){$amProfesoresR = 1;}
        if($access['nombre_permiso'] == "Consultar"){$amProfesoresC = 1;}
        if($access['nombre_permiso'] == "Modificar"){$amProfesoresE = 1;}
        if($access['nombre_permiso'] == "Eliminar"){$amProfesoresB = 1;}
      }
    }
  }


  $amPeriodos = 0;
  $amPeriodosR = 0;
  $amPeriodosC = 0;
  $amPeriodosE = 0;
  $amPeriodosB = 0;
  foreach ($_SESSION['accesos_usuario'] as $access) {
    if(!empty($access['id_accesos'])){
      if($access['nombre_modulo'] == "Periodos"){
        $amPeriodos = 1;
        if($access['nombre_permiso'] == "Agregar"){$amPeriodosR = 1;}
        if($access['nombre_permiso'] == "Consultar"){$amPeriodosC = 1;}
        if($access['nombre_permiso'] == "Modificar"){$amPeriodosE = 1;}
        if($access['nombre_permiso'] == "Eliminar"){$amPeriodosB = 1;}
      }
    }
  }


  $amSaberes = 0;
  $amSaberesR = 0;
  $amSaberesC = 0;
  $amSaberesE = 0;
  $amSaberesB = 0;
  foreach ($_SESSION['accesos_usuario'] as $access) {
    if(!empty($access['id_accesos'])){
      if($access['nombre_modulo'] == "Saberes"){
        $amSaberes = 1;
        if($access['nombre_permiso'] == "Agregar"){$amSaberesR = 1;}
        if($access['nombre_permiso'] == "Consultar"){$amSaberesC = 1;}
        if($access['nombre_permiso'] == "Modificar"){$amSaberesE = 1;}
        if($access['nombre_permiso'] == "Eliminar"){$amSaberesB = 1;}
      }
    }
  }

  $amSecciones = 0;
  $amSeccionesR = 0;
  $amSeccionesC = 0;
  $amSeccionesE = 0;
  $amSeccionesB = 0;
  foreach ($_SESSION['accesos_usuario'] as $access) {
    if(!empty($access['id_accesos'])){
      if($access['nombre_modulo'] == "Secciones"){
        $amSecciones = 1;
        if($access['nombre_permiso'] == "Agregar"){$amSeccionesR = 1;}
        if($access['nombre_permiso'] == "Consultar"){$amSeccionesC = 1;}
        if($access['nombre_permiso'] == "Modificar"){$amSeccionesE = 1;}
        if($access['nombre_permiso'] == "Eliminar"){$amSeccionesB = 1;}
      }
    }
  }


  $amClases = 0;
  $amClasesR = 0;
  $amClasesC = 0;
  $amClasesE = 0;
  $amClasesB = 0;
  foreach ($_SESSION['accesos_usuario'] as $access) {
    if(!empty($access['id_accesos'])){
      if($access['nombre_modulo'] == "Clases"){
        $amClases = 1;
        if($access['nombre_permiso'] == "Agregar"){$amClasesR = 1;}
        if($access['nombre_permiso'] == "Consultar"){$amClasesC = 1;}
        if($access['nombre_permiso'] == "Modificar"){$amClasesE = 1;}
        if($access['nombre_permiso'] == "Eliminar"){$amClasesB = 1;}
      }
    }
  }


  $amProyectos = 0;
  $amProyectosR = 0;
  $amProyectosC = 0;
  $amProyectosE = 0;
  $amProyectosB = 0;
  foreach ($_SESSION['accesos_usuario'] as $access) {
    if(!empty($access['id_accesos'])){
      if($access['nombre_modulo'] == "Proyectos"){
        $amProyectos = 1;
        if($access['nombre_permiso'] == "Agregar"){$amProyectosR = 1;}
        if($access['nombre_permiso'] == "Consultar"){$amProyectosC = 1;}
        if($access['nombre_permiso'] == "Modificar"){$amProyectosE = 1;}
        if($access['nombre_permiso'] == "Eliminar"){$amProyectosB = 1;}
      }
    }
  }



  $amNotas = 0;
  $amNotasR = 0;
  $amNotasC = 0;
  $amNotasE = 0;
  $amNotasB = 0;
  foreach ($_SESSION['accesos_usuario'] as $access) {
    if(!empty($access['id_accesos'])){
      if($access['nombre_modulo'] == "Notas"){
        $amNotas = 1;
        if($access['nombre_permiso'] == "Agregar"){$amNotasR = 1;}
        if($access['nombre_permiso'] == "Consultar"){$amNotasC = 1;}
        if($access['nombre_permiso'] == "Modificar"){$amNotasE = 1;}
        if($access['nombre_permiso'] == "Eliminar"){$amNotasB = 1;}
      }
    }
  }


  $amUsuarios = 0;
  $amUsuariosR = 0;
  $amUsuariosC = 0;
  $amUsuariosE = 0;
  $amUsuariosB = 0;
  foreach ($_SESSION['accesos_usuario'] as $access) {
    if(!empty($access['id_accesos'])){
      if($access['nombre_modulo'] == "Usuarios"){
        $amUsuarios = 1;
        if($access['nombre_permiso'] == "Agregar"){$amUsuariosR = 1;}
        if($access['nombre_permiso'] == "Consultar"){$amUsuariosC = 1;}
        if($access['nombre_permiso'] == "Modificar"){$amUsuariosE = 1;}
        if($access['nombre_permiso'] == "Eliminar"){$amUsuariosB = 1;}
      }
    }
  }



  $amReportes = 0;
  $amReportesR = 0;
  $amReportesC = 0;
  $amReportesE = 0;
  $amReportesB = 0;
  foreach ($_SESSION['accesos_usuario'] as $access) {
    if(!empty($access['id_accesos'])){
      if($access['nombre_modulo'] == "Reportes"){
        $amReportes = 1;
        if($access['nombre_permiso'] == "Agregar"){$amReportesR = 1;}
        if($access['nombre_permiso'] == "Consultar"){$amReportesC = 1;}
        if($access['nombre_permiso'] == "Modificar"){$amReportesE = 1;}
        if($access['nombre_permiso'] == "Eliminar"){$amReportesB = 1;}
      }
    }
  }



  $amBitacora = 0;
  $amBitacoraR = 0;
  $amBitacoraC = 0;
  $amBitacoraE = 0;
  $amBitacoraB = 0;
  foreach ($_SESSION['accesos_usuario'] as $access) {
    if(!empty($access['id_accesos'])){
      if($access['nombre_modulo'] == "Bitácora"){
        $amBitacora = 1;
        if($access['nombre_permiso'] == "Agregar"){$amBitacoraR = 1;}
        if($access['nombre_permiso'] == "Consultar"){$amBitacoraC = 1;}
        if($access['nombre_permiso'] == "Modificar"){$amBitacoraE = 1;}
        if($access['nombre_permiso'] == "Eliminar"){$amBitacoraB = 1;}
      }
    }
  }


  $amBloqueados = 0;
  $amBloqueadosR = 0;
  $amBloqueadosC = 0;
  $amBloqueadosE = 0;
  $amBloqueadosB = 0;
  foreach ($_SESSION['accesos_usuario'] as $access) {
    if(!empty($access['id_accesos'])){
      if($access['nombre_modulo'] == "Usuario Bloqueado"){
        $amBloqueados = 1;
        if($access['nombre_permiso'] == "Agregar"){$amBloqueadosR = 1;}
        if($access['nombre_permiso'] == "Consultar"){$amBloqueadosC = 1;}
        if($access['nombre_permiso'] == "Modificar"){$amBloqueadosE = 1;}
        if($access['nombre_permiso'] == "Eliminar"){$amBloqueadosB = 1;}
      }
    }
  }


  $amModulos = 0;
  $amModulosR = 0;
  $amModulosC = 0;
  $amModulosE = 0;
  $amModulosB = 0;
  foreach ($_SESSION['accesos_usuario'] as $access) {
    if(!empty($access['id_accesos'])){
      if($access['nombre_modulo'] == "Modulos"){
        $amModulos = 1;
        if($access['nombre_permiso'] == "Agregar"){$amModulosR = 1;}
        if($access['nombre_permiso'] == "Consultar"){$amModulosC = 1;}
        if($access['nombre_permiso'] == "Modificar"){$amModulosE = 1;}
        if($access['nombre_permiso'] == "Eliminar"){$amModulosB = 1;}
      }
    }
  }


  $amPermisos = 0;
  $amPermisosR = 0;
  $amPermisosC = 0;
  $amPermisosE = 0;
  $amPermisosB = 0;
  foreach ($_SESSION['accesos_usuario'] as $access) {
    if(!empty($access['id_accesos'])){
      if($access['nombre_modulo'] == "Permisos"){
        $amPermisos = 1;
        if($access['nombre_permiso'] == "Agregar"){$amPermisosR = 1;}
        if($access['nombre_permiso'] == "Consultar"){$amPermisosC = 1;}
        if($access['nombre_permiso'] == "Modificar"){$amPermisosE = 1;}
        if($access['nombre_permiso'] == "Eliminar"){$amPermisosB = 1;}
      }
    }
  }


  $amRoles = 0;
  $amRolesR = 0;
  $amRolesC = 0;
  $amRolesE = 0;
  $amRolesB = 0;
  foreach ($_SESSION['accesos_usuario'] as $access) {
    if(!empty($access['id_accesos'])){
      if($access['nombre_modulo'] == "Roles"){
        $amRoles = 1;
        if($access['nombre_permiso'] == "Agregar"){$amRolesR = 1;}
        if($access['nombre_permiso'] == "Consultar"){$amRolesC = 1;}
        if($access['nombre_permiso'] == "Modificar"){$amRolesE = 1;}
        if($access['nombre_permiso'] == "Eliminar"){$amRolesB = 1;}
      }
    }
  }



  $amMantenimiento = 0;
  $amMantenimientoR = 0;
  $amMantenimientoC = 0;
  $amMantenimientoE = 0;
  $amMantenimientoB = 0;
  foreach ($_SESSION['accesos_usuario'] as $access) {
    if(!empty($access['id_accesos'])){
      if($access['nombre_modulo'] == "Mantenimiento"){
        $amMantenimiento = 1;
        if($access['nombre_permiso'] == "Agregar"){$amMantenimientoR = 1;}
        if($access['nombre_permiso'] == "Consultar"){$amMantenimientoC = 1;}
        if($access['nombre_permiso'] == "Modificar"){$amMantenimientoE = 1;}
        if($access['nombre_permiso'] == "Eliminar"){$amMantenimientoB = 1;}
      }
    }
  }



?>