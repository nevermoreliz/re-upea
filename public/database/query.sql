/* selecionando enlace*/
select *
from enlace as e
         left join dato_enlace as de on e.id_enlace = de.id_enlace
         left join sic_paises sp on de.id_pais = sp.id_pais;

create view re_vista_enlace as
select e.id_enlace id_enlace,
       orden,
       url_enlace,
       links_enlace,
       nombre_enlace,
       tipo_enlace,
       telefono,
       fax,
       fecha,
       id_dato_enlace,
       direccion,
       correo,
       inicio_convenio_enlace,
       fin_convenio_enlace,
       de.id_pais id_pais,
       pais,
       capital,
       continente,
       codigo_pais,
       iso,
       e.estado
from enlace as e
         left join dato_enlace as de on e.id_enlace = de.id_enlace
         left join sic_paises sp on de.id_pais = sp.id_pais;

/* selecionando convenios mas sus enlaces */
select sc.id_convenios,
       sc.nombre_convenio,
       sc.id_tipo_convenio,
       CONCAT('[', GROUP_CONCAT( JSON_OBJECT('campo2', e.id_enlace)), ']') table_enlace
from sic_convenio sc
         left join sic_enlace_convenios sec
              on sc.id_convenios = sec.id_convenios
         left join enlace e
              on sec.id_enlace = e.id_enlace
group by sc.id_convenios;


/* pruebas para nacional */
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
       sc.direccion,
       sc.entidad,
       sc.telefono,
       sc.email,
       sc.estado estado_convenio,
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
       rve.correo,
       rve.inicio_convenio_enlace,
       rve.fin_convenio_enlace,
       rve.id_pais,
       rve.pais,
       rve.capital,
       rve.continente,
       rve.codigo_pais,
       rve.iso,
       rve.estado estado
from sic_convenio sc
         left join sic_enlace_convenios sec on sc.id_convenios = sec.id_convenios
         left join re_vista_enlace rve on sec.id_enlace = rve.id_enlace;