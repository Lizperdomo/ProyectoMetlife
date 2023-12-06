use metlife;

-- Vistas 

-- Vista 1: Mostrar el numero de ventas de la fecha 24/07/2023
create view numero_de_ventas as
select count(*) as 'Numero de ventas' from ventas where created_at ='2023/07/24'; 

select * from numero_de_ventas;

-- Vista 2: Mostrar el nombre, edad y ciudad de los clientes que son de puebla
create view clientes_de_puebla as
select u.nombre, u.edad, c.ciudad from userinfo as u
		join clientes as c
			on u.id = c.id
				where ciudad = 'Puebla'; 

		select * from clientes_de_puebla;

	
-- Vista 3: Mostrar el nombre, apellido y cumpleaños de los usuarios que nacieron en el 2000 y 2001
create view nacidos_2000_2001 as
select nombre, lastname, birthday from userinfo where birthday between  '2000/01/01' and '2001/12/31';

select * from nacidos_2000_2001;

-- Vista 4: Mostrar el perfil, username y status de de los usuarios 
create view perfil_de_usuarios as
select p.perfil, u.username, u.status from perfiles as p 
	join usuarios as u 
		on p.id = u.perfil; 
		
	select * from perfil_de_usuarios;
	
-- Vista 5: Mostrar el nombre real de los usuarios
	create view nombre_real as 
	select u.username, concat(ui.nombre, " ", ui.lastname) as 'Nombre real' from usuarios as u 
		join userinfo as ui
			on u.id = ui.id;
			
	select * from nombre_real; 
	
-- Vista 6: Mostrar el numero total de usuarios que son administradores
create view usuarios_admin as
	select count(*) as "Total de usuarios" from usuarios where perfil = 1;
	
	select * from usuarios_admin; 
	
-- Vista 7: Mostrar el nombre de usuario y su monto de la cobertura que tiene 
create view cobertura_monto as
select u.username, v.monto
	from usuarios as u join ventas as v	
		on u.id = v.usuario; 
		
	select * from cobertura_monto;
	
-- Vista 8: Mostrar el nombre de usuario, genero, edad y el status de los usuarios que estan activos
create view nom_user_activos as
select u.username, ui.genero, ui.edad, u.status
	from usuarios as u join userinfo as ui	
		on u.id  = ui.id  
			where u.status = 1;
			
		select * from nom_user_activos; 
		

-- Vista 9: Mostrar el nombre de usuarios y el numero de tarjeta de dicho usuario
create view tarjeta_usuario as
select u.username, v.numero_tarjeta
	from usuarios as u join ventas as v
		on u.id = v.usuario; 
		
	select * from tarjeta_usuario;
	
-- Vista 10: Mostrar el tamaño del nombre de las coberturas ordenamos por nombre de forma ascendente
create view tamaño_cobertura as
	select length (nombre) as "tamaño de nombre" from coberturas order by nombre asc;

select * from tamaño_cobertura;