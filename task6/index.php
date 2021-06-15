<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Create DB table . 
1-CustomerID 
2-CustomerName 
3-ContactName 
4-Address 
5-City 
6-PostalCode 
7-Country

1- write a query to fill this table with 10 rows.
2- write a query to update  address of all rows.
3- write a query to update city for (id = 9)
4- write a query to delete records that have ids (1,2,3,4)
5- write a query to fetch rows  that have a name started with chars (mo). -->
<!-- 


1-
INSERT INTO `task6`( `CustomerName`, `ContactName`, `Address`, `City`, `PostalCode`, `Country`) 
VALUES ("ali","email","giza","cairo","2222223","egypt")  * 10 row 

2-
UPDATE task6 SET address='masr';
 
3-
UPDATE `task6` SET `city`= "London" WHERE CustomerID= 9


4-
DELETE FROM Customers WHERE  CustomerID= 1 or CustomerID = 2 or CustomerID = 3 or CustomerID = 4


5-
SELECT * FROM task6 WHERE CustomerName LIKE 'ma%'


 -->







</body>
</html>