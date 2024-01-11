

import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.io.PrintWriter;

public class VariablesServlet extends HttpServlet {
	@Override

	public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
		response.setContentType("text/html");
		PrintWriter out = response.getWriter();
		
		try {
			out.println("<html>");
			out.println("<head><title>Variables</title></head>");
			out.println("<body>");
			out.println("<p>Direccion remota: " + request.getRemoteAddr() + "</p>");
			out.println("<p>Puerto remoto: " + request.getRemotePort() + "</p>");
			out.println("<p>URL Invocada: " + request.getRequestURL() + "</p>");
			out.println("<p>Request URI: " + request.getRequestURI() + "</p>");
			out.println("<p>Método de petición: " + request.getMethod() + "</p>");
			out.println("<p>Protocolo: " + request.getProtocol() + "</p>");
			out.println("<p>Nombre del servidor: " + request.getServerName() + "</p>");
			out.println("<p>Puerto del servidor: " + request.getServerPort() + "</p>");
			out.println("<p>Nombre del servlet path: " + request.getServletPath() + "</p>");
			out.println("</body></html>");
		}finally {
			out.close();
		}
}
}
