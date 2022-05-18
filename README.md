# Blog test

## 1. Descripción
Prueba piloto de un blog, con una parte web y una parte API abierta.

Contenido:
- Blog público
    - Listado de posts
    - Ficha del post, donde se mostrará una pequeña ficha del autor.
- API
    - Endpoint GET para la obtención de Posts.
    - Endpoint GET para la obtención de un Post en concreto por Id (esta incluirá la información del Autor dentro del Post).
    - Endpoint POST para la publicación de nuevos Post. No es necesario hacer persistencia.

Opcional:
- Uso de herramientas de naálisis estático (ej. PHPStan) y de estilo de código (ej.PHP CS Fixer).
- Uso de SCSS y Webpack.
- Ofrecer un Swagger/OpenAPI de la parte API.

## 2. Requisitos de ejecución
- PHP >= 8.0.17
- Composer
- Node

## 3. Instrucciones
- Una vez descargado el proyecto, entrar en la carpeta raíz.
- Ejecutar el comando "composer install".
- Ejecutar el comando "npm install".
- Ejecutar el comando "npm run dev".
- Ejecutar el comando "php artisan serve" para levantar el proyecto.

## 4. Decisiones
1. He decidido muchas cosas de este modo porque no existía una base de datos.
2. Por otro lado, he decidido "simular" que los proyectos estan en servidores diferentes, no relacionando llamadas directas entre ellos. Por esta influencia el Front esté hecho de esa manera.
3. No he incluido la información del Autor en el endpoint que devuelve todos los Posts porque aumentaba mucho el tiempo de respuesta. Si se quisiera incluir se debería generar una colección de PostDto y devolverla como resultado (lo que genera ese aumento); o pensar otro tipo de solución.
4. No sabía que más probar en los tests, quizás el PostDto pero no lo he visto necesario, y los endpoints de la API he decidido no testearlos al no poder mockear el distribuidor de los datos (Si hubieramos tenido una base de datos y usado SQLite en los tests, sí los hubiera testeado).
5. La parte de "decoración" del Front no la he visto necesaria para reflejar mis conocimientos en esta prueba.
6. Siento no haber cumplido con la parte opcional. Con el poco tiempo que he tenido libre para realizar la prueba y el retraso en el tiempo de entrega que llevaba he decidido ignorarlos por los siguientes motivos:
    - PHPStan y PHP CS Fixer no he configurado nunca desde 0, no tengo problema en implementarlo pero me hubiera llevado unas 2-3 horas más.
    - SCSS he usado en pocas ocasiones y como apenas he usado estilos para la parte de Front he decidido ahorrarlo. Pero si se decidiera tener un Front más rico estaría dispuesto a hacerlo.
    - Con la parte de OpenAPI sucede algo similar al primer punto, desde que se llamaba Swagger que no he montado uno, lo he ojeado pero al ver que ha cambiado completamente y me hubiera llevado varias horas tenerlo también he decidido saltarlo.
    
