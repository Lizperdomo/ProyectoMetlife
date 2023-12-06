use metlife;


-- Proceso almacenado que enlista los usuarios registrados 
CREATE PROCEDURE metlife.ListarUsuarios()
begin
	select * from usuarios;
end

call metlife.ListarUsuarios();
52
-- Proceso que enlista las coberturas 
CREATE PROCEDURE metlife.ListarCoberturas()
begin
	select * from coberturas;
end

call metlife.ListarCoberturas();

-- Proceso que enlista las ventas con usuario 3
CREATE PROCEDURE metlife.ListarVentasConUsuario()
begin
	select * from ventas where usuario = 3;
end

call metlife.ListarVentasConUsuario();

-- Proceso que inserta un dato en la tabla de ventas 
CREATE PROCEDURE metlife.InsertarVenta(in tarjeta int,in cvv int, in monto int, in usuario int, in created_at datetime)
begin
	insert into ventas (numero_tarjeta, cvv, monto, usuario, created_at)
	values (tarjeta, cvv, monto, usuario, created_at);
end

call metlife.InsertarVenta(12569802, 159, 200, 2, '2023/11/08');
select * from ventas;


-- Proceso que modifica el nombre de una cobertura
CREATE PROCEDURE metlife.ModificarCobertura(in CoberturaModificada varchar(50))
begin
	update coberturas set nombre = CoberturaModificada where id = 1;
END

call metlife.ModificarCobertura('Enfermedades');
select  * from coberturas;


-- Proceso que elimina la venta que tiene el usuario con id 2
CREATE PROCEDURE metlife.EliminarVenta()
begin
	delete from ventas where usuario = 2;
end

call metlife.EliminarVenta();
select * from ventas;