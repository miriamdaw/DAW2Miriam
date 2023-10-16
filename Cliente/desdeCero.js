//JavaScript desde cero: https://www.aprendejavascript.dev/clase/introduccion/variables


//1. Crear variables:

let variable
//let variable = 1 --> da error, no puedo reasignarle un valor, crear nueva
let numero = 1
let hola = "hola"


//2. Constantes

const PI = 3.1415
const miedad = 23
//cuando creas una const debes asignarle un valor


//3. Null y undefined

let nada //--> undefined
let nadaa = undefined

let nadaaa = null //--> debemos decirle cuando la inicializamos que va a ser null


//4. Typeof

//devuelve una cadena de texto que indica el tipo de un operando

const numero1 = 7
typeof numero1 //--> "number"

typeof nada //--> "undefined"
typeof hola //--> "string"
typeof nadaaa //--> "object" --> bug del lenguaje


//5. console.log()

console.log("Hola, JavaScript")
//--> "Hola, JavaScript"

const nombre = "Miriam"
console.log(nombre)
//--> "Miriam"

console.log("Hola, " + nombre)
//--> "Hola, Miriam"

const edad = 23
console.log(nombre, edad)
//--> "Miriam 23"


console.error("Error") //--> imprime mensaje de error en la consola
console.warn("Advertencia") //--> imrpime mensaje de advertencia
console.info("Info") //--> imprime mensaje de informacion


//6. Condicional if


if (edad = 23){
    console.log("Eres Miriam")
}


if(edad = 23){
    console.log("Eres Miriam")
}else{
    console.log("No eres Miriam")
}


if(edad >= 18){
    console.log("Eres mayor de edad")
}else if(edad >= 16){
    console.log("Eres casi mayor de edad")
}else{
    console.log("Eres menor de edad")
}


//7. Anidación de condicionales

const tieneCarnet = true

//ESTO NO ES OPTIMO
if(edad >= 18){
    if(tieneCarnet){
        console.log("Puedes conducir")
    }else{
        console.log("No puedes conducir")
    }
}else{
    console.log("No puedes conducir")
}


//ESTO ES OPTIMO
if(edad >= 18 && tieneCarnet){
    console.log("Puedes conducir")
}else{
    console.log("No puedes conducir")
}


//Guardar el resultado de la condicion en una variable
const puedeConducir = edad >= 18 && tieneCarnet

if(puedeConducir){
    console.log("Puedes conducir")
}else{
    console.log("No puedes conducir")
}


//8. Las llaves
//No siempre son obligatorias; si el bloque de código solo tiene una línea
if(edad >= 18)
    console.log("Eres mayor de edad")
else
console.log("Eres menor de edad")


//Se puede escribir en la misma línea
if(edad>=18) console.log ("Eres mayor de edad")
else console.log("Eres menor de edad")



//9. Bucles con while
let cuentaAtras = 10
while (cuentaAtras > 0){
    console.log(cuentaAtras)
    cuentaAtras = cuentaAtras - 1
}
console.log("Despegue!!")


//9.2- Break
while (cuentaAtras > 0) {
    console.log(cuentaAtras)
    cuentaAtras = cuentaAtras - 1

    if (cuentaAtras === 5) {
      break // <---- salimos del bucle
    }
  }


//9.3- Continue
while (cuentaAtras > 0) {
    cuentaAtras = cuentaAtras - 1

    if (cuentaAtras % 2 === 0) {
      continue // <---- saltamos a la siguiente iteración
    }
  
    console.log(cuentaAtras)
  }


  
//10. Do-while
let respuesta

do {
  respuesta = confirm("¿Te gusta JavaScript?");
} while (respuesta)



//11. For
for (let number = 1; number <= 10; number++) {
    console.log(number)
  }


//11.2 Bucles anidados
for (let i = 1; i <= 10; i++) {
    for (let j = 1; j <= 10; j++) {
      const resultado = i * j
      console.log(i + ' x ' + j + ' = ' + resultado)
    }
  }


//12. Switch
const dia = "lunes"

switch (dia) {
  case "lunes":
    console.log("¡Hoy es lunes! 😢")
    break

  default:
    console.log("No es lunes, YAY! 🚀")
    break
}


//13. Funciones
function saludar() {
    console.log('Hola Miguel')
  }

//Dos parametros
  function sumar(a, b) {
    return a + b
  }
  
  function restar(a, b) {
    return a - b
  }


//14. Funciones flecha
/*Explicacion:
En lugar de la palabra clave function, 
utilizamos una flecha => para definir la función.*/

//Sintaxis:
const miFuncionFlecha = () => {
    // código a ejecutar
  }


//Ejemplo:
const saludar = nombre => {
    console.log("Hola " + nombre)
  }

 
/*También podemos omitir los paréntesis alrededor 
de los parámetros si solo tenemos uno:
*/
const saludar = nombre => {
    console.log("Hola " + nombre)
  }



//14.2- Return implícito
/*Cuando una función flecha tiene una sola expresión, 
podemos omitir las llaves {} y la palabra clave return 
para hacerla aún más corta.*/

// Declaración de función regular
function sumar(a, b) {
    return a + b
  }
  
  // Función flecha
  const sumarFlecha1 = (a, b) => {
    return a + b
  }
  
  // Función flecha con return implícito
  const sumarFlecha2 = (a, b) => a + b
