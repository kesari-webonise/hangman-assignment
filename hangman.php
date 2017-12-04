<?php
$alphabets=array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
$missedAlphabets=array();
$secretWord="webonise";
$word="";
$deathLevel=0;
$charactersFound=0;

for($iterator=0;$iterator<strlen($secretWord);$iterator++){
	$word[$iterator]='_';
}

while($deathLevel<6 && $charactersFound<strlen($secretWord)){
	echo "Available characters".PHP_EOL."";
	print_r($alphabets);
	
	$ch=readline("Enter any character in available characters:");

	if(!in_array($ch, $alphabets)){
		echo "Please enter character present in available charaters".PHP_EOL."";
	}
	elseif(strchr($secretWord,$ch)==FALSE){
		echo "Oh! You missed..".PHP_EOL."";
		$deathLevel++;
		$missedAlphabets[]=$ch;
		unset($alphabets[array_search($ch,$alphabets)]);
	}
	else{
		$iterator=0;
		while ($iterator<strlen($secretWord)) {
			if($ch==$secretWord[$iterator]){
				$word[$iterator]=$ch;
				$charactersFound++;
			}
			$iterator++;
		}
		unset($alphabets[array_search($ch,$alphabets)]);
	}
	echo "Your word :";
	print_r($word);
	echo PHP_EOL."";
	echo "Death Level :".$deathLevel.PHP_EOL."";
	echo "Missed characters".PHP_EOL."";
	print_r($missedAlphabets);
}

if(6==$deathLevel){
	echo "You lose".PHP_EOL."";
}
else{
	echo "You won".PHP_EOL."";
}
?>