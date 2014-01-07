   <?php foreach($data['posts'] as $row):?>
      <ul class="searchData_ul">
        <li><a href="?r=Manage/TheoryView&id=<?php echo $row['id'] ?>" target="_blank"><?php echo $row['title'];?></a></li>
        <li><?php echo date("Y-m-d",strtotime($row['stopdate']));?></li>
        <li>
        		<ul class="UV">
        		 <?php 
				if(isset($row['sszb']) && $row['sszb']):        		 
        		 foreach($row['sszb'] as $zb):?>
        			 <li style="display:table;width:200px;"><?php echo $zb['name'];?></li>
        		 <?php endforeach; 
						endif;        		 
        		 ?>
        		 </ul>
        		 
       </li>
        <li>
        
        <ul class="UV">
        		 <?php 
        		 
				if(isset($row['ssxb']) && $row['ssxb']):        		 
        		 foreach($row['ssxb'] as $xb):?>
        			 <li style="display:table;width:200px;"><?php echo $xb['name'];?></li>
        		 <?php endforeach; 
						endif;        		 
        		 ?>
        		 </ul>
        </li>
        <li><?php echo $row['ssxs'];?></li>
      </ul>
      <?php endforeach; ?>
      <?php 
	 //分页widget代码: 
	$this->widget('NewPager',array('pages'=>$data['pages']));
	 ?>