      <?php foreach($posts as $row):?>
      <ul class="searchData_ul">
        <li><?php echo $row['name'];?></li>
        <li>
          <ul class="droplist">
            <?php 
		 if(isset($row['data'])):
		 foreach($row['data'] as $cont16):?>
            <li><?php echo $cont16['name'];?></li>
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
            <li><?php echo $cont15['pname'];?></li>
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
            <li><?php echo $cont15['entrydate'];?></li>
            <?php
		   endforeach; 
		   endif;
		   ?>
          </ul>
        </li>
      </ul>
      <?php endforeach; ?>
      <?php 
	 分页widget代码: 
	 $this->widget('NewPager',array('pages'=>$pages));
	 ?>