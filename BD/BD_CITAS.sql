
CREATE DATABASE CITAS
USE CITAS

INSERT INTO pacientes (nombre, apellido, fecha_nacimiento, genero, telefono, direccion, tipo_sangre) VALUES
('Juan','Perez','1990-05-10','Masculino','900111111','Lima','O+'),
('Maria','Lopez','1985-03-22','Femenino','900222222','Callao','A+'),
('Carlos','Gomez','2000-07-15','Masculino','900333333','Lima','B+'),
('Ana','Torres','1998-11-30','Femenino','900444444','Surco','O-'),
('Luis','Ramirez','1992-01-05','Masculino','900555555','Miraflores','AB+'),
('Sofia','Castro','2001-09-18','Femenino','900666666','San Isidro','A-'),
('Pedro','Diaz','1989-12-12','Masculino','900777777','Barranco','O+'),
('Lucia','Vargas','1995-06-25','Femenino','900888888','Lince','B-'),
('Diego','Mendoza','1993-04-14','Masculino','900999999','Ate','AB-'),
('Elena','Rojas','1997-08-08','Femenino','901000000','SJL','O+');

INSERT INTO medicos (nombre, apellido, especialidad, telefono, email, licencia, anios_experiencia) VALUES
('Carlos','Gomez','Cardiologia','911111111','carlos@clinica.com','LIC001',10),
('Ana','Torres','Pediatria','922222222','ana@clinica.com','LIC002',8),
('Luis','Ramirez','Dermatologia','933333333','luis@clinica.com','LIC003',12),
('Maria','Lopez','Neurologia','944444444','maria@clinica.com','LIC004',15),
('Pedro','Castro','Traumatologia','955555555','pedro@clinica.com','LIC005',7),
('Jorge','Silva','Oftalmologia','966666666','jorge@clinica.com','LIC006',9),
('Rosa','Quispe','Ginecologia','977777777','rosa@clinica.com','LIC007',11),
('Miguel','Paredes','Psiquiatria','988888888','miguel@clinica.com','LIC008',13),
('Laura','Mendoza','Endocrinologia','999999999','laura@clinica.com','LIC009',6),
('Diego','Flores','Oncologia','900000001','diego@clinica.com','LIC010',14);

INSERT INTO citas (fecha, motivo, paciente_id, medico_id, estado, observaciones, sala) VALUES
('2024-06-01 10:00:00','Dolor pecho',1,1,'pendiente','', '101'),
('2024-06-02 11:00:00','Chequeo',2,2,'completada','', '102'),
('2024-06-03 09:30:00','Alergia',3,3,'pendiente','', '103'),
('2024-06-04 14:00:00','Migraña',4,4,'completada','', '104'),
('2024-06-05 15:30:00','Golpe',5,5,'pendiente','', '105'),
('2024-06-06 08:00:00','Vista',6,6,'pendiente','', '106'),
('2024-06-07 13:00:00','Control',7,7,'completada','', '107'),
('2024-06-08 16:00:00','Ansiedad',8,8,'pendiente','', '108'),
('2024-06-09 12:00:00','Hormonas',9,9,'completada','', '109'),
('2024-06-10 10:30:00','Cancer',10,10,'pendiente','', '110');

INSERT INTO diagnosticos (descripcion, fecha, paciente_id, medico_id, gravedad, recomendaciones, tipo_diagnostico) VALUES
('Cardiopatia leve','2024-06-01 10:30:00',1,1,'media','reposo','clinico'),
('Revision normal','2024-06-02 11:30:00',2,2,'baja','','preventivo'),
('Dermatitis','2024-06-03 10:00:00',3,3,'media','crema','dermatologico'),
('Migraña severa','2024-06-04 14:30:00',4,4,'alta','medicacion','neurologico'),
('Fractura leve','2024-06-05 16:00:00',5,5,'alta','reposo','traumatologico'),
('Miopia','2024-06-06 08:30:00',6,6,'baja','lentes','visual'),
('Control embarazo','2024-06-07 13:30:00',7,7,'media','seguimiento','ginecologico'),
('Ansiedad','2024-06-08 16:30:00',8,8,'media','terapia','psiquiatrico'),
('Diabetes','2024-06-09 12:30:00',9,9,'alta','dieta','endocrino'),
('Tumor','2024-06-10 11:00:00',10,10,'alta','tratamiento','oncologico');

INSERT INTO tratamientos (nombre, descripcion, duracion, diagnostico_id, medico_id, estado, frecuencia_administracion) VALUES
('Cardio plan','Control presion','30 dias',1,1,'activo','diaria'),
('Chequeo','Rutina','15 dias',2,2,'completado','semanal'),
('Piel','Crema','20 dias',3,3,'activo','diaria'),
('Migraña','Control dolor','10 dias',4,4,'activo','diaria'),
('Fractura','Recuperacion','45 dias',5,5,'activo','semanal'),
('Vista','Uso lentes','60 dias',6,6,'activo','diaria'),
('Embarazo','Control','90 dias',7,7,'activo','mensual'),
('Ansiedad','Terapia','30 dias',8,8,'activo','semanal'),
('Diabetes','Insulina','120 dias',9,9,'activo','diaria'),
('Cancer','Quimio','180 dias',10,10,'activo','mensual');

INSERT INTO medicamentos (nombre, dosis, frecuencia, duracion, tratamiento_id, proveedor, efectos_secundarios) VALUES
('Aspirina','500mg','8h','7 dias',1,'Farmacia A','nauseas'),
('Paracetamol','650mg','6h','5 dias',2,'Farmacia B',''),
('Crema Derm','aplicar','2/dia','10 dias',3,'Farmacia C','irritacion'),
('Ibuprofeno','400mg','8h','7 dias',4,'Farmacia D','mareos'),
('Calcio','1 tab','diaria','30 dias',5,'Farmacia E',''),
('Lentes','uso','diaria','60 dias',6,'Optica',''),
('Vitaminas','1 tab','diaria','90 dias',7,'Farmacia F',''),
('Ansiolitico','10mg','diaria','30 dias',8,'Farmacia G','somnolencia'),
('Insulina','10u','diaria','120 dias',9,'Farmacia H',''),
('QuimioDrug','var','mensual','180 dias',10,'Hospital','fatiga');