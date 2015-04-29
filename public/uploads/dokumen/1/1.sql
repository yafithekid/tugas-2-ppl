--Menampilkan user dengan jumlah teman terbanyak beserta jumlah temannya

SELECT 	user.* 
FROM	(SELECT MAX(total) AS _max FROM (SELECT COUNT(friend) AS total FROM friend_with GROUP BY username) total_friend) maximum, 	--dapetin jumlah temen paling banyak
		(SELECT user.*, count(friend) AS _sum FROM user NATURAL JOIN friend_with GROUP BY username) data 							--dapetin akun sama jumlah temennya masing-masing
WHERE	data._sum = maximum._max;																									--dapetin akun dengan jumlah temen sama dengan jumlah temen paling banyak

+----------+-----------+----------------------------+-------------------------------------------------------------------+------------+----------+-------------------------------+------+
| username | password  | name                       | photo                                   						    | birthdate  | city     | email                			| _sum |
+----------+-----------+----------------------------+-------------------------------------------------------------------+------------+----------+-------------------------------+------+
| 13513005 | rPk430CaY | Vincent Theophilus Ciputra | https://chron.com/sed/tincidunt/eu/felis/fusce/posuere/felis.html | 1995-09-24 | Bandung  | vincent_theophilusc@yahoo.com |   26 |
| 13513038 | FkVZ3R    | Tjan Marco Orlando         | https://cbsnews.com/nec/sem/duis/aliquam/convallis.png            | 1995-09-18 | Semarang | marcoorlando007@gmail.com     |   26 |
+----------+-----------+----------------------------+-------------------------------------------------------------------+------------+----------+-------------------------------+------+