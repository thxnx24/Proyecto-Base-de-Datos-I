USE farmacia;

ALTER TABLE doctor ADD FOREIGN KEY (ID_Departamento) REFERENCES departamento (ID_Departamento);
ALTER TABLE paciente ADD FOREIGN KEY (ID_Departamento) REFERENCES departamento (ID_Departamento);
ALTER TABLE suplemento ADD FOREIGN KEY (ID_Departamento) REFERENCES departamento (ID_Departamento);
ALTER TABLE historial_medico ADD FOREIGN KEY (ID_Paciente) REFERENCES paciente (ID_Paciente);
ALTER TABLE telefono_paciente ADD FOREIGN KEY (ID_Paciente) REFERENCES paciente (ID_Paciente);

ALTER TABLE preinscripcion ADD FOREIGN KEY (ID_Paciente) REFERENCES paciente (ID_Paciente);
ALTER TABLE preinscripcion ADD FOREIGN KEY (ID_Doctor) REFERENCES doctor (ID_Doctor);
ALTER TABLE preinscripcion ADD FOREIGN KEY (ID_Medicamento) REFERENCES medicamento (ID_Medicamento);

ALTER TABLE consulta ADD FOREIGN KEY (ID_Paciente) REFERENCES paciente (ID_Paciente);
ALTER TABLE consulta ADD FOREIGN KEY (ID_Doctor) REFERENCES doctor (ID_Doctor);

ALTER TABLE cita ADD FOREIGN KEY (ID_Paciente) REFERENCES paciente (ID_Paciente);
ALTER TABLE cita ADD FOREIGN KEY (ID_Doctor) REFERENCES doctor (ID_Doctor);

ALTER TABLE receta ADD FOREIGN KEY (ID_Consulta) REFERENCES consulta (ID_Consulta);
ALTER TABLE receta ADD FOREIGN KEY (ID_Medicamento) REFERENCES medicamento (ID_Medicamento);

ALTER TABLE medicamento ADD FOREIGN KEY (ID_Clase_medicamento) REFERENCES clase_medicamento (ID_Clase_medicamento);

ALTER TABLE tiene ADD FOREIGN KEY (ID_Horarios) REFERENCES horario (ID_Horario);
ALTER TABLE tiene ADD FOREIGN KEY (ID_Doctor) REFERENCES doctor (ID_Doctor);

ALTER TABLE pedido ADD FOREIGN KEY (ID_Proveedor) REFERENCES proveedor (ID_Proveedor);
ALTER TABLE pedido ADD FOREIGN KEY (ID_Medicamento) REFERENCES medicamento (ID_Medicamento);