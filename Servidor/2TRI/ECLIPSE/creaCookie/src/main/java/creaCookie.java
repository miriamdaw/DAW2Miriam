import jakarta.servlet.RequestDispatcher;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.Cookie;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

import java.io.IOException;
import java.io.PrintWriter;

public class creaCookie extends HttpServlet {

	@Override
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
	} 

	@Override
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {

		String usuario="";
		String clave="";
		String idioma="";
		Cookie unaCookie;
		String nombreCookie = "";
		String contenidoCookie = "";

		nombreCookie = request.getParameter("usuario");
		usuario = request.getParameter("usuario");
		idioma = request.getParameter("idioma");
		clave = request.getParameter("clave");
		contenidoCookie = nombreCookie + idioma + clave;

		try {
			unaCookie = new Cookie (nombreCookie, contenidoCookie);

			response.addCookie(unaCookie);
			//request.setAttribute("cookie", unaCookie);

		}finally {

			
			response.sendRedirect(request.getContextPath() + "/recuperaCookie");

		}
	}
}