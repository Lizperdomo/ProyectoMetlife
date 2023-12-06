use metlife;

INSERT INTO perfiles (perfil, created_at)
	VALUES ('admin', '2023/07/15 09:00:00'),
			('empleado', '2023/07/15 09:00:03'),
			('cliente', '2023/07/15 09:00:08');
			
INSERT INTO usuarios(username, password, status, perfil, created_at)
	VALUES ('Monse', 'mon126985', 1, 1, '2023/07/16'),
			('Luis', 'luis2689*', 0, 2, '2023/07/18'),
			('Carlos', 'carlitos00', 1, 1, '2023/07/20'),
			('Lulu', 'Lu2698#', 1, 3, '2023/07/20'),
			('Jose', 'jo2698#5', 0, 2, '2023/07/21'),
			('Kike', 'kikin26*', 1, 3, '2023/07/21'),
			('Mari', 'marazul26', 0, 1, '2023/07/25'),
			('Liz', 'liz0809#', 1, 2, '2023/07/26'),
			('Isa', 'isa1505*/03', 1, 3, '2023/07/26'),
			('Eli', 'eli5197', 0, 2, '2023/07/27'),
			('Jon', 'jongato3945', 0, 3, '2023/07/28'),
			('Kar', 'karrojo28', 1, 1, '2023/07/28'),
			('Chelo', 'cheloanto23', 1, 3, '2023/07/29'),
			('Paty', 'paty2698', 1, 1, '2023/07/30'),
			('Omi', 'omar26984', 0, 2, '2023/07/30');
	
INSERT INTO userinfo (id, nombre, lastname, birthday, genero, edad, celular, created_at)
	VALUES	(1,'Monserrat', 'Gonzalez', '1998/04/04','f', 25, '2311628954', '2023/07/16'),
			(2,'Luis', 'Sanchez', '2000/07/14','m', 23, '2311268495', '2023/07/18'),
			(3,'Carlos', 'Perez', '1998/09/24','m', 25, '2311895632', '2023/07/20'),
			(4,'Lucrecia', 'Juarez', '1997/10/04','f', 26, '2312698457', '2023/07/20'),
			(5,'Jose', 'Linos', '1990/06/15','m', 33, '2311458472', '2023/07/21'),
			(6,'Enrique', 'Lopez', '1992/12/14','m', 31, '2314591526', '2023/07/21'),
			(7,'Maria', 'Avila', '2001/06/08','f', 22, '2314159800', '2023/07/25'),
			(8,'Lizbeth', 'Perdomo', '2003/09/08','f', 20, '2310369854', '2023/07/26'),
			(9,'Isanami', 'Paredes', '2002/05/15','m', 21, '2331569230', '2023/07/26'),
			(10,'Elizabeth', 'Lorenzo', '1990/12/24','f', 33, '2223659845', '2023/07/27'),
			(11,'Jonathan', 'Julian', '1995/06/17','m', 28, '2335986214', '2023/07/28'),
			(12,'Karla', 'Flores', '1995/10/24','f', 28, '2331568475', '2023/07/28'),
			(13,'Consuelo', 'Fernandez', '1992/01/11','f', 31, '2226591250', '2023/07/29'),
			(14,'Patricia', 'Ochoa', '1997/07/26','f', 26, '2311628954', '2023/07/30'),
			(15,'Omar', 'Roldan', '2000/11/28','m', 23, '2312638451', '2023/07/30');
			
	
