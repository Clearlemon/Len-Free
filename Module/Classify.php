<?php
function Classify_Banner_Module($catid = '')
{
  $Cat_name = get_cat_name($catid);
  $Cat = get_category($catid); // 获取分类对象
  $Cat_number = $Cat->count; // 获取分类文章数量
  $Cat_description = $Cat->description; // 获取分类描述
?>
  <div class="len-cat-showcase-card">
    <img class="len-cat-card-back" src="<?php echo Len_Classify_Module($catid, 'Cat_Module_2', true); ?>" alt="">
    <div class="len-cat-card-block">
      <div class="len-cat-min-blcok">
        <!-- <i class="fa fa-address-book" aria-hidden="true"></i> -->
        <svg class="len-cat-card-icon" aria-hidden="true">
          <use xlink:href="#icon-mianxingningmeng"></use>
        </svg>
        <?php echo $Cat_name; ?>
        <span class="cat-number-block">总共<?php echo $Cat_number; ?>篇文章</span>
      </div>
      <div class="len-cat-card-title-block"><?php echo $Cat_description; ?></div>
    </div>
  </div>
<?php
}
function Classify_Banner_Open_Module($catid = '')
{
  $Cat_Module_1 =  Len_Classify_Module($catid, 'Cat_Module_1', true);
  if ($Cat_Module_1 == true) {
    Classify_Banner_Module($catid);
  }
}
