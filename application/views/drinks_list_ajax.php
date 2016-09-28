  <table>
        <thead>
          <tr>
            <th width="5%">#</th>
            <th width="13%">Image</th>
            <th width="46%">Name</th>
            <th width="21%"> Price</th>
            <th width="6%">Edit</th>
            <th width="9%">Delete</th>
          </tr>
        </thead>
        <?php $i=1; ?>
        <tbody class="drinks_list">
            <?php
             if(count($drinks)>0){
            foreach ($drinks as $drinks){
                $image = ($drinks['image']!="") ? base_url().'upload/drinks/thumb/'.$drinks['image'] : base_url().'upload/drinks/no-image.jpg';
                $from =$i+$start_index;  
                ?>
          <tr>
            <td><?php echo $i+$start_index; ?></td>
            <td><img src="<?php echo $image; ?>" class="im_style"></td>

            <td><?php echo $drinks['title']; ?></td>
            <td>$<?php echo $drinks['price']; ?></td>
             <td><a href="<?php echo base_url(); ?>drinks/detail"><img src="images/edit.png" ></a></td>
              <td><a href="#"><img src="images/delete.png" class="drink_delete" data-drinks_id="<?php echo $drinks['id']; ?>"></a></td>
          </tr>
            <?php $i++;
            
            }  } else{?>
          <tr><td colspan="6">No Records Found</td></tr>
            <?php }?>
          </tbody>
      </table>
      <div class="pagin">    
  <div class="pull-left"><?php echo $total_rows; ?> items | items from <?php echo $start_index+1; ?> to <?php echo --$i+$start_index;?></div>
    <nav>
        <?php echo $paging; ?>
<!--          <ul class="pagination pull-right">
            <li> <a href="#" aria-label="Previous"> <span aria-hidden="true">«</span> </a> </li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#">3</a></li>
            <li><a href="#">4</a></li>
            <li><a href="#">5</a></li>
            <li> <a href="#" aria-label="Next"> <span aria-hidden="true">»</span> </a> </li>
          </ul>-->
        </nav>
    </div>