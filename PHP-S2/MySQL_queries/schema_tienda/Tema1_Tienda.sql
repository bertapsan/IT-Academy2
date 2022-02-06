-- ************************************  Base de dades Tienda *************************

-- 1.-Llista el nom de tots els productos que hi ha en la taula producto.
SELECT nombre FROM tienda.producto;

-- 2.-Llista els noms i els preus de tots els productos de la taula producto.
SELECT nombre, precio FROM tienda.producto;

-- 3.-Llista totes les columnes de la taula producto.
SELECT * FROM tienda.producto;

-- 4.-Llista el nom dels productos, el preu en euros i el preu en dòlars nord-americans (USD).
Select nombre, concat(precio,' ', "€") as `precio en euros`, concat(precio, ' ', "$") as `precio en dólares` from tienda.producto;

-- 5.-Llista el nom dels productos, el preu en euros i el preu en dòlars nord-americans. Utilitza els següents àlies per a les columnes: nom de producto, euros, dòlars nord-americans.
Select nombre as `nom de producto`, concat(precio,' ', "€") as `euros`, concat(precio, ' ', "$") as `dòlars nord-americans` from tienda.producto;

-- 6 .-Llista els noms i els preus de tots els productos de la taula producto, convertint els noms a majúscula.
SELECT UPPER(nombre), precio FROM tienda.producto;

-- 7 .-Llista els noms i els preus de tots els productos de la taula producto, convertint els noms a minúscula.
SELECT LOWER(nombre), precio FROM tienda.producto;

-- 8 .-Llista el nom de tots els fabricants en una columna, i en una altra columna obtingui en majúscules els dos primers caràcters del nom del fabricant.
SELECT upper(substr(nombre, 1, 2)), nombre FROM tienda.fabricante ;

-- 9 .-Llista els noms i els preus de tots els productos de la taula producto, arrodonint el valor del preu.
SELECT nombre, round(precio, 0) FROM tienda.producto;

-- 10 .-Llista els noms i els preus de tots els productos de la taula producto, truncant el valor del preu per a mostrar-lo sense cap xifra decimal.
SELECT nombre, truncate(precio, 0) FROM tienda.producto;

-- 11 .-Llista el codi dels fabricants que tenen productos en la taula producto.
Select F.codigo from tienda.producto P inner join tienda.fabricante F on P.codigo_fabricante = F.codigo;

-- 12 .-Llista el codi dels fabricants que tenen productos en la taula producto, eliminant els codis que apareixen repetits.
Select distinct F.codigo from tienda.producto P inner join tienda.fabricante F on P.codigo_fabricante = F.codigo;

-- 13 .-Llista els noms dels fabricants ordenats de manera ascendent.
SELECT nombre FROM tienda.fabricante order by nombre ASC;

-- 14 .-Llista els noms dels fabricants ordenats de manera descendent.
SELECT nombre FROM tienda.fabricante order by nombre DESC;

-- 15 .-Llista els noms dels productos ordenats en primer lloc pel nom de manera ascendent i en segon lloc pel preu de manera descendent.
Select nombre From tienda.producto Order By nombre asc, precio desc;

-- 16 .-Retorna una llista amb les 5 primeres files de la taula fabricante.
Select * From tienda.fabricante limit 0, 5;

-- 17 .-Retorna una llista amb 2 files a partir de la quarta fila de la taula fabricante. La quarta fila també s'ha d'incloure en la resposta.
Select * From tienda.fabricante limit 3, 2;

-- 18 .-Llista el nom i el preu del producto més barat. (Utilitzi solament les clàusules ORDER BY i LIMIT). NOTA: Aquí no podria usar MIN(preu), necessitaria GROUP BY
Select nombre, precio From tienda.producto order by precio asc Limit 1;

-- 19 .-Llista el nom i el preu del producto més car. (Utilitzi solament les clàusules ORDER BY i LIMIT). NOTA: Aquí no podria usar MAX(preu), necessitaria GROUP BY.
Select nombre, precio From tienda.producto order by precio desc Limit 1;

-- 20 .-Llista el nom de tots els productos del fabricant el codi de fabricant del qual és igual a 2.
Select nombre From tienda.producto where codigo_fabricante=2;

-- 21 .-Retorna una llista amb el nom del producte, preu i nom de fabricant de tots els productes de la base de dades.
Select P.nombre, P.precio, F.nombre from tienda.producto P inner join tienda.fabricante F on P.codigo_fabricante = F.codigo;

-- 22 .-Retorna una llista amb el nom del producte, preu i nom de fabricant de tots els productes de la base de dades. Ordeni el resultat pel nom del fabricant, per ordre alfabètic.
Select P.nombre, P.precio, F.nombre from tienda.producto P inner join tienda.fabricante F on P.codigo_fabricante = F.codigo order by F.nombre asc;

-- 23 .-Retorna una llista amb el codi del producte, nom del producte, codi del fabricant i nom del fabricant, de tots els productes de la base de dades.
Select P.codigo, P.nombre, F.codigo, F.nombre from tienda.producto P inner join tienda.fabricante F on P.codigo_fabricante = F.codigo;

-- 24 .-Retorna el nom del producte, el seu preu i el nom del seu fabricant, del producte més barat.
Select P.nombre, P.precio, F.nombre from tienda.producto P inner join tienda.fabricante F on P.codigo_fabricante = F.codigo order by P.precio asc limit 1;

