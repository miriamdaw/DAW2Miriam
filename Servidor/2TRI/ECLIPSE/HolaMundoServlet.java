

import jakarta.servlet.ServletException;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.io.PrintWriter;


public class HolaMundoServlet extends HttpServlet {
	@Override

	public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
		response.setContentType("text/html");
		PrintWriter out = response.getWriter();
		
		try {
			out.println("<html>");
			out.println("<head><title>Hola Mundo</title></head>");
			out.println("<body>");
			out.println("<h1>Hola Mundo</h1>");
			out.println("<p>Request URI: " + request.getRequestURI() + "</p>");
			out.println("<p>Protocolo: " + request.getProtocol() + "</p>");
			out.println("<p>Direccion remota: " + request.getRemoteAddr() + "</p>");
			out.println("<p>Numero aleatorio: <strong>" + Math.random() + "</strong>");
			out.println("</body></html>");
		}finally {
			out.close();
		}
}
}
