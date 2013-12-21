      <?php foreach($data['posts'] as $row):?>
      <ul class="searchData_ul">
        <li><a href="?r=window/Soft&id=<?php echo $row['id'];?>" target="_blank"><?php echo $row['title'];?></a></li>
        <li><?php echo $row['remark'];?></li>
        <li><?php echo $row['type'];?></li>
        <li><?php echo $row['updtime'];?></li>
      </ul>
      <?php endforeach; ?>
      <?php 
	 //分页widget代码: 
	$this->widget('NewPager',array('pages'=>$data['pages']));
	 ?>