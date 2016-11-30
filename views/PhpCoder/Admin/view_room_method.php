
<?php
require_once("../../../vendor/autoload.php");
use App\ProfilePicture\ProfilePicture;

$bookObject = new ProfilePicture();
$bookObject->setData($_GET);
$oneData = $bookObject->view("obj");
echo "<div class='book_elemet'>";
echo "ID : ".$oneData->id .'<br>';
echo "Your Name : " . $oneData->name .'<br>';
echo "Profile Filepath : " .$oneData->file_path .'<br>';

echo "</div>";
echo "<img src='../../../resources/assets/img/".$oneData->file_path."' ></td>";

?>
</body>
</html>