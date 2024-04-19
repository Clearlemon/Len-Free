<?php
function Tag_Banner_Module($catid = '')
{
  $Tag_name = get_tag($catid)->name; // 获取标签名称
  $Tag = get_tag($catid); // 获取标签对象
  $Tag_number = $Tag->count; // 获取标签文章数量
  $Tag_description = $Tag->description; // 获取标签描述
?>
  <?php echo Len_Classify_Module($catid, 'Cat_Module_5', true); ?>
  <div class="len-cat-showcase-card">
    <img class="len-cat-card-back" src="<?php echo Len_Classify_Module($catid, 'Cat_Module_2', true); ?>" alt="">
    <div class="len-cat-card-block">
      <div class="len-cat-min-blcok">
        <!-- <i class="fa fa-address-book" aria-hidden="true"></i> -->
        <svg class="len-cat-card-icon" aria-hidden="true">
          <use xlink:href="#icon-mianxingningmeng"></use>
        </svg>
        <?php echo $Tag_name; ?>
        <span class="cat-number-block">总共<?php echo $Tag_number; ?>篇文章</span>
      </div>
      <div class="len-cat-card-title-block"><?php echo $Tag_description; ?></div>
    </div>
  </div>
<?php
}
function Tag_Banner_Open_Module($catid = '')
{
  $Cat_Module_1 =  Len_Classify_Module($catid, 'Cat_Module_1', true);
  if ($Cat_Module_1 == true) {
    Tag_Banner_Module($catid);
  }
}