INSERT INTO coberturas(nombre, descripcion, status, costo, created_at)
	VALUES 	('Enfermedades graves', 'Esta coberutra cubre hasta 8 enfermedades', 1, 150, '2023/07/16'),
			('Cirugias', 'Esta coberutra cubre hasta 20 cirugias', 0, 250, '2023/07/19'),
			('Gastos funerarios', 'Esta coberutra te ofrece hasta $54000 pesos para gastos funerarios', 1, 200, '2023/07/19'),
			('Accidentes personales', 'Esta coberutra ofrece hasta $85000 pesos', 1, 250, '2023/07/20'),
			('Garantia escolar', 'Esta coberutra cubre varios gastos escolares', 1, 100, '2023/07/22'),
			('Proteccion contra cancer', 'Esta coberutra cubre hasta 10 quimioterapias', 1, 150, '2023/07/22'),
			('Enfermedades terminales', 'Esta coberutra ofrece hasta $1000000 de pesos', 0, 300, '2023/07/24'),
			('Apoyo por hospitalizacion', 'Esta coberutra ofrece pagar todos los gatos de hospitalizacion', 1, 250, '2023/07/25'),
			('Muerte accidental', 'Esta coberutra ofrece a los familiares del asegurado hasta $100000 pesos ', 0, 150, '2023/07/26'),
			('Fallecimiento', 'En caso de fallecer el asegurado se les entrega a los familiares el dinero ahorrado', 1, 350, '2023/07/28');
			
	-- delete from clientes where id in (1,2,3,4,5,6,7,8,9,10,11,12,13,14,15);

INSERT INTO clientes(id, calle, colonia, municipio, estado, ciudad, CURP, RFC, idCobertura, created_at)
	VALUES 	(1, 'Allende', 'Centro', 'Teziutlan', 'Puebla', 'Puebla', 'MOPG980404MPLHY6C', 'MONPG980404MPLU', 1, '2023/07/20'),
			(2, 'Juarez', 'Centro', 'Teziutlan', 'Puebla', 'Puebla', 'LUSA200714HPLDF5K', 'LUSA200714HPLDY', 2, '2023/07/22'),
			(3, '5 de mayo', 'Juarez', 'San juan', 'Puebla', 'Puebla', 'CAPR990924HPLFV6', 'CAPR990924HPLDC', 4, '2023/07/23'),
			(4, 'Aquiles', 'El carmen', 'Jalacingo', 'Veracruz', 'Veracruz', 'LUJZ971004MPLOK5H', 'LUJZ971004MPLFI', 5, '2023/07/24'),
			(5, 'Hidalgo', 'Cortes', 'Atempan', 'Puebla', 'Puebla', 'JOLN900615HPLSJHN', 'JOLN900615HPLSHU', 6, '2023/07/24'),
			(6, 'Carranza', 'Huerta', 'Atempan', 'Puebla', 'Puebla', 'ENLP921214HPLSJBS', 'ENLP921214HPLSJH', 7, '2023/07/24'),
			(7, 'Julio', 'Fresnillo', 'San juan', 'Puebla', 'Puebla', 'MAAV060608MPLDJNS', 'MAAV060608MPLDB', 8, '2023/07/27'),
			(8, 'Anautla', 'Chignaulingo', 'Hueyapan', 'Puebla', 'Puebla', 'LIPR030809MPLRNZA', 'LIPR030908JIY', 2, '2023/07/27'),
			(9, 'Los pinos', 'Criprecess', 'Jalacingo', 'Veracruz', 'Veracruz', 'ISPR030515HPLUYBJ', 'ISPR030515HPLHU', 3, '2023/07/28'),
			(10, 'Arboles', 'Pino', 'Jalacingo', 'Veracruz', 'Veracruz', 'ELLR901224MPLDHRY', 'ELLR301224MPLDT', 10, '2023/07/28'),
			(11, '16 de septiembre', 'Garbanzo', 'San juan', 'Puebla', 'Puebla', 'JOJL950617HPLSHYT', 'JOJL950617HPLTR', 1, '2023/07/30'),
			(12, 'Nacorazi', 'Cardenas', 'Hueyapan', 'Puebla', 'Puebla', 'KAFL951024MPLTRS', 'KAFL951024MPLAC', 3, '2023/07/30'),
			(13, 'Lerdo', 'Centro sur', 'Atempan', 'Puebla', 'Puebla', 'COAV920111MPLREZ', 'COAV920111MPLVD', 1, '2023/0/01'),
			(14, 'Seccion 11', 'Atoluca', 'Jalacingo', 'Veracruz', 'Veracruz', 'PAOCH970726MPLJIR', 'PACH970726MPLGJ', 2, '2023/08/01'),
			(15, 'Avila', 'Centro', 'Teziutlan', 'Puebla', 'Puebla', 'OMRL201128HPLOJY', 'OMRL201128HPLJI', 9, '2023/08/06');
	
