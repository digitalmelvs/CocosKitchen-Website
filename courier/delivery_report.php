<div class="container-fluid">
    <div class="row">
       <div class="col-lg-12">
        <h3 class="display-6">DELIVERY REPORT ni melvs</h3>
          
          <form action="" method="POST">
              <div class="input-group mb-3">
                  <span class="input-group-text bg-primary text-light border border-dark">Between </span>
                  <input type="date" name="start_date" class="form-control">

                  <span class="input-group-text bg-primary text-light"> and </span>
                  <input type="date" name="end_date" class="form-control">
                  
                  <input type="submit" name="filter_range" value="filter" class="btn btn-outline-primary">
              </div>
          </form>
          <form action="" method="POST">
              <div class="input-group mb-3">
                  <span class="input-group-text bg-primary text-light border border-dark">For This Date </span>
                  <input type="date" name="this_date" class="form-control">
                  <input type="submit" name="filter_date" value="filter" class="btn btn-outline-primary">
              </div>
          </form>
       </div>
    <?php
        if (isset($_POST['filter_date'])) {
            // Retrieve delivery report for a specific date
            $date = $_POST['this_date'];
            $courierId = $_SESSION['user']['user_id'];
            DeliveredByDay($conn, $date, $courierId);

            // Close the database connection
            mysqli_close($conn);

        } else if (isset($_POST['filter_range'])) {
            // Retrieve delivery report for a range of dates
            $start_date = $_POST['start_date'];
            $end_date = $_POST['end_date'];
            $courierId = $_SESSION['user']['user_id'];
            DeliveredByDateRange($conn, $courierId, $start_date, $end_date);

            // Close the database connection
            mysqli_close($conn);
            
        } else {
            // Retrieve delivery report for all orders
            $date = date('Y-m-d');
            $courierId = $_SESSION['user']['user_id'];
            DeliveredByDay($conn, $date, $courierId);

            // Close the database connection
            mysqli_close($conn);
        }

    ?>