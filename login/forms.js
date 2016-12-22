/*
* Questa funzione provvede alla codifica della password per tutti i form.
*/
function formhash(form, password) {
  //Creo un elemento di input per usarlo come output della password criptata.
  var pw = document.createElement("input");

  //Aggiungo un nuovo elemento al form.
  form.appendChild(pw);
  pw.name = "pw";
  pw.type = "hidden";
  pw.value = hex_sha512(password.value);

  //Mi assicuro che la password non venga inviata in chiaro.
  password.value = "";

  //Eseguo il 'submit' del form.
  form.submit();
}
