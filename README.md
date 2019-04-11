# project_place


#punto 3 ()
#esta es mi solución propuesta para el punto 3, teniendo un diagrama de componentes y especicando cada uno de sus componentes
![alt text](https://raw.githubusercontent.com/JuanfMo/project_place/master/resources/assets/image/image.png)

#Browser del Cliente: El nodo de browser del cliente es el más importante ya que es el que contiene la lógica, clases y herramientas necesarias para comunicarse con los servidores. Dentro de estas clases, librerías y objetos que se utilizan para lograr la gestión de la página del cliente, el uso de los servicios así como la gestión de las respuestas JSON de los mismos están estructuradas siguiendo el patrón de diseño Modelo Vista Controlador y lógicamente agrupados en tres paquetes:

#MODELO (REST Access y  Object Model): Aquí se concentran las clases tanto para el uso de los servicios Web como las clases que nos permitirán modificar elementos de la página del cliente, tales como tablas, combos, estado de la transacción. 

#CONTROLADOR (Page Logic): La lógica de la página son archivos encargados de gestionar los eventos disparados por la página del cliente y de acuerdo al evento disparado, éstos acceden al modelo para usar servicios y dependiendo de las respuestas obtenidas, poder regenerar la página usando también las clases del modelo destinadas para esta labor, este controlador se conecta con las clases de AJAX para manajear la respuesta de la transacción. 

#VISTA (HTML Y CSS): La vista consta de los archivos HTML, los cuales definen la estructura de las páginas en el sistema y los archivos CSS que definen el diseño (color, alineación y forma), se actualiza cada que haya un cambio en el controlador. 

#AJAX: son clases JS que se conectan al controlador y siempre están en espera de una respuesta usa el patron de diseño observer que hace que en todo momento se espere una respuesta, cuando se tiene se manda al controlador y este a la vista para ser actualizada.

#Servidor de servicios: Los servidores de servicios son computadores remotos que exponen métodos, éstos son totalmente independientes del modelo de programación propuesto, pudiendo ser escritos tanto en C#, PHP o Java y estructurar su lógica de negocio como la gestión de sus transacciones siguiendo cualquier arquitectura de programación.

#Conclusion:

#el MVC como patron de arquitectura y el observer como patron de diseño hace que la implementación de transacciones asincronas y distribuidas sea sencilla de implementar.