<?php
if(!isset($_SESSION) )session_start();

?>

<!DOCTYPE html>
<html>

<form action="store.php" align="left" method="post">
    Booking number: <input type="text" name= "booking_number" ><br>

    package info: <select name="package_info">
        <option >Family</option>
        <option >Shopping</option>
        <option >Business</option></select><br>

    Check in:<input type="date" name="check_in"  ><br>

    Check out:<input type="date" name="check_out" ><br>

    Rooms: <select name="rooms" >
        <option >1</option>
        <option >2</option>
        <option >3</option></select><br>

    Adult: <select name="adult" >
        <option >1</option>
        <option >2</option>
        <option >3</option></select><br>

    Children: <select name="children" >
        <option >1</option>
        <option >2</option>
        <option>3</option></select><br>

    Person: <select name="person" >
        <option >1</option>
        <option >2</option>
        <option >3</option></select><br>

    Price: <input type="number" name="price" ><br>

    <button type="submit" class="btn">Book Now </button>

</form>
</html>