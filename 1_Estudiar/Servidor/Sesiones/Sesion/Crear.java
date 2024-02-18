/*
 * Para crear una sesión se utiliza:
 */

 1- HttpSession nombreSesion = request.getSession();
 /* 
  * Esta sentencia devuelve la sesión YA EXISTENTE. Si no existe,
  * devolverá null.
  */
 2- HttpSession nombreSesion = request.getSession(true);
/*
 * Esta sentencia también devuelve la sesión existente, pero
 * si no existe, la creará.
 */
 3- HttpSession nombreSesion = request.getSession(false);
 /*
  * Esta sentencia también devuelve la sesión existente con la
  * solicitud actual, pero si no existe, tampoco la crea y 
  * devuelve null.
  */