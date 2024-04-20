<?php


function Classify_Banner_Open_Module($catid = '')
{
  $Cat_Tag_Module_1 = _len('Cat_Tag_Module_1');
  $Cat_Module_1 =  Len_Classify_Module($catid, 'Cat_Module_1', true);
  if ($Cat_Module_1 == true && $Cat_Tag_Module_1 == true) {
    Classify_Banner_Module($catid);
  }
}



function Classify_Banner_Module($catid = '')
{
  $Cat_name = get_cat_name($catid);
  $Cat = get_category($catid); // 获取分类对象
  $Cat_number = $Cat->count; // 获取分类文章数量
  $Cat_description = $Cat->description; // 获取分类描述
  $Cat_Tag_Module_2 = _len('Cat_Tag_Module_2');
  $Cat_Module_2 = Len_Classify_Module($catid, 'Cat_Module_2', true);
  $Cat_Module_5  = Len_Classify_Module($catid, 'Cat_Module_5', true);

  if (empty($Cat_Module_5)) {
    $Cat_Module_5 = 'icon-mianxingningmeng';
  }
  if (!empty($Cat_Module_2)) {
    $Cat_Banner_Img_Module_All = $Cat_Module_2;
  } elseif (!empty($Cat_Tag_Module_2)) {
    $Cat_Banner_Img_Module_All = $Cat_Tag_Module_2;
  } else {

    $Cat_Banner_Img_Module_All = get_template_directory_uri() . '/Assets/Len-Images/body-background.jpg';
  }
?>
  <div class="animate__animated animate__zoomIn len-cat-showcase-card">
    <img class="len-cat-card-back" src="<?php echo $Cat_Banner_Img_Module_All; ?>" alt="">
    <div class="len-cat-card-block">
      <div class="len-cat-min-blcok">
        <svg class="len-cat-card-icon" aria-hidden="true">
          <use xlink:href="#<?php echo $Cat_Module_5; ?>"></use>
        </svg>
        <?php echo $Cat_name; ?>
        <span class="cat-number-block">总共<?php echo $Cat_number; ?>篇文章</span>
      </div>
      <div class="len-cat-card-title-block"><?php echo $Cat_description; ?></div>
    </div>
  </div>
<?php
}
