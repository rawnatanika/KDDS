<?php 
    include"includes/config.php"; 
    session_start();
?>

<?php include"includes/header.php"; ?>

<body>
    <?php include"includes/nav.php"; ?>

    <!-- /navbar -->
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <?php include"includes/side_bar.php"; ?>
                <!--/.span3-->
                <div class="span9">
                    <div class="content">
                        <div class="btn-controls">
                            <div class="btn-box-row row-fluid">
                                           <div class="module">
                                <div class="module-head">
                                    <h2>Payment History</h2>
                                </div>
                                <table class="table table-striped table-bordered table-condensed datatable-1">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Month</th>
                                            <th>Due</th>
                                            <th>Amount</th>
                                            <th>Fine</th>
                                            <th>Total</th>
                                            <th>Method</th>
                                            <th>Status</th>
                                            
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <?php 
                                        
                                          
                            if(isset($_SESSION['username'])){ 
                                $username = $_SESSION['username'];
                            }
                                            
                                            $query = "SELECT * FROM payment WHERE username = '$username' ";
                                            $select_query = mysqli_query($connection, $query);

                                            $cnt = 1;
                                            while($row = mysqli_fetch_assoc($select_query)){
                                                $id = $row['id'];
                                                $month = $row['month'];
                                                $due = $row['due'];
                                                $amount = $row['amount'];
                                                $fine = $row['fine'];
                                                $total = $row['total'];
                                                $method = $row['method'];
                                                $status = $row['status'];
                                            
                                        ?>

                                        <tr>
                                            <td><?php echo $cnt ;?></td>
                                            <td><?php echo $month; ?></td>
                                            <td><?php echo $due; ?></td>
                                            <td><?php echo $amount; ?></td>
                                            <td><?php echo $fine; ?></td>
                                            <td><?php echo $total; ?></td>
                                            <td><?php echo $method; ?></td>
                                            <td><?php echo $status; ?></td>
                                            
                                        </tr> <?php $cnt=$cnt+1; } ?>
                                    </tbody>
                                </table>
                             
                              
                                
                            </div>  
                        </div>
                    </div>
                    <!--/.content-->
                </div>
                <!--/.span9-->
            </div>
        </div>
        <!--/.container-->
    </div>
    <!--/.wrapper-->

<?php include"includes/footer.php"; ?>