-- 25 .-Retorna el nom del producte, el seu preu i el nom del seu fabricant, del producte més car.
Select P.nombre, P.precio, F.nombre from tienda.producto P inner join tienda.fabricante F on P.codigo_fabricante = F.codigo order by P.precio desc limit 1;

-- 26 .-Retorna una llista de tots els productes del fabricant Lenovo.
Select * from tienda.producto P inner join tienda.fabricante F on P.codigo_fabricante = F.codigo and F.nombre = 'Lenovo';

-- 27 .-Retorna una llista de tots els productes del fabricant Crucial que tinguin un preu major que 200€.
Select * from tienda.producto P inner join tienda.fabricante F on P.codigo_fabricante = F.codigo and F.nombre = 'Crucial' and  P.precio > 200;

-- 28 .-Retorna un llistat amb tots els productes dels fabricants Asus, Hewlett-Packard y Seagate. Sense utilitzar l'operador IN.
Select P.codigo, P.nombre, P.precio, F.nombre from tienda.producto P, tienda.fabricante F where P.codigo_fabricante = F.codigo and F.nombre = 'Asus' or F.nombre='Hewlett-Packard' or F.nombre='Seagate';

-- 29 .-Retorna un llistat amb tots els productes dels fabricants Asus, Hewlett-Packardy Seagate. Utilitzant l'operador IN.
Select * from tienda.producto P inner join tienda.fabricante F on P.codigo_fabricante = F.codigo where F.nombre IN('Asus', 'Hewlett-Packard', 'Seagate');

-- 30 .-Retorna un llistat amb el nom i el preu de tots els productes dels fabricants el nom dels quals acabi per la vocal e.
Select P.nombre, P.precio from tienda.producto P inner join tienda.fabricante F on P.codigo_fabricante = F.codigo where F.nombre like '%e';

-- 31 .-Retorna un llistat amb el nom i el preu de tots els productes el nom de fabricant dels quals contingui el caràcter w en el seu nom.
Select P.nombre, P.precio from tienda.producto P inner join tienda.fabricante F on P.codigo_fabricante = F.codigo where F.nombre like '%w%';

-- 32 .-Retorna un llistat amb el nom de producte, preu i nom de fabricant, de tots els productes que tinguin un preu major o igual a 180€. Ordeni el resultat en primer lloc pel preu (en ordre descendent) i en segon lloc pel nom (en ordre ascendent)
Select P.nombre, P.precio, F.nombre from tienda.producto P inner join tienda.fabricante F on P.codigo_fabricante = F.codigo where P.precio >= 180 order by P.precio desc, P.nombre asc;

-- 33 .-Retorna un llistat amb el codi i el nom de fabricant, solament d'aquells fabricants que tenen productes associats en la base de dades.
Select distinct F.codigo, F.nombre from tienda.fabricante F inner join tienda.producto P on P.codigo_fabricante = F.codigo;

-- 34 .-Retorna un llistat de tots els fabricants que existeixen en la base de dades, juntament amb els productes que té cadascun d'ells. El llistat haurà de mostrar també aquells fabricants que no tenen productes associats.
Select F.nombre, P.nombre from tienda.fabricante F left join tienda.producto P on P.codigo_fabricante = F.codigo;

-- 35 .-Retorna un llistat on només apareguin aquells fabricants que no tenen cap producte associat.
Select F.nombre, P.nombre from tienda.fabricante F left join tienda.producto P on P.codigo_fabricante = F.codigo where P.nombre is null;

-- 36 .-Retorna tots els productes del fabricant Lenovo. (Sense utilitzar INNER JOIN).
Select P.codigo, P.nombre, P.precio, F.nombre from tienda.producto P right join tienda.fabricante F on P.codigo_fabricante = F.codigo where F.nombre = 'Lenovo';

-- 37 .-Retorna totes les dades dels productes que tenen el mateix preu que el producte més car del fabricant Lenovo. (Sense utilitzar INNER JOIN).
Select * from tienda.producto PR where PR.precio = (Select max(P.precio) from tienda.producto P right join tienda.fabricante F on P.codigo_fabricante = F.codigo where F.nombre = 'Lenovo');

-- 38 .-Llista el nom del producte més car del fabricant Lenovo.
Select P.nombre, P.precio, F.nombre from tienda.producto P inner join tienda.fabricante F on P.codigo_fabricante = F.codigo where F.nombre = 'Lenovo' order by P.precio desc limit 1;

-- 39 .-Llista el nom del producte més barat del fabricant Hewlett-Packard.
Select P.nombre, P.precio, F.nombre from tienda.producto P inner join tienda.fabricante F on P.codigo_fabricante = F.codigo where F.nombre = 'Hewlett-Packard' order by P.precio asc limit 1;

-- 40 .-Retorna tots els productes de la base de dades que tenen un preu major o igual al producte més car del fabricant Lenovo.
Select * from tienda.producto PR where PR.precio >= (Select max(P.precio) from tienda.producto P inner join tienda.fabricante F on P.codigo_fabricante = F.codigo where F.nombre = 'Lenovo');

-- 41 .-Llesta tots els productes del fabricant Asus que tenen un preu superior al preu mitjà de tots els seus productes.
Select * from tienda.producto P inner join tienda.fabricante F on P.codigo_fabricante= F.codigo where f.nombre = 'Asus' and P.precio > (Select avg(P.precio) from tienda.producto P inner join tienda.fabricante F on P.codigo_fabricante = F.codigo where F.nombre = 'Asus');
