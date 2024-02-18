import java.io.IOException;
import java.sql.Connection;
import java.sql.PreparedStatement;

public class Insert {
    protected void doPost(HttpServletRequest request, HttpServletResponse response)
            throws ServletException, IOException {

        String insert1 = "INSERT INTO tabla (nombre, edad, clave) VALUES (?, ?, ?)";
        String insert2 = "INSERT INTO tabla2 (perro, nombre, raza) VALUES (?, ?, ?)";
        String insert3 = "INSERT INTO tabla3 (direccion, telefono) VALUES (?, ?)";

        Connection conn = null;
        PreparedStatement pstmt1 = null;
        PreparedStatement pstmt2 = null;
        PreparedStatement pstmt3 = null;

        Class.forName("driver");
        String user = "root";
        String clave = "";
        String url = "urlbasedatos";

        conn = driver.getconnection("url, user, clave");
        pstmt1 = conn.prepareStatement(insert1);
        pstmt2 = conn.prepareStatement(insert2);
        pstmt3 = conn.prepareStatement(insert3);

        insert1.setString(1, nombre);
        insert1.setString(2, edad);
        insert1.setString(3, clave);
        insert1.executeUpdate();

        insert2.setString(1, perro);
        insert2.setString(2, nombre);
        insert2.setString(3, raza);
        insert2.executeUpdate();

        insert3.setString(1, direccion);
        insert3.setString(2, telefono);
        insert3.executeUpdate();

    }
}
