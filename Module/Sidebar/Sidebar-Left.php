<?php
function Len_Sidebar_Bottom_Module()
{
  $Sidebar_Module_1 = _len('Sidebar_Module_1');
  if (!empty($Sidebar_Module_1)) { // 修改此行，检查数组是否为空
    foreach ($Sidebar_Module_1 as $key) {
      $link = $key['Sidebar_Module_1_1'];
      $icon = $key['Sidebar_Module_1_2'];
?>
      <a class="sidebar-link-block" href="<?php echo $link; ?>">
        <span class="links-svg-block">
          <svg class="len-left-bottom-icon" aria-hidden="true">
            <use xlink:href="#<?php echo $icon; ?>"></use>
          </svg>
        </span>
      </a>
<?php
    }
  }
}

?>