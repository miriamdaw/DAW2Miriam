
protected void doGet|doPost ...

String text = request.getParameter("text");
String radio = request.getParameter("radio");
String select = request.getParameter("select");
String[] selectMultiple = request.getParameterValues("selectMultiple");