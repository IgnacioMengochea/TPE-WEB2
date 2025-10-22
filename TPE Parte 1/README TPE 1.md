Integrantes del grupo: Juan Manuel Juárez (jjuanmacachari@gmail.com) e Ignacio Mengochea (ignamengochea@gmail.com).

Temática del TPE: Pizzería de Tandil.

Nuestro TPE se basa en una pagina web para personas de tandil que quieren comprar pizza online, en esta misma pueden anotar cuantas pizzas quieren viendo las 6 variedades que pueden elegir.
Cada persona se registrará con su usuario y contraseña para poder generar el pedido y tener seguimiento de quien es, que pizza quiere y que pedido hará. 

Nuestra base de datos (Pizzeria) consta de 3 tablas:
---------------------------------------------------------------------
TABLA (Users): Consta de 3 columnas: 

ID_USERS: PRIMARY KEY

USER

PASSWORD

----------------------------------------------------
TABLA (Pizzas) Consta de 3 columnas:

ID_PIZZAS: PRIMARY KEY

TIPO

PRECIO

-----------------------------------------------------
TABLA (Pedido) Consta de 5 columnas:

ID_PEDIDO: PRIMARY KEY

ID_PIZZA: FOREIGN KEY (id_pizzas)

ID_USER: FOREIGN KEY (id_users)

UBICACION 

FECHA

----------------------------------------------------------------------
![Captura_DER](https://github.com/user-attachments/assets/218afe93-719b-48ed-9fc8-40819ac73403)




