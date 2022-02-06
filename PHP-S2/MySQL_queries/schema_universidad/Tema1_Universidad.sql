-- ************************************  Base de dades Universidad  *************************

-- 1 .-Retorna un llistat amb el primer cognom, segon cognom i el nom de tots els alumnes. El llistat haurà d'estar ordenat alfabèticament de menor a major pel primer cognom, segon cognom i nom.
Select apellido1, apellido2, nombre from persona where tipo = 'alumno' order by apellido1 asc, apellido2 asc, nombre asc;

-- 2 .-Esbrina el nom i els dos cognoms dels alumnes que no han donat d'alta el seu número de telèfon en la base de dades.
Select nombre, apellido1, apellido2 from persona where tipo = 'alumno' and telefono IS NULL;

-- 3 .-Retorna el llistat dels alumnes que van néixer en 1999.
Select * from persona where tipo = 'alumno' and year(fecha_nacimiento) = 1999;

-- 4 .-Retorna el llistat de professors que no han donat d'alta el seu número de telèfon en la base de dades i a més la seva nif acaba en K.
Select * from persona where tipo = 'profesor' and telefono Is null and nif like '%k';

-- 5 .-Retorna el llistat de les assignatures que s'imparteixen en el primer quadrimestre, en el tercer curs del grau que té l'identificador 7.
Select AG.* from asignatura AG inner join grado GR on AG.id_grado = GR.id where AG.cuatrimestre = 1 and AG.curso = 3 and GR.id = 7;

-- 6 .-Retorna un llistat dels professors juntament amb el nom del departament al qual estan vinculats. El llistat ha de retornar quatre columnes, primer cognom, segon cognom, nom i nom del departament. El resultat estarà ordenat alfabèticament de menor a major pels cognoms i el nom.
Select  PE.apellido1, PE.apellido2, PE.nombre, DE.nombre as Departamento from persona PE inner join profesor PR inner join departamento DE on PE.id = PR.id_profesor and PR.id_departamento= DE.id where PE.tipo = 'profesor' order by PE.apellido1 asc, PE.apellido2 asc, PE.nombre asc;

-- 7 .-Retorna un llistat amb el nom de les assignatures, any d'inici i any de fi del curs escolar de l'alumne amb nif 26902806M.
Select AG.nombre as Asignatura, CE.anyo_inicio as Inicio, CE.anyo_fin as Fin from asignatura AG inner join alumno_se_matricula_asignatura ASM inner join curso_escolar CE on AG.id = ASM.id_asignatura and ASM.id_curso_escolar= CE.id where ASM.id_alumno = (Select PE.id from persona PE where PE.nif = '26902806M' and PE.tipo ='alumno');

-- 8 .-Retorna un llistat amb el nom de tots els departaments que tenen professors que imparteixen alguna assignatura en el Grau en Enginyeria Informàtica (Pla 2015).
Select distinct DE.nombre from departamento DE inner Join profesor PR inner Join asignatura AG inner Join grado GR on DE.id = PR.id_departamento and PR.id_profesor = AG.id_profesor and AG.id_grado = GR.id where GR.nombre = 'Grado en Ingeniería Informática (Plan 2015)';

-- 9 .-Retorna un llistat amb tots els alumnes que s'han matriculat en alguna assignatura durant el curs escolar 2018/2019.
Select distinct PE.* from persona PE inner join alumno_se_matricula_asignatura ASMA inner join curso_escolar CE on PE.id = ASMA.id_alumno and ASMA.id_curso_escolar = CE.id where CE.anyo_inicio = 2018 and  CE.anyo_fin = 2019;



-- **************** Resolgui les 6 següents consultes utilitzant les clàusules LEFT JOIN i RIGHT JOIN. ***************

-- 1 .-Retorna un llistat amb els noms de tots els professors i els departaments que tenen vinculats.
-- El llistat també ha de mostrar aquells professors que no tenen cap departament associat. 
-- El llistat ha de retornar quatre columnes, nom del departament, primer cognom, segon cognom i nom del professor. 
-- El resultat estarà ordenat alfabèticament de menor a major pel nom del departament, cognoms i el nom.
Select DE.nombre, PE.apellido1, PE.apellido2, PE.nombre from persona PE right join profesor PR on PE.id = PR.id_profesor left join departamento DE on PR.id_departamento = DE.id order by DE.nombre asc, PE.apellido1 asc, PE.apellido2 asc, PE.nombre asc;

-- 2 .-Retorna un llistat amb els professors que no estan associats a un departament.
Select * from persona PE left join profesor PR on PE.id = PR.id_profesor where PE.tipo = 'profesor' and PR.id_departamento is null;

-- 3 .-Retorna un llistat amb els departaments que no tenen professors associats.
Select * from departamento DE left join profesor PR on DE.id = PR.id_departamento where PR.id_departamento is null;

-- 4 .-Retorna un llistat amb els professors que no imparteixen cap assignatura.
Select PE.* from persona PE left join profesor PR  on PE.id = PR.id_profesor left join asignatura AG on PR.id_profesor = AG.id_profesor where AG.id is null and PE.tipo = 'profesor';

