
CREATE TABLE aduana_llegada (
  adu_llega_id int NOT NULL,
  nombre_adu_llega varchar(45) NOT NULL,
  direccion_adu_llega varchar(45) NOT NULL,
  tipo_adu_llega varchar(45) NOT NULL,
  pais_adu_llega varchar(45) NOT NULL,
  PRIMARY KEY (adu_llega_id)
);

CREATE TABLE aereo (
  aereo_id int NOT NULL,
  num_vuelo varchar(45) NOT NULL,
  aerolinea varchar(45) NOT NULL,
  PRIMARY KEY (aereo_id)
);

CREATE TABLE agente_bodega (
  aget_bod_id int NOT NULL,
  nombre_aget_bod varchar(45) NOT NULL,
  direccion_aget_bod varchar(45) NOT NULL,
  nombre_repre_aget_bod varchar(45) NOT NULL,
  apellido_repre_aget_bod varchar(45) NOT NULL,
 pais_aget_bod varchar(45) NOT NULL,
  PRIMARY KEY (aget_bod_id)
);

CREATE TABLE agente_flete (
  agent_fle_id int NOT NULL,
  nombre_agent_fle varchar(45) NOT NULL,
  direccion_agent_fle varchar(45) NOT NULL,
  nombre_repre_agent_fle varchar(45) NOT NULL,
  apellido_repre_agent_fle varchar(45) NOT NULL,
  tel_repre_agent_fle varchar(45) NOT NULL,
  correo_repre_agent_fle varchar(45) DEFAULT NULL,
  PRIMARY KEY (agent_fle_id)
); 

CREATE TABLE bl (
  bl_id int NOT NULL,
  num_bl varchar(45) NOT NULL,
  PRIMARY KEY (bl_id)
); 

CREATE TABLE cat_mercaderia (
  cat_merca_id int NOT NULL,
  nombre_cat_merca varchar(45) NOT NULL,
  fch_venc_cat_merca date DEFAULT NULL,
  PRIMARY KEY (cat_merca_id)
);

CREATE TABLE cat_tarifa (
  cat_tarifa_id int NOT NULL,
  cobro_peso float8 NOT NULL,
  cobro_vol float8 NOT NULL,
  PRIMARY KEY (cat_tarifa_id)
);


CREATE TABLE etd (
  etd_id int NOT NULL,
  num_etd varchar(45) NOT NULL,
  PRIMARY KEY (etd_id)
);

CREATE TABLE manifiesto (
  manifiesto_id int NOT NULL,
  num_manifiesto varchar(45) NOT NULL,
  PRIMARY KEY (manifiesto_id)
);

CREATE TABLE maritimo (
  maritimo_id int NOT NULL,
  nom_barco varchar(45) NOT NULL,
  PRIMARY KEY (maritimo_id)
);


CREATE TABLE proveedor(
  proveedor_id int NOT NULL,
  nombre_prov varchar(45) NOT NULL,
  pais_prov varchar(45) NOT NULL,
  direccion varchar(45) NOT NULL,
  telefono_prov varchar(45) NOT NULL,
  correo_prov varchar(45) DEFAULT NULL,
  PRIMARY KEY (proveedor_id)
);

CREATE TABLE tipo_rol(
  tipo_rol_id int NOT NULL,
  nombre_tip_rol varchar(45) NOT NULL,
  PRIMARY KEY (tipo_rol_id)
);


CREATE TABLE seguimiento (
  seguimiento_id int NOT NULL,
  PRIMARY KEY (seguimiento_id)
);

CREATE TABLE sucursal (
  sucursal_id int NOT NULL,
  nombre_sucu varchar(45) NOT NULL,
  num_reg_sucu varchar(45) NOT NULL,
  direccion_sucu varchar(60) NOT NULL,
  telefono_sucu varchar(45) NOT NULL,
  correo_sucu varchar(45) DEFAULT NULL,
  PRIMARY KEY (sucursal_id)
);

CREATE TABLE terrestre (
  terrestre_id int NOT NULL,
  placa varchar(45) NOT NULL,
  nom_conductor varchar(45) NOT NULL,
  apell_conductor varchar(45) NOT NULL,
  PRIMARY KEY (terrestre_id)
);
CREATE TABLE tipo_documento (
  tipo_doc_id int NOT NULL,
  nombre_tip_doc varchar(45) NOT NULL,
  PRIMARY KEY (tipo_doc_id)
);

