protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
    
    RequestDispatcher rd = request.getRequestDispatcher("nombre.jsp");
    rd.forward(request, response);

    //o también

    response.sendRedirect("nombre.jsp");
}