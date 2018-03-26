<?php
/*
 * 一个由小写字母组成的字符串可以看成一些同一字母的最大碎片组成的。
 * 例如,"aaabbaaac"是由下面碎片组成的:'aaa','bb','c'。
 * 给定一个字符串,请你帮助计算这个字符串的所有碎片的 “平均长度” 是多少。

 *
 * */
function find_it($string)
{
    //获取字符串的长度
    $len=strlen($string);

    //用count来计数
    $count = 1;

    //每次连续出现过的字符就存进响应的数组里面，如$sum_arr['a']=[1,3];表示连续出现过1次、3次
    $sum_arr = array();

    for ($i = 0;$i < $len;$i ++ )
    {
        //判断相邻字符是否相等，相等就计数加1，否则count恢复1
        if ($string[$i] == $string[$i+1])
        {
            $count++;
        } else {
            $sum_arr[$string[$i]][] = $count;
            $count = 1;
        }
    }

    //把每个数组里面的值都加起来，碎片个数也加起来，求出总的平均值
    $final_arr = array();

    foreach($sum_arr as $key =>$value)
    {

        $final_arr['lenth'][]=count($value);

        $final_arr['sum'][] = array_sum($value);

    }

    //获取碎片总个数
    $count= array_sum($final_arr['lenth']);

    //获取碎片总长度
    $sum = array_sum($final_arr['sum']);

    //保留两位小数
    $average = round($sum/$count,2);

    return $average;

}

//示例

$a = 'aaaaffffdcc';
echo "输入的字符串为： $a";
echo "<br>";
echo "<br>";

$average = find_it($a);


echo '字符串平均碎片长度为： '.$average;

