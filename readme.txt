Luis Enrique Moreno Rodríguez
Puesto: Backend Developer
Conocimientos:
    PHP     80%
    JS      80%
    MYSQL   70%

NIVEL EXAMEN:
    termine el nivel intermedio.

INSTRUCCIONES DE INSTALACION:
    1. Asegurate de tener instalado mysql, ten a la mano las credenciales y los permisos corresponiendtes para poder crear y alterar una BD nueva.
    2. Clona el repositorio en la carpeta de tu servidor web (apache).
    3. Configura de apache para que el sitio se muestre en localhost
    4. Desde la terminal posicionate en la carpeta install del repositorio
    5. Ejecuta el comando:
        php install.php
       Nota: Se te creara la BD y sus registros iniciales.
    6. Ahora solo abre tu navegador e ingresa a a localhost.


    
Actividades Realizada:
        1.  Se requiere un script que deberá contener la creación de un mínimo de 3 tablas donde se
            guardará la información del producto, comentarios y categoría del producto. Deberá
            guardarse como mínimo el modelo, especificaciones, categoría o clasificación del producto y
            precio del producto; para los comentarios se deberán guardar mínimo texto, nombre y
            calificación del comentario. Y para las categorías deberán tener la capacidad de estar
            anidadas.
        2.  Cada tabla deberá tener un código para insertar no menos de 10 registros por cada una y no
            hay limitación en las columnas.
        2.  Crear una vista de los productos con sus comentarios, ordenados por mejor calificación
            proedio.
        3.  Cada tabla debe de tener sus índices, llaves foráneas y constraints.
        4.  Crear una tabla de accesorios asociados a la categoría del producto.
        5.  Como parte del script agregar el código para modificar la tabla de productos agregando
            una nueva columna con la cantidad de visitas a cada producto.
        6.  Agregar una tabla o al menos 2 columnas de metainformación que se actualice
            automáticamente, relacionada a cada producto para guardar sus estadísticas como fecha de
            registro, fecha de modificación, cantidad de visitas, cantidad de “likes”, etc.
        7.  Hacer un procedimiento o similar para calcular una mensualidad con base en el precio de
            lista a 6 y 12 meses a 10% de interés anual.
        8.  Crear una vista donde liste 10 productos en orden aleatorio con base en una clasificación y
            muestre la mensualidad calculada.
        9.  Agregar una tabla o al menos 2 columnas de metainformación que se actualice
            automáticamente, relacionada a cada producto para guardar sus estadísticas como fecha de
            registro, fecha de modificación, cantidad de visitas, cantidad de “likes”, etc.
        10. Hacer un procedimiento o similar para calcular una mensualidad con base en el precio de
            lista a 6 y 12 meses a 10% de interés anual.
        11. Crear una vista donde liste 10 productos en orden aleatorio con base en una clasificación y
            muestre la mensualidad calculada.
        12. Deberá utilizar PDO para conectarse con la base de datos y hacer un script en el nivel básico
            que agregue otros 10 registros a cada tabla. El script deberá generar un log donde reporte
            los errores y la cantidad de registros insertados.
        13. Hacer un código donde genere 200 productos de forma aleatoria con especificaciones,
            marcas y modelos utilizando términos técnicos y precios en un rango de 10,000 hasta
            60,000 MXN.
        14. Hacer un código Lorem Ipsum para inicializar los comentarios con textos y calificaciones
            aleatorias, con un mínimo de 1,000 comentarios repartidos entre los productos
        15. Cada producto deberá estar asociado a por lo menos una de 3 categorías distintas.
        16. Las especificaciones generadas de forma aleatoria deberán ser realistas y deberán
            corresponder con el precio calculado.
        17. Cantidad de productos generados deberá ser de mínimo 2,000 productos y todas las
            categorías o categorías hijas deberán tener por lo menos un producto asociado.
        18. Los comentarios deberán simular textos coherentes en español y deberán ser por lo menos
            10,000 y cada producto deberá tener por lo menos 2 comentarios asociados.
        19. En la carpeta PHP deberán estar todas las clases tanto controladoras como modelos,
            organizadas en espacios de nombres, así como un class loader que se incluirá en las vistas
            para utilizar las clases respectivas
        20. Crear un home que muestre el listado de categorías padres dentro de un menú.
        21. Listado de 10 productos seleccionados aleatoriamente bajo el texto de productos
            destacados.
        22. Debajo un listado de mínimo 10 productos más vendidos con base en su clasificación.
        23. Cuando se dé click en una categoría, se abrirán categorías hijas y se mostrarán los dos
            listados, tanto destacados como de más vendidos filtrados por la categoría seleccionada.
        24. Finalmente al visitar un producto se abrirá una nueva página donde se mostrará el detalle
            del producto con sus especificaciones y comentarios.
        25. El listado de productos destacados y más vendidos deberá ser mostrado en páginas para
            poder consultar todos los productos que aplican.