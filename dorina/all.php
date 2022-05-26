<?php
$host = "localhost"; //IP of your database
$userName = "root"; //Username for database login
$userPass = ""; //Password associated with the username
$database = "dorina"; //Your database name

$connectQuery = mysqli_connect($host,$userName,$userPass,$database);

session_start();
$id=$_SESSION['varName'];
echo"<script>console.log('".$id."');</script>";






if(mysqli_connect_errno()){
    echo mysqli_connect_error();
    exit();
}else{
    $selectQuery = "SELECT fine.id, fine.fine,fine.Fine_date,fine.person, fine.cost,person.Name, fine.Status from fine join person on fine.person=person.id where person.id='".$id."';";
    $result = mysqli_query($connectQuery,$selectQuery);
    if(mysqli_num_rows($result) > 0){
    }else{
        $msg = "No Record found";
    }
}

?>
<?php

include("outline.php");


?>



                <div class="row g-4">
                <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Responsive Table</h6>
                            <div class="table-responsive">
                            <table class="table table-dark table-striped">
            <thead>
                <tr>
                                            <th scope="col">#</th>
                                            <th scope="col-2">Date</th>
                                            <th scope="col-2">Mistake</th>
                                            <th scope="col-2">Cost</th>
                                            <th scope="col-2">Status</th>
                                            <th scope="col-2">Action</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
                                   $i=0;
                                   while($row = mysqli_fetch_assoc($result)){
                                    $i++;  ?>
                                   <tr>
                                   
                                   <form method=post action=insert.php>
                                   <input type="hidden" name="id" value=<?php echo $row['id'];?>>
                                     <th scope="row"><?php echo $i; ?></th>
                                       <td><?php echo $row['Fine_date'];?></td>
                                       <td><?php echo $row['fine']; ?></td>
                                       <td><?php echo $row['cost']; ?></td>
                                       <td><?php echo $row['Status']; ?></td>

                                       <?php if($row['Status']=="no"){
                                    
                                      echo" <td><button type='submit' class='btn btn-success'>Pay</button></td>";
                                      $_SESSION['fine'] = $row['id'];
                                    } else{
                                        echo" <td><button type='button' class='btn btn-success'>Done</button></td>";
                                    }
                                    ?>
                                
                                    </form>
                                   </tr>
                               <?php }?>
            </tbody>
        </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table End -->


            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; <a href="#">Trafic Safety</a>, All Right Reserved. 
                        </div>
                        <div class="col-12 col-sm-6 text-center text-sm-end">
                            <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                           
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->
        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="js/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>