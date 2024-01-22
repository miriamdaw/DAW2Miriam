import jakarta.servlet.ServletException;
import jakarta.servlet.http.Cookie;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.io.PrintWriter;

public class Comprobaciones extends HttpServlet {
	@Override
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
		response.setContentType("text/html");
		PrintWriter out = response.getWriter();


		// Obtener parámetros del formulario
		String listaUsuarios[] = {"Ivan", "Sergio", "Elena", "Yuri", "Miriam", "Santiago", "Marina", "Adriana", "Gonzalo"};
		String usuario = request.getParameter("usuario");
		String clave = request.getParameter("clave");
		boolean usuarioExiste = false;


		Cookie unaCookie;
		String nombreCookie = "";
		String contenidoCookie = "";
		nombreCookie = request.getParameter("usuario");
		contenidoCookie = nombreCookie + clave;


		try {

			for(String nombre : listaUsuarios){
				if(usuario.equals(nombre)) {
					usuarioExiste = true;
					break;
				}
			}

			if (usuarioExiste) {
				out.println(usuario + " Existe");

				unaCookie = new Cookie (nombreCookie, contenidoCookie);
				response.addCookie(unaCookie);
				
				


			}else {
				response.sendRedirect("formulario.jsp");
			}



		} finally {

		}
	}
}
