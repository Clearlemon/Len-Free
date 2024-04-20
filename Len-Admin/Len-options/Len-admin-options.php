<?php

use function PHPSTORM_META\type;

if (class_exists('CSF')) {

  $Module = 'Len_Free';
  $Image_Format = '.webp';
  $Image_Url = get_template_directory_uri() . '/Assets/Len-Images/';
  $Image_Url_Admin = get_template_directory_uri() . '/Assets/Len-Images/Admin/';


  CSF::createOptions($Module, array(
    'menu_title' => 'Len主题设置',
    'menu_slug'  => 'Len-Free',
    'framework_title'    => '<div class="admin-logo"></div>',
    'footer_text'        => '',
  ));
  //主题首页设置
  CSF::createSection($Module, array(
    'title'  => '模块设置',
    'icon' => 'icon-mokuai',
    'id'  => 'Module',
    'fields'      => array(
      array(
        'type'    => 'heading',
        'content' => '<h3>   ----幻灯片模块设置----    </h3>',
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'danger',
        'content' => '这是幻灯片模块【如果你没有开启 | 首页模块设置>幻灯片模块展示设置>幻灯片模块展示开启 | 则无法启用此模块】</br>
        增加一个幻灯片没写内容也会有一个占位标签哦~',
      ),
      array(
        'id'     => 'Module_1',
        'type'   => 'repeater',
        'title'  => '幻灯片',
        'fields' => array(
          array(
            'id'      => 'Module_1_1',
            'type'  => 'upload',
            'preview' => true,
            'library'      => 'image',
            'title'   => '幻灯片[图片]',
          ),
          array(
            'id'    => 'Module_1_2',
            'type'  => 'text',
            'title'   => '幻灯片[标题]',
            'class' => 'fields_no_padding-top',
          ),
          array(
            'id'    => 'Module_1_3',
            'type'  => 'text',
            'title'   => '幻灯片[内容]',
            'class' => 'fields_no_padding-top',
          ),
          array(
            'id'    => 'Module_1_4',
            'type'  => 'text',
            'title'   => '幻灯片[链接]',
            'class' => 'fields_no_padding-top',
          ),
        ),
      ),
      array(
        'type'    => 'heading',
        'content' => '<h3>   ----网站背景图模块设置----    </h3>',
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'success',
        'content' => '这是网站的背景模块',
      ),
      array(
        'id'    => 'Module_2',
        'type'  => 'switcher',
        'title' => '网站背景模块',
      ),
      array(
        'id'      => 'Module_2_1',
        'type'  => 'upload',
        'preview' => true,
        'library'      => 'image',
        'title'   => '背景图片',
        'dependency' => array('Module_2', '==', true),
        'class' => 'fields_no_padding-top',
      ),
      array(
        'type'    => 'heading',
        'content' => '<h3>   ----底部模块设置----    </h3>',
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'success',
        'content' => '这是底部模块展示设置区',
      ),
      array(
        'type'    => 'subheading',
        'content' => '版权 | 萌备案 | ICP备案 | 公安备案  | 数据库查询 | 一言API ',
      ),
      array(
        'id'            => 'Footer_Module_1',
        'type'          => 'accordion',
        'title'         => '备案信息',
        'accordions'    => array(
          array(
            'title'     => '萌备案',
            'fields'    => array(
              array(
                'id'    => 'Footer_Module_1_1_1',
                'type'  => 'switcher',
                'title' => '网站背景模块',
                'default' => false,
              ),
              array(
                'id'    => 'Footer_Module_1_1_2',
                'type'  => 'text',
                'title' => '备案号',
              ),
              array(
                'id'    => 'Footer_Module_1_1_3',
                'type'  => 'text',
                'title' => '备案链接',
              ),
            )
          ),
          array(
            'title'     => '公安备案',
            'fields'    => array(
              array(
                'id'    => 'Footer_Module_1_2_1',
                'type'  => 'switcher',
                'title' => '网站背景模块',
                'default' => false,
              ),
              array(
                'id'    => 'Footer_Module_1_2_2',
                'type'  => 'text',
                'title' => '备案号',
              ),
              array(
                'id'    => 'Footer_Module_1_2_3',
                'type'  => 'text',
                'title' => '备案链接',
              ),
            )
          ),
          array(
            'title'     => 'ICP备案',
            'fields'    => array(
              array(
                'id'    => 'Footer_Module_1_3_1',
                'type'  => 'switcher',
                'title' => '网站背景模块',
                'default' => false,
              ),
              array(
                'id'    => 'Footer_Module_1_3_2',
                'type'  => 'text',
                'title' => '备案号',
              ),
              array(
                'id'    => 'Footer_Module_1_3_3',
                'type'  => 'text',
                'title' => '备案链接',
              ),
            )
          ),
        )
      ),
      array(
        'id'    => 'Footer_Module_2',
        'type'  => 'text',
        'title' => '底部自定义声明',
        'class' => 'fields_no_padding-top',
      ),
      array(
        'id'    => 'Footer_Module_3',
        'type'  => 'switcher',
        'title' => '是否开启数据库查询',
        'class' => 'fields_no_padding-top',
        'default' => false,
      ),
      array(
        'id'    => 'Footer_Module_4',
        'type'  => 'switcher',
        'title' => '是否开启底部一言',
        'class' => 'fields_no_padding-top',
        'default' => false,
      ),
      array(
        'type'    => 'heading',
        'content' => '<h3>   ----左侧栏底部模块设置----    </h3>',
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'success',
        'content' => '这是左侧边栏底部模块展示设置区',
      ),
      array(
        'id'        => 'Sidebar_Module_1',
        'type'      => 'repeater',
        'title'     => '左侧栏底部模块',
        'max'  => 3,
        'fields'    => array(
          array(
            'id'    => 'Sidebar_Module_1_1',
            'type'  => 'text',
            'title' => '跳转链接',
          ),

          array(
            'id'    => 'Sidebar_Module_1_2',
            'type'  => 'icon',
            'title' => '图标选择',
          ),
        ),
        'default'   => array(
          array(
            'Sidebar_Module_1_1' => 'https://github.com/Clearlemon/Len-Free',
            'Sidebar_Module_1_2' => 'icon-github',
          ),
          array(
            'Sidebar_Module_1_1' => 'https://gitee.com/Clear-lemon/len-free',
            'Sidebar_Module_1_2' => 'icon-gitee',
          ),
          array(
            'Sidebar_Module_1_1' => '',
            'Sidebar_Module_1_2' => 'icon-Rss',
          ),
        )
      ),

    )
  ));
  //全局设置
  CSF::createSection($Module, array(
    'title'  => '全局设置',
    'icon' => 'icon-qjpz',
    'id'  => 'Global',
    'fields'      => array(
      array(
        'type'    => 'heading',
        'content' => '<h3>   ----链接跳转全局模块设置----    </h3>',
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'success',
        'content' => '这是全局模块展示设置区',
      ),
      array(
        'id'    => 'Jump_Module_1',
        'type'  => 'switcher',
        'title' => '展示模块开启【全部】',
      ),
      array(
        'type'    => 'heading',
        'content' => '<h3>   ----文章页面全局模块设置----    </h3>',
      ),
      array(
        'type'    => 'subheading',
        'content' => '展示模块 | 音乐模块 ',
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'success',
        'content' => '这是全局模块展示设置区',
      ),
      array(
        'id'    => 'Post_Content_Show_Module_1',
        'type'  => 'switcher',
        'title' => '展示模块开启【全部】',
      ),
      array(
        'id'         => 'Post_Content_Show_Module_1_1',
        'type'       => 'checkbox',
        'title'      => '文章内容模块展示',
        'class' => 'Horizontally fields_no_padding-top',
        'options'    => array(
          'user' => '用户展示',
          'copyright' => '版权声明',
          'source' => '文章来源',
          'music' => '底部音乐',
          'comments' => '评论模块',
        ),
        'default'    => array('comments'),
        'dependency' => array('Post_Content_Show_Module_1', '==', true),
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'success',
        'content' => '这是文章底部音乐播放器模块',
      ),
      array(
        'id'    => 'Music_Module_All',
        'type'  => 'switcher',
        'title' => '是否开启全局播放器锁定',
      ),
      array(
        'id'      => 'Module_Music_Post_All_1',
        'type'    => 'text',
        'title'   => '音乐[作曲名]',
        'desc'     => '填写歌曲名如果未填写则输出<b class="Len_emphasis_fonts">未知歌曲</b>',
        'dependency' => array('Music_Module_All', '==', true),
      ),
      array(
        'id'      => 'Module_Music_Post_All_2',
        'type'    => 'text',
        'title'   => '音乐[作者名]',
        'desc'     => '填写歌曲作者名如果未填写则输出<b class="Len_emphasis_fonts">未知作者</b>',
        'dependency' => array('Music_Module_All', '==', true),
      ),
      array(
        'id'      => 'Module_Music_Post_All_3',
        'type'    => 'text',
        'title'   => '音乐[作曲链接]',
        'desc'     => '填写歌曲链接如果未填写则输出<b class="Len_emphasis_fonts">未知链接</b>',
        'dependency' => array('Music_Module_All', '==', true),
      ),
      array(
        'id'      => 'Module_Music_Post_All_4',
        'type'    => 'text',
        'title'   => '音乐[作曲图封面]',
        'desc'     => '填写歌曲封面如果未填写则<b class="Len_emphasis_fonts">不输出内容</b>',
        'dependency' => array('Music_Module_All', '==', true),
      ),
      array(
        'id'      => 'Module_Music_Post_All_5',
        'type'    => 'text',
        'title'   => '音乐[作曲歌词]',
        'desc'     => '填写歌曲歌词如果未填写则输出<b class="Len_emphasis_fonts">未知歌词</b>',
        'dependency' => array('Music_Module_All', '==', true),
      ),
      array(
        'type'    => 'heading',
        'content' => '<h3>   ----分类&&标签&&搜索页面全局模块设置----    </h3>',
      ),
      array(
        'type'    => 'subheading',
        'content' => 'Banner模块 | 翻页模块 | 置顶模块 ',
      ),
      array(
        'id'    => 'Cat_Tag_Module_1',
        'type'  => 'switcher',
        'title' => '分类Banner图模块开启',
        'desc'     => '<b class="Len_emphasis_fonts">【全局控制】</b>|可在分<b class="Len_emphasis_fonts">分类&&标签设置 > 全局Banner模块设置 </b>中独立设置',
      ),
      array(
        'id'      => 'Cat_Tag_Module_2',
        'type'  => 'upload',
        'preview' => true,
        'library'      => 'image',
        'dependency' => array('Cat_Module_1', '==', true),
        'title'   => '分类[Banner图片]',
      ),
      array(
        'id'         => 'Cat_Tag_Module_3',
        'type'       => 'button_set',
        'title'      => '文章置顶选择',
        'desc'     => '<b class="Len_emphasis_fonts">【全局控制】</b>|可在分<b class="Len_emphasis_fonts">分类&&标签设置 > 文章置顶模块设置 </b>中独立设置',
        'options'    => array(
          'Cat_Tag_Post_Top_1'  => '所有置顶文章',
          'Cat_Tag_Post_Top_2' => '当前分类置顶文章',
          'Cat_Tag_Post_Top_3' => '不置顶',
        ),
        'default'    => 'Cat_Tag_Post_Top_3'

      ),
      array(
        'id'         => 'Cat_Tag_Module_4',
        'type'       => 'button_set',
        'title'      => '翻页模块设置',
        'desc'     => '<b class="Len_emphasis_fonts">【全局控制】</b>|可在分<b class="Len_emphasis_fonts">分类&&标签设置 > 翻页模块设置 </b>中独立设置',
        'options'    => array(
          'Cat_Tag_Page_1'  => '传统分页',
          'Cat_Tag_Page_2' => 'Ajax下拉',
        ),
        'default'    => 'Cat_Tag_Page_1'
      ),
    )
  ));
  //页面设置
  CSF::createSection($Module, array(
    'title'  => '页面设置',
    'icon' => 'icon-yemianshezhi',
    'id'  => 'Page',
    'fields'      => array(
      array(
        'type'    => 'heading',
        'content' => '<h3>   ----首页模块设置----    </h3>',
      ),
      array(
        'type'    => 'subheading',
        'content' => '幻灯片模块 | 翻页模块 | 顶部导航模块 | 懒加载  | 默认特色图 | ',
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'success',
        'content' => '幻灯片模块展示设置',
      ),
      array(
        'id'    => 'Home_Module_1',
        'type'  => 'switcher',
        'title' => '幻灯片模块展示开启',
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'success',
        'content' => '底部翻页模块展示设置',
      ),
      array(
        'id'         => 'Home_Module_2',
        'type'       => 'button_set',
        'title'      => '底部翻页模块展示设置【包含搜索页】',
        'options'    => array(
          'pagination_1'  => '传统分页',
          'pagination_2' => 'Ajax下拉',
        ),
        'default'    => 'pagination_2'
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'success',
        'content' => '如启用此功能，主题 > 外观 > 菜单 | 会多出一个显示位置名为【顶部菜单】<br>
        此菜单不支持二级菜单！！！',
        'dependency' => array('Home_Module_3', '==', true),
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'danger',
        'content' => '如不启用则前台和后台不输出相关设置和样式。',
        'dependency' => array('Home_Module_3', '==', false),
      ),
      array(
        'id'    => 'Home_Module_3',
        'type'  => 'switcher',
        'title' => '顶部导航模块展示开启',
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'success',
        'content' => '如启用此功能则会为未添加图片的文章增加默认特色图',
        'dependency' => array('Home_Module_4', '==', true),
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'danger',
        'content' => '如不启用此功能则未添加图片的文章，缩略图不会加载',
        'dependency' => array('Home_Module_4', '==', false),
      ),
      array(
        'id'    => 'Home_Module_4',
        'type'  => 'switcher',
        'title' => '默认特色图模块',
      ),
      array(
        'id'         => 'Home_Module_4_1',
        'type'       => 'button_set',
        'title'      => '默认特色图选择设置',
        'class' => ' fields_no_padding-top',
        'dependency' => array('Home_Module_4', '==', true),
        'options'    => array(
          'featured_1'  => '自定义特色图',
          'featured_2' => 'API特色图',
        ),
        'default'    => 'featured_2'

      ),
      array(
        'id'          => 'Home_Module_4_2',
        'type'        => 'gallery',
        'title'       => '自定义单张OR多张特色图',
        'add_title'   => '添加幻灯片',
        'edit_title'  => '编辑幻灯片',
        'clear_title' => '删除幻灯片',
        'dependency' => array(
          array('Home_Module_4_1', '==', 'featured_1'),
          array('Home_Module_4', '==', true),
        ),
        'class' => ' fields_no_padding-top',
      ),
      array(
        'id'      => 'Home_Module_4_3',
        'type'  => 'upload',
        'preview' => true,
        'library'      => 'image',
        'title'   => 'API特色图',
        'dependency' => array(
          array('Home_Module_4_1', '==', 'featured_2'),
          array('Home_Module_4', '==', true),
        ),
        'class' => 'fields_no_padding-top',
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'success',
        'content' => '这是文章特色图的懒加载模块',
      ),
      array(
        'id'    => 'Home_Module_5',
        'type'  => 'switcher',
        'title' => '懒加载模块',
      ),
      array(
        'id'      => 'Home_Module_5_1',
        'type'  => 'upload',
        'preview' => true,
        'library'      => 'image',
        'title'   => '懒加载图片',
        'dependency' => array('Home_Module_5', '==', true),
        'class' => 'fields_no_padding-top',
        'default' => $Image_Url . 'lazy.gif',
      ),
      array(
        'type'    => 'heading',
        'content' => '<h3>   ----文章页面模块设置----    </h3>',
      ),
      array(
        'type'    => 'subheading',
        'content' => '版权模块 | 互动模块 | 评论模块',
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'success',
        'content' => '这是版权模块设置区【文字模块支持Html】',
      ),
      array(
        'id'    => 'Post_Copyright_Module_1',
        'type'  => 'upload',
        'title' => '版权模块图片',
        'preview' => true,
        'desc'     => '此图片可展示二维码或者其他类型<b class="Len_emphasis_fonts">图片大小建议100*100，格式建议为webp</b>',
        'library'      => 'image',
      ),
      array(
        'id'      => 'Post_Copyright_Module_2',
        'type'    => 'textarea',
        'title'   => '版权模块文字【上】',
        'default' => '<p>1.此主题并不是十全十美请勿吹捧</p><p>2.文章转载需经过作者授权</p><p>3.文章转载请标注来源地址</p>'
      ),
      array(
        'id'      => 'Post_Copyright_Module_3',
        'type'    => 'textarea',
        'title'   => '版权模块文字【下】',
        'default' => '<p>温习提示：主题不支持商用哦！~</p>'
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'success',
        'content' => '这是互动模块设置区',
      ),
      array(
        'id'    => 'Post_Pay_Img_Module_1',
        'type'  => 'upload',
        'title' => '支付宝收款码',
        'preview' => true,
        'desc'     => '支付宝收款码图片上传<b class="Len_emphasis_fonts">图片大小建议200*200，格式建议为webp</b>',
        'library'      => 'image',
        'default' => $Image_Url . 'zfb' . $Image_Format,
      ),
      array(
        'id'    => 'Post_Pay_Img_Module_2',
        'type'  => 'upload',
        'title' => '微信收款码',
        'preview' => true,
        'desc'     => '微信收款码图片上传<b class="Len_emphasis_fonts">图片大小建议200*200，格式建议为webp</b>',
        'library'      => 'image',
        'default' => $Image_Url . 'wx' . $Image_Format,
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'success',
        'content' => '这里是评论模块设置区',
      ),
      array(
        'id'    => 'Post_Comments_Module_1',
        'type'  => 'switcher',
        'title' => '评论模块开启',
      ),
      array(
        'id'     => 'Post_Comments_Module_2',
        'type'   => 'fieldset',
        'title'  => '评论模块功能',
        'fields' => array(
          array(
            'id'    => 'Post_Comments_Module_2_1',
            'type'  => 'switcher',
            'title' => '评论表情包模块开启',
          ),
          array(
            'id'    => 'Post_Comments_Module_2_10',
            'type'  => 'switcher',
            'title' => '是否启用登录评论',
            'default' => true,
          ),
          array(
            'id'    => 'Post_Comments_Module_2_2',
            'class' => '',
            'type'  => 'text',
            'title' => '昵称placeholder',
          ),
          array(
            'id'    => 'Post_Comments_Module_2_3',
            'type'  => 'text',
            'title' => '邮箱placeholder',
          ),
          array(
            'id'    => 'Post_Comments_Module_2_4',
            'type'  => 'text',
            'title' => '网址placeholder',
          ),
          array(
            'id'    => 'Post_Comments_Module_2_5',
            'type'  => 'text',
            'title' => '评论placeholder',
          ),
          array(
            'type'    => 'submessage',
            'style'   => 'success',
            'content' => '用户登录显示模块',
          ),
          array(
            'id'    => 'Post_Comments_Module_2_6',
            'type'  => 'upload',
            'title' => '已登录用户头像',
            'preview' => true,
            'desc'     => '用户头像图片上传<b class="Len_emphasis_fonts">图片大小建议80*80，格式建议为webp</b>',
            'library'      => 'image',
            'default' => $Image_Url . 'wx' . $Image_Format,
          ),
          array(
            'id'    => 'Post_Comments_Module_2_7',
            'type'  => 'text',
            'title' => '已登录用户名',
          ),
          array(
            'type'    => 'submessage',
            'style'   => 'danger',
            'content' => '用户未登录显示模块',
          ),
          array(
            'id'    => 'Post_Comments_Module_2_8',
            'type'  => 'upload',
            'title' => '未登录用户头像',
            'preview' => true,
            'desc'     => '用户头像图片上传<b class="Len_emphasis_fonts">图片大小建议80*80，格式建议为webp</b>',
            'library'      => 'image',
            'default' => $Image_Url . 'wx' . $Image_Format,
          ),
          array(
            'id'    => 'Post_Comments_Module_2_9',
            'type'  => 'text',
            'title' => '未登录用户名',
          ),
        ),
        'default'        => array(
          'Post_Comments_Module_2_1'     => false,
          'Post_Comments_Module_2_2'     => '昵称',
          'Post_Comments_Module_2_3'     => '邮箱',
          'Post_Comments_Module_2_4'     => '网址',
          'Post_Comments_Module_2_5'     => '接下来由我来简单的喵喵两句',
          'Post_Comments_Module_2_6'     => $Image_Url . 'wx' . $Image_Format,
          'Post_Comments_Module_2_7'     => '小青柠',
          'Post_Comments_Module_2_8'     => $Image_Url . 'wx' . $Image_Format,
          'Post_Comments_Module_2_9'     => '未成熟的小青柠',
        ),
        'dependency' => array('Post_Comments_Module_1', '==', true),
      ),
      array(
        'id'         => 'Post_Comments_Module_3',
        'type'       => 'button_set',
        'title'      => '底部翻页模块展示设置',
        'options'    => array(
          'pagination_1'  => '传统分页',
          'pagination_2' => 'Ajax分页',
        ),
        'default'    => 'pagination_2',
        'dependency' => array('Post_Comments_Module_1', '==', true),
      ),

    )
  ));
  CSF::createSection($Module, array(
    'title'  => '其他设置',
    'icon' => 'icon-beifenhuifu',
    'id'  => 'Other',
    'fields'      => array(
      array(
        'type'    => 'heading',
        'content' => '<h3>   ----Seo设置----    </h3>',
      ),
      array(
        'type'    => 'submessage',
        'style'   => 'danger',
        'content' => '注：此功能模块可能与其他插件冲突！慎重开启！！！',
      ),
      array(
        'id'    => 'Seo_Module_1',
        'type'  => 'switcher',
        'title' => 'Seo模块开启',
      ),
      array(
        'title'    => "SEO标题",
        'id'       => 'Seo_Module_2',
        'type' => 'text',
        'class' => 'fields_no_padding-bottom fields_no_padding-top',
        'desc'     => '用于推动给SEO标题',
        'dependency' => array('Seo_Module_1', '==', true),
      ),
      array(
        'title'    => "SEO标题",
        'id'       => 'Seo_Module_2_1',
        'type' => 'text',
        'class' => 'fields_no_padding-bottom fields_no_padding-top',
        'desc'     => '用于推动给SEO标题',
        'dependency' => array('Seo_Module_1', '==', true),
      ),
      array(
        'title'    => "SEO关键字",
        'id'       => 'Seo_Module_3',
        'type' => 'text',
        'class' => 'fields_no_padding-bottom fields_no_padding-top',
        'desc'     => '用于推送给SEO关键字',
        'dependency' => array('Seo_Module_1', '==', true),
      ),

      array(
        'title'    => "SEO内容",
        'id'       => 'Seo_Module_4',
        'type' => 'textarea',
        'class' => 'fields_no_padding-top',
        'desc'     => '用于推送给SEO内容',
        'dependency' => array('Seo_Module_1', '==', true),
      ),
      array(
        'type'    => 'heading',
        'content' => '<h3>   ----网站设置----    </h3>',
      ),
      array(
        'type'    => 'subheading',
        'content' => '网站ICO | 网站Logo ',
      ),
      array(
        'type'    => 'heading',
        'content' => '<h3>   ----用户设置----    </h3>',
      ),
      array(
        'type'    => 'subheading',
        'content' => '自定义CSS&JS | 自定义模块设置 ',
      ),
    )
  ));

  CSF::createSection($Module, array(
    'title'  => 'Len-优化设置',
    'id'  => 'optimize',
    'icon' => 'icon-shangjiayouhua',
    'fields' => array(
      array(
        'type'    => 'heading',
        'content' => '<h3>   ----后台优化----    </h3>',
      ),
      array(
        'type'    => 'subheading',
        'content' => '以下优化为禁用后台的一些功能来优化Wordpress',
      ),
      array(
        'id'      => 'optimize_1',
        'type'    => 'switcher',
        'title'   => '经典编辑器',
        'label'   => '你是否要开启经典编辑器？[包含前端样式资源]',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => false,
      ),

      array(
        'id'      => 'optimize_2',
        'type'    => 'switcher',
        'title'   => 'Wordpress自动更新',
        'label'   => '你是否需要禁用Wordpress的自动更新？',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => true,
      ),

      array(
        'id'      => 'optimize_3',
        'type'    => 'switcher',
        'title'   => '经典小工具',
        'label'   => '你是否需要开启Wordpress的经典小工具？',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => false,
      ),

      array(
        'id'      => 'optimize_4',
        'type'    => 'switcher',
        'title'   => '版本修订',
        'label'   => '你是否需要禁用Wordpress自带的版本修订？',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => true,
      ),

      array(
        'id'      => 'optimize_5',
        'type'    => 'switcher',
        'title'   => 'Wordpress的图像限制功能',
        'label'   => '你是否需要禁用Wordpress的图像限制功能？',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => false,
      ),

      array(
        'id'      => 'optimize_6',
        'type'    => 'switcher',
        'title'   => 'Wordpress的多图片尺寸功能',
        'label'   => '你是否需要禁用Wordpress的多图片尺寸功能？',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => true,
      ),

      array(
        'id'      => 'optimize_7',
        'type'    => 'switcher',
        'title'   => 'Wordpress的字符转码',
        'label'   => '你是否需要禁用Wordpress的字符转码功能？',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => false,
      ),

      array(
        'id'      => 'optimize_8',
        'type'    => 'switcher',
        'title'   => 'Wordpress插入图片添加属性',
        'label'   => '你是否需要禁用Wordpress插入图片添加属性功能？',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => false,
      ),
      array(
        'id'      => 'optimize_9',
        'type'    => 'switcher',
        'title'   => '删除category标签',
        'label'   => '你是否需要去除category标签功能？',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => true,
      ),
      array(
        'type'    => 'heading',
        'content' => '<h3>   ----前端优化----    </h3>',
      ),
      array(
        'type'    => 'subheading',
        'content' => '以下优化为前端的一些功能来提高访问速度',
      ),

      array(
        'id'      => 'optimize_front_1',
        'type'    => 'switcher',
        'title'   => 'Wordpress的REST API',
        'label'   => '你是否需要禁用Wordpress的REST API功能？',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => false,
      ),

      array(
        'id'      => 'optimize_front_2',
        'type'    => 'switcher',
        'title'   => 'XML-RPL',
        'label'   => '你是否需要禁用Wordpress的XML-RPL功能？',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => true,
      ),

      array(
        'id'      => 'optimize_front_3',
        'type'    => 'switcher',
        'title'   => 'dns-prefetch',
        'label'   => '你是否需要禁用Wordpress的dns-prefetch功能？',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => false,
      ),
      array(
        'id'      => 'optimize_front_4',
        'type'    => 'switcher',
        'title'   => 'Trackbacks/Pingbacks',
        'label'   => '你是否需要禁用Wordpress的Trackbacks/Pingbacks',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => false,
      ),

      array(
        'id'      => 'optimize_front_5',
        'type'    => 'switcher',
        'title'   => 'Wordpress表情',
        'label'   => '你是否需要禁用Wordpress自带的表情包样式资源？',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => false,
      ),

      array(
        'id'      => 'optimize_front_6',
        'type'    => 'switcher',
        'title'   => '前台管理员Banner',
        'label'   => '你是否要禁用前台的管理员Banner？',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => false,
      ),

      array(
        'id'      => 'optimize_front_7',
        'type'    => 'switcher',
        'title'   => '前端版本号',
        'label'   => '你是否不显示前端的Wordpress版本号？',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => true,
      ),

      array(
        'type'    => 'heading',
        'content' => '<h3>   ----函数优化----    </h3>',
      ),
      array(
        'type'    => 'subheading',
        'content' => '以下优化为禁用函数的优化功能',
      ),

      array(
        'id'      => 'optimize_fuc_1',
        'type'    => 'switcher',
        'title'   => '禁用translations_api函数',
        'label'   => '你是否需要禁用Wordpress的translations_api函数？',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => false,
      ),

      array(
        'id'      => 'optimize_fuc_2',
        'type'    => 'switcher',
        'title'   => '禁用wp_check_php_version函数',
        'label'   => '你是否需要禁用Wordpress的wp_check_php_version函数？',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => false,
      ),

      array(
        'id'      => 'optimize_fuc_3',
        'type'    => 'switcher',
        'title'   => '禁用wp_check_browser_version函数',
        'label'   => '你是否需要禁用Wordpress的wp_check_browser_version函数？',
        'text_on'  => 'Yes',
        'text_off' => 'No',
        'default' => false,
      ),
    )
  ));
  //主题备份
  CSF::createSection($Module, array(
    'title'  => '备份&导入',
    'icon' => 'icon-beifenhuifu',
    'fields'      => array(
      array(
        'type' => 'backup',
      ),
    ),
  ));
  CSF::createSection($Module, array(
    'title'  => '待开发',
    'icon' => 'icon-beifenhuifu',
    'fields' => array()
  ));
}
add_filter('admin_footer_text', 'admin_footer', 99999);
function admin_footer()
{
  return '感谢您使用<a href="https://wordpress.org">WordPress</a>和<a href="https://github.com/Clearlemon/lemon-theme">Len主题进行创作</a>';
}
