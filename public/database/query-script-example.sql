/* selecionando convenios mas sus enlaces */
select sc.id_convenios,
       sc.nombre_convenio,
       sc.id_tipo_convenio,
       CONCAT('[', GROUP_CONCAT(JSON_OBJECT('campo2', e.id_enlace)), ']') table_enlace
from sic_convenio sc
         left join sic_enlace_convenios sec
                   on sc.id_convenios = sec.id_convenios
         left join enlace e
                   on sec.id_enlace = e.id_enlace
group by sc.id_convenios;