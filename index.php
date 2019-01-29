<?php
/**
 * @package 你好，面码
 * @version 1.0
 */
/*
Plugin Name: 你好，面码
Plugin URI: https://www.sakurapuare.tech/product/ni-hao-mian-ma-wordpress-cha-jian-ivampiresp-er-ci-kai-fa
Description: 这个插件将secret base中的歌词随机展现在你的后台主页上。
Author: iVampireSP
Version: 1.0
Author URI: https://www.sakurapuare.tech/
*/

function _get_lyric() {
	/** 这些是secret base的歌词 */
	$lyrics = "和你在一起夏日终结 将来的梦想
一同许下的愿望 我永生难忘
十年之后的八月 请相信我们一定能再见
给我一份最美的回忆……
初次邂逅 是个不经意的瞬间
在归途的十字路口，你跟我说“一起回家吧”  我羞得手足无措用书包遮住脸颊 其实心里 从未有过如此高兴
烟花在夜空中绚烂绽放 莫名感伤
时光就像风儿一样 匆匆流淌
多少开心的相伴 多少欢乐的冒险 都属于你我的 秘密基地中
这个有你的夏天 将来的梦想 一同许下的愿望 我永生难忘
十年之后的八月 请相信我们一定能再见
直到最后 你都发自肺腑地诉说着感激 其实我早就知道
含着眼泪强颜欢笑的道别 是多不容易 给我一份最美的回忆……
这个暑假的时光 也已经所剩无几 愿太阳和月亮 能够好好相伴
也曾有过伤心寂寞 也曾有过口角争执 都在属于你我的 秘密基地中
直到最后 你都发自肺腑地诉说着感激 其实我早就知道
含着眼泪强颜欢笑的道别 是多不容易 给我一份最美的回忆……
突如其来的转学 我也无能为力 我一定会给你写信 给你打电话 你一定不要忘了我
无论何时 都要记得我们的秘密基地 与你在夏天的最后 说不完的话 看那夕阳西下 看那繁星漫天
你脸颊滑落的泪水 我永远不会忘记 直到最后 你都用力挥着手为我送行 我又怎么会忘记
如果这是一场梦 能不能永远不要醒
这个有你的夏天 将来的梦想 一同许下的愿望 我永生难忘
十年之后的八月 请相信我们一定能再见
直到最后 你都发自肺腑地诉说着感激 其实我早就知道
含着眼泪强颜欢笑的道别 是多不容易
给我一份最美的回忆……
";

	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function hello_mianma() {
	$chosen = _get_lyric();
	echo "<p id='mianma'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'hello_mianma' );

// We need some CSS to position the paragraph
function mianma_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#mianma {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'mianma_css' );

?>
