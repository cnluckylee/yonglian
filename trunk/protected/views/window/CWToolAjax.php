    <?php foreach($data['posts'] as $row):?>
      <ul class="searchData_ul">
        <li><a href="?r=window/Soft&id=<?php echo $row['id'];?>" target="_blank"><?php echo mb_substr($row['title'],0,12,'utf-8');?></a></li>
        <li><?php echo mb_substr($row['remark'],0,12,'utf-8');?></li>
        <li><?php echo $row['type'];?></li>
        <li><?php echo $row['updtime'];?></li>
      </ul>
      <?php endforeach; ?>
      <?php 
	 //分页widget代码: 
	$this->widget('NewPager',array('pages'=>$data['pages']));
	 ?>