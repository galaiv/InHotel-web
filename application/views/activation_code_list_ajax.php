<table>
        <thead>
          <tr>
            <th>&nbsp;</th>
            <th>Name/Zone </th>
            <th>Activation Code </th>
            <th>Generated Date</th>
            
          </tr>
        </thead>
        <tbody>
            <?php
             if(count($activation_code_list) > 0){
                   $i=1; 
            foreach ($activation_code_list as $activation_code_list){ ?>
          <tr>
            <td><a href="<?php echo base_url().'activation_code/create/'.$activation_code_list['id'].'/'.$activation_code_list['user_id'];?>"><img src="<?php echo base_url();?>images/edit.png" ></a></td>
             <td><?php echo $activation_code_list['zone_name']; ?></td>                
             <td><?php echo $activation_code_list['activation_code'];?></td>
            
               <td><?php echo date("d/m/Y H:i",strtotime($activation_code_list['date_time']));?></td>
          </tr>
            <?php
            $i++;
            
            } } else{ ?>
          <tr><td colspan="6">No Records Found</td></tr>
           <?php }?>
           
        </tbody>
      </table>
    
      <div class="pagin">
     <div class="pull-left"><?php echo $total_rows; ?> items | items from <?php echo $start_index+1; ?> to <?php echo --$i+$start_index;?></div>
    <nav>
        <?php echo $paging; ?>
        </nav>
    </div>