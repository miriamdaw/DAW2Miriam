protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
    //Recuperamos las variables que nos mandan desde un jsp

    String usuario = request.getParameter("usuario");
    String clave = request.getParameter("clave");
    String [] canal = request.getParameterValues("canal");

    
}