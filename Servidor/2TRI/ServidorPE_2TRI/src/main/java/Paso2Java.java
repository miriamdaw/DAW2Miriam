import jakarta.servlet.RequestDispatcher;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import jakarta.servlet.http.HttpSession;
import jakarta.servlet.http.Part;

import java.io.IOException;

public class Paso2Java extends HttpServlet {

	@Override
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
	}

	@Override
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		String horas = request.getParameter("horas");
		String[] interes = request.getParameterValues("interes");
		String comentarios = request.getParameter("comentarios");

		// Obtener la sesión
        HttpSession session = request.getSession();
        
     // Guardar los parámetros en la sesión
        session.setAttribute("horas", horas);
        session.setAttribute("interes", interes);
        session.setAttribute("comentarios", comentarios);
		
		RequestDispatcher rd = request.getRequestDispatcher("Paso3.jsp");
		rd.forward(request, response);
	}
}
