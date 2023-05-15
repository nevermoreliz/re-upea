/* selecionando enlace*/
create
or replace view re_vista_enlace as
select e.id_enlace id_enlace,
       orden,
       url_enlace,
       links_enlace,
       nombre_enlace,
       tipo_enlace,
       ste.id_tipo_enlace,
       ste.nombre_tipo_enlace,
       telefono,
       fax,
       fecha,
       id_dato_enlace,
       direccion,
       correo,
       inicio_convenio_enlace,
       fin_convenio_enlace,
       de.id_pais  id_pais,
       pais,
       capital,
       continente,
       codigo_pais,
       iso,
       departamento,
       ciudad,
       e.estado
from enlace as e
         left join dato_enlace as de on e.id_enlace = de.id_enlace
         left join sic_paises sp on de.id_pais = sp.id_pais
         left join sic_tipo_enlaces ste on de.id_tipo_enlace = ste.id_tipo_enlace;


/* pruebas para nacional */
create
or replace view re_vista_convenio_nacional as
select sc.id_convenios,
       sc.id_detalle_grupo,
       sc.id_tipo_convenio,
       sc.nombre_convenio,
       sc.objetivo_convenio,
       sc.img_convenio,
       sc.pdf_convenio,
       sc.fecha_firma,
       sc.fecha_finalizacion,
       sc.tiempo_duracion,
       sc.fecha_publicacion,
       sc.direccion direccion_convenio,
       sc.entidad,
       sc.telefono  telefono_convenio,
       sc.email,
       sc.estado    estado_convenio,
       rve.id_enlace,
       rve.orden,
       rve.url_enlace,
       rve.links_enlace,
       rve.nombre_enlace,
       rve.tipo_enlace,
       rve.telefono,
       rve.fax,
       rve.fecha,
       rve.id_dato_enlace,
       rve.direccion,
       rve.departamento,
       rve.ciudad,
       rve.correo,
       rve.inicio_convenio_enlace,
       rve.fin_convenio_enlace,
       rve.id_pais,
       rve.pais,
       rve.capital,
       rve.continente,
       rve.codigo_pais,
       rve.iso,
       rve.estado   estado
from sic_convenio sc
         left join sic_enlace_convenios sec on sc.id_convenios = sec.id_convenios
         left join re_vista_enlace rve on sec.id_enlace = rve.id_enlace
where sc.id_tipo_convenio = 1;

/* pruebas para internacional */
create
or replace view re_vista_convenio_internacional as
select sc.id_convenios,
       sc.id_detalle_grupo,
       sc.id_tipo_convenio,
       sc.nombre_convenio,
       sc.objetivo_convenio,
       sc.img_convenio,
       sc.pdf_convenio,
       sc.fecha_firma,
       sc.fecha_finalizacion,
       sc.tiempo_duracion,
       sc.fecha_publicacion,
       sc.direccion direccion_convenio,
       sc.entidad,
       sc.telefono  telefono_convenio,
       sc.email,
       sc.estado    estado_convenio,
       rve.id_enlace,
       rve.orden,
       rve.url_enlace,
       rve.links_enlace,
       rve.nombre_enlace,
       rve.tipo_enlace,
       rve.telefono,
       rve.fax,
       rve.fecha,
       rve.id_dato_enlace,
       rve.direccion,
       rve.departamento,
       rve.ciudad,
       rve.correo,
       rve.inicio_convenio_enlace,
       rve.fin_convenio_enlace,
       rve.id_pais,
       rve.pais,
       rve.capital,
       rve.continente,
       rve.codigo_pais,
       rve.iso,
       rve.estado   estado
from sic_convenio sc
         left join sic_enlace_convenios sec on sc.id_convenios = sec.id_convenios
         left join re_vista_enlace rve on sec.id_enlace = rve.id_enlace
where sc.id_tipo_convenio = 2;
