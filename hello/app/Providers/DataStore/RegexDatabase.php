<?php


return array(
	'emoticons' => '/(?:>|<|O|0)*(?::|;|=|B|X)(?:-+)?(?:\)+|\*+|\\+|\/+|>+|X+|D+|P+|p+|d+|\}+|\]+|\{\}|\(+|<+|\[+|O+|o+|S+|s+|@|\|\||\|+|Z+|\?|C|c)|\(\s{0,}[\^\-o@\?;][_\.][\^\-o@\?;].{0,1}\s{0,}\)|<\/?3|[>\-][_\.][<\-]/u',
	
	//'sentence' => '/\'(?=\w)|\s+|@.+?\b|[#\^\*_\+=\|\.\\/:><`~\(\)\[\]\{\};]|(?=[!,\?"&])|(?<=[!,\?"&])|\-(?!\w)(?<!\w)/u',
	'sentence' => '/&.+;|(?<!n)\'(?!t)|\s+|@.+?\b|[#\^\*_\+=\|",\.\\/:><`~\(\)\[\]\{\};]|(?=[!,\?"&])|(?<=[!,\?"&])|(?<!\w)-|-(?!\w)|(?<=(not))[[:punct:]]|[[:punct:]](?=(not))/u',
	
	'non_latin' => '/[^\00-\255]+/u',
	
	'url' => '/((([A-Za-z]{3,9}:(?:\/\/)?)(?:[-;:&=\+\$,\w]+@)?[A-Za-z0-9.-]+|(?:www.|[-;:&=\+\$,\w]+@)[A-Za-z0-9.-]+)((?:\/[\+~%\/.\w-_]*)?\??(?:[-\+=&;%@.\w_]*)#?(?:[\w]*))?)/u',
	
	'split_string' => '/\./u',
	
);