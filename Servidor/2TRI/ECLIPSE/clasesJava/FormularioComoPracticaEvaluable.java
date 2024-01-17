import jakarta.servlet.ServletException;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import java.io.IOException;
import java.io.PrintWriter;

public class FormularioComoPracticaEvaluable extends HttpServlet {
    @Override
    protected void doPost(HttpServletRequest request, HttpServletResponse response) throws IOException, ServletException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        try {
            out.println("<html>");
            out.println("<head><title>Formulario Procesado</title></head>");
            out.println("<body>");

            // Obtener parámetros del formulario
            String radioOption = request.getParameter("radio_option");
            String email = request.getParameter("email");
            String telefono = request.getParameter("telefono");
            String contrasena = request.getParameter("contrasena");
            String fecha = request.getParameter("fecha");
            String[] ciudad = request.getParameter("ciudad");
            String publicidad = request.getParameter("publicidad");

            // Salida de los datos recogidos
            out.println("<h2>Formulario Procesado</h2>");
            out.println("<p>Radio Option: " + radioOption + "</p>");
            out.println("<p>Email: " + email + "</p>");
            out.println("<p>Teléfono: " + telefono + "</p>");
            out.println("<p>Contraseña: " + contrasena + "</p>");
            out.println("<p>Fecha: " + fecha + "</p>");
            out.println("<p>Ciudad: " + ciudad + "</p>");
            out.println("<p>Publicidad: " + (publicidad != null ? "Aceptada" : "No aceptada") + "</p>");

            out.println("</body></html>");
        } finally {
            out.close();
        }
    }
}
