select * from enlace as en
left join dato_enlace as de on en.id_enlace = de.id_enlace
left join sic_enlaces_pais sep on en. id_enlace = sep.id_enlace;