
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <button class="nav-link active position-relative" id="pendingOrders-tab" data-bs-toggle="tab" data-bs-target="#pendingOrders" type="button" role="tab" aria-controls="pendingOrders" aria-selected="true">
         <span class="position-absolute translate-middle start-100 top-25 badge rounded-pill bg-danger">
                           <?php echo admin_retrieve_orders($conn, $order_sql,$sql_itemize, 'P' , 'C');?>
                       </span>
                               <span class="">Pending</span>
    </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link position-relative" id="toShip-tab" data-bs-toggle="tab" data-bs-target="#toShip" type="button" role="tab" aria-controls="toShip" aria-selected="false">
         <span class="position-absolute translate-middle start-100 top-25 badge rounded-pill bg-danger">
                           <?php echo admin_retrieve_orders($conn, $order_sql,$sql_itemize, 'C' , 'C');?>
                       </span>
        <span class="">To Ship</span>
    </button>
  </li>
  <li class="nav-item" role="presentation">
    <button class="nav-link position-relative" id="ofd-tab" data-bs-toggle="tab" data-bs-target="#ofd" type="button" role="tab" aria-controls="ofd" aria-selected="false">
             <span class="position-absolute translate-middle start-100 top-25 badge rounded-pill bg-danger">
                           <?php echo admin_retrieve_orders($conn, $order_sql,$sql_itemize, 'O' , 'C');?>
                       </span>
        <span class="">Picked Up by Courier</span>
    </button>
  </li>
  
  <li class="nav-item" role="presentation">
    <button class="nav-link position-relative" id="delivered-tab" data-bs-toggle="tab" data-bs-target="#delivered" type="button" role="tab" aria-controls="delivered" aria-selected="false">
             <span class="position-absolute translate-middle start-100 top-25 badge rounded-pill bg-danger">
                           <?php echo admin_retrieve_orders($conn, $order_sql,$sql_itemize, 'D' , 'C');?>
                       </span>
        <span class="">Delivered</span>
    </button>
  </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="pendingOrders" role="tabpanel" aria-labelledby="pendingOrders-tab" tabindex="0">
     <?php
       admin_retrieve_orders($conn, $order_sql,$sql_itemize, 'P' , 'V');
      ?>
      
  </div>
  <div class="tab-pane" id="toShip" role="tabpanel" aria-labelledby="toShip-tab" tabindex="0">
    <?php
       admin_retrieve_orders($conn, $order_sql,$sql_itemize, 'C' , 'V');
      ?>
      
  </div>
  <div class="tab-pane" id="delivered" role="tabpanel" aria-labelledby="delivered-tab" tabindex="0">
       <?php
       admin_retrieve_orders($conn, $order_sql,$sql_itemize, 'D', 'V');
      ?>
      
  </div>
  <div class="tab-pane" id="ofd" role="tabpanel" aria-labelledby="ofd-tab" tabindex="0">
       <?php
       admin_retrieve_orders($conn, $order_sql,$sql_itemize, 'O' , 'V');
      ?>
      
  </div>
</div>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>