import jakarta.servlet.ServletException;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.Arrays;

public class EnviaYRecibe extends HttpServlet {
	@Override
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		response.setContentType("text/html");
		PrintWriter out = response.getWriter();

		String nombre = request.getParameter("nombre");
		String clave = request.getParameter("clave");
		String[] genero = request.getParameterValues("genero");
		String nacimiento = request.getParameter("nacimiento");
		String[] pais = request.getParameterValues("pais");
		String publicidad = request.getParameter("publicidad");
		String comentario = request.getParameter("comentario");
		String foto = request.getParameter("foto");

		out.println("<html>");
		out.println("<head><title>EnviaYRecibe</title></head>");
		out.println("<body>");
		out.println("<h2>Datos Recibidos:</h2>");
		out.println("<p>Nombre: " + nombre + "</p>");
		out.println("<p>Clave: " + clave + "</p>");
		out.println("<p>Género: " + arrayToString(genero) + "</p>");
		out.println("<p>Fecha de nacimiento: " + nacimiento + "</p>");
		out.println("<p>País: " + arrayToString(pais) + "</p>");
		out.println("<p>¿Quería recibir publicidad? " + ((publicidad != null && publicidad.equals("on")) ? "Sí" : "No") + "</p>");
		out.println("<p>Su comentario: " + comentario + "</p>");
		out.println("<p>Su foto: " + foto + "</p>");
		out.println("</body>");
		out.println("</html>");

	}

	private String arrayToString(String[] array) {
	    if (array == null || array.length == 0) {
	        return "";
	    }
	    return array[0];
	}

}




