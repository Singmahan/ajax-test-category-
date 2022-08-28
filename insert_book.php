<?php 
    include "condb.php";

    if(isset($_POST['program'])){
        $book_name = $_POST['book_name'];
        $book_type_id = $_POST['book_type_id'];

        $sql = "INSERT INTO book (book_name,book_type_id) VALUES ('$book_name','$book_type_id')";
        $result = mysqli_query($dbcon, $sql);
        if ($result) {
            echo "OK";
        } else {
            echo "NOT OK";
        }
    }
?>