CREATE TABLE cliente (
  cliente_id int NOT NULL,
  nombre_empr varchar(45) NOT NULL,
  giro varchar(45) NOT NULL,
  num_reg varchar(45) NOT NULL,
  direccion varchar(45) NOT NULL,
  nom_represent varchar(45) NOT NULL,
  apellido_represent varchar(45) NOT NULL,
  telefono_represent varchar(45) NOT NULL,
  correo varchar(45) DEFAULT NULL,
  comentario varchar(500) DEFAULT NULL,
  fk_cat_tarifa_id int NOT NULL,
  PRIMARY KEY (cliente_id),
  FOREIGN KEY (fk_cat_tarifa_id) REFERENCES cat_tarifa (cat_tarifa_id)
);

CREATE TABLE contenedor (
  contene_id int NOT NULL,
  tamano_conte varchar(45) NOT NULL,
  numero_conte varchar(45) NOT NULL,
  sello_conte varchar(45) NOT NULL,
  fk_agent_bod int NOT NULL,
  PRIMARY KEY (contene_id),

  CONSTRAINT fk_agent_bod FOREIGN KEY (fk_agent_bod) REFERENCES agente_flete (agent_fle_id)
);

CREATE TABLE det_mercaderia (
  det_merca_id int NOT NULL,
  cantidad_merca varchar(45) NOT NULL,
  descripcion_merca varchar(100) NOT NULL,
  peso_merca varchar NOT NULL,
  volumen_merca varchar(45) NOT NULL,
  fk_catalogo int NOT NULL,
  PRIMARY KEY (det_merca_id),
  
  CONSTRAINT fk_catalogo FOREIGN KEY (fk_catalogo) REFERENCES cat_mercaderia (cat_merca_id)
);


CREATE TABLE documento (
  document_id int NOT NULL,
  num_doc varchar(45) NOT NULL,
  fk_tip_doc int NOT NULL,
  PRIMARY KEY (document_id),
 
  CONSTRAINT fk_tip_doc FOREIGN KEY (fk_tip_doc) REFERENCES tipo_documento (tipo_doc_id)
);

CREATE TABLE empleado(
  empleado_id int NOT NULL,
  nombre_epl varchar(45) NOT NULL,
  apellido_epl varchar(45) NOT NULL,
  direccion_epl varchar(45) NOT NULL,
  telefono_epl varchar(45) NOT NULL,
  correo_epl varchar(45) DEFAULT NULL,
  num_seguro varchar(45) DEFAULT NULL,
  fk_sucursal int NOT NULL,
  PRIMARY KEY (empleado_id),
  
  CONSTRAINT fk_sucursal FOREIGN KEY (fk_sucursal) REFERENCES sucursal (sucursal_id)
);

CREATE TABLE rol (
  rol_id int NOT NULL,
  nombre_rol varchar(45) NOT NULL,
  fk_tipo_rol int NOT NULL,
  usuario varchar(45) NOT NULL,
  contrasena varchar(45) NOT NULL,
  fk_cliente int NOT NULL,
  fk_empleado int NOT NULL,
  fk_documento int NOT NULL,
  PRIMARY KEY (rol_id),
 
  CONSTRAINT fk_tipo_rol FOREIGN KEY (fk_tipo_rol) REFERENCES tipo_rol (tipo_rol_id),
  CONSTRAINT fk_cliente FOREIGN KEY (fk_cliente) REFERENCES cliente (cliente_id),
  CONSTRAINT fk_documento FOREIGN KEY (fk_documento) REFERENCES documento (document_id),
  CONSTRAINT fk_empleado FOREIGN KEY (fk_empleado) REFERENCES empleado (empleado_id)
);


CREATE TABLE servicio_bodega (
  serv_bod_id int NOT NULL,
  nombre_serv_bod varchar(45) NOT NULL,
  precio_serv_bod float8 NOT NULL,
  fk_agente_bod int NOT NULL,
  PRIMARY KEY (serv_bod_id),

  CONSTRAINT fk_agente_bod FOREIGN KEY (fk_agente_bod) REFERENCES agente_bodega (aget_bod_id)
);

