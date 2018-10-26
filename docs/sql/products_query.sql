USE pizzastore;
SELECT p.* FROM pizza p;
SELECT p.* FROM pizza p WHERE p.price < 10;
SELECT p.* FROM pizza p WHERE p.image IS NULL;
SELECT p.* FROM pizza p ORDER BY p.price DESC;
SELECT p.* FROM pizza p ORDER BY RAND() LIMIT 3;
/* CREATE INDEX pizza_price_IDX ON pizza (price); */
SELECT COUNT(1) AS nb_pizza FROM pizza p;
SELECT p.* FROM pizza p ORDER BY p.price DESC LIMIT 1;
SELECT p.* FROM pizza p WHERE p.price IN (SELECT MAX(sp.price) FROM pizza sp);
SELECT p.* FROM pizza p WHERE p.price = (SELECT MAX(sp.price) FROM pizza sp);

SELECT AVG(p.price) FROM pizza p;

/********************************************************************************************/

SELECT u.* FROM user u;
SELECT a.* FROM address a;

/* Utilisateur sans adresse */
SELECT u.*, a.*
  FROM user u LEFT JOIN address a
    ON u.id = a.user_id
 WHERE a.id IS NULL;

SELECT s.* FROM `size` s;
INSERT INTO size (name, price) VALUES ('S', 0), ('M', 0.99), ('L', 1.99), ('XL', 2.99);

SELECT phs.* FROM `pizza_has_size` phs;
INSERT INTO pizza_has_size (pizza_id, size_id) VALUES (1, 1), (1, 2), (1, 3), (1, 4), (2, 1), (2, 2);
INSERT INTO pizza_has_size (pizza_id, size_id) VALUES (4, 3), (4, 4), (3, 2), (3, 1), (3, 3);

/*SELECT phs.*, '***' sep0, p.*, '***' sep1, s.**/
SELECT p.name as pizza,
	   s.name as size,
       p.price as price_pizza,
       s.price as price_size,
       p.price + s.price as price_final,
       p.image
  FROM pizza_has_size phs
	   INNER JOIN pizza p ON phs.pizza_id = p.id
	   INNER JOIN size s  ON phs.size_id  = s.id
ORDER BY phs.pizza_id, phs.size_id;

CREATE VIEW ExpansivePizza AS
SELECT p.name as pizza,
	   s.name as size,
       p.price as price_pizza,
       s.price as price_size,
       p.price + s.price as price_final,
       p.image
  FROM pizza_has_size phs
	   INNER JOIN pizza p ON phs.pizza_id = p.id
	   INNER JOIN size s  ON phs.size_id  = s.id
ORDER BY 5 DESC;

