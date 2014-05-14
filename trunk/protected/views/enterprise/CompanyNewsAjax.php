
      <?php foreach($posts as $row):?>
      <ul class="searchData_ul">
        <li><a href="?r=Enterprise/CPSingleEnterprise&mid=<?php echo $row['id'];?>" target="_blank" ><?php echo $row['name'];?></a></li>
      <li>
          <ul class="droplist">
            <?php 
		 if(isset($row['data'])):
		 foreach($row['data'] as $cont16):?>
            <li><?php echo mb_substr($cont16['title'],0,12,'utf-8');?></li>
            <?php
		   endforeach; 
		   endif;
		   ?>
          </ul>
        </li>
        <li>
          <ul class="droplist">
            <?php 
		 if(isset($row['data'])):
		 foreach($row['data'] as $cont15):?>
            <li><?php echo $cont15['cname'];?></li>
            <?php
		   endforeach; 
		   endif;
		   ?>
          </ul>
        </li>
        <li>
          <ul class="droplist">
            <?php 
		 if(isset($row['data'])):
		 foreach($row['data'] as $cont15):?>
            <li><?php echo $cont15['upddate'];?></li>
            <?php
		   endforeach; 
		   endif;
		   ?>
          </ul>
        </li>
      </ul>
      <?php endforeach; ?>
      <?php 
	 //分页widget代码: 
	$this->widget('NewPager',array('pages'=>$pages));
	 ?>
    