<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

if (G5_IS_MOBILE) {
    include_once(G5_THEME_MOBILE_PATH.'/head.php');
    return;
}

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
?>

<!-- 상단 시작 { -->
<div id="hd">
    <div id="hd-wrapper-top">
        <div class="hd-wrapper">
            <div id="hd-login-container">
                <?php if ($is_member) { ?>
                    <div class="hd-login-button" id="hd-log-out">
                        <span class="fa fa-user"></span><?php echo "{$member['mb_name']}님";  ?> 환영합니다!
                    </div>
                    <div class="hd-login-button pointer" id="hd-log-out">
                        <a href="<?php echo G5_BBS_URL ?>/logout.php"><span class="fa fa-sign-in"></span>로그아웃</a>
                    </div>
                    <?php if ($is_admin) {  ?>
                        <div class="hd-login-button pointer" id="hd-admin">
                            <a href="<?php echo correct_goto_url(G5_ADMIN_URL); ?>" target="_blank">
                                <span class="fa fa-sign-in"></span>관리자
                            </a>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                    <div class="hd-login-button hd-login-modal pointer" id="hd-sign-up">
                        <a href="<?php echo G5_BBS_URL ?>/register_form.php"><span class="fa fa-user-plus"></span>회원가입</a>
                    </div>
                    <div class="hd-login-button hd-login-modal pointer" id="hd-login">
                        <span class="fa fa-sign-in"></span>로그인
                        <!-- 로그인 모달 시작-->
                        <div class="Modal modal-login" id="modal-login">
                            <div class="input group m-3">
                                <div class="btn-close-panel mb-3">
                                    <button type="button" class="btn-close" aria-label="Close"></button>
                                </div>
                                <form id="login-form" action="<?php echo G5_HTTPS_BBS_URL.'/login_check.php' ?>" onsubmit="return fhead_submit(this);" method="post" autocomplete="off">
                                    <input type="text" class="form-control" placeholder="아이디" id="user-id"  name="mb_id" />
                                    <input type="password" class="form-control mt-2" placeholder="비밀번호" id="user-pw" name="mb_password"/>
                                </form>
                                <button type="submit" data-target="login-form" class="btn btn-primary mt-2 submit">로그인</button>
                            </div>
                        </div>
                        <!-- 로그인 모달 끝-->
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <div id="hd-wrapper-menu">
        <div class="hd-wrapper">
            <?php
                $menu_datas = get_menu_db(0, true);
                $gnb_zindex = 999; // gnb_1dli z-index 값 설정용
                if (count($menu_datas) > 0) {
            ?>
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="/">
                                <img src="<?php echo G5_THEME_IMG_URL.'/banner.png' ?>" />
                            </a>
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <?php
                                foreach( $menu_datas as $row ){
                                    if( empty($row) ) continue;
                            ?>
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <?php echo $row['me_name'] ?>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <?php
                                                foreach( (array) $row['sub'] as $row2 ) {
                                                    if ( empty($row2) ) continue;
                                            ?>
                                                    <li><a class="dropdown-item" href="<?php echo $row2['me_link']; ?>"><?php echo $row2['me_name']; ?></a></li>
                                            <?php
                                                }
                                            ?>
                                        </ul>
                                    </li>
                            <?php
                                } //end foreach $row
                            ?>
                            </ul>
                        </div>
                    </nav>
            <?php
                } else {
            ?>
                    <li class="gnb_empty">메뉴 준비 중입니다.<?php if ($is_admin) { ?> <a href="<?php echo G5_ADMIN_URL; ?>/menu_list.php">관리자모드 &gt; 환경설정 &gt; 메뉴설정</a>에서 설정하실 수 있습니다.<?php } ?></li>
            <?php
                }
            ?>
        </div>
    </div>
</div>
<!-- } 상단 끝 -->

<script>

$(".hd-login-modal").on('click', (e) => {
    if (e.target !== e.currentTarget) return;

    [ ...document.getElementsByClassName("Modal") ].forEach(elem => elem.classList.remove("active"));
    const target = e.target.getElementsByClassName("Modal")[0];
    target.classList.add("active");
});

$(".btn-close").on('click', (e) => {
    e.stopPropagation();
    [ ...document.getElementsByClassName("Modal") ].forEach(elem => elem.classList.remove("active"));
});

$(".submit").on('click', e => {
    const target = e.target.dataset.target;
    document.getElementById(target).submit();
});

</script>

<hr>

<!-- 콘텐츠 시작 { -->
<div id="wrapper">
    <div id="container_wr">
   
    <div id="container">
        <?php if (!defined("_INDEX_")) { ?><h2 id="container_title"><span title="<?php echo get_text($g5['title']); ?>"><?php echo get_head_title($g5['title']); ?></span></h2><?php }