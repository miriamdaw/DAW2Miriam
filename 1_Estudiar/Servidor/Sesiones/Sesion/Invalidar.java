/*
 * Para invalidar una sesión, se escribe:
 */

1- request.getSession().invalidate();

2- session.invalidate();

3- HttpSession miSesion = request.getSession(false);
if (miSesion != null) {
    miSesion.invalidate();
}

4- if (request.getSession(false) != null) { 
    request.getSession().invalidate();
}