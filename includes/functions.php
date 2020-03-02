<?php
    function confirm_query($result){
        if(!isset($result)){ 
            die('<h5>Database Query Is Faild : </h5>'.mysqli_connect_error().'<br> Error No : '.mysqli_connect_errno());
        }
    }

    function find_all_subjects(){
        global $connection;
        $query = 'SELECT * ';
        $query .= 'FROM `subjects` ';
        $query .= 'WHERE `visible` = 1 ';
        $query .= 'ORDER BY `position` ASC ';
        $subjects = mysqli_query($connection,$query);
        confirm_query($subjects);
        return $subjects;
    }

    function find_all_pages_for_subject($subject_id){
        global $connection;
        $query = 'SELECT * FROM `pages` ';
        $query .= 'WHERE `visible` = 1 ';
        $query .= 'AND `subject_id` = ';
        $query .= $subject_id;
        $query .=' ORDER BY `position` ASC';
        $pages = mysqli_query($connection,$query);
        confirm_query($pages);
        return $pages;
    }
?>