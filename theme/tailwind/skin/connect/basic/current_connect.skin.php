<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

// add_stylesheet('css 구문', 출력순서); 숫자가 작을 수록 먼저 출력됨
?>

<!-- 현재접속자 목록 시작 { -->
<div id="current_connect">
    <ul class="list-none m-0 p-0 border-t border-gray-200 dark:border-mainborder">
    <?php
    for ($i=0; $i<count($list); $i++) {
        //$location = conv_content($list[$i]['lo_location'], 0);
        $location = $list[$i]['lo_location'];
        // 최고관리자에게만 허용
        // 이 조건문은 가능한 변경하지 마십시오.
        if ($list[$i]['lo_url'] && $is_admin == 'super') $display_location = "<a href=\"".$list[$i]['lo_url']."\">".$location."</a>";
        else $display_location = $location;
    ?>
        <li class="relative flex border-b border-gray-200 box-border p-4 dark:border-mainborder">
            <span class="crt_num leading-45 text-gray-500 font-bold mr-5 dark:text-white"><?php echo $list[$i]['num'] ?></span>
            <span class="crt_profile leading-45 mr-5"><?php echo get_member_profile_img($list[$i]['mb_id']); ?></span>
            <div class="crt_info mt-1">
            	<span class="crt_name block dark:text-white"><?php echo $list[$i]['name'] ?></span>
            	<span class="crt_lct block dark:text-zinc-500"><?php echo $display_location ?></span>  
            </div>
        </li>
    <?php
    }
    if ($i == 0)
        echo "<li class=\"empty_li w-full border-0 text-gray-600 text-center py-48\">현재 접속자가 없습니다.</li>";
    ?>
    </ul>
</div>
<!-- } 현재접속자 목록 끝 -->