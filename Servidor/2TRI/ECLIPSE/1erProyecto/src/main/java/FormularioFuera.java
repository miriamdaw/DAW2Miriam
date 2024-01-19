

import jakarta.servlet.ServletException;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.io.PrintWriter;


public class FormularioFuera extends HttpServlet {
	@Override

	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {

		String firstName = request.getParameter("fname");
		String lastName = request.getParameter("lname");
		String email = request.getParameter("email");
		String password = request.getParameter("pwd");
		String phone = request.getParameter("phone");


		response.setContentType("text/html");
		PrintWriter out = response.getWriter();

		try {

			out.println("<html><body>");
			out.println("<h2>Formulario de contacto</h2>");
			out.println("<p>Nombre: " + firstName + "</p>");
			out.println("<p>Apellido: " + lastName + "</p>");
			out.println("<p>Email: " + email + "</p>");
			out.println("<p>Contraseña: " + password + "</p>");
			out.println("<p>Telefono: " + phone + "</p>");
			out.println("</body></html>");


		} finally {

		}
	}
}