-- 5 .-Retorna un llistat amb les assignatures que no tenen un professor assignat.
Select * from asignatura where asignatura.id_profesor is null;

-- 6 .-Retorna un llistat amb tots els departaments que no han impartit assignatures en cap curs escolar.
Select * from departamento DE left join profesor PR on DE.id = PR.id_departamento left join asignatura AG on PR.id_profesor = AG.id_profesor left join alumno_se_matricula_asignatura ASAM on AG.id = ASAM.id_asignatura where ASAM.id_curso_escolar is null;



-- ********************** Consultes resum *************************

-- 1 .- Retorna el nombre total d'alumnes que hi ha.
SELECT COUNT(*) as Total_Alumnos FROM persona WHERE persona.tipo = 'alumno';

-- 2 .- Calcula quants alumnes van néixer en 1999.
SELECT COUNT(*) as Total_Alumnos FROM persona WHERE persona.tipo= 'alumno' and year(persona.fecha_nacimiento) = 1999;

-- 3 .- Calcula quants professors hi ha en cada departament. El resultat només ha de mostrar dues columnes, una amb el nom del departament i una altra amb el nombre de professors que hi ha en aquest departament. El resultat només ha d'incloure els departaments que tenen professors associats i haurà d'estar ordenat de major a menor pel nombre de professors.
Select DE.nombre, COUNT(*) AS Número_profesores From profesor PR inner join departamento DE on DE.id = PR.id_departamento GROUP BY DE.nombre order by Número_profesores desc;

-- 4 .- Retorna un llistat amb tots els departaments i el nombre de professors que hi ha en cadascun d'ells. Tingui en compte que poden existir departaments que no tenen professors associats. Aquests departaments també han d'aparèixer en el llistat.
SELECT departamento.nombre, COUNT(profesor.id_profesor) FROM profesor RIGHT JOIN departamento ON profesor.id_departamento = departamento.id GROUP BY departamento.nombre;

-- 5 .- Retorna un llistat amb el nom de tots els graus existents en la base de dades i el nombre d'assignatures que té cadascun. Tingui en compte que poden existir graus que no tenen assignatures associades. Aquests graus també han d'aparèixer en el llistat. El resultat haurà d'estar ordenat de major a menor pel nombre d'assignatures.
select grado.nombre, COUNT(asignatura.id_grado) as NúmeroAsignaturas From grado left join asignatura
on grado.id = asignatura.id_grado
Group by grado.nombre
Order by NúmeroAsignaturas desc, grado.nombre asc
;

-- 6 .- Retorna un llistat amb el nom de tots els graus existents en la base de dades i el nombre d'assignatures que té cadascun, dels graus que tinguin més de 40 assignatures associades.
select grado.nombre, COUNT(asignatura.id_grado) as NumAsignaturas From grado left join asignatura on grado.id = asignatura.id_grado Group by grado.nombre having NumAsignaturas > 40;

-- 7 .- Retorna un llistat que mostri el nom dels graus i la suma del nombre total de crèdits que hi ha per a cada tipus d'assignatura. El resultat ha de tenir tres columnes: nom del grau, tipus d'assignatura i la suma dels crèdits de totes les assignatures que hi ha d'aquest tipus.
select grado.nombre, asignatura.tipo, SUM(asignatura.creditos) as NumCreditos From grado left join asignatura on grado.id = asignatura.id_grado Group by grado.nombre, asignatura.tipo;

-- 8 .- Retorna un llistat que mostri quants alumnes s'han matriculat d'alguna assignatura en cadascun dels cursos escolars. El resultat haurà de mostrar dues columnes, una columna amb l'any d'inici del curs escolar i una altra amb el nombre d'alumnes matriculats.
Select CE.anyo_inicio, COUNT(ASMA.id_alumno) as NumAlumnos From curso_escolar CE left join alumno_se_matricula_asignatura ASMA ON CE.id = ASMA.id_curso_escolar Group by CE.anyo_inicio;

-- 9 .- Retorna un llistat amb el nombre d'assignatures que imparteix cada professor. El llistat ha de tenir en compte aquells professors que no imparteixen cap assignatura. El resultat mostrarà cinc columnes: id, nom, primer cognom, segon cognom i nombre d'assignatures. El resultat estarà ordenat de major a menor pel nombre d'assignatures.
Select persona.id, persona.nombre, persona.apellido1, persona.apellido2, COUNT(asignatura.id) as NumAsignaturas From persona inner join profesor on persona.id = profesor.id_profesor left join asignatura on profesor.id_profesor = asignatura.id_profesor where persona.tipo = 'profesor' Group by persona.id order by NumAsignaturas desc;

-- 10 .- Retorna totes les dades de l'alumne més jove.
Select * from persona where persona.tipo = 'alumno' order by persona.fecha_nacimiento desc limit 1;

-- 11.- Retorna un llistat amb els professors que tenen un departament associat i que no imparteixen cap assignatura.
Select profesor.id_profesor, Count(asignatura.id) as NumAsignaturas from profesor inner join departamento on profesor.id_departamento = departamento.id left join asignatura on profesor.id_profesor = asignatura.id_profesor group by profesor.id_profesor having NumAsignaturas = 0;