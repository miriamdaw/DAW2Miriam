import jakarta.servlet.RequestDispatcher;
import jakarta.servlet.ServletException;
import jakarta.servlet.annotation.MultipartConfig;
import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;
import jakarta.servlet.http.HttpSession;
import jakarta.servlet.http.Part;

import java.io.File;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.ArrayList;
import java.util.Collection;
import java.util.Iterator;
import java.util.List;

@WebServlet("/Paso3Java")
@MultipartConfig(/*location = "C:\\Users\\Miriam\\eclipse-workspace\\.metadata\\.plugins\\org.eclipse.wst.server.core\\tmp0\\wtpwebapps\\tareaevakuable\\guardarficheros",*/ maxFileSize = 10485760L)
public class Paso3Java extends HttpServlet {

	@Override
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		response.setContentType("text/html");
		PrintWriter out = response.getWriter();

		String banco = request.getParameter("banco");

		String location = getServletContext().getRealPath("/ficherosGuardados");
		File carpeta = new File(location);
		//System.out.println("aqui esta la carpeta de imagenes" + location);
		if (!carpeta.exists()) {
			carpeta.mkdirs();
		}

		Collection <Part> parteArchivos = request.getParts(); //recibe parametros en collection porque son mas de uno
		int numArchivos=parteArchivos.size()-1;

		Iterator<Part> it = parteArchivos.iterator();
		List<String> archivos = new ArrayList<>();
		Part parteArchivo;
		String nombreArchivo;
		
		String nombreGuardar = "";
		

		it.next(); //la primera parte no es archivo, es una cabecera, por lo tanto la saltamos
		while (it.hasNext()) {
			parteArchivo = it.next();
			nombreArchivo = parteArchivo.getSubmittedFileName();
			nombreGuardar = location + File.separator + nombreArchivo;
			parteArchivo.write(nombreGuardar);
			archivos.add(nombreArchivo);
	
		}
		
		// Obtener la sesión
        HttpSession session = request.getSession();
        
        // Guardar los parámetros en la sesión
        session.setAttribute("banco", banco);
        session.setAttribute("archivos", archivos);
		
        RequestDispatcher rd = request.getRequestDispatcher("Resumen");
		rd.forward(request, response);

	}
}