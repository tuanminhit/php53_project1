<!-- load file layout chung -->
<?php $this->layoutPath = "Layout.php"; ?>
    <div class="card">
        <div class="card-header"><strong>List Orders</strong></div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                <tr>
                    <th scope="col" style="">Name</th>
                    <th scope="col" style="">Phone</th>
                    <th scope="col" style="">Date</th>                  
                    <th scope="col" style=" text-align: center;">Status</th>
                    <th scope="col" style="">Delivery</th>
                </tr>
                </thead>
                <?php foreach($listRecord as $rows): ?>
                <?php   
                    //lay ban ghi customer
                    $customer = $this->modelGetCustomers($rows->customer_id);

                 ?>
                 <tr>
                     <td><?php echo isset($customer->name) ? $customer->name : ""; ?></td>
                     <td><?php echo isset($customer->phone) ? $customer->phone : ""; ?></td>
                     <td>
                        <?php 
                        $date = Date_create($rows->create_at);
                        echo Date_format($date, "d/m/Y");
                        ?>                            
                        </td>
                     <td style="text-align: center;">
                         <?php if($rows->status == 1): ?>
                            <span class="label label-primary">Đã giao hàng</span>
                         <?php else: ?>
                            <span class="label label-danger">Chưa giao hàng</span>
                         <?php endif; ?>
                     </td>
                     <td style="text-align: center;">
                        <a href="index.php?controller=orders&action=detail&id=<?php echo $rows->id; ?>" class="label label-success">Chi tiết</a>
                        <?php if($rows->status == 0): ?>
                            <a href="index.php?controller=orders&action=delivery&id=<?php echo $rows->id; ?>" class="label label-info">Giao hàng</a>
                         <?php endif; ?>
                     </td>
                 </tr>
                <?php endforeach; ?>
            </table>
            <style type="text/css">
                .pagination{padding:0px; margin:0px;}
            </style>
            <ul class="pagination">
                <li class="page-item">
                    <?php for($i = 1; $i <= $numPage; $i++): ?>
                    <a href="index.php?controller=users&action=read&p=<?php echo $i; ?>" class="page-link"><?php echo $i; ?></a>
                    <?php endfor; ?>

                </li>
            </ul>
        </div>
    </div>
