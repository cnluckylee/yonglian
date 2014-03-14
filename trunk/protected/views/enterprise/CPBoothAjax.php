	<?php if($posts):
       foreach($posts as $row):?>
      <ul class="searchData_ul">
        <li><a href="?r=Enterprise/CPSingleEnterprise&mid=<?php echo $row['id'];?>" target="_blank" ><?php echo $row['name'];?></a></li>
        <li>
          <ul class="droplist">
            <?php 
		 if(isset($row['data'][16])):
		 foreach($row['data'][16] as $cont16):?>
            <li><?php echo $cont16['title'];?></li>
            <?php
		   endforeach; 
		   endif;
		   ?>
          </ul>
        </li>
        <li>
          <ul class="droplist">
            <?php 
		 if(isset($row['data'][15])):
		 foreach($row['data'][15] as $cont15):?>
            <li><?php echo $cont15['title'];?></li>
            <?php
		   endforeach; 
		   endif;
		   ?>
          </ul>
        </li>
        <li>
          <ul class="droplist">
            <?php 
		 if(isset($row['data'][17])):
		 foreach($row['data'][17] as $cont17):?>
            <li><?php echo $cont17['title'];?></li>
            <?php
		   endforeach; 
		   endif;
		   ?>
          </ul>
        </li>
        <li>
          <ul class="droplist">
           <?php  if(isset($row['companyinfo'])):
		 			foreach($row['companyinfo'] as $com):?>
            <li><?php echo $com['name'];?></li>
            <?php
		  				 endforeach; 
		  			 endif;
		   ?>
          </ul>
        </li>
      </ul>
     
      <?php       
      endforeach; 
      else:
      ?>      
      	暂无数据，<a onclick="javascript:history.go(-1);" href="javascript:void(0);" >返回上一页</a>
      <?php endif;
	 //分页widget代码: 
	  $this->widget('NewPager',array('pages'=>$pages));
	 ?>