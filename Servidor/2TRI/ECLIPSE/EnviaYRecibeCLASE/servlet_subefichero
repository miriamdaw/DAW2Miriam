import jakarta.servlet.RequestDispatcher;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import jakarta.servlet.http.Part;

import java.io.IOException;

@WebServlet("/EnviaYRecibe")
public class SubeFichero extends HttpServlet {

	@Override
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
	}

	@Override
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {

		//Aqui va el objeto de tipo Part para recuperar los ficheros

		Part parteArchivo = request.getPart("archivo"); //Recibe el archivo en un objeto de tipo Part
		String nombreArchivo = parteArchivo.getSubmittedFileName(); //Este objeto ya tiene la informacion del archivo, uno de ellos es el nombre, aqui lo recupera
		long tamanio = parteArchivo.getSize();
		String tipo = parteArchivo.getContentType();

		/*
		//Tratamiento del tipo del archivo
		if(!tipo.equals("image/jpeg")){ //El fichero no es del tipo requerido... esto en la variable error

		}else{
			parteArchivo.write(nombreArchivo); //guarda el archivo con el nombre original
		}
		 */
		RequestDispatcher rd = request.getRequestDispatcher("formulario.jsp");
		rd.forward(request, response);
	}
}


