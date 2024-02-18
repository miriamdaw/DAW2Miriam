import java.io.IOException;

public class Hacer_Conexion {
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {

        Class.forName("driver");
        String user = "root";
        String clave = "";
        String url = "urlbasedatos";

        Connection conn = driver.getconnection("url, user, clave");
    }
}
