<?php
require_once("../../../vendor/autoload.php");
use App\BookTitle\BookTitle;

$objBookTitle = new BookTitle();

$objBookTitle->setData($_GET);

$oneData = $objBookTitle->view("obj");

echo "<table>";
echo "<tr>";
echo "<th>ID </th>";
echo "<td>:$oneData->id</td>";
echo "</tr>";

echo "<tr>";
echo "<th>Book Title</th>";
echo "<td>:$oneData->book_name</td>";
echo "</tr>";

echo "<tr>";
echo "<th>Author Name</th>";
echo "<td>:$oneData->author_name</td>";
echo "</tr>";

echo "</table>";