CREATE TABLE transporte (
  transp_id int NOT NULL,
  placa_transp varchar(45) NOT NULL,
  nombre_transp varchar(45) NOT NULL,
  capacidad_transp varchar(45) NOT NULL,
  fk_maritimo int NOT NULL,
  fk_terrestre int NOT NULL,
  fk_aereo int NOT NULL,
  PRIMARY KEY (transp_id),
 
  CONSTRAINT fk_aereo FOREIGN KEY (fk_aereo) REFERENCES aereo (aereo_id),
  CONSTRAINT fk_maritimo FOREIGN KEY (fk_maritimo) REFERENCES maritimo (maritimo_id),
  CONSTRAINT fk_terrestre FOREIGN KEY (fk_terrestre) REFERENCES terrestre (terrestre_id)
);

CREATE TABLE det_flete (
  det_fle_id int NOT NULL,
  fk_transport int NOT NULL,
  fk_contenedor int NOT NULL,
  PRIMARY KEY (det_fle_id),
 
  CONSTRAINT fk_contenedor FOREIGN KEY (fk_contenedor) REFERENCES contenedor (contene_id),
  CONSTRAINT fk_transport FOREIGN KEY (fk_transport) REFERENCES transporte (transp_id)
);

CREATE TABLE servicio (
  servicio_id int NOT NULL,
  fch_almac_serv date NOT NULL,
  fch_sal_bod_serv date NOT NULL,
  fch_est_llega_serv date NOT NULL,
  num_vuelo_serv varchar(45) DEFAULT NULL,
  costo_serv varchar(45) NOT NULL,
  estado_serv varchar(45) NOT NULL,
  fk_servi_bod int NOT NULL,
  fk_proveedor int NOT NULL,
  fk_adu_llega int NOT NULL,
  fk_det_flet int NOT NULL,
  fk_seguimiento int NOT NULL,
  fk_etd int NOT NULL,
  fk_bl int NOT NULL,
  fk_manifiesto int NOT NULL,
  fk_rol int NOT NULL,
  fk_det_merca int NOT NULL,
  PRIMARY KEY (servicio_id),
 
  CONSTRAINT fk_det_merca FOREIGN KEY (fk_det_merca) REFERENCES det_mercaderia (det_merca_id),
  CONSTRAINT fk_adu_llega FOREIGN KEY (fk_adu_llega) REFERENCES aduana_llegada (adu_llega_id),
  CONSTRAINT fk_bl FOREIGN KEY (fk_bl) REFERENCES bl (bl_id),
  CONSTRAINT fk_det_flet FOREIGN KEY (fk_det_flet) REFERENCES det_flete(det_fle_id),
  CONSTRAINT fk_etd FOREIGN KEY (fk_etd) REFERENCES etd (etd_id),
  CONSTRAINT fk_manifiesto FOREIGN KEY (fk_manifiesto) REFERENCES manifiesto (manifiesto_id),
  CONSTRAINT fk_proveedor FOREIGN KEY (fk_proveedor) REFERENCES proveedor (proveedor_id),
  CONSTRAINT fk_rol FOREIGN KEY (fk_rol) REFERENCES rol (rol_id),
  CONSTRAINT fk_seguimiento FOREIGN KEY (fk_seguimiento) REFERENCES seguimiento (seguimiento_id),
  CONSTRAINT fk_servi_bod FOREIGN KEY (fk_servi_bod) REFERENCES servicio_bodega (serv_bod_id)
);

CREATE TABLE venta(
  venta_id int NOT NULL,
  fch_emi_venta date NOT NULL,
  exenta_venta varchar(45) DEFAULT NULL,
  iva float8 NOT NULL,
  fk_servicio int NOT NULL,
  PRIMARY KEY (venta_id),
 
  CONSTRAINT fk_servicio FOREIGN KEY (fk_servicio) REFERENCES servicio (servicio_id)
);

CREATE TABLE usuario
(
  iduser integer NOT NULL,
  usuario character varying(50) NOT NULL,
  contrasena character varying(100) NOT NULL,
  tipousuario character varying(50) NOT NULL,
  estado integer NOT NULL,
  CONSTRAINT usuario_pkey PRIMARY KEY (iduser)
)
WITH (
  OIDS=FALSE
);
ALTER TABLE usuario
  OWNER TO postgres;
