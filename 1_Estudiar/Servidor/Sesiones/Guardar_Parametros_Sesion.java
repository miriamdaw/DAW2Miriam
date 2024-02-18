protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {

    HttpSession sesion = request.getSession(true); //si no existe la crea
    sesion.setAttribute("nombre", nombre);
    sesion.setAttribute("canal", canal);

}
