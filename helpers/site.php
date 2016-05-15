<?php

function slugify($str, $separator = '-')
{
    $str = strtolower($str);
    $str = preg_replace('/[^A-Za-z0-9-]+/', $separator, $str);
    return trim($str, $separator);
}

function e($value)
{
    return \yii\helpers\Html::encode($value);
}

function t($key, $str)
{
    return Yii::t($key, $str);
}

function params($key)
{
    return Yii::$app->params[$key];
}

function capitalize($string, $encoding = 'utf-8')
{
    $first = mb_strtoupper(mb_substr($string, 0, 1, $encoding), $encoding);
    $last = mb_strtolower(mb_substr($string, 1, mb_strlen($string, $encoding), $encoding), $encoding);
    return $first . $last;
}

function http_refresh($seconds, $url = '')
{
    return "<script language=\"JavaScript\">
	function redirect() {
		var url = '{$url}';
		url = url.replace(/\&amp\;/g, '&');
		document.location.href = url;
	}
	setTimeout(redirect, {$seconds}*1000);
	</script>\n";
}

function truncate($_description)
{
    $_description = strip_tags($_description);
    $ret = $_description;
    if (mb_strlen($_description, 'utf-8') > 250) {
        $ret = mb_substr($_description, 0, 250, 'utf-8') . ' ...';
    }
    return $ret;
}

function video_tag($video)
{
    // youtube video template
    $youtube = '<iframe width="245" height="245" src="http://www.youtube.com/embed/%s" frameborder="0" allowfullscreen></iframe>';

    // vimeo video template
    $vimeo = '<iframe src="http://player.vimeo.com/video/%s?title=0&amp;byline=0&amp;portrait=0" width="245" height="245" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>';

    // container
    $result = '';

    // is youtube video
    if (preg_match('/http:\/\/(www.)?youtube.com\/watch\?v=([a-zA-Z0-9_-]+[^&])/', $video, $matches)) {
        $result = sprintf($youtube, $matches[2]);
    }

    // is vimeo video
    if (preg_match('/http:\/\/vimeo.com\/([\d]+)/', $video, $matches)) {
        $result = sprintf($vimeo, $matches[1]);
    }

    return $result;
}