<?php include_once('../includes/database_connect.php'); ?>
<?php require_once('../includes/functions.php'); ?>

<?php include_once('../includes/header.php'); ?>
<?php include_once('../includes/functions.php'); ?>

<?php if(isset($_GET['subject']) && !empty($_GET['subject'])){
    
        $subject_id = $_GET['subject'];
        $page_id = null;
        
    }elseif(isset($_GET['page']) && !empty($_GET['page'])){
        $page_id = $_GET['page'];
        $subject = null;
    }else{
        $subject_id = null;
        $page_id = null;
    }
?>
            <div class='col-md-12' id='main'>
                <div class='col-md-3' id='navigation'>
                    <ul class='subjects'>
                        <?php $subjects = find_all_subjects(); ?>
                        <?php while($subject = mysqli_fetch_assoc($subjects)){?>
                            <li>
                                <a href="manage_content.php?subject=<?php echo urlencode($subject['id']);?>"><?=$subject['name']?>
                                <?php $pages = find_all_pages_for_subject($subject['id']); ?>
                                    <ul class='pages'>
                                        <?php while($page = mysqli_fetch_assoc($pages)){?>
                                            <li>
                                                <a href="manage_content.php?page=<?php echo urlencode($page['id']);?>"><?=$page['name']?></a></li>
                                        <?php } mysqli_free_result($pages)?>
                                    </ul>
                            </li>

                        <?php } mysqli_free_result($subjects) ?>
                    </ul>
                </div>
                <div class='col-md-9' id='page'>
                    <h2>Admin Area</h2>
                        <?php 
                           if(isset($subject_id)){
                               echo $subject_id;
                           }
                           if(isset($page_id)){
                               echo $page_id;
                           }
                         ?>
                          
                </div>
            </div>   
        </div>
<?php include_once('../includes/footer.php'); ?>