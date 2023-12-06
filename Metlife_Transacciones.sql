-- Transaccion 1: Actualizar el status a activo de l usuario con id 2
begin transaction;
	update usuarios set status = 1 where id = 2;
commit;

-- Transaccion 2: Aztualizar el nombre de usuario con id 2
begin transaction;
	update usuarios set username = "Artur" where id = 2;
commit;

-- Transaccion 3: Actualizar el status a 0 de la cobertura con id 6 e insertar un nuevo registro
begin transaction;
	update coberturas set status = 0 where id = 6;
	insert into coberturas (nombre, descripcion, status, costo, created_at)
		values ('Gastos por lesion', 'Esta cobertura abarca todos los gastos por una lesion', 0, 256, '2023/07/06');
commit;

-- Transaccion 4: Actualizar la fecha de nacimiento y la edad del usuario llamado Elizabeth
begin transaction;
	update userinfo set birthday = '2000/11/12' where nombre = 'Elizabeth';
	update userinfo set edad = 23 where nombre = 'Elizabeth';
commit;

-- Transaccion 5: Colocar la calle Miguel Hidalgo al cliente con id 3 y la calle 16 de septiembre al cliente con id 8
begin transaction;
	update clientes set calle = 'Miguel Hidalgo' where id = 3;
	update clientes set calle = '16 de septiembre' where id = 8;
commit;

-- Transaccion 6: Colocar el cvv 758 a la tarjeta con numero 79595201
begin transaction;
	update ventas set cvv = 758 where numero_tarjeta = 79595201;
commit;
