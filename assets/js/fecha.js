// $document.write() {
  function transformarFecha(fecha){
   var nuevaFecha = new Date(fecha);
       nuevaFecha.setDate(nuevaFecha.getDate() + 1);
   var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
   var fechaString = nuevaFecha.toLocaleDateString('es-MX', options);
   document.write("<p>");
   document.write(fechaString);
   document.write("</p>");  
 }

// }