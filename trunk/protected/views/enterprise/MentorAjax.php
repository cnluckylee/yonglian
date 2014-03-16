    <?php foreach($posts as $row):?>
      <ul class="searchData_ul">
     
        <li><a href="?r=Enterprise/CPSingleEnterprise&mid=<?php echo $row['id'];?>" target="_blank" ><?php echo $row['name'];?></a></li>
        <li>
         <ul class="droplist">
         <?php foreach($row['data'] as $item):?>
         	
         	<li><a href="?r=Community/UserView&uid=<?php echo $item['uid'];?>" target="_blank" ><?php echo $item['uname'];?></a></li>
         <?php endforeach; ?>
        </ul>
        <li>
          <ul class="droplist">
          <?php foreach($row['data'] as $item):?>
            <?php 
			 if(isset($item['data'])):
					 foreach($item['data'] as $cont16):?>
            <li><a href="?r=Community/UserView&uid=<?php echo $item['uid'];?>" target="_blank" ><?php echo $cont16['title'];?></a></li>
            <?php
		  		 endforeach; 
		  		  
		  		 endif;
		  		 endforeach; 
		      ?>
		     </ul>
		  </li>
		  <li>
		      <ul class="droplist">
		       <?php foreach($row['data'] as $item):?>
		      <?php 
			 if(isset($item['data'])):
					 foreach($item['data'] as $cont16):?>
            <li><?php echo $cont16['upddate'];?></li>
            <?php
		  		 endforeach; 
		  		 endif;
		  		  endforeach; 
		      ?>
          </ul>
        </li>
        </ul>
      <?php endforeach;?>
      
    
      <?php 
	 //分页widget代码: 
	$this->widget('NewPager',array('pages'=>$pages));
	 ?>