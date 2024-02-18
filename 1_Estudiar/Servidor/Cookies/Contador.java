int contadorCookie = 0;
		Cookie unaCookie;
		String nombreCookie = "CookieCreada";

		if (request.getCookies() != null) {
			for (Cookie cookie : request.getCookies()) {
				if (cookie.getName().equals(nombreCookie)) {
					contadorCookie = Integer.parseInt(cookie.getValue());
					break;
				}
			}
		}

		contadorCookie++;
		unaCookie = new Cookie(nombreCookie, String.valueOf(contadorCookie));
		response.addCookie(unaCookie);