import java.io.IOException;
import java.sql.Connection;

public class Consulta {
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {

        Class.forName("driver");
        String user = "root";
        String clave = "";
        String url = "urlbasedatos";

        Connection conn = driver.getconnection("url, user, clave");

        String consulta = "SELECT * FROM tabla WHERE email = ?";
        PreparedStatement pstmt = conn.prepareStatement(consulta);
        pstmt.setString(1, request.getParameter("email"));
        ResultSet rs = pstmt.executeQuery();

    }
}
