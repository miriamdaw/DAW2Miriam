function onFocusInput(element) {
  var label = element.previousElementSibling; // Obtener el elemento label anterior al input
  label.style.top = "-14px";
  label.style.fontSize = "12px";
  label.style.color = "#F479AD";
}

function onBlurInput(element) {
  if (element.value === "") {
    var label = element.previousElementSibling;
    label.style.top = "10px";
    label.style.fontSize = "16px";
    label.style.color = "var(--colorTextos)";
  }
}
