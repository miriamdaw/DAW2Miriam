import jakarta.servlet.RequestDispatcher;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import jakarta.servlet.http.HttpSession;
import jakarta.servlet.http.Part;

import java.io.File;
import java.io.IOException;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.Collection;
import java.util.List;

@WebServlet(name = "Resumen", urlPatterns = { "/Resumen" })
public class Resumen extends HttpServlet {

	@Override
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		// Obtener la sesión
		HttpSession session = request.getSession();

		String nombre = (String) session.getAttribute("nombre");
		String email = (String) session.getAttribute("email");
		String genero = (String) session.getAttribute("genero");
		String nacimiento = (String) session.getAttribute("nacimiento");
		String publicidad = (String) session.getAttribute("publicidad");
		String[] canal = (String[]) session.getAttribute("canal");
		String horas = (String) session.getAttribute("horas");
		String[] interes = (String[]) session.getAttribute("interes");
		String comentarios = (String) session.getAttribute("comentarios");
		String banco = (String) session.getAttribute("banco");
		List<String> archivos = (List<String>) session.getAttribute("archivos");

		
		String sqlCliente = "INSERT INTO clientes (nombre, email, nacimiento, genero, canal, horas) VALUES (?, ?, ?, ?, ?, ?)";
		String sqlSilla = "INSERT INTO silla (interes, comentario) VALUES (?, ?)";
		String sqlImagenes = "INSERT INTO imagenes_silla (nombre_archivo) VALUES (?)";

		Connection conn=null;
		PreparedStatement pstmtCliente = null;
		PreparedStatement pstmtSilla = null;
		PreparedStatement pstmtImagenes = null;

		try {
			Class.forName("com.mysql.cj.jdbc.Driver");
			String user="root";
			String pass="";
			String url="jdbc:mysql://localhost/cyberthronejava";
			conn = DriverManager.getConnection(url, user, pass);
			pstmtCliente = conn.prepareStatement(sqlCliente);
			pstmtSilla = conn.prepareStatement(sqlSilla);
			pstmtImagenes = conn.prepareStatement(sqlImagenes);

			pstmtCliente.setString(1, nombre);
			pstmtCliente.setString(2, email);
			pstmtCliente.setString(3, nacimiento);
			pstmtCliente.setString(4, genero);
			pstmtCliente.setString(5, String.join(", ", canal));
			pstmtCliente.setString(6, horas);
			pstmtCliente.executeUpdate();
			
			for (String interesIndividual : interes) {
			    pstmtSilla.setString(1, interesIndividual);
			    pstmtSilla.setString(2, comentarios);
			    pstmtSilla.executeUpdate();
			}
			
			for (String archivo : archivos) {
                pstmtImagenes.setString(1, archivo);
                pstmtImagenes.executeUpdate();
			}

			RequestDispatcher rd = request.getRequestDispatcher("Mostrar.jsp");
			rd.forward(request, response);


		} catch (ClassNotFoundException | SQLException e) {
			e.printStackTrace();
		} finally {
			try {
				if (pstmtCliente != null) pstmtCliente.close();
				if (conn != null) conn.close();
			} catch (SQLException e) {
				e.printStackTrace();
			}
		}
	}
}