INSERT INTO ventas(numero_tarjeta, cvv, monto, usuario, created_at)
	VALUES 	(16598235, 126, 2000, 1, '2023/07/20'),
			(16595952, 456, 2500, 2, '2023/07/22'),
			(69512263, 149, 3600, 3, '2023/07/23'),
			(26975236, 364, 4560, 4, '2023/07/24'),
			(39781266, 481, 4806, 5, '2023/07/24'),
			(79595201, 541, 4520, 6, '2023/07/24'),
			(13596588, 269, 2020, 7, '2023/07/27'),
			(13299854, 325, 6500, 8, '2023/07/27'),
			(32649784, 459, 2500, 9, '2023/07/28'),
			(31494626, 820, 1800, 10, '2023/07/28'),
			(89626262, 947, 3500, 1, '2023/07/30'),
			(32198564, 129, 2700, 3, '2023/07/30'),
			(23984154, 746, 6900, 3, '2023/08/01'),
			(69532418, 162, 1200, 6, '2023/08/01'),
			(23942658, 984, 1600, 5, '2023/08/06');
	
select * from ventas;
INSERT INTO cobertura_cliente (cobertura, cliente)
	VALUES 	(1, 2), 
			(2, 2),
			(3, 4),
			(4, 5),
			(5, 6),
			(6, 7),
			(7, 8),
			(8, 2),
			(9, 3),
			(10, 10);
		
insert into usuario_venta (usuario, venta)
	values 	(1, 1),
			(3, 3),
			(4, 4),
			(5, 5),
			(6, 6),
			(7, 7),
			(8, 8),
			(9, 9),
			(10, 10),
			(1, 11),
			(3, 12),
			(3, 13),
			(6, 14),
			(5, 15);

-- Consultas 

-- Consulta que muestra la cantidad total de usuarios
select count(*) as "Total de usuarios" from usuarios;

-- Consulta que muestra las coberturas de forma ascendente 
select * from coberturas order by nombre asc;

-- Consulta que muestra el monto y el usuario de las ventas creadas entre el 01 de julio al 25 de julio 
select monto, usuario, created_at  from ventas where created_at between '2023/07/01' and '2023/07/25';

-- Consulta que muestra el nombre, genero y edad de la tabla userinfo ordenados por nombre y mostrando solo los ultimos 3 
select nombre, genero, edad from userinfo order by nombre desc limit 3;

-- Consulta que muestra el id, nombre y el tamaño del nombre de las coberturas ordenamos por nombre de forma descendente
select id, nombre, length (nombre) as "tamaño de nombre" from coberturas order by nombre desc;

-- Consulta que muestra el nombre de usuarios y el numero de tarjeta de dicho usuario
select u.username, v.numero_tarjeta
	from usuarios as u join ventas as v
		on u.id = v.usuario; 

-- Consulta que muestra el nombre de usuario, genero y el status de los usuarios que estan activos
select u.username, ui.genero, u.status
	from usuarios as u join userinfo as ui	
		on u.id  = ui.id  
			where u.status = 1;
 
-- Consulta que muestra el nombre de usuario, su monto de la cobertura que tiene y que muestre solo las ventas creadas entre el 15/07/2023 y 01/08/2023
select u.username, v.monto, v.created_at
	from usuarios as u join ventas as v	
		on u.id = v.usuario 
			where v.created_at between '2023/07/15' and '2023/08/01';

-- Consulta que muestra el nombre de usuario, el nombre real del usuario y el celular del usuario con id 7
	select
	u.username, concat(ui.nombre, " ", ui.lastname) as 'Nombre real', ui.celular
	from usuarios as u join userinfo as ui
			on u.id = ui.id
				where ui.id = 7;

			select * from userinfo;