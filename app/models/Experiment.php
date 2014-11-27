<?php

class Experiment // static class
{

	//list all .blade.php files
	// if not a .blade.php file, an error will occur
	public static function list_experiments()
	{
		$experiment_directory = './app/views/experiments';
		$experiment_url_list = File::files($experiment_directory);
		foreach ($experiment_url_list as $experiment_url)
		{
			$pattern= '/.*\/(.*).blade.php/';
			preg_match($pattern, $experiment_url, $experiment_name); //$experiment_name is an array, with the url at index [0] and the experiment name at [1] because of the way preg_match works
			echo '<button><a href = "./' . $experiment_name[1] . '" >' . $experiment_name[1] . '</a></button><br>';
		}
	}

	public static function create_button($event,$function_call, $display_string)
	{
		return "<button type='button' " . $event . "='" . $function_call . "'>" . $display_string . "</button>";
	}

	private static function createInitials($wordLists)
	{
		$returnList=[];
		Experiment::createInitialsRecursion ($returnList, '', '', $wordLists);
		return $returnList;
	}

	private static function createInitialsRecursion(&$returnList, $initials, $fullName, $restOfLists)
	{
		if (count($restOfLists) == 0)
		{
			$initials = strtoupper($initials);
			$fullName = ucwords($fullName);
			$finalInitials = '<span class="initials">Initials: <span class="accent">' . $initials . '</span></span>';
			$finalFullName = '<span class="fullName"> Full Name: <span class="accent">' . $fullName . '</span></span>';
			$finalString = $finalInitials . $finalFullName;
			array_push($returnList, $finalString);
		}
		else
		{
			$frontList = array_shift($restOfLists);
			foreach ($frontList as $word)
			{
				$initialPrev = $initials;
				$fullNamePrev = $fullName;
				$initials .= $word[0];
				$fullName .= $word . ' ';
				Experiment::createInitialsRecursion($returnList, $initials, $fullName, $restOfLists);
				$initials = $initialPrev; 	// must reset variables to previous value,
				$fullName = $fullNamePrev; 	// or else when going onto next $word in the same list
								// the foreach loop will retain the previous loop's word
			}
		}
	}

	public static function getInitialsAndFullNameList()
	{
		$wordLists = Experiment::putAllListsIntoArray();
		if (empty($wordLists))
		{
			echo 'empty lists'; die();
		}
		else
		{
			$initialsAndFullNameList = Experiment::createInitials($wordLists);
			return Experiment::toHTMLOutput($initialsAndFullNameList);	
		}
	}
	private static function putAllListsIntoArray()
	{	
		$num=1;
		$wordLists=[];
		while (Input::has('list' . $num))
		{
			$currentList = Input::get('list' . $num);
			$currentList = str_replace(' ', '', $currentList); // removing any extra spaces
			//turning the string of each list into an array
			//to allow for simpler usage
			$explodedList=explode(',', $currentList);
			array_push($wordLists, $explodedList);	
			$num++;
		}
		return $wordLists;
	}
	private static function toHTMLOutput($completedList)
	{
		$returnString = '';
		foreach ($completedList as $item)
		{
			$returnString .= '<li>' . $item . '</li>';
		}
		return $returnString;
	}
}

?>
