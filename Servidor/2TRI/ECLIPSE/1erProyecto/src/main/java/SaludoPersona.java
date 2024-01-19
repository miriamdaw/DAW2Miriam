

import jakarta.servlet.ServletException;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.io.PrintWriter;


public class SaludoPersona extends HttpServlet {
	@Override

	public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
		response.setContentType("text/html");
		PrintWriter out = response.getWriter();

		try {

			String aux = request.getParameter("var");
			String aux2= request.getParameter("var2");
			//http://localhost:8080/1erProyecto/SaludoPersona?var=Miriam&var2=purple
			//pasar una variable, ejemplo youtube
			out.println("<html>");
			out.println("<head>");
			out.println("<title>Hola Persona</title>");
			out.println("</head>");
			out.println("<style>body { background-color:"+aux2+"} </style>");
			out.println("<h1>Hola " + aux + "</h1>");
			out.println("</body></html>");

		}finally {
			out.close();
		}
	}
}
