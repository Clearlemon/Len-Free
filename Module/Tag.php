<?php
function Tag_Banner_Open_Module($catid = '')
{
  $Cat_Tag_Module_1 = _len('Cat_Tag_Module_1');
  $Cat_Module_1 =  Len_Classify_Module($catid, 'Cat_Module_1', true);
  if ($Cat_Module_1 == true && $Cat_Tag_Module_1 == true) {
    Tag_Banner_Module($catid);
  }
}

function Tag_Banner_Module($catid = '')
{
  $Tag_name = get_tag($catid)->name; // 获取标签名称
  $Tag = get_tag($catid); // 获取标签对象
  $Tag_number = $Tag->count; // 获取标签文章数量
  $Tag_description = $Tag->description; // 获取标签描述
  $Cat_Tag_Module_2 = _len('Cat_Tag_Module_2');
  $Tag_Module_2 = Len_Classify_Module($catid, 'Cat_Module_2', true);
  $Tag_Module_5  = Len_Classify_Module($catid, 'Cat_Module_5', true);

  if (empty($Tag_Module_5)) {
    $Tag_Module_5 = 'icon-mianxingningmeng';
  }
  if (!empty($Tag_Module_2)) {
    $Tag_Banner_Img_Module_All = $Tag_Module_2;
  } elseif (!empty($Cat_Tag_Module_2)) {
    $Tag_Banner_Img_Module_All = $Tag_Tag_Module_2;
  } else {

    $Tag_Banner_Img_Module_All = get_template_directory_uri() . '/Assets/Len-Images/background.webp';
  }
?>
  <?php echo Len_Classify_Module($catid, 'Cat_Module_5', true); ?>
  <div class="animate__animated animate__zoomIn len-cat-showcase-card">
    <img class="len-cat-card-back" src="<?php echo $Tag_Banner_Img_Module_All; ?>" alt="">
    <div class="len-cat-card-block">
      <div class="len-cat-min-blcok">
        <svg class="len-cat-card-icon" aria-hidden="true">
          <use xlink:href="#<?php echo $Tag_Module_5; ?>"></use>
        </svg>
        <?php echo $Tag_name; ?>
        <span class="cat-number-block">总共<?php echo $Tag_number; ?>篇文章</span>
      </div>
      <div class="len-cat-card-title-block"><?php echo $Tag_description; ?></div>
    </div>
  </div>
<?php
}
