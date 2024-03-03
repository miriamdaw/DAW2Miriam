import jakarta.servlet.RequestDispatcher;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import jakarta.servlet.http.HttpSession;

import java.io.IOException;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.HashMap;
import java.util.Map;

@WebServlet("/Paso1Java")
public class Paso1Java extends HttpServlet {

	@Override
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		String nombre = request.getParameter("nombre");
		String email = request.getParameter("email");
		String genero = request.getParameter("genero");
		String nacimiento = request.getParameter("nacimiento");
		String publicidad = request.getParameter("publicidad");
		String[] canal = request.getParameterValues("canal");


		// Verificar si algún parámetro es null
		if (nombre == null || email == null || genero == null || nacimiento == null || publicidad == null || canal == null) {
			// Redirigir al paso 1
			RequestDispatcher rd = request.getRequestDispatcher("Paso1.jsp");
			rd.forward(request, response);
			return;
		}

		// Filtros
		String [] errorNombre = null;

		if (!Character.isUpperCase(nombre.charAt(0)) || nombre.length() < 3 || nombre.length() > 20 || !nombre.matches("^[A-Za-z -]+$")) {
			errorNombre = new String[1];
			errorNombre[0]	= "Su nombre debe comenzar con una letra mayúscula y tener una longitud entre 3 y 20 caracteres, sin caracteres no válidos.";
			request.getSession().setAttribute("errorNombre", errorNombre);
		}

		// Si hay errores, redirigir de vuelta al formulario con los errores
		if (errorNombre != null && errorNombre.length > 0) {
			request.setAttribute("errores", errorNombre);
			RequestDispatcher rd = request.getRequestDispatcher("Paso1.jsp");
			rd.forward(request, response);
			return;
		}


		//comprobacion en la base de datos si ya existe ese email
		try {
			Class.forName("com.mysql.cj.jdbc.Driver");
			String user = "cyberthronejava";
			String pass = "cyberthronejava";
			String url = "jdbc:mysql://localhost/cyberthronejava";
			Connection conn = DriverManager.getConnection(url, user, pass);

			String sqlEmail = "SELECT * FROM clientes WHERE email = ?";
			PreparedStatement pstmtEmail = conn.prepareStatement(sqlEmail);
			pstmtEmail.setString(1, email);
			ResultSet resultado = pstmtEmail.executeQuery();

			if (resultado.next()) {
				RequestDispatcher rd = request.getRequestDispatcher("Paso1.jsp");
				rd.forward(request, response);

			} else {
				// Obtener la sesión
				HttpSession session = request.getSession(true);

				// Guardar los parámetros en la sesión
				session.setAttribute("nombre", nombre);
				session.setAttribute("email", email);
				session.setAttribute("genero", genero);
				session.setAttribute("nacimiento", nacimiento);
				session.setAttribute("publicidad", publicidad);
				session.setAttribute("canal", canal);
				session.setAttribute("formularioEnviado", true);

				RequestDispatcher rd = request.getRequestDispatcher("Paso2.jsp");
				rd.forward(request, response);
			}

			resultado.close();
			pstmtEmail.close();
			conn.close();

		} catch (ClassNotFoundException | SQLException e) {
			e.printStackTrace();

		} finally {

		}
	}
